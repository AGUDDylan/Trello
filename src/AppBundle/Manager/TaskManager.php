<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 10/03/2017
 * Time: 10:42
 */

namespace AppBundle\Manager;


use AppBundle\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;


class TaskManager
{   private $entityManager;


    public function __construct( EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        
    }

    public function create(){
        $task = new Task();
        return $task;
    }



    public function save(Task $task){
        $taskm = $this->entityManager;
        if(null == $task->getId()){
            $taskm->persist($task);
        }

        $taskm->flush();
    }















}