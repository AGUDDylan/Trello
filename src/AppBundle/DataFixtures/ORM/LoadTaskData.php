<?php
namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use AppBundle\Entity\Task;
class LoadTaskData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $datas = [
            [
                'name'=>'Une tache',
                'description'=>'Modifier la page d\'accueil',
                'status'=>Task::CONST_STATUS_OPEN,
                'category'=> $this->getReference('category-0'),

            ],

            [
                'name' =>'Une tache 2',
                'description'=>'Avoir du bon café',
                'status'=>Task::CONST_STATUS_OPEN,
                'category'=> $this->getReference('category-1'),

            ],

            [
                'name' =>'Une tache 3',
                'description'=>'Connaitre Symfony',
                'status'=>Task::CONST_STATUS_OPEN,
                'category'=> $this->getReference('category-3'),

            ],


            [
                'name' =>'Une tache 4',
                'description'=>'Réunion',
                'status'=>Task::CONST_STATUS_OPEN,
                'category'=> $this->getReference('category-2'),

            ],
        ];
        foreach ($datas as $i => $data) {
            $task = new Task();
            $task->setName($data['name']);
            $task->setDescription($data['description']);
            $task->setStatus($data['status']);
            $task->setCategory($data['category']);


            $manager->persist($task);
            $this->addReference('task-'.$i, $task);
        }
        $manager->flush();
    }
    public function getOrder()
    {
        return 2;
    }
}

