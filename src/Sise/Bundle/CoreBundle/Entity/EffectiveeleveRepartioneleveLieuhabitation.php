<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectiveeleveRepartioneleveLieuhabitation
 *
 * @ORM\Table(name="effectiveeleve_repartioneleve_lieuhabitation", indexes={@ORM\Index(name="FK_EffectiveEleve_RepartionEleve_LieuHabitation_Nomenclature_D54", columns={"CodeDele"}), @ORM\Index(name="FK_EffectiveEleve_RepartionEleve_LieuHabitation_Nomenclature_R55", columns={"CodeRece"})})
 * @ORM\Entity(repositoryClass="Sise\Bundle\CoreBundle\Repository\EffectiveeleveRepartioneleveLieuhabitationRepository")
 */
class EffectiveeleveRepartioneleveLieuhabitation
{

    /**
     * @var integer
     * @ORM\Column(name="repartioneleve_lieuhabitation_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var EtablissementRecensement
     *
     * @ORM\ManyToOne(targetEntity="EtablissementRecensement", inversedBy="lieuhabitation")
     * @ORM\JoinColumn(name="etablissement_recensement_id", referencedColumnName="etablissement_recensement_id")
     */
    protected $etablissement_recensement;


        /**
    * @ORM\ManyToOne(targetEntity="NomenclatureDelegation")
    * @ORM\JoinColumn(name="CodeDele", referencedColumnName="CodeDele")
    **/
    private $codedele;
    /**
     * @var string
     *
     * @ORM\Column(name="CodeEtab", type="string", length=50, nullable=true)
     */
    private $codeetab;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeEtab", type="string", length=50, nullable=true)
     */
    private $codetypeetab;

    /**
     * @var integer
     *
     * @ORM\Column(name="AnneScol", type="integer", nullable=true)
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
     * @ORM\Column(name="Lieu", type="string", length=50, nullable=false)
     */
    private $lieu;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElev", type="integer", nullable=true)
     */
    private $nombelev;

    /**
     * @var float
     *
     * @ORM\Column(name="Dist", type="float", precision=10, scale=0, nullable=true)
     */
    private $dist;

    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectiveeleveRepartioneleveLieuhabitation
     */
    public function setCodeetab()
    {
        $this->codeetab = ($this->getEtablissementRecensement()->getCodeetab())?$this->getEtablissementRecensement()->getCodeetab():null;

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
    public function setCodetypeetab()
    {
        $this->codetypeetab = ($this->getEtablissementRecensement()->getCodetypeetab())?$this->getEtablissementRecensement()->getCodetypeetab():null;


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
    public function setAnnescol()
    {
        $this->annescol = ($this->getEtablissementRecensement()->getAnnescol())?$this->getEtablissementRecensement()->getAnnescol():null;

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
    public function setCoderece()
    {

        $this->coderece =($this->getEtablissementRecensement()->getCoderece())?$this->getEtablissementRecensement()->getCoderece():null;

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
     * Set dist
     *
     * @param float $dist
     * @return EffectiveeleveRepartioneleveLieuhabitation
     */
    public function setDist($dist)
    {
        $this->dist = $dist;

        return $this;
    }

    /**
     * Get dist
     *
     * @return float 
     */
    public function getDist()
    {
        return $this->dist;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return EffectiveeleveRepartioneleveLieuhabitation
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }




    /*public function addEtablissementRecensement(\Sise\Bundle\CoreBundle\Entity\EtablissementRecensement $etablissementRecensement)
    {
        if (!$this->etablissement_recensement->contains($etablissementRecensement)) {
            $this->etablissement_recensement->add($etablissementRecensement);
        }
    }*/

    /**
     * Set etablissement_recensement
     *
     * @param \Sise\Bundle\CoreBundle\Entity\EtablissementRecensement $etablissementRecensement
     * @return EffectiveeleveRepartioneleveLieuhabitation
     */
    public function setEtablissementRecensement(\Sise\Bundle\CoreBundle\Entity\EtablissementRecensement $etablissementRecensement = null)
    {
        $this->etablissement_recensement = $etablissementRecensement;

        return $this;
    }

    /**
     * Get etablissement_recensement
     *
     * @return \Sise\Bundle\CoreBundle\Entity\EtablissementRecensement 
     */
    public function getEtablissementRecensement()
    {
        return $this->etablissement_recensement;
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
}
