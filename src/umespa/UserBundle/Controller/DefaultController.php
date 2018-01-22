<?php

namespace umespa\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('umespaUserBundle:Default:index.html.twig');
       //return new Response('holla pagina principal');
    }
}
