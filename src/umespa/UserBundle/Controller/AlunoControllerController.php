<?php

namespace umespa\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use umespa\UserBundle\Form\AlunoType;
use umespa\UserBundle\Entity\Aluno;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Symfony\Component\HttpFoundation\Session\Session;


use umespa\UserBundle\Entity\Temp;
use umespa\UserBundle\Form\TempType;
//http://www.linhadecodigo.com.br/artigo/3602/crop-jquery-recortando-imagens-com-jcrop.aspx imagem recorte
class AlunoControllerController extends Controller
{
    public function testAction()
    {
        return $this->render('umespaUserBundle:AlunoController:addAluno.html.twig');
    }
    
    public function confirmaAction($token)
    {
       return new Response($token);
    }

    public function criaContaAction($cad)
    {
        //echo($cad);
        $buttonNome ='Logar';

      if( $cad !='login' )
        {
          $buttonNome='Criar Conta';
        }     

       $temp = new Temp();
       $form = $this->GeraFormTemp($temp);        

        return $this->render('umespaUserBundle:AlunoController:criaConta.html.twig',array(
            'erro'=>'',
            'page'=>$cad,
            'nome'=> $buttonNome,
            'form' => $form->createView()));   
    }

    // public function loginAction()
    // {
    //   echo('efetuar Login');die;
    //    $temp = new Temp();
    //    $form = $this->GeraFormTemp($temp);    
    //     return $this->render('umespaUserBundle:AlunoController:criaConta.html.twig',array('page'=>$cad,'nome'=> $buttonNome,'form' => $form->createView()));   
    // }



    public function GeraFormTemp(Temp $entity)//cria forma no twig
    {
        $form = $this->createForm(new TempType(),
        $entity,
        array(
            'action'=>$this->generateUrl('umespa_trataDadosTemp'),//umespa_trataDadosTemp
            'method'=>'POST'
        ));

        return $form;
    }
#https://tableless.com.br/manipulando-arquivos-carregados-por-upload-no-laravel/
   public function trataDadosAction(Request $request)
   {
     $temp = new Temp();
     $form = $this->GeraFormTemp($temp);
     $form->submit($request);

     //print_r($form);
     $r = $this->getRequest();
     $port=$r->getPort();  
     $host=$r->getHost()  ;
     $url=$host.':'.$port.'/lumespa_login';
    // echo($url);die;

     $emailForm=$form->get('email')->getData();
     $nome=$form->get('nome')->getData();
     $senha=$form->get('senha')->getData();
     $senhaConf = $form->get('confirma')->getData();
     
    // $encoder = $this->container->get('security.password_encoder');
    // print_r($encoder);die;
  
    // $encoded = $encoder->encodePassword($temp,$senha);
    
    // echo($fileName);die;
     //echo($emailForm);
    //echo sprintf("%s\n", $emailForm);

    $tempRepository = $this->getDoctrine()->getRepository('umespaUserBundle:Temp');
    $email = $tempRepository->findOneBy(['email' => $emailForm]);    
    if($email){
       // print_r($email);die;
      // echo('Email ja esta em uso!');   
      $session=$this->get('session');
      $session->getFlashBag()->add('notice', 'O email: '.$emailForm.' já esta em uso');
    //  print_r($session);
       return $this->render('umespaUserBundle:AlunoController:criaConta.html.twig',array(
        //   'erro'=>'Email ja esta em uso!',
           'page'=>'Criar Conta',
           'nome'=> 'Criar Conta',
           'form' => $form->createView())); 
    }else{
         
        $envio=  $this->sendMailAction($emailForm, $nome);
              if($envio==1){
               // echo sprintf("%s\n",$envio);    
               //guarda os dados na tabela temporaria
               $em = $this->getDoctrine()->getManager();
               $md5Senha = md5($senha);
               $temp->setSenha($md5Senha);
              // echo($temp->getConfirma());die;
               $em->persist($temp);
               $em->flush();   

              return $this->render('umespaUserBundle:AlunoController:verificaEmail.html.twig', array(                
                  'email'=>$emailForm
                ));
              }
    }
    

    }

   public function sendMailAction($email,$nome)
   {
    $mailLogger = new \Swift_Plugins_Loggers_ArrayLogger();  
    $token=md5($email);
    $transport =  \Swift_SmtpTransport::newInstance()
    ->setHost('smtp.umespa.com.br')    
   ->setUsername('dev@umespa.com.br')
   ->setPassword('0o9i8uas');
    $mailler = \Swift_Mailer::newInstance($transport);
    $mailler->registerPlugin(new \Swift_Plugins_LoggerPlugin($mailLogger));
    $message = \Swift_Message::newInstance()
    ->setSubject('hello')
    ->setFrom('dev@umespa.com.br')
    ->setTo($email)
    ->setCharset('UTF-8')   	
    ->setContentType("text/html")
    ->setBody( $this->renderView('umespaUserBundle:AlunoController:confirma.html.twig',  array(     
        'nome' => $nome,
        'token'=>'http://localhost:8000/confirma/'.$token,
        'text/html')));

       return $mailler->send($message);

   }

    public function emitirCarteirinhaAction()
    {
        $aluno = new Aluno();
        $form= $this->gerarFormCadastraAluno($aluno);
        return $this->render('umespaUserBundle:AlunoController:addAluno.html.twig', array(
             'form' => $form->createView()
            ));   
       return new Response('holla pagina principal');
    }

    public function gerarFormCadastraAluno( Aluno $entity)
    {
        $form = $this->createForm(new AlunoType(),$entity ,array(
            'action'=>$this->generateUrl('umespa_checaIdade'), //acao para onde o form e enviado para verificação ou insercão no banco de dados 
            'method'=>'POST' //metodo no qual as informações sao enviadas
         ));

        return $form;
    }

    public function checaIdadeAction(Request $request)
    {
        $aluno = new Aluno();
        $form = $this->gerarFormCadastraAluno($aluno);
        $form->handleRequest($request);

        if($form->isValid())
        {        
            $geted = $form->get('dataNsc')->getData();
            $dt=$geted->format('Y-m-d');
          
            $datetime = new \DateTime("now");//cria uma variavel do tipo data com a data atual 
            $month = $datetime->format('Y-m-d');// mostra apenas o ano
        //  echo $dt;
        //  echo $month;
           
                    // Define os valores a serem usados
            $data_inicial = $dt;//'1984-03-23';
            $data_final = $month;//'2018-11-04';
            // Usa a função strtotime() e pega o timestamp das duas datas:
            $time_inicial = strtotime($data_inicial);
            $time_final = strtotime($data_final);
            // Calcula a diferença de segundos entre as duas datas:
            $diferenca = $time_final - $time_inicial; // 19522800 segundos
            // Calcula a diferença de dias
            $dias = (int)floor( $diferenca / (60 * 60 * 24)/365); // 225 dias
            // Exibe uma mensagem de resultado:
            echo $dias;
            //echo $month;
      
            if($dias < 17)
            {
                return new Response('Aluno Precisa de Dependente');
                // sprintf( $ClientEntity); 
                // return $this->render('umespaUserBundle:AlunoController:viewAluno.html.twig', array('aluno'=>$ClientEntity));  
            }else{
                return new Response('Aluno não Precisa de Dependente');
            }
          //sprintf( $nome);
          //$repository = $this->getDoctrine()->getRepository('umespaUserBundle:Aluno');
          //$aluno= $repository->findOneBynome($ClientEntity);
          //return new Response('retorno ', $datanasc);
          // return $this->render('umespaUserBundle:AlunoController:viewAluno.html.twig', array('aluno'=>$ClientEntity));  
        }
        //return new Response('retorno false chek idade');
    }
}
