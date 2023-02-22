<?php

namespace App\Zfoundation\Routing;

interface RouterInterface
{
    /**
     * Cette méthode du router lui permet de stocker les routes 
     * dans un tableau a routes tout en prenant soin de les trier
     * en fonction de leur nom.
     *
     * @param array $controllers
     * @return void
     */
    public function addRoutes(array $controllers = []): void;

    /**
     * Cette méthode du routeur lui permet de s'executer et de retourner
     * le controleur en charge de la requete.
     *
     * @return array|null
     */
    public function run(): ?array;


    /**
     * Cette méthode du routeur permet de retourner l'information censée etre 
     * au niveau de la barre d'urlassociée a cette route
     *
     * @return string
     */
    public function generatePath(string $route_name, ?array $parameters =[]): string;
}
