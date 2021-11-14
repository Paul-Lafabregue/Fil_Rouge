<?php

namespace App\Form;

use App\Entity\Products;
use App\Entity\Subcategories;
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
use Symfony\Component\Form\Extension\Core\Type\FileType; // Ajoute un FileType au champ Image // 
use Symfony\Component\Validator\Constraints\Image; // Ajoute Image au champ Image //

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
            // ->add('pro_sup')
            // ->add('pro_sub_cat')

            ->add('pro_name', TextType::class, [
                'label' => 'Nom du Produit',
                'attr' => [
                    'placeholder' => 'Nom du produit',
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[A-Za-z0-9éèàçâêûîôäëüïö\_\-\s]+$/',
                        'message' => 'Caratère(s) non valide(s)'
                    ]),
                    new NotBlank([
                        'message' => 'Veuillez saisir un nom de jeu !'
                    ]),
                ]
            ])

            // Champ Ref du produit //
            ->add('pro_ref', TextType::class, [
                'label' => 'Référence du produit',
                'attr' => [
                    'placeholder' => 'Réference du produit',
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[A-Za-zéèàçâêûîôäëüïö\_\-\s]+$/',
                        'message' => 'Caratère(s) non valide(s)'
                    ]),
                    new NotBlank([
                        'message' => 'Veuillez saisir la référence du produit !'
                    ]),
                ]
            ])

            // Champ Libellé du produit //
            ->add('pro_wording', TextareaType::class, [
                'label' => 'Libéllé du produit',
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

            // Champ description du produit //
            ->add('pro_description', TextareaType::class, [
                'label' => 'Decription du produit',
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
            ->add('pro_sup', EntityType::class, [
                'label' => 'Nom du fournisseur',
                'class' => Suppliers::class,
                'choice_label' => 'sup_company_name',
                'constraints' => [
                    new NotBlank([
                    'message' => 'Veuillez choisir un nom de fournisseur !'
                    ]),
                ]
            ])

            // Champ Nom de la subcatégorie //
            ->add('pro_sub_cat', EntityType::class, [
                'label' => 'Subcatégorie du produit',
                'class' => Subcategories::class,
                'choice_label' => 'sub_cat_name',
                'constraints' => [
                    new NotBlank([
                    'message' => 'Veuillez choisir une subcatégorie !'
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

            // Champ Prix du produit //
            ->add('pro_price', TextType::class, [
                'label' => 'Prix',
                'attr' => [
                    'placeholder' => 'Prix du produit',
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

            // Champ Image //
            ->add('pro_picture', FileType::class, [
                'label' => 'Image',
                'help' => 'Choissisez ici la photo du produit',
                //unmapped => fichier non associé à aucune propriété d'entité, validation impossible avec les annotations
                'mapped' => false,
                'multiple' => false,
                // pour éviter de recharger la photo lors de l'édition du profil
                'required' => false,
                'constraints' => [
                    new Image([
                        'maxSize' => '2000k',
                        'mimeTypesMessage' => 'Veuillez insérer une photo au format jpg, jpeg ou png'
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
