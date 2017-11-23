<?php

namespace MusicaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MusicaBundle:Default:index.html.twig');
    }
}
