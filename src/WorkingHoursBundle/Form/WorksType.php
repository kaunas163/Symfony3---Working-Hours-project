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
            ->add('date', DateType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('startTime', TimeType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('endTime', TimeType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('comment', TextType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('project', EntityType::class, array(
                'class' => 'WorkingHoursBundle:Projects',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
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
