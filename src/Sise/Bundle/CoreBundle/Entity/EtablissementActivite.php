<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EtablissementActivite
 *
 * @ORM\Table(name="etablissement_activite", indexes={@ORM\Index(name="FK_Etablissement_Activite_Nomenclature_Activite", columns={"CodeActi"}), @ORM\Index(name="FK_Etablissement_Activite_Nomenclature_Recensement", columns={"CodeRece"})})
 * @ORM\Entity(repositoryClass="Sise\Bundle\CoreBundle\Repository\EtablissementActiviteRepository")
 */
class EtablissementActivite
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
     * @ORM\Column(name="CodeActi", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    // private $codeacti;


    /**
     * @ORM\ManyToOne(targetEntity="NomenclatureActivite")
     * @ORM\JoinColumn(name="CodeActi", referencedColumnName="CodeActi")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeacti;


    /**
     * @var integer
     *
     * @ORM\Column(name="NombActi", type="integer", nullable=true)
     */
    private $nombacti;

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
     * @return EtablissementActivite
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
     * @return EtablissementActivite
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
     * @return EtablissementActivite
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
     * @return EtablissementActivite
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
     * Set nombacti
     *
     * @param integer $nombacti
     * @return EtablissementActivite
     */
    public function setNombacti($nombacti)
    {
        $this->nombacti = $nombacti;

        return $this;
    }

    /**
     * Get nombacti
     *
     * @return integer
     */
    public function getNombacti()
    {
        return $this->nombacti;
    }

    /**
     * Set obse
     *
     * @param string $obse
     * @return EtablissementActivite
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
     * Set codeacti
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureActivite $codeacti
     * @return EtablissementActivite
     */
    public function setCodeacti(\Sise\Bundle\CoreBundle\Entity\NomenclatureActivite $codeacti)
    {
        $this->codeacti = $codeacti;

        return $this;
    }

    /**
     * Get codeacti
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureActivite
     */
    public function getCodeacti()
    {
        return $this->codeacti;
    }
}
