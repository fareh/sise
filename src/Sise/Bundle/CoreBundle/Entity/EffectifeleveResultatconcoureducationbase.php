<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectifeleveResultatconcoureducationbase
 *
 * @ORM\Table(name="effectifeleve_resultatconcoureducationbase", indexes={@ORM\Index(name="FK_EffectifEleve_ResultatConcourEducationBase_Nomenclature_Dom1", columns={"CodeDoma"}), @ORM\Index(name="FK_EffectifEleve_ResultatConcourEducationBase_Nomenclature_Rec2", columns={"CodeRece"})})
 * @ORM\Entity
 */
class EffectifeleveResultatconcoureducationbase
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
     * @ORM\Column(name="CodeDoma", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codedoma;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevInscMasc", type="integer", nullable=true)
     */
    private $nombelevinscmasc;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevInscFemi", type="integer", nullable=true)
     */
    private $nombelevinscfemi;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombTotaInscElev", type="integer", nullable=true)
     */
    private $nombtotainscelev;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevReusMasc", type="integer", nullable=true)
     */
    private $nombelevreusmasc;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevReusFemi", type="integer", nullable=true)
     */
    private $nombelevreusfemi;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombTotaReusElev", type="integer", nullable=true)
     */
    private $nombtotareuselev;



    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectifeleveResultatconcoureducationbase
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
     * @return EffectifeleveResultatconcoureducationbase
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
     * @return EffectifeleveResultatconcoureducationbase
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
     * @return EffectifeleveResultatconcoureducationbase
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
     * Set codedoma
     *
     * @param string $codedoma
     * @return EffectifeleveResultatconcoureducationbase
     */
    public function setCodedoma($codedoma)
    {
        $this->codedoma = $codedoma;

        return $this;
    }

    /**
     * Get codedoma
     *
     * @return string 
     */
    public function getCodedoma()
    {
        return $this->codedoma;
    }

    /**
     * Set nombelevinscmasc
     *
     * @param integer $nombelevinscmasc
     * @return EffectifeleveResultatconcoureducationbase
     */
    public function setNombelevinscmasc($nombelevinscmasc)
    {
        $this->nombelevinscmasc = $nombelevinscmasc;

        return $this;
    }

    /**
     * Get nombelevinscmasc
     *
     * @return integer 
     */
    public function getNombelevinscmasc()
    {
        return $this->nombelevinscmasc;
    }

    /**
     * Set nombelevinscfemi
     *
     * @param integer $nombelevinscfemi
     * @return EffectifeleveResultatconcoureducationbase
     */
    public function setNombelevinscfemi($nombelevinscfemi)
    {
        $this->nombelevinscfemi = $nombelevinscfemi;

        return $this;
    }

    /**
     * Get nombelevinscfemi
     *
     * @return integer 
     */
    public function getNombelevinscfemi()
    {
        return $this->nombelevinscfemi;
    }

    /**
     * Set nombtotainscelev
     *
     * @param integer $nombtotainscelev
     * @return EffectifeleveResultatconcoureducationbase
     */
    public function setNombtotainscelev($nombtotainscelev)
    {
        $this->nombtotainscelev = $nombtotainscelev;

        return $this;
    }

    /**
     * Get nombtotainscelev
     *
     * @return integer 
     */
    public function getNombtotainscelev()
    {
        return $this->nombtotainscelev;
    }

    /**
     * Set nombelevreusmasc
     *
     * @param integer $nombelevreusmasc
     * @return EffectifeleveResultatconcoureducationbase
     */
    public function setNombelevreusmasc($nombelevreusmasc)
    {
        $this->nombelevreusmasc = $nombelevreusmasc;

        return $this;
    }

    /**
     * Get nombelevreusmasc
     *
     * @return integer 
     */
    public function getNombelevreusmasc()
    {
        return $this->nombelevreusmasc;
    }

    /**
     * Set nombelevreusfemi
     *
     * @param integer $nombelevreusfemi
     * @return EffectifeleveResultatconcoureducationbase
     */
    public function setNombelevreusfemi($nombelevreusfemi)
    {
        $this->nombelevreusfemi = $nombelevreusfemi;

        return $this;
    }

    /**
     * Get nombelevreusfemi
     *
     * @return integer 
     */
    public function getNombelevreusfemi()
    {
        return $this->nombelevreusfemi;
    }

    /**
     * Set nombtotareuselev
     *
     * @param integer $nombtotareuselev
     * @return EffectifeleveResultatconcoureducationbase
     */
    public function setNombtotareuselev($nombtotareuselev)
    {
        $this->nombtotareuselev = $nombtotareuselev;

        return $this;
    }

    /**
     * Get nombtotareuselev
     *
     * @return integer 
     */
    public function getNombtotareuselev()
    {
        return $this->nombtotareuselev;
    }
}
