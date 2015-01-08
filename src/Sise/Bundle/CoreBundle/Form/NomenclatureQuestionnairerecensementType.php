<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NomenclatureQuestionnairerecensementType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('ques','collection', array(
//                'type'=> new NomenclatureQuestionnaireType(),
//                'allow_add'=> true,
//                'allow_delete'=> true
//            ))
            ->add('ques', 'entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureQuestionnaire',
                'property' => 'libequesar',
                'expanded' => true,
                'multiple' => true,
                'required' => true
            ))
            ->add('rece',new NomenclatureRecensementType())
//           ->add('fichetab', 'entity', array(
//               'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureEtablissement',
//               'property' => 'libeetabar',
//               'expanded' => true,
//               'multiple' => true,
//               'required' => true
//           ))
//            ->add('rece','collection', array(
//                'type'=> new NomenclatureRecensementType(),
//                'allow_add'=> true,
//                'allow_delete'=> true
//            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureQuestionnairerecensement'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_corebundle_nomenclaturequestionnairerecensement';
    }
}
