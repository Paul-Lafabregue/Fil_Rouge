<?php

namespace App\Form;

use App\Entity\Products;
use App\Entity\Suppliers;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

// Contraintes De Validation //

use Symfony\Component\Validator\Constraints\NotBlank; // Vérifie si le champ est vide //
use Symfony\Component\Validator\Constraints\Regex; // Ajoute une regex au champ //
use Symfony\Component\Form\Extension\Core\Type\TextType; // Ajoute un TypeText au champ //
use Symfony\Bridge\Doctrine\Form\Type\EntityType; // Ajoute un EntityType au champ //
use Symfony\Component\Form\Extension\Core\Type\FileType; // Ajoute un FileType au champ Image //

class ProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ProductName')
            ->add('CategoryID')
            ->add('QuantityPerUnit')
            ->add('UnitPrice')
            ->add('UnitsInStock')
            ->add('UnitsOnOrder')
            ->add('ReorderLevel')
            ->add('Discontinued')
            // ->add('ProSupID')
            ->add('ProSupID', EntityType::class, [
                'label' => 'Nom du fournisseur',
                'class' => Suppliers::class,
                'choice_label' => 'CompanyName',
                'constraints' => [
                    new NotBlank([
                      'message' => 'Veuillez choisir un nom de fournisseur !'
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
