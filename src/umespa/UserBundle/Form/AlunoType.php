<?php

namespace umespa\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AlunoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome',null, array('attr'=> array('placeholder'=>'Nome','class'=>'form-control')))
            ->add('rg',null, array('attr'=> array('placeholder'=>'RG','class'=>'form-control')))
            ->add('cpf',null, array('attr'=> array('placeholder'=>'CPF','class'=>'form-control')))
            ->add('endereco',null, array('attr'=> array('placeholder'=>'Endereço','class'=>'form-control')))
            ->add('endComplemento',null, array('attr'=> array('placeholder'=>'','class'=>'form-control')))
            ->add('numero',null, array('attr'=> array('placeholder'=>'Número','class'=>'form-control')))
            ->add('numComplemento',null, array('attr'=> array('placeholder'=>'RG','class'=>'form-control')))
            ->add('fone',null, array('attr'=> array('placeholder'=>'Fone','class'=>'form-control')))
            ->add('email',null, array('attr'=> array('placeholder'=>'Email','class'=>'form-control')))
            ->add('cep',null, array('attr'=> array('placeholder'=>'Cep','class'=>'form-control')))
            ->add('dataNsc','date', array( 'years' => range(1970, 2014),'format' => 'dd.MM.yyyy'))
            ->add('cidadeNatal',null, array('attr'=> array('placeholder'=>'Cidade natal','class'=>'form-control')))
            ->add('save','submit', array('attr'=> array('placeholder'=>'Confirmar','class'=>'btn btn-success')))
            ->add('cancel','button')

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'umespa\UserBundle\Entity\Aluno'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'umespa_userbundle_aluno';
    }
}
