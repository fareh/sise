<?php

namespace Sise\Bundle\CoreBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EtablissementCycleenseignementType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('codeetab')
            ->add('codetypeetab')
            ->add('codecyclense')
//            ->add('codecyclense_id', 'collection', array('type'=> new NomenclatureCycleenseignementType(),
//                'allow_add'    => true,
//                'allow_delete' => true))
       //   ->add('ListEnse', 'collection', array('type' => new NomenclatureCycleenseignementType()))
//            ->add('ListEnse', 'entity', array(
//            'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement',
//              // 'property' => 'PrenomNom',
//              'expanded' => true,
//               'multiple' => true,
////               'required' => false,
////         //  'label' => 'film.acteurs'
//            ))
//         ->add('codecyclense', 'entity', array(
//             'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement',
////               // 'property' => 'PrenomNom',
//               'expanded' => true,
//                'multiple' => true,
//               'required' => false,
//         //  'label' => 'film.acteurs'
//            ))
//            ->add('codecyclense', 'collection', array(
//                'type'         => new NomenclatureCycleenseignementType(),
//                'allow_add'    => true,
//                'allow_delete' => true
//            ))
       // ->add('save',      'submit')
//            ->add('codecyclense', 'entity', array(
//                'class'     => 'Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement',
//                'query_builder' => function(EntityRepository $er) {
//                    return $er->createQueryBuilder('u')
//                        ->orderBy('u.codecyclense', 'ASC');
//                },'multiple' => true,
//                'label'  => 'Selectionner des destinataires',
//            )
  //  )
         //   ->add('codecyclense',new NomenclatureCycleenseignementType())
//            ->add('codecyclense', 'collection', array('type' => NomenclatureCycleenseignementType(),
//                'allow_add' => true,
//                'allow_delete' => true,
//                'by_reference' => false))

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\EtablissementCycleenseignement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_corebundle_etablissementcycleenseignement';
    }
}
