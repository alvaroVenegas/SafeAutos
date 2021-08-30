<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class DefaultController extends AbstractController
{
     /**
     * @Route ("/")
     */
    public function homePage():Response
    {
        return $this->redirectToRoute("app_login");
    }

}



