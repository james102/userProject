<?php

namespace umespa\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('umespaUserBundle:Default:index.html.twig');
    }

    public function leiDaMeiaEntradaAction()
    {
        return $this->render('umespaUserBundle:AlunoController:leidameiaentrada.html.twig');
    }
}
