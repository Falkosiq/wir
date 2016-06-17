<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PcType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cpu', EntityType::class, array(
                'class' => 'AppBundle:Cpu',
                'placeholder' => 'Choose a Cpu',
                'choice_label' => function ($cpu) {
                    return $cpu->__toString();
                }
            ))
            ->add('gpu', EntityType::class, array(
                'class' => 'AppBundle:Gpu',
                'placeholder' => 'Choose a Gpu',
                'choice_label' => function ($gpu) {
                    return $gpu->__toString();
                }
            ))
            ->add('ram')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Pc'
        ));
    }
}
