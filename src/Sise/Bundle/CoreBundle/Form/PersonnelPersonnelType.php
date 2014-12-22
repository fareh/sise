<?php

namespace Sise\Bundle\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonnelPersonnelType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idenuniq')
            ->add('pren')
            ->add('nom')
            ->add('nomjeunfille')
            ->add('datenais','datetime',array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'max_length' => 100,
                'required' => true,
                'format' => 'dd-MM-yyyy',
                'required' => true))
            ->add('lieunais')
            ->add('numecin')
            ->add('datecin','datetime',array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'max_length' => 100,
                'required' => true,
                'format' => 'dd-MM-yyyy',
                'required' => true))
            ->add('natituni','choice',
                array('required' => true,
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array('1' => 'نعم', '0' => 'لا')))
            ->add('adre')
            ->add('compadre')
            ->add('ville')
            ->add('codepost')
            ->add('adreseco')
            ->add('compadreseco')
            ->add('villeseco')
            ->add('codepostseco')
            ->add('telefixe')
            ->add('telemobi')
            ->add('adreelec')
            ->add('nombenfa')
            ->add('nombenfachar')
            ->add('nombenfabesospec')
            ->add('nomprenconj')
            ->add('conjtravme','choice',
                array('required' => true,
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array('1' => 'نعم', '0' => 'لا')))
            ->add('conjtravfp','choice',
                array('required' => true,
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array('1' => 'نعم', '0' => 'لا')))
            ->add('idenuniqconj')
            ->add('dateentrfoncpubl','datetime',array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'max_length' => 100,
                'required' => true,
                'format' => 'dd-MM-yyyy',
                'required' => true))
            ->add('daterecrme','datetime',array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'max_length' => 100,
                'required' => true,
                'format' => 'dd-MM-yyyy',
                'required' => true))
            ->add('datetitu','datetime',array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'max_length' => 100,
                'required' => true,
                'format' => 'dd-MM-yyyy',
                'required' => true))
            ->add('dateaffeetabactu','datetime',array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'max_length' => 100,
                'required' => true,
                'format' => 'dd-MM-yyyy',
                'required' => true))
            ->add('dategradactu','datetime',array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'max_length' => 100,
                'required' => true,
                'format' => 'dd-MM-yyyy',
                'required' => true))
            ->add('dateconfgradactu','datetime',array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'max_length' => 100,
                'required' => true,
                'format' => 'dd-MM-yyyy',
                'required' => true))
            ->add('datefonc','datetime',array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'max_length' => 100,
                'required' => true,
                'format' => 'dd-MM-yyyy',
                'required' => true))
            ->add('datesituadmi','datetime',array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'max_length' => 100,
                'required' => true,
                'format' => 'dd-MM-yyyy',
                'required' => true))
            ->add('roul','choice',
                array('required' => true,
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array('1' => 'نعم', '0' => 'لا')))
            ->add('datedeburoul','datetime',array(
                'data' => new \DateTime(),
                'widget' => 'single_text',
                'max_length' => 100,
                'required' => false,
                'format' => 'dd-MM-yyyy'))
            ->add('datefinroul','datetime',array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'max_length' => 100,
                'required' => true,
                'format' => 'dd-MM-yyyy',
                'required' => true))
            ->add('dipltuni','choice',
                array('required' => true,
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array('1' => 'نعم', '0' => 'لا')))
            ->add('spec','choice',
                array('required' => true,
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array('1' => 'نعم', '0' => 'لا')))
            ->add('ensecourpriv','choice',
                array('required' => true,
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array('1' => 'نعم', '0' => 'لا')))
            ->add('charhoracourpriv')
            ->add('ensecourpart','choice',
                array('required' => true,
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array('1' => 'نعم', '0' => 'لا')))
            ->add('anciadmi')
            ->add('anciense')
            ->add('ancicentactu')
            ->add('nombheurensereel')
            ->add('nombheurenserequ')
            ->add('nombheurensesupp')
            ->add('nombheurensecomp')
            ->add('cont','choice',
                array('required' => true,
                    'expanded' => true,
                    'multiple' => false,
                    'choices' => array('1' => 'نعم', '0' => 'لا')))
            ->add('datedebucont','datetime',array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'max_length' => 100,
                'required' => true,
                'format' => 'dd-MM-yyyy',
                'required' => true))
            ->add('datesoussituadmi','datetime',array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'max_length' => 100,
                'required' => true,
                'format' => 'dd-MM-yyyy',
                'required' => true))
            ->add('datefincont','datetime',array(
                'input'  => 'datetime',
                'widget' => 'single_text',
                'max_length' => 100,
                'required' => true,
                'format' => 'dd-MM-yyyy',
                'required' => true))
            ->add('codecorp','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureCorps',
                'property' => 'libecorpar',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
                'empty_value' => "-- اختيار --"
            ))
            ->add('codedipl','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureDiplome',
                'property' => 'libediplar',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => "-- اختيار --"
            ))
            ->add('codedisci','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureDiscipline',
                'property' => 'libedisciar',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
                'empty_value' => "-- اختيار --"
            ))
            ->add('codeetab','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureEtablissement',
                'property' => 'libeetabar',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => "-- اختيار --"
            ))
            ->add('codetypeetab','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureTypeetablissement',
                'property' => 'libetypeetabar',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => "-- اختيار --"
            ))
            ->add('codefonc','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureFonction',
                'property' => 'libefoncar',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => "-- اختيار --"
            ))
            ->add('codegenr','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureGenre',
                'property' => 'libegenrar',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
                'empty_value' => "-- اختيار --"
            ))
            ->add('codegrad','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureGrade',
                'property' => 'libegradar',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
                'empty_value' => "-- اختيار --"
            ))
            ->add('codelangense','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureLangueenseignement',
                'property' => 'libelangensear',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => "-- اختيار --"
            ))
            ->add('codenati','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureNationalite',
                'property' => 'libenatiar',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => "-- اختيار --"
            ))
            ->add('codeniveetud','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauetude',
                'property' => 'libeniveetudar',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => "-- اختيار --"
            ))
            ->add('codeprofconj','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureProfession',
                'property' => 'libeprofar',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => "-- اختيار --"
            ))
            ->add('codequal','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureQualite',
                'property' => 'libequalar',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => "-- اختيار --"
            ))
            ->add('codesitufami','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureSituationfamiliale',
                'property' => 'libesitufamiar',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => "-- اختيار --"
            ))
            ->add('codesoussituadmi','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureSoussituationadministrative',
                'property' => 'libesoussituadmiar',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => "-- اختيار --"
            ))
//            ->add('codesituadmi','entity', array(
//                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureSituationadministrative',
//                'property' => 'libesituadmiar',
//                'expanded' => false,
//                'multiple' => false,
//                'required' => false,
//                'empty_value' => "-- اختيار --"))
            ->add('codespec','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureSpecialite',
                'property' => 'libespecar',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => "-- اختيار --"
            ))
            ->add('codetach','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureTache',
                'property' => 'libetachar',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => "-- اختيار --"
            ))
            ->add('codetypeaffe','entity', array(
                'class' => 'Sise\Bundle\CoreBundle\Entity\NomenclatureTypeaffectation',
                'property' => 'libetypeaffear',
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'empty_value' => "-- اختيار --"
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sise\Bundle\CoreBundle\Entity\PersonnelPersonnel'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_corebundle_personnelpersonnel';
    }
}
