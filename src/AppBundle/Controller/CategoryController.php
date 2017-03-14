<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 14/03/2017
 * Time: 15:12
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Task;
use AppBundle\Entity\Category;


class CategoryController extends Controller
{
    /**
     * @Route("/", name="app_task_list", methods={"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response)
     */
    public function listAction(Request $request)
    {

        $cm = $this->get('app.category.manager');
        $categories = $cm->all();

        return $this->render(':task:list.html.twig', [
            'categories' => $categories
        ]);



    }


}