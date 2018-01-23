<?php

namespace umespa\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use umespa\UserBundle\Form\UserType;
use umespa\UserBundle\Entity\User;

class UserController extends Controller
{

    public function homeAction()
    {
        return $this->render('umespaUserBundle:User:home.html.twig');
    }
    public function indexAction()
    {
       /*$em = $this->getDoctrine()->getManager();
       $users = $em->getRepository('umespaUserBundle:User')->findAll();
       $res= 'Lista de usuarios: <br>';
       foreach($users as $user)
       {
           $res .='Usuario: '.$user->getUserame().' - Email: '.$user->getEmail().'<br />';    
       }
       return new Response($res);*/
       $em= $this->getDoctrine()->getManager();
       $users = $em->getRepository('umespaUserBundle:User')->findAll();

       return $this->render('umespaUserBundle:User:index.html.twig', array('users' => $users));
       //return new Response('jj');

    }

    public function viewAction($userame)
    {
        $repository = $this->getDoctrine()->getRepository('umespaUserBundle:User');
       // $user= $repository->find($id);
       //   $user= $repository->findOneById($id);
         $user= $repository->findOneByUserame($userame);

       // return new Response('Usuario: '.$user->getUserame().' Email: '.$user->getEmail());
        return $this->render('umespaUserBundle:User:view.html.twig', array('user' => $user));
    }
public function viewDescriptAction($userame)
    {
        $repository = $this->getDoctrine()->getRepository('umespaUserBundle:User');
       // $user= $repository->find($id);
       //   $user= $repository->findOneById($id);
         $user= $repository->findOneByUserame($userame);

       // return new Response('Usuario: '.$user->getUserame().' Email: '.$user->getEmail());
        return $this->render('umespaUserBundle:User:viewreturn.html.twig', array('user' => $user));
    }
    public function addAction()
    {
       $user = new User();
       $form = $this->createCreateForm($user);
     // return $this->render('umespaUserBundle:User:add.html.twig',array('fomr'=>$form));
      return $this->render('umespaUserBundle:User:add.html.twig', array('form' => $form->createView()));
      //  return new Response('jj');
    }    

    public function createCreateForm(user $entity)
    {
        $form = $this->createForm(new UserType(),$entity,array(
            'action'=>$this->generateUrl('umespa_user_create'),
            'method'=>'POST'
        ));
        return $form;
    }
    public function createAction(Request $request)
    {
        $user = new User();
        $form = $this->createCreateForm($user);
        $form->handleRequest($request);

        if($form->isValid())
        {
            $password = $form->get('password')->getData();//pega o password no post  
             $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($user,$password);
            $user->setPassword($encoded);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();   
            return $this->redirectToRoute('umespa_user_index');
        }
              return $this->render('umespaUserBundle:User:add.html.twig', array('form' => $form->createView()));

    }
}
