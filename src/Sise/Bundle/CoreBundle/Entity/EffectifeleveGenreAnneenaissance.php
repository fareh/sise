<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectifeleveGenreAnneenaissance
 *
 * @ORM\Table(name="effectifeleve_genre_anneenaissance", indexes={@ORM\Index(name="FK_EffectifEleve_Genre_AnneeNaissance_Nomenclature_Recensement", columns={"CodeRece"}), @ORM\Index(name="FK_EffectifEleve_Genre_AnneeNaissance_Nomenclature_AnneeNaissa12", columns={"CodeAnneNais"})})
 * @ORM\Entity
 */
class EffectifeleveGenreAnneenaissance
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
     * @ORM\Column(name="CodeAnneNais", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeannenais;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevMasc", type="integer", nullable=true)
     */
    private $nombelevmasc;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevFemi", type="integer", nullable=true)
     */
    private $nombelevfemi;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombTota", type="integer", nullable=true)
     */
    private $nombtota;



    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectifeleveGenreAnneenaissance
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
     * @return EffectifeleveGenreAnneenaissance
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
     * @return EffectifeleveGenreAnneenaissance
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
     * @return EffectifeleveGenreAnneenaissance
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
     * Set codeannenais
     *
     * @param string $codeannenais
     * @return EffectifeleveGenreAnneenaissance
     */
    public function setCodeannenais($codeannenais)
    {
        $this->codeannenais = $codeannenais;

        return $this;
    }

    /**
     * Get codeannenais
     *
     * @return string 
     */
    public function getCodeannenais()
    {
        return $this->codeannenais;
    }

    /**
     * Set nombelevmasc
     *
     * @param integer $nombelevmasc
     * @return EffectifeleveGenreAnneenaissance
     */
    public function setNombelevmasc($nombelevmasc)
    {
        $this->nombelevmasc = $nombelevmasc;

        return $this;
    }

    /**
     * Get nombelevmasc
     *
     * @return integer 
     */
    public function getNombelevmasc()
    {
        return $this->nombelevmasc;
    }

    /**
     * Set nombelevfemi
     *
     * @param integer $nombelevfemi
     * @return EffectifeleveGenreAnneenaissance
     */
    public function setNombelevfemi($nombelevfemi)
    {
        $this->nombelevfemi = $nombelevfemi;

        return $this;
    }

    /**
     * Get nombelevfemi
     *
     * @return integer 
     */
    public function getNombelevfemi()
    {
        return $this->nombelevfemi;
    }

    /**
     * Set nombtota
     *
     * @param integer $nombtota
     * @return EffectifeleveGenreAnneenaissance
     */
    public function setNombtota($nombtota)
    {
        $this->nombtota = $nombtota;

        return $this;
    }

    /**
     * Get nombtota
     *
     * @return integer 
     */
    public function getNombtota()
    {
        return $this->nombtota;
    }
}
