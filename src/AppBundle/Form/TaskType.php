<?php

namespace AppBundle\Form;

use AppBundle\Controller\TaskController;
use AppBundle\Entity\Task;
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
                'choices' => [
                    Task::CONST_STATUS_OPEN=>Task::CONST_STATUS_OPEN,
                    Task::CONST_STATUS_CLOSED=>Task::CONST_STATUS_CLOSED,

                ],
            ])
            ->add('category', ChoiceType::class, [
                'choices' => [



                ],
    ]);

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
