<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfrastructureEquipementCategorie
 *
 * @ORM\Table(name="infrastructure_equipement_categorie")
 * @ORM\Entity(repositoryClass="Sise\Bundle\CoreBundle\Repository\InfrastructureEquipementCategorieRepository")
 */
class InfrastructureEquipementCategorie
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
     * @ORM\Column(name="CodeEqui", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    //private $codeequi;


    /**
     * @ORM\ManyToOne(targetEntity="NomenclatureEquipement")
     * @ORM\JoinColumn(name="CodeEqui", referencedColumnName="CodeEqui")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeequi;
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
     * @var string
     *
     * @ORM\Column(name="Obse", type="text", nullable=true)
     */
    private $obse;


    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return InfrastructureEquipementCategorie
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
     * @return InfrastructureEquipementCategorie
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
     * @return InfrastructureEquipementCategorie
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
     * @return InfrastructureEquipementCategorie
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
     * @return InfrastructureEquipementCategorie
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
     * @return InfrastructureEquipementCategorie
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
     * @return InfrastructureEquipementCategorie
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
     * @return InfrastructureEquipementCategorie
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
     * Set obse
     *
     * @param string $obse
     * @return InfrastructureEquipementCategorie
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
     * Set codeequi
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureEquipement $codeequi
     * @return InfrastructureEquipementCategorie
     */
    public function setCodeequi(\Sise\Bundle\CoreBundle\Entity\NomenclatureEquipement $codeequi)
    {
        $this->codeequi = $codeequi;

        return $this;
    }

    /**
     * Get codeequi
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureEquipement
     */
    public function getCodeequi()
    {
        return $this->codeequi;
    }
}
