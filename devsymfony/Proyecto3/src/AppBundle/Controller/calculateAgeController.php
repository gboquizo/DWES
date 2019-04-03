<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class calculateAgeController extends Controller
{
    public function ageAction($anios)
    {
        is_numeric($anios) ? $edad = 2019 - (int) $anios : die("No es un número");
        return $this->render('calculateAge.html.twig', array('anios' => $edad));
    }
}
