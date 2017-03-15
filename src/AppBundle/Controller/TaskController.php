<?php

namespace AppBundle\Controller;


use AppBundle\Form\TaskType;
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
     * @Route("/addtask", name="app_task_add", methods={"GET","POST"})
     *
     * @return \Symfony\Component\HttpFoundation\Response)
     */
    public function addAction(Request $request)
    {
        $task=$this->get('app.task.manager')->create();
        $form = $this->createForm(TaskType::class, $task);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $this->get('app.task.manager')->save($task);

                return $this->redirectToRoute('app_task_list');

            }
        }


        return $this->render(':task:new.html.twig', [
            'form' => $form->createView(),


        ]);

    }


    /**
     * @Route("/updatetask", name="app_task_update", methods={"GET","POST"})
     *
     * @return \Symfony\Component\HttpFoundation\Response)
     */


    public function updateAction(Request $request)
    {
        $task=$this->get('app.task.manager')->create();
        $form = $this->createForm(TaskType::class, $task);



        return $this->render(':task:update.html.twig', [
            'form' => $form->createView(),


        ]);

    }




}