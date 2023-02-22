<?php

use Whoops\Run;
use Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;
use Whoops\Handler\PrettyPageHandler;

/**
 * --------------------------------------------------------------------------------
 * Hello!
 * 
 * Voici le fichier de configuration permettant d'amorcer l'application
 * 
 * --------------------------------------------------------------------------------
 */

 // Chargement de l'autoloader de compposer

 require __DIR__ . "/../vendor/autoload.php";

 // Chargement des constantes représentants des raccourcis

 require __DIR__ . "/constants/app.php";

 // Chargement de whoops pour avoir des messages d'erreurs un peu plus stylés
// Et permettre un debugger plus facilement

$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

// Chargement des variables d'environement
$dotenv = Dotenv::createImmutable(ROOT);
$dotenv->load();


// Chargement du conteneur de dépendance

$container = require __DIR__ . "/di/container.php";

// dd($container->get(Request::class));
