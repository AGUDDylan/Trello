<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Task;
use AppBundle\Entity\Category;

class TaskController extends Controller
{
    /**
     * @Route("/az", name="app_task_add", methods={"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response)
     */
    public function addAction(Request $request)
    {

        return "bla";

    }
}