<?php

namespace AppBundle\Form;

use AppBundle\Entity\Usuario;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsuarioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('nombre')
            ->add('usuario')
            //   ->add('password',PasswordType::class)
            ->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options' => array('label' => 'Contraseña',),
                'second_options' => array('label' => 'Repetir Contraseña'),
                'required'=>false

               ))
            ->add('isActive', CheckboxType::class, array('required'=>false))//         ->add('roles',EntityType::class,array('class'=>'AppBundle:Rol','multiple'=>'false'))
//            ->add('aceptarTerminos', CheckboxType::class, array(
//                'mapped' => false,
//                'constraints' => new IsTrue(),
//            ))
->add('roles',EntityType::class, array(
                'class' => 'AppBundle:Rol',

            ));

        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Usuario',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
// a unique key to help generate the secret token
            'csrf_token_id' => 'task_item',
        ));
    }
}
