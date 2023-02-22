<?php

use Symfony\Component\HttpFoundation\Request;

    return [
        // l'objet contenant toutes les données de la requete
        Request::class => Request::createFromGlobals(),
    ];