<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectiveenseignentListeenseignentheureautreetablissement
 *
 * @ORM\Table(name="effectiveenseignent_listeenseignentheureautreetablissement", indexes={@ORM\Index(name="FK_EffectiveEnseignent_ListeEnseignentHeureAutreEtablissement_23", columns={"CodeGrad"}), @ORM\Index(name="FK_EffectiveEnseignent_ListeEnseignentHeureAutreEtablissement_24", columns={"CodeRece"})})
 * @ORM\Entity
 */
class EffectiveenseignentListeenseignentheureautreetablissement
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
     * @var integer
     *
     * @ORM\Column(name="NumeEnse", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $numeense;


    public function __construct($codeetab=null, $codetypeetab=null, $annescol=null, $coderece=null, $numeense=null)
    {
        $this->codeetab = $codeetab;
        $this->codetypeetab = $codetypeetab;
        $this->annescol = $annescol;
        $this->coderece = $coderece;
        $this->numeense = $numeense;
    }

    /**
     * @var NomenclatureEtablissement
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureEtablissement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeEtabAutr", referencedColumnName="CodeEtab"),
     *   @ORM\JoinColumn(name="CodeTypeEtabAutr", referencedColumnName="CodeTypeEtab")
     * })
     */
    private $codeetabautr;

    /**
     * @var NomenclatureTypeetablissement
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureTypeetablissement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeTypeEtabAutr", referencedColumnName="CodeTypeEtab")
     * })
     */
    private $codetypeetabautr;

    /**
     * @var integer
     *
     * @ORM\Column(name="AnneScolAutr", type="integer", nullable=true)
     */
    private $annescolautr;


    /**
     * @var string
     *
     * @ORM\Column(name="NomPren", type="string", length=200, nullable=true)
     */
    private $nompren;

    /**
     * @var string
     *
     * @ORM\Column(name="IdenUniqEnse", type="string", length=50, nullable=true)
     */
    private $idenuniqense;

    /**
     * @var NomenclatureGrade
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureGrade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeGrad", referencedColumnName="CodeGrad")
     * })
     */
    private $codegrad;

    /**
     * @var float
     *
     * @ORM\Column(name="NombHeur", type="float", precision=10, scale=0, nullable=true)
     */
    private $nombheur;


    /**
     * @var NomenclatureDelegation
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureDelegation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeDele", referencedColumnName="CodeDele")
     * })
     */
    private $codedele;


    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectiveenseignentListeenseignentheureautreetablissement
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
     * @return EffectiveenseignentListeenseignentheureautreetablissement
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
     * @return EffectiveenseignentListeenseignentheureautreetablissement
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
     * @return EffectiveenseignentListeenseignentheureautreetablissement
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
     * Set numeense
     *
     * @param integer $numeense
     * @return EffectiveenseignentListeenseignentheureautreetablissement
     */
    public function setNumeense($numeense)
    {
        $this->numeense = $numeense;

        return $this;
    }

    /**
     * Get numeense
     *
     * @return integer 
     */
    public function getNumeense()
    {
        return $this->numeense;
    }

    /**
     * Set annescolautr
     *
     * @param integer $annescolautr
     * @return EffectiveenseignentListeenseignentheureautreetablissement
     */
    public function setAnnescolautr($annescolautr)
    {
        $this->annescolautr = $annescolautr;

        return $this;
    }

    /**
     * Get annescolautr
     *
     * @return integer 
     */
    public function getAnnescolautr()
    {
        return $this->annescolautr;
    }

    /**
     * Set nompren
     *
     * @param string $nompren
     * @return EffectiveenseignentListeenseignentheureautreetablissement
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
     * Set idenuniqense
     *
     * @param string $idenuniqense
     * @return EffectiveenseignentListeenseignentheureautreetablissement
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
     * Set nombheur
     *
     * @param float $nombheur
     * @return EffectiveenseignentListeenseignentheureautreetablissement
     */
    public function setNombheur($nombheur)
    {
        $this->nombheur = $nombheur;

        return $this;
    }

    /**
     * Get nombheur
     *
     * @return float 
     */
    public function getNombheur()
    {
        return $this->nombheur;
    }

    /**
     * Set codeetabautr
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureEtablissement $codeetabautr
     * @return EffectiveenseignentListeenseignentheureautreetablissement
     */
    public function setCodeetabautr(\Sise\Bundle\CoreBundle\Entity\NomenclatureEtablissement $codeetabautr = null)
    {
        $this->codeetabautr = $codeetabautr;

        return $this;
    }

    /**
     * Get codeetabautr
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureEtablissement 
     */
    public function getCodeetabautr()
    {
        return $this->codeetabautr;
    }

    /**
     * Set codetypeetabautr
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureTypeetablissement $codetypeetabautr
     * @return EffectiveenseignentListeenseignentheureautreetablissement
     */
    public function setCodetypeetabautr(\Sise\Bundle\CoreBundle\Entity\NomenclatureTypeetablissement $codetypeetabautr = null)
    {
        $this->codetypeetabautr = $codetypeetabautr;

        return $this;
    }

    /**
     * Get codetypeetabautr
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureTypeetablissement 
     */
    public function getCodetypeetabautr()
    {
        return $this->codetypeetabautr;
    }

    /**
     * Set codegrad
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureGrade $codegrad
     * @return EffectiveenseignentListeenseignentheureautreetablissement
     */
    public function setCodegrad(\Sise\Bundle\CoreBundle\Entity\NomenclatureGrade $codegrad = null)
    {
        $this->codegrad = $codegrad;

        return $this;
    }

    /**
     * Get codegrad
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureGrade 
     */
    public function getCodegrad()
    {
        return $this->codegrad;
    }

    /**
     * Set codedele
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureDelegation $codedele
     * @return EffectiveenseignentListeenseignentheureautreetablissement
     */
    public function setCodedele(\Sise\Bundle\CoreBundle\Entity\NomenclatureDelegation $codedele = null)
    {
        $this->codedele = $codedele;

        return $this;
    }

    /**
     * Get codedele
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureDelegation 
     */
    public function getCodedele()
    {
        return $this->codedele;
    }
}
