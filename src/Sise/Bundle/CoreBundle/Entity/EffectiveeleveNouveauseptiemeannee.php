<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectiveeleveNouveauseptiemeannee
 *
 * @ORM\Table(name="effectiveeleve_nouveauseptiemeannee", indexes={@ORM\Index(name="FK_EffectiveEleve_NouveauSeptiemeAnnee_Nomenclature_Recensement", columns={"CodeRece"}), @ORM\Index(name="FK_EffectiveEleve_NouveauSeptiemeAnnee_Nomenclature_Etablissem61", columns={"CodeEtabSour", "CodeTypeEtabSour"})})
 * @ORM\Entity
 */
class EffectiveeleveNouveauseptiemeannee
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
     * @ORM\Column(name="CodeEtabSour", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeetabsour;
   
    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeEtabSour", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codetypeetabsour;

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
     * @ORM\Column(name="NombTotaElev", type="integer", nullable=true)
     */
    private $nombtotaelev;


    private $circonscriptionregional ;
    private $delegation;




    public function __construct($codeetab=null, $codetypeetab=null, $annescol=null, $coderece=null, $codeetabsour=null, $codetypeetabsour=null )
    {
        $this->codeetab = $codeetab;
        $this->codetypeetab = $codetypeetab;
        $this->annescol = $annescol;
        $this->coderece = $coderece;
        $this->codeetabsour = $codeetabsour;
        $this->codetypeetabsour = $codetypeetabsour;
    }
    /**
     * @return mixed
     */
    public function getDelegation()
    {
        return $this->delegation;
    }

    /**
     * @param mixed $delegation
     */
    public function setDelegation($delegation)
    {
        $this->delegation = $delegation;
    }

    /**
     * @return mixed
     */
    public function getCirconscriptionregional()
    {
        return $this->circonscriptionregional;
    }

    /**
     * @param mixed $circonscriptionregional
     */
    public function setCirconscriptionregional($circonscriptionregional)
    {
        $this->circonscriptionregional = $circonscriptionregional;
    }



    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectiveeleveNouveauseptiemeannee
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
     * @return EffectiveeleveNouveauseptiemeannee
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
     * @return EffectiveeleveNouveauseptiemeannee
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
     * @return EffectiveeleveNouveauseptiemeannee
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
     * Set nombelevmasc
     *
     * @param integer $nombelevmasc
     * @return EffectiveeleveNouveauseptiemeannee
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
     * @return EffectiveeleveNouveauseptiemeannee
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
     * Set nombtotaelev
     *
     * @param integer $nombtotaelev
     * @return EffectiveeleveNouveauseptiemeannee
     */
    public function setNombtotaelev($nombtotaelev)
    {
        $this->nombtotaelev = $nombtotaelev;

        return $this;
    }

    /**
     * Get nombtotaelev
     *
     * @return integer
     */
    public function getNombtotaelev()
    {
        return $this->nombtotaelev;
    }

   

    /**
     * Set codetypeetabsour
     *
     * @param string $codetypeetabsour
     * @return EffectiveeleveNouveauseptiemeannee
     */
    public function setCodetypeetabsour($codetypeetabsour)
    {
        $this->codetypeetabsour = $codetypeetabsour;

        return $this;
    }

    /**
     * Get codetypeetabsour
     *
     * @return string 
     */
    public function getCodetypeetabsour()
    {
        return $this->codetypeetabsour;
    }



    /**
     * Set codeetabsour
     *
     * @param string $codeetabsour
     * @return EffectiveeleveNouveauseptiemeannee
     */
    public function setCodeetabsour($codeetabsour)
    {
        $this->codeetabsour = $codeetabsour;

        return $this;
    }

    /**
     * Get codeetabsour
     *
     * @return string 
     */
    public function getCodeetabsour()
    {
        return $this->codeetabsour;
    }
}
