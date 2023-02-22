<?php

namespace App\Zfoundation\HttpKernel;

use App\Zfoundation\Routing\RouterInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

abstract class HttpKernel implements HttpKernelInterface
{
  /**
   * Cette propriété représente le conteneur de dépendances
   *
   * @var ContainerInterface
   */
  protected ContainerInterface $container;

  public function __construct(ContainerInterface $container)
  {
    $this->container = $container;
    // dd('hello');
  }

  /**
   * Cette méthode du noyau lui permet de soumettre la requete
   * et de récupérer la réponse correspondante.
   *
   * @return Response
   */
  public function handleRequest(): Response
  {
    // Le noyau récupère le router
    $router = $this->container->get(RouterInterface::class);

    // Si le routeur détecte qu'il n'y a aucun controleur référencé dans le conteneur de dépendances
    if ($router->hasNoController()) {
      //Retournons une page 
      return $this->generateNotFoundResponse();
    }

    // Dans le cas contraire, le noyau demande au router de s'executer
    //et de lui retourner une réponse
    $router_response = $router->run();

    // Le noyau éxécute le controleur et récupere sa réponse


    // Le noyau retourne cette réponse au controleur frontal

  }

  public function generateNotFoundResponse() : Response
  {
    ob_start();
    require __DIR__ . "/Resources/default_welcome.html.php";
    $content = ob_get_clean();
    
    return new Response($content, 404);
  }
}
