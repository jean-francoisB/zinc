<?php

namespace App\Zfoundation\Routing\Attribute;

interface RouteInterface
{
    /**
     * Cette methode permet de retourner l'uri de l'url
     *
     * @return string
     */
    public function getPath(): string;

    /**
     * Cette méthode retourne le nom de la route
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Cette méthode retourne les methodes d'accès autorisées
     *
     * @return array
     */
    public function getMethods(): array;

    /**
     * Cette méthode vérifie s'il y a des parametres
     * c'est a dire des données passées dynamiquement a la route
     *
     * @return boolean
     */


    public function hasParameters(): bool;

    /**
     * Cette methode récupère les parametres
     *
     * @return array
     */
    public function fetchParameters(): array;
}
