<?php

namespace umespa\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TempType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
        */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('email')
            ->add('senha','password')
         
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'umespa\UserBundle\Entity\Temp'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'umespa_userbundle_temp';
    }
}
