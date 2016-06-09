<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class GameType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('minPc', EntityType::class, array(
                'class' => 'AppBundle:Pc',
                'placeholder' => 'Choose minimum Pc',
                'choice_label' => 'cpu',
            ))
            ->add('recPc', EntityType::class, array(
                'class' => 'AppBundle:Pc',
                'placeholder' => 'Choose reuired Pc',
                'choice_label' => 'cpu',
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Game'
        ));
    }
}
