<?php

namespace umespa\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use umespa\UserBundle\Entity\Upload;
use umespa\UserBundle\Form\UploadType;
use Symfony\Component\HttpFoundation\File\UploadedFile; 
//use Symfony\Component\HttpFoundation\File\File;

class uploadController extends Controller
{
    public function indexAction(Request $request)
    {   

      //  print_r($request->getMethod());//identifica o method
       
      //  $fileNameFrom = $file->getClientOriginalName(); //pega nome do arquivo
       //die();
      // print_r($request->get('upload'));
       if($request->getMethod()=='POST')//verifica se foi enviando post
       {   

   
           if($request->files->get('fileFoto'))//verifica se a foto foi enviada
           {
               echo('arquvo');
              
           }else{
            $erro ='Arquivo de Foto e Obrigatório!';
            $erro1 =' Obrigatório!';
           // $erro1 ='Arquivo de Foto e Obrigatório!';
            return $this->render('umespaUserBundle:AlunoController:enviaDocumentos.html.twig',array(
                'erro'=>$erro,
                'erro1'=> $erro1));
             //  echo('nao etem arquivo');
           }
           if($request->files->get('fileComprovante'))//verifica se a foto foi enviada
           {
               echo('arquvo');
              
           }else{
            $erro ='Arquivo de Comprovante e Obrigatório!';
            $erro1 =' Obrigatório!';

            return $this->render('umespaUserBundle:AlunoController:enviaDocumentos.html.twig',array('erro'=>$erro,'erro1'=>$erro1));
             //  echo('nao etem arquivo');
           }
        
           die();
        // $fileFoto=$request->files->get('fileFoto');
        // $fileComprovante=$request->files->get('fileComprovante');
        // $fileName = md5(uniqid()).'.'.$fileFoto->guessExtension();
        // $fileName = md5(uniqid()).'.'.$fileComprovante->guessExtension();
        // print_r($fileName);
        // $fileFoto->move($this->getParameter('upload_directory'),$fileName);
        // $fileComprovante->move($this->getParameter('upload_directory'),$fileName);

        // echo('enviado com su');
       
    //    print_r( $fileFoto);
    //    print_r( $fileComprovante);
    //     var_dump($fileComprovante);
    //        echo('batata');
       }

     
             // $form_photo->bind($request);
    //    $file = $this->files->get('file');
               
    //   die();
       //https://www.youtube.com/watch?v=0BzYNHQx35g
        $upload = new Upload();
        $form = $this->createForm(new UploadType(), $upload);
        $form->handleRequest($request);
        $nome=$form->get('alunoid')->getData();
        var_dump($nome);
        if($form->isValid())
        {
            $sFile =$upload->getFile();
            $file = $upload->getArquivo();
            var_dump($sFile);
            die();
              // $file stores the uploaded PDF file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $upload->getArquivo();
            $extencao= $file->guessExtension();//pega extenção do arquivo
            $size = $file->getSize(); //pega tamanho do arquivo
            $fileNameFrom = $file->getClientOriginalName(); //pega nome do arquivo
          //  print_r( $extencao);
           // print_r( $fileNameFrom);    
           
          //  print_r($size);
            if($extencao=='jpeg') //verifica se o tipo de arquivo e válido
            {
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                print_r($fileName);
                $file->move($this->getParameter('upload_directory'),$fileName);
              
            }else{
             //   print_r('Formato de arquivo nao aceito!');
                return new Response(
                    "<div class='container'><h4>Formato de arquivo nao aceito!</h4></div>"
                );
            }
         
        }


       // return $this->render('umespaUserBundle:upload:index.html.twig',    array('form'=>$form->createView()));
        return $this->render('umespaUserBundle:AlunoController:enviaDocumentos.html.twig',array('erro'=>''));
    }
     
}



//   //print_r($this->getUploadAbsolutePath());
//       //print_r( $this->generateUniqueFileName());
//       print_r( $this->getParameter('upload_directory'));
//       $brochuresDir = $this->container->getParameter('kernel.root_dir').'/../web/public/img/';
//         if($request->getMethod()=='POST'){
//           $image = $request->files->get('file');
//         //  $fileName;
//         //  print_r( $image);
//        //   $brochuresDir = $this->container->getParameter('kernel.root_dir').'/../web/public/img/';
//         //  print_r( $brochuresDir);
//           $this->upload();
//          // $request->files->move($brochuresDir, 'dd.jpg');

//         //  $extencao = $request->file->guessExtension();
//              print_r( $this->test());
//         //   print_r($image);
//            die();
//       // $file = UploadedFile();
//         if($file instanceof UploadedFile){

//         }else{
//             print_r('File Error:');
//         }

//         }else{

//             return $this->render('umespaUserBundle:upload:index.html.twig');    
    
//         }
// return $this->render('umespaUserBundle:upload:index.html.twig');    
//         // $product = new Upload();
//         // $form = $this->createForm(new UploadType(), $product);
//         // $form->handleRequest($request);

//         // if ($form->isValid()) {
        
//         //     $file = $product->getArquivo();

//         //     // Generate a unique name for the file before saving it
//         //     $fileName = md5(uniqid()).'.'.$file->guessExtension();
//         //     // Move the file to the directory where brochures are stored
//         //     $brochuresDir = $this->container->getParameter('kernel.root_dir').'/../web/img/img';
//         //     $file->move($brochuresDir, $fileName);

//         //     // Update the 'brochure' property to store the PDF file name
//         //     // instead of its contents
//         //     $product->setArquivo($filename);

//         //     // persist the $product variable or any other work...

//         //     return $this->redirect($this->generateUrl('app_product_list'));
        
//          }

//          public function getWebPath()
//          {
//              return null === $this->path
//                  ? null
//                  : $this->getUploadDir().'/'.$this->path;
//          }
        
//         protected function getUploadPath()
//         {
//             return 'public/img';
//         }
        
//         public function test()
//         {
//             return $this->container->getParameter('kernel.root_dir').'/../web/img';
//         }
//         private function generateUniqueFileName()
//         {
//             // md5() reduces the similarity of the file names generated by
//             // uniqid(), which is based on timestamps
//             return md5(uniqid());
//         }
//     protected function getUploadAbsolutePath()
//     {
//       //  return __DIR__ . '/../../../../web/';
//     }
//     public function upload(UploadedFile $file)
//     {
//         $fileName = md5(uniqid()).'.'.$file->guessExtension();

//         $file->move($this->getTargetDir(), $fileName);

//         return $fileName;
//     }
//     public function getTargetDir()
//     {
//         return $this->targetDir;
//     }