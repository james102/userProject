<?php

namespace umespa\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userame')
            ->add('fristName')
            ->add('lastName')
            ->add('email','email')
            ->add('password','password')
            ->add('role', 'choice', array('choices' => array('ROLE_ADMIN' => 'Administrator', 'ROLE_USER' => 'User'), 'placeholder' => 'Selecione Tipo'))      
            ->add('isActive','checkbox')
            ->add('save','submit',array('label'=>'Salva usuario'))
           
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'umespa\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'user';
    }
}
