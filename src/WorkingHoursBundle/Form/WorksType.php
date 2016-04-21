<?php

namespace WorkingHoursBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class WorksType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('startTime', TimeType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('endTime', TimeType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('comment', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false
            ])
            ->add('project', EntityType::class, [
                'class' => 'WorkingHoursBundle:Projects',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WorkingHoursBundle\Entity\Works'
        ));
    }
}
