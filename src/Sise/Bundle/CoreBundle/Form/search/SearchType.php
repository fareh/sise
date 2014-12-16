<?php

namespace Sise\Bundle\CoreBundle\Form\search;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchType extends AbstractType
{

    private $session;
    private $features;
    public function __construct($session=null)
    {
        $this->session = $session;
        if ($this->session!= null and $this->session->has('features')) {
            $this->features = $this->session->get('features');
        }
        else{
            $this->features=array();
        }
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if(count($this->features)<1)
        {
            $builder->add('NomenclatureCirconscriptionregional', 'entity', array(
            'class' => 'SiseCoreBundle:NomenclatureCirconscriptionregional',
            'property' => 'libecircregiar',
            'empty_value' => "-- اختيار --",
            'data' => 'codecircregi'
        ));
        }else{

            $builder->add('NomenclatureCirconscriptionregional', 'entity', array(
                'class' => 'SiseCoreBundle:NomenclatureCirconscriptionregional',
                'property' => 'libecircregiar',
                'data' => $this->features['NomenclatureCirconscriptionregional']
            ));


          /*  $builder ->add('NomenclatureCirconscriptionregional', 'entity', array(
                'class' => 'SiseCoreBundle:NomenclatureCirconscriptionregional',
                'property' => 'libecircregiar',
                'query_builder' => function(\Sise\Bundle\CoreBundle\Repository\NomenclatureCirconscriptionregionalRepository $er)
                {
                    return $er->findNomenclatureCirconscriptionregional($this->features['NomenclatureCirconscriptionregional']);
                }
            ));*/

        }


        if(count($this->features)<1)
        {
            $builder  ->add('NomenclatureDelegation', 'choice', array(
                'empty_value' => "-- اختيار --"
            ));
        }else{

            $builder ->add('NomenclatureDelegation', 'entity', array(
                'class' => 'SiseCoreBundle:NomenclatureDelegation',
                'property' => 'libedelear',
                'query_builder' => function(\Sise\Bundle\CoreBundle\Repository\NomenclatureDelegationRepository $er)
                {
                    return $er->findNomenclatureDelegation($this->features['NomenclatureDelegation']);
                }
            ));

        }


        if(count($this->features)<1)
        {
            $builder  ->add('NomenclatureTypeetablissement', 'choice', array(
                'empty_value' => "-- اختيار --",
            ));
        }else{

            $builder ->add('NomenclatureTypeetablissement', 'entity', array(
                'class' => 'SiseCoreBundle:NomenclatureTypeetablissement',
                'property' => 'libetypeetabar',
                'query_builder' => function(\Sise\Bundle\CoreBundle\Repository\NomenclatureTypeetablissementRepository $er)
                {
                    return $er->findNomenclatureTypeetablissement($this->features['NomenclatureTypeetablissement']);
                }
            ));

        }
        if(count($this->features)<1)
        {
            $builder  ->add('NomenclatureEtablissement', 'choice', array(
                'empty_value' => "-- اختيار --",
            ))
            ->add('CodeEtab', 'text');
        }else{

            $builder ->add('NomenclatureEtablissement', 'entity', array(
                'class' => 'SiseCoreBundle:NomenclatureEtablissement',
                'property' => 'libeetabar',
                'query_builder' => function(\Sise\Bundle\CoreBundle\Repository\NomenclatureEtablissementRepository $er)
                {
                    return $er->findNomenclatureEtablissement($this->features['NomenclatureEtablissement']);
                }
            ))
                ->add('CodeEtab','text',array(
                    'attr' => array('value'=>$this->features['NomenclatureEtablissement'])))
            ;

        }
      ;

    }



    /**
     * @return string
     */
    public function getName()
    {
        return 'sise_bundle_corebundle_search';
    }
}
