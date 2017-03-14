<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 10/03/2017
 * Time: 10:42
 */

namespace AppBundle\Manager;


use AppBundle\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;


class CategoryManager
{   private $entityManager;


    public function __construct( EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

    }

    public function all(){
        $categories = $this->entityManager->getRepository(Category::class)->getAll();

        return $categories;
    }







}