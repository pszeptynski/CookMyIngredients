<?php

namespace RecipeBookBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SecondaryIngredientType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantity')
//            ->add('recipe')
            ->add('dictionary')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RecipeBookBundle\Entity\SecondaryIngredient'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'recipebookbundle_secondaryingredient';
    }
}
