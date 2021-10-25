<?php

namespace App\Form;

use App\Entity\Products;
use App\Entity\Categories;
use App\Entity\Suppliers;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank; // Vérifie si le champ est vide //
use Symfony\Component\Validator\Constraints\Regex; // Ajoute une regex au champ //
use Symfony\Component\Form\Extension\Core\Type\TextType; // Ajoute un TypeText au champ //
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; // Ajoute un EntityType au champ //

class ProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('pro_name')
            // ->add('pro_price')
            // ->add('pro_vat')
            // ->add('pro_ref')
            // ->add('pro_stock')
            // ->add('pro_wording')
            // ->add('pro_description')
            // ->add('pro_picture')
            // ->add('pro_date_add')
            // ->add('pro_date_modif')
            // ->add('cat_id')
            // ->add('sup_id')

            // Champ Nom Du jeu //
            ->add('pro_name', TextType::class, [
                'label' => 'Nom du Produit',
                'attr' => [
                    'placeholder' => 'Nom du jeu',
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[A-Za-zéèàçâêûîôäëüïö\_\-\s]+$/',
                        'message' => 'Caratère(s) non valide(s)'
                    ]),
                    new NotBlank([
                        'message' => 'Veuillez saisir un nom de jeu !'
                    ]),
                ]
            ])

            // Champ Ref du jeu //
            ->add('pro_ref', TextType::class, [
                'label' => 'Référence du jeu',
                'attr' => [
                    'placeholder' => 'Réference du jeu',
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[A-Za-zéèàçâêûîôäëüïö\_\-\s]+$/',
                        'message' => 'Caratère(s) non valide(s)'
                    ]),
                    new NotBlank([
                        'message' => 'Veuillez saisir la référence du jeu !'
                    ]),
                ]
            ])

            // Champ image du produit //
            ->add('pro_picture', TextType::class, [
                'label' => 'Image du jeu',
                'attr' => [
                    'placeholder' => 'Type de image (ex : png)',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir le type de image !'
                    ]),
                ]
            ])

            // Champ date d'ajout //
            ->add('pro_date_add', DateTimeType::class, [
                'date_label' => 'Date d\'ajout',
                'widget' => 'single_text',
                'placeholder' => 'Produit',
                'date_format' => 'yyyy-MM-dd HH:mm',

            ])

            // Champ date de modif //
            ->add('pro_date_modif', DateTimeType::class, [
                'date_label' => 'Date de modif',
                'widget' => 'single_text',
                'placeholder' => 'Produit',
                'date_format' => 'yyyy-MM-dd HH:mm',

            ])

            // Champ Libellé du produit //
            ->add('pro_wording', TextareaType::class, [
                'label' => 'Libéllé du jeu',
                'attr' => [
                    'placeholder' => 'Libellé',
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[A-Za-zéèàçâêûîôäëüïö\_\-\s]+$/',
                        'message' => 'Caratère(s) non valide(s)'
                    ]),
                    new NotBlank([
                        'message' => 'Veuillez saisir un libéllé !'
                    ]),
                ]
            ])

            // Champ description du jeu //
            ->add('pro_description', TextareaType::class, [
                'label' => 'Decription du jeu',
                'attr' => [
                    'placeholder' => 'Description',
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[A-Za-zéèàçâêûîôäëüïö\_\-\s]+$/',
                        'message' => 'Caratère(s) non valide(s)'
                    ]),
                    new NotBlank([
                        'message' => 'Veuillez saisir un nom de produit !'
                    ]),
                ]
            ])

            // Champ Nom Du Fournisseur //
            ->add('sup_id', EntityType::class, [
                'label' => 'Nom du fournisseur',
                'class' => Suppliers::class,
                'choice_label' => 'sup_company_name',
                'placeholder' => '',
                'constraints' => [
                    new NotBlank([
                      'message' => 'Veuillez choisir un nom de fournisseur !'
                    ]),
                ]
            ])

            // Champ Nom Du la catégorie //
            ->add('cat_id', EntityType::class, [
                'label' => 'Catégorie du produit',
                'class' => Categories::class,
                'choice_label' => 'cat_name',
                'placeholder' => '',
                'constraints' => [
                    new NotBlank([
                      'message' => 'Veuillez choisir une catégorie !'
                    ]),
                ]
            ])

            // Champ TVA //
            ->add('pro_vat', TextType::class, [
                'label' => 'TVA',
                'attr' => [
                    'placeholder' => '',
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[0-9]+$/',
                        'message' => 'Veuillez saisir des chiffres.'
                    ]),
                ]
            ])

            // Champ Prix du jeu //
            ->add('pro_price', TextType::class, [
                'label' => 'Prix',
                'attr' => [
                    'placeholder' => 'Prix du jeu',
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[0-9]+$/',
                        'message' => 'Veuillez saisir un prix unitaire correct.'
                    ]),
                    new NotBlank([
                        'message' => 'Veuillez saisir un prix unitaire !'
                    ]),
                ]
            ])

            // Champ Quantité En Stock //
            ->add('pro_stock', TextType::class, [
                'label' => 'Quantité en stock',
                'attr' => [
                    'placeholder' => 'Stock',
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[0-9]+$/',
                        'message' => 'Veuillez saisir une quantité en stock correct.'
                    ]),
                    new NotBlank([
                        'message' => 'Veuillez saisir une quantité en stock !'
                    ]),
                ]
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}
