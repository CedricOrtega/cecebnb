<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController{
    // 1er pillier la méthode public ici home()
    // 2eme pillier la route lier à notre méthode public
    /**
    * @Route("/",name="homepage")
    */
    public function home(){
        //3eme pillier la réponse http
        return new Response("
        <head>
            <title> CeceBnB </title>
        </head>
        <h1> Ma 1ere réponse http wola! </h1>
        "); 
    }
}

?>