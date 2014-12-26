<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EtablissementRessourceelectricite
 *
 * @ORM\Table(name="etablissement_ressourceelectricite", indexes={@ORM\Index(name="FK_Etablissement_RessourceElectricite_Nomenclature_RessourceEl34", columns={"CodeRessElec"}), @ORM\Index(name="FK_Etablissement_RessourceElectricite_Nomenclature_Etablissement", columns={"CodeTypeEtab", "CodeEtab"})})
 * @ORM\Entity
 */
class EtablissementRessourceelectricite
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
     * @ORM\Column(name="CodeRece", type="string", length=50, nullable=true)
     */
    private $coderece;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeRessElec", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $coderesselec;


    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EtablissementRessourceelectricite
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
     * @return EtablissementRessourceelectricite
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
     * @return EtablissementRessourceelectricite
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
     * @return EtablissementRessourceelectricite
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
     * Set coderesselec
     *
     * @param string $coderesselec
     * @return EtablissementRessourceelectricite
     */
    public function setCoderesselec($coderesselec)
    {
        $this->coderesselec = $coderesselec;

        return $this;
    }

    /**
     * Get coderesselec
     *
     * @return string
     */
    public function getCoderesselec()
    {
        return $this->coderesselec;
    }
}
