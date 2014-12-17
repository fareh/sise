<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfrastructureTypecategorieespace
 *
 * @ORM\Table(name="infrastructure_typecategorieespace", indexes={@ORM\Index(name="FK_Infrastructure_TypeCategorieEspace_Nomenclature_Recensement", columns={"CodeRece"}), @ORM\Index(name="FK_Infrastructure_TypeCategorieEspace_Nomenclature_TypeEspace", columns={"CodeTypeEspa"})})
 *@ORM\Entity(repositoryClass="Sise\Bundle\CoreBundle\Repository\InfrastructureTypecategorieespaceRepository")
 */
class InfrastructureTypecategorieespace
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeEtab", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeetab;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeEtab", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codetypeetab;

    /**
     * @var integer
     *
     * @ORM\Column(name="AnneScol", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $annescol;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeRece", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $coderece;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeEspa", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
  //  private $codetypeespa;


    /**
     * @ORM\ManyToOne(targetEntity="NomenclatureTypeespace")
     * @ORM\JoinColumn(name="CodeTypeEspa", referencedColumnName="CodeTypeEspa")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codetypeespa;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombEspaUtil", type="integer", nullable=true)
     */
    private $nombespautil;

    /**
     * @var integer
     *
     * @ORM\Column(name="CapaAccuEspaUtil", type="integer", nullable=true)
     */
    private $capaaccuespautil;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombEspaNonUtil", type="integer", nullable=true)
     */
    private $nombespanonutil;

    /**
     * @var integer
     *
     * @ORM\Column(name="CapaAccuEspaNonUtil", type="integer", nullable=true)
     */
    private $capaaccuespanonutil;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombEspaEncoAmen", type="integer", nullable=true)
     */
    private $nombespaencoamen;

    /**
     * @var integer
     *
     * @ORM\Column(name="CapaAccuEspaEncoAmen", type="integer", nullable=true)
     */
    private $capaaccuespaencoamen;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombEspaEncoCons", type="integer", nullable=true)
     */
    private $nombespaencocons;

    /**
     * @var integer
     *
     * @ORM\Column(name="CapaAccuEspaEncoCons", type="integer", nullable=true)
     */
    private $capaaccuespaencocons;

    /**
     * @var string
     *
     * @ORM\Column(name="Obse", type="text", nullable=true)
     */
    private $obse;



    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return InfrastructureTypecategorieespace
     */
    public function setCodeetab($codeetab)
    {
        $this->codeetab = $codeetab;

        return $this;
    }

    /**
     * Get codeetab
     *
     * @return string 
     */
    public function getCodeetab()
    {
        return $this->codeetab;
    }

    /**
     * Set codetypeetab
     *
     * @param string $codetypeetab
     * @return InfrastructureTypecategorieespace
     */
    public function setCodetypeetab($codetypeetab)
    {
        $this->codetypeetab = $codetypeetab;

        return $this;
    }

    /**
     * Get codetypeetab
     *
     * @return string 
     */
    public function getCodetypeetab()
    {
        return $this->codetypeetab;
    }

    /**
     * Set annescol
     *
     * @param integer $annescol
     * @return InfrastructureTypecategorieespace
     */
    public function setAnnescol($annescol)
    {
        $this->annescol = $annescol;

        return $this;
    }

    /**
     * Get annescol
     *
     * @return integer 
     */
    public function getAnnescol()
    {
        return $this->annescol;
    }

    /**
     * Set coderece
     *
     * @param string $coderece
     * @return InfrastructureTypecategorieespace
     */
    public function setCoderece($coderece)
    {
        $this->coderece = $coderece;

        return $this;
    }

    /**
     * Get coderece
     *
     * @return string 
     */
    public function getCoderece()
    {
        return $this->coderece;
    }


    /**
     * Set nombespautil
     *
     * @param integer $nombespautil
     * @return InfrastructureTypecategorieespace
     */
    public function setNombespautil($nombespautil)
    {
        $this->nombespautil = $nombespautil;

        return $this;
    }

    /**
     * Get nombespautil
     *
     * @return integer 
     */
    public function getNombespautil()
    {
        return $this->nombespautil;
    }

    /**
     * Set capaaccuespautil
     *
     * @param integer $capaaccuespautil
     * @return InfrastructureTypecategorieespace
     */
    public function setCapaaccuespautil($capaaccuespautil)
    {
        $this->capaaccuespautil = $capaaccuespautil;

        return $this;
    }

    /**
     * Get capaaccuespautil
     *
     * @return integer 
     */
    public function getCapaaccuespautil()
    {
        return $this->capaaccuespautil;
    }

    /**
     * Set nombespanonutil
     *
     * @param integer $nombespanonutil
     * @return InfrastructureTypecategorieespace
     */
    public function setNombespanonutil($nombespanonutil)
    {
        $this->nombespanonutil = $nombespanonutil;

        return $this;
    }

    /**
     * Get nombespanonutil
     *
     * @return integer 
     */
    public function getNombespanonutil()
    {
        return $this->nombespanonutil;
    }

    /**
     * Set capaaccuespanonutil
     *
     * @param integer $capaaccuespanonutil
     * @return InfrastructureTypecategorieespace
     */
    public function setCapaaccuespanonutil($capaaccuespanonutil)
    {
        $this->capaaccuespanonutil = $capaaccuespanonutil;

        return $this;
    }

    /**
     * Get capaaccuespanonutil
     *
     * @return integer 
     */
    public function getCapaaccuespanonutil()
    {
        return $this->capaaccuespanonutil;
    }

    /**
     * Set nombespaencoamen
     *
     * @param integer $nombespaencoamen
     * @return InfrastructureTypecategorieespace
     */
    public function setNombespaencoamen($nombespaencoamen)
    {
        $this->nombespaencoamen = $nombespaencoamen;

        return $this;
    }

    /**
     * Get nombespaencoamen
     *
     * @return integer 
     */
    public function getNombespaencoamen()
    {
        return $this->nombespaencoamen;
    }

    /**
     * Set capaaccuespaencoamen
     *
     * @param integer $capaaccuespaencoamen
     * @return InfrastructureTypecategorieespace
     */
    public function setCapaaccuespaencoamen($capaaccuespaencoamen)
    {
        $this->capaaccuespaencoamen = $capaaccuespaencoamen;

        return $this;
    }

    /**
     * Get capaaccuespaencoamen
     *
     * @return integer 
     */
    public function getCapaaccuespaencoamen()
    {
        return $this->capaaccuespaencoamen;
    }

    /**
     * Set nombespaencocons
     *
     * @param integer $nombespaencocons
     * @return InfrastructureTypecategorieespace
     */
    public function setNombespaencocons($nombespaencocons)
    {
        $this->nombespaencocons = $nombespaencocons;

        return $this;
    }

    /**
     * Get nombespaencocons
     *
     * @return integer 
     */
    public function getNombespaencocons()
    {
        return $this->nombespaencocons;
    }

    /**
     * Set capaaccuespaencocons
     *
     * @param integer $capaaccuespaencocons
     * @return InfrastructureTypecategorieespace
     */
    public function setCapaaccuespaencocons($capaaccuespaencocons)
    {
        $this->capaaccuespaencocons = $capaaccuespaencocons;

        return $this;
    }

    /**
     * Get capaaccuespaencocons
     *
     * @return integer 
     */
    public function getCapaaccuespaencocons()
    {
        return $this->capaaccuespaencocons;
    }

    /**
     * Set obse
     *
     * @param string $obse
     * @return InfrastructureTypecategorieespace
     */
    public function setObse($obse)
    {
        $this->obse = $obse;

        return $this;
    }

    /**
     * Get obse
     *
     * @return string 
     */
    public function getObse()
    {
        return $this->obse;
    }

    

    /**
     * Set codetypeespa
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureTypeespace $codetypeespa
     * @return InfrastructureTypecategorieespace
     */
    public function setCodetypeespa(\Sise\Bundle\CoreBundle\Entity\NomenclatureTypeespace $codetypeespa)
    {
        $this->codetypeespa = $codetypeespa;

        return $this;
    }

    /**
     * Get codetypeespa
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureTypeespace 
     */
    public function getCodetypeespa()
    {
        return $this->codetypeespa;
    }
}
