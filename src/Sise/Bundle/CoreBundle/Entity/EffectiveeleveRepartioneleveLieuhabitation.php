<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectiveeleveRepartioneleveLieuhabitation
 *
 * @ORM\Table(name="effectiveeleve_repartioneleve_lieuhabitation")
 * @ORM\Entity(repositoryClass="Sise\Bundle\CoreBundle\Repository\EffectiveeleveRepartioneleveLieuhabitationRepository")
 */
class EffectiveeleveRepartioneleveLieuhabitation
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
     * @var NomenclatureDelegation
     * @ORM\ManyToOne(targetEntity="NomenclatureDelegation")
     * @ORM\JoinColumn(name="CodeDele", referencedColumnName="CodeDele")
     **/
    private $codedele;

    /**
     * @var integer
     *
     * @ORM\Column(name="NumeElev", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $numeelev;

    public function __construct($codeetab=null, $codetypeetab=null, $annescol=null, $coderece=null, $numeelev=null)
    {
        $this->codeetab = $codeetab;
        $this->codetypeetab = $codetypeetab;
        $this->annescol = $annescol;
        $this->coderece = $coderece;
        $this->numeelev = $numeelev;
    }


    /**
     * @var string
     *
     * @ORM\Column(name="Lieu", type="string", length=150, nullable=false)
     */
    private $lieu;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElev", type="integer", nullable=true)
     */
    private $nombelev;

    /**
     * @var NomenclatureDistance
     * @ORM\ManyToOne(targetEntity="NomenclatureDistance")
     * @ORM\JoinColumn(name="Dist", referencedColumnName="id")
     **/
       private $dist;

    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectiveeleveRepartioneleveLieuhabitation
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
     * @return EffectiveeleveRepartioneleveLieuhabitation
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
     * @return EffectiveeleveRepartioneleveLieuhabitation
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
     * @return EffectiveeleveRepartioneleveLieuhabitation
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
     * Set numeelev
     *
     * @param integer $numeelev
     * @return EffectiveeleveRepartioneleveLieuhabitation
     */
    public function setNumeelev($numeelev)
    {
        $this->numeelev = $numeelev;

        return $this;
    }

    /**
     * Get numeelev
     *
     * @return integer 
     */
    public function getNumeelev()
    {
        return $this->numeelev;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     * @return EffectiveeleveRepartioneleveLieuhabitation
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string 
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set nombelev
     *
     * @param integer $nombelev
     * @return EffectiveeleveRepartioneleveLieuhabitation
     */
    public function setNombelev($nombelev)
    {
        $this->nombelev = $nombelev;

        return $this;
    }

    /**
     * Get nombelev
     *
     * @return integer 
     */
    public function getNombelev()
    {
        return $this->nombelev;
    }
    

    /**
     * Set codedele
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureDelegation $codedele
     * @return EffectiveeleveRepartioneleveLieuhabitation
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

    /**
     * Set dist
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureDistance $dist
     * @return EffectiveeleveRepartioneleveLieuhabitation
     */
    public function setDist(\Sise\Bundle\CoreBundle\Entity\NomenclatureDistance $dist = null)
    {
        $this->dist = $dist;

        return $this;
    }

    /**
     * Get dist
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureDistance 
     */
    public function getDist()
    {
        return $this->dist;
    }
}
