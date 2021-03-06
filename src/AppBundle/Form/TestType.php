<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class TestType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('minFps', IntegerType::class, array('label'=>'Minimal FPS'))
            ->add('avgFps', IntegerType::class, array('label'=>'Average FPS'))
            ->add('maxFps', IntegerType::class, array('label'=>'Maximal FPS'))
            ->add('settings', ChoiceType::class, array(
                'choices' => array(
                    'low' => 'low',
                    'medium' => 'medium',
                    'high' => 'high',
                ),
                'placeholder' => 'Choose settings',
            ))
            ->add('game')
            /*->add('user')
            ->add('pc')*/
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Test'
        ));
    }
}
