<?php

namespace App\Zfoundation\Routing;

use ReflectionClass;
use App\Zfoundation\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Request;

class Router implements RouterInterface
{
    /**
     * Cette propriété repésenta la liste de tous les controleurs de l'application
     *
     * @var array
     */
    private array $controllers = [];

    /**
     * Cette propriété représente l'objet contenant toutes les données de la requête du client
     *
     * @var Request
     */
    private Request $request;

    /**
     * Les données que reçoit le router en parametres dès la construction de l'objet
     * proviennent du conteneur de dépendances
     *
     * @param Request $request
     * @param array $controllers
     */
    public function __construct(Request $request, array $controllers = [])
    {
        $this->request     = $request;
        $this->controllers = $controllers;
        $this->addRoutes($controllers);
    }
    /**
     * Cette méthode du router lui permet de stocker les routes 
     * dans un tableau a routes tout en prenant soin de les trier
     * en fonction de leur nom.
     *
     * @param array $controllers
     * @return void
     */
    public function addRoutes(array $controllers = []): void
    {
        // Pour chaque controller présent dans le tableau des controller récupérés depuis 
        // le contenuer de dependance
        foreach ($controllers as $controller) {
            // Permettre a chaque controleur récupéré lors du tour de boucle de faire sa propre reflexion
            // C'est a dire, rapporter toutes les informations présentes dans la classe dans le controleur
            $reflection_controller = new ReflectionClass($controller);

            //Demander au controleur de récupèrer toutes ses méthodes
            //Pour chacune de ses méthodes
            foreach ($reflection_controller->getMethods() as $reflection_method) {
                // Récupérer les attributs de chacune de ses méthodes
                //Attention les attributs doivent etre de type "route"
                $reflection_attributes = $reflection_method->getAttributes();

                // Pour chaque attribut de réflexion, 
                //    foreach ($reflection_attributes as $reflection_attribute)
                //    {
                        // Instancier cet attribut de type "Route"
                //     //Sauvegarder dans le tableau à routes
                        // tout en prenant soin de le trier en fonction de son nom.
                //    }
            }
        }
    }

    /**
     * Cette méthode du routeur lui permet de s'executer et de retourner
     * le controleur en charge de la requete.
     *
     * @return array|null
     */
    public function run(): ?array
    {
        dd('run');
    }


    /**
     * Cette méthode du routeur permet de retourner l'information censée etre 
     * au niveau de la barre d'urlassociée a cette route
     *
     * @return string
     */
    public function generatePath(string $route_name, ?array $parameters = []): string
    {
    }

    /**
     * Cette propriété du routeur lui permet de vérifier si le tableau des controleurs est vide ou non
     * 
     * Elle retournée "true" si le tableau est vide et "false" dans le cas contraire.
     *
     * @return boolean
     */
    public function hasNoController(): bool
    {
        return empty($this->controllers) ? true : false;
    }
}
