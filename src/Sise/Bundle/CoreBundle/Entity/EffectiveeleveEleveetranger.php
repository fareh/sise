<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectiveeleveEleveetranger
 *
 * @ORM\Table(name="effectiveeleve_eleveetranger", indexes={@ORM\Index(name="FK_EffectiveEleve_EleveEtranger_Nomenclature_CycleEnseignement", columns={"CodeCyclEnse"}), @ORM\Index(name="FK_EffectiveEleve_EleveEtranger_Nomenclature_Recensement", columns={"CodeRece"}), @ORM\Index(name="FK_EffectiveEleve_EleveEtranger_Nomenclature_Nationalite", columns={"CodeNati"})})
 * @ORM\Entity
 */
class EffectiveeleveEleveetranger
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
     * @var NomenclatureCycleenseignement
     * @ORM\ManyToOne(targetEntity="NomenclatureCycleenseignement")
     * @ORM\JoinColumn(name="CodeCyclEnse", referencedColumnName="CodeCyclEnse")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codecyclense;


    /**
     * @var NomenclatureNationalite
     * @ORM\ManyToOne(targetEntity="NomenclatureNationalite")
     * @ORM\JoinColumn(name="CodeNati", referencedColumnName="CodeNati")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codenati;


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


    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectiveeleveEleveetranger
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
     * @return EffectiveeleveEleveetranger
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
     * @return EffectiveeleveEleveetranger
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
     * @return EffectiveeleveEleveetranger
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
     * @return EffectiveeleveEleveetranger
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
     * @return EffectiveeleveEleveetranger
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
     * @return EffectiveeleveEleveetranger
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
     * Set codecyclense
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement $codecyclense
     * @return EffectiveeleveEleveetranger
     */
    public function setCodecyclense(\Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement $codecyclense)
    {
        $this->codecyclense = $codecyclense;

        return $this;
    }

    /**
     * Get codecyclense
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement
     */
    public function getCodecyclense()
    {
        return $this->codecyclense;
    }

    /**
     * Set codenati
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureNationalite $codenati
     * @return EffectiveeleveEleveetranger
     */
    public function setCodenati(\Sise\Bundle\CoreBundle\Entity\NomenclatureNationalite $codenati)
    {
        $this->codenati = $codenati;

        return $this;
    }

    /**
     * Get codenati
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureNationalite
     */
    public function getCodenati()
    {
        return $this->codenati;
    }
}
