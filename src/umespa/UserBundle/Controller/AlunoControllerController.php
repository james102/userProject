<?php

namespace umespa\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use umespa\UserBundle\Form\AlunoType;
use umespa\UserBundle\Entity\Aluno;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Exception\TransformationFailedException;

use umespa\UserBundle\Entity\Temp;
use umespa\UserBundle\Form\TempType;
//http://www.linhadecodigo.com.br/artigo/3602/crop-jquery-recortando-imagens-com-jcrop.aspx
class AlunoControllerController extends Controller
{

 public function criaContaAction($cad)
    {
        $buttonNome ='Logar';

      if( $cad !='login' )
        {
          $buttonNome='Criar Conta';
        }     

       $temp = new Temp();
       $form = $this->GeraFormTemp($temp);    
        return $this->render('umespaUserBundle:AlunoController:criaConta.html.twig',array('page'=>$cad,'nome'=> $buttonNome,'form' => $form->createView()));   
    }

    public function GeraFormTemp(Temp $entity)//cria forma no twig
    {
        $form = $this->createForm(new TempType(),$entity,array(
            'action'=>$this->generateUrl('umespa_trataDadosTemp'),
            'method'=>'POST'
        ));
        return $form;
    }

   public function trataDadosAction(Request $request)
   {
    $temp = new Temp();
    $form = $this->GeraFormTemp($temp);
    $form->handleRequest($request);
    $nome=$form->get('nome')->getData();
    return new Response($nome);
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
private function getIdate($time_inicial,$data_final)
{

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
