<?php

namespace umespa\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UploadType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('arquivo', 'file', array('label' => 'arquivo (PDF file)')) 
        ->add('alunoid') ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'umespa\UserBundle\Entity\Upload'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'umespa_userbundle_upload';
    }
}
