<?php

use App\Zfoundation\Routing\Router;
use App\Zfoundation\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Request;

    return [
        // l'objet contenant toutes les données de la requete
        Request::class => Request::createFromGlobals(),

        // La liste de tous les controleurs de l'application
        "controllers"=>[
            "App\Controller\WelcomeController"
        ],

        RouterInterface::class => DI\create(Router::class)
        ->constructor(DI\get(Request::class), DI\get("controllers")),
    ];