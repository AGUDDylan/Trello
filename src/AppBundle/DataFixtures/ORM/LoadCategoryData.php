<?php
namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use AppBundle\Entity\Category;
class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $names = [
            'A faire ',
            'En cours',
            'Terminées',
            'Bugs/retours',

        ];
        foreach ($names as $i => $name) {
            $category = new Category();
            $category->setName($name);
            $manager->persist($category);
            $this->addReference('category-'.$i, $category);
        }
        $manager->flush();
    }
    public function getOrder()
    {
        return 1;
    }
}