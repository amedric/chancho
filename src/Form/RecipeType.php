<?php

namespace App\Form;

use App\Entity\Recipe;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('content')
//            ->add('createdAt')
            ->add('rating')
            ->add('img')
            ->add('user', EntityType::class,[
                'class' => User::class,
                'required' => true,
                'multiple' => true,
                'choice_label' => function (User $user) {
                    return $user->getfirstname();
                },
            ])
            ->add('category', null, [
                'placeholder' => 'Choose a category',
                'choice_label' => 'title'
            ])
//            ->add('recipeFile', VichFileType::class, [
//                'required'      => false,
//                'allow_delete'  => true, // not mandatory, default is true
//                'download_uri' => true, // not mandatory, default is true
//
//            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
