<?php

namespace AppBundle\Form;

use AppBundle\Controller\TaskController;
use AppBundle\Entity\Task;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Tests\Fixtures\Validation\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class TaskType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('description', TextareaType::class)
            ->add('status', ChoiceType::class, [
                'choices' => array(
                    Task::CONST_STATUS_OPEN => Task::CONST_STATUS_OPEN,
                    Task::CONST_STATUS_CLOSED => Task::CONST_STATUS_CLOSED,
                ),
            ])
            ->add('category', EntityType::class, array(
                'class' =>\AppBundle\Entity\Category::class,
                'choice_label' => 'name',
        ));

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Task'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_task';
    }


}
