<?php

namespace App\Form;

use App\Entity\Film;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\FileType; // <--- N'oublie pas ça
use Symfony\Component\Validator\Constraints\File; // <--- Et ça pour les règles

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('categorie')
            ->add('img', FileType::class, [
             
                'label' => 'Affiche du film (Fichier image)',

                // IMPORTANT : On dissocie le champ de l'entité
                'mapped' => false,

                // Pour ne pas être obligé de re-uploader l'image à chaque modification
                'required' => false,

                // Règles de validation (optionnel mais conseillé)
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/webp',
                        ],
                        'mimeTypesMessage' => 'Veuillez uploader une image valide (JPG, PNG, WEBP)',
                    ])
                ],
            ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
        ]);
    }
}
