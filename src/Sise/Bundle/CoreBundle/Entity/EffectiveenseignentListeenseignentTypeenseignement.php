<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectiveenseignentListeenseignentTypeenseignement
 *
 * @ORM\Table(name="effectiveenseignent_listeenseignent_typeenseignement", indexes={@ORM\Index(name="FK_EffectiveEnseignent_ListeEnseignent_TypeEnseignement_Nomenc77", columns={"CodeRece"})})
 * @ORM\Entity
 */
class EffectiveenseignentListeenseignentTypeenseignement
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
     * @ORM\Column(name="IdenUniqEnse", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idenuniqense;

    public function __construct($codeetab=null, $codetypeetab=null, $annescol=null, $coderece=null, $idenuniqense=null)
    {
        $this->codeetab = $codeetab;
        $this->codetypeetab = $codetypeetab;
        $this->annescol = $annescol;
        $this->coderece = $coderece;
        $this->idenuniqense = $idenuniqense;
    }


    /**
     * @var string
     *
     * @ORM\Column(name="NomPren", type="string", length=200, nullable=true)
     */
    private $nompren;

    /**
     * @var float
     *
     * @ORM\Column(name="EnseAngl", type="float", precision=10, scale=0, nullable=true)
     */
    private $enseangl;

    /**
     * @var float
     *
     * @ORM\Column(name="EnseTechInfo", type="float", precision=10, scale=0, nullable=true)
     */
    private $ensetechinfo;


    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectiveenseignentListeenseignentTypeenseignement
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
     * @return EffectiveenseignentListeenseignentTypeenseignement
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
     * @return EffectiveenseignentListeenseignentTypeenseignement
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
     * @return EffectiveenseignentListeenseignentTypeenseignement
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
     * Set idenuniqense
     *
     * @param string $idenuniqense
     * @return EffectiveenseignentListeenseignentTypeenseignement
     */
    public function setIdenuniqense($idenuniqense)
    {
        $this->idenuniqense = $idenuniqense;

        return $this;
    }

    /**
     * Get idenuniqense
     *
     * @return string
     */
    public function getIdenuniqense()
    {
        return $this->idenuniqense;
    }

    /**
     * Set nompren
     *
     * @param string $nompren
     * @return EffectiveenseignentListeenseignentTypeenseignement
     */
    public function setNompren($nompren)
    {
        $this->nompren = $nompren;

        return $this;
    }

    /**
     * Get nompren
     *
     * @return string
     */
    public function getNompren()
    {
        return $this->nompren;
    }

    /**
     * Set enseangl
     *
     * @param float $enseangl
     * @return EffectiveenseignentListeenseignentTypeenseignement
     */
    public function setEnseangl($enseangl)
    {
        $this->enseangl = $enseangl;

        return $this;
    }

    /**
     * Get enseangl
     *
     * @return float
     */
    public function getEnseangl()
    {
        return $this->enseangl;
    }

    /**
     * Set ensetechinfo
     *
     * @param float $ensetechinfo
     * @return EffectiveenseignentListeenseignentTypeenseignement
     */
    public function setEnsetechinfo($ensetechinfo)
    {
        $this->ensetechinfo = $ensetechinfo;

        return $this;
    }

    /**
     * Get ensetechinfo
     *
     * @return float
     */
    public function getEnsetechinfo()
    {
        return $this->ensetechinfo;
    }
}
