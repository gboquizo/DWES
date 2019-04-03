<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SaludoController extends Controller
{
    public function saludoAction()
    {
        return $this->render('saludo.html.twig');
    }

    public function saludoPersonalAction($msg)
    {
        return $this->render('saludopersonal.html.twig', ['msg' => $msg]);
    }
}
