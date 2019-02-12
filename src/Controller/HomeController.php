<?php

namespace App\Controller;

use App\Entity\Ad;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class HomeController extends Controller{

    /**
    * @Route("/hello/{prenom}",name="hellopage")
    * @Route("/hello2",name="hello2")
    */
    public function hello($prenom = "Visiteur"){

        return $this->render("hello.html.twig",
        ['prenom' => $prenom]
    );
    }

    // 1er pillier la méthode public ici home()
    // 2eme pillier la route lier à notre méthode public
    /**
    * @Route("/",name="homepage")
    */
    public function home(){
        //3eme pillier la réponse http
        return $this->render('home.html.twig', ['title' => "Bonjour sur twig avec variable"]);
    }
}

?>