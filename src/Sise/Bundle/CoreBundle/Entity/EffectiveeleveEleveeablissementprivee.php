<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectiveeleveEleveeablissementprivee
 *
 * @ORM\Table(name="effectiveeleve_eleveeablissementprivee", indexes={@ORM\Index(name="FK_EffectiveEleve_EleveEablissementPrivee_Nomenclature_NiveauS62", columns={"CodeNiveScol"}), @ORM\Index(name="FK_EffectiveEleve_EleveEablissementPrivee_Nomenclature_Recense63", columns={"CodeRece"})})
 *@ORM\Entity(repositoryClass="Sise\Bundle\CoreBundle\Repository\EffectiveeleveEleveeablissementpriveeRepository")
 */
class EffectiveeleveEleveeablissementprivee
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
     * @ORM\Column(name="CodeNiveScol", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    //private $codenivescol;


    /**
     * @ORM\ManyToOne(targetEntity="NomenclatureNiveauscolaire")
     * @ORM\JoinColumn(name="CodeNiveScol", referencedColumnName="CodeNiveScol")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
        private $codenivescol;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevMascNouv", type="integer", nullable=true)
     */
    private $nombelevmascnouv;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevFemiNouv", type="integer", nullable=true)
     */
    private $nombelevfeminouv;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevMascRedo", type="integer", nullable=true)
     */
    private $nombelevmascredo;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevFemiRedo", type="integer", nullable=true)
     */
    private $nombelevfemiredo;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombTotaElevMasc", type="integer", nullable=true)
     */
    private $nombtotaelevmasc;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombTotaElevFemi", type="integer", nullable=true)
     */
    private $nombtotaelevfemi;

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
     * @return EffectiveeleveEleveeablissementprivee
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
     * @return EffectiveeleveEleveeablissementprivee
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
     * @return EffectiveeleveEleveeablissementprivee
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
     * @return EffectiveeleveEleveeablissementprivee
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
     * Set nombelevmascnouv
     *
     * @param integer $nombelevmascnouv
     * @return EffectiveeleveEleveeablissementprivee
     */
    public function setNombelevmascnouv($nombelevmascnouv)
    {
        $this->nombelevmascnouv = $nombelevmascnouv;

        return $this;
    }

    /**
     * Get nombelevmascnouv
     *
     * @return integer 
     */
    public function getNombelevmascnouv()
    {
        return $this->nombelevmascnouv;
    }

    /**
     * Set nombelevfeminouv
     *
     * @param integer $nombelevfeminouv
     * @return EffectiveeleveEleveeablissementprivee
     */
    public function setNombelevfeminouv($nombelevfeminouv)
    {
        $this->nombelevfeminouv = $nombelevfeminouv;

        return $this;
    }

    /**
     * Get nombelevfeminouv
     *
     * @return integer 
     */
    public function getNombelevfeminouv()
    {
        return $this->nombelevfeminouv;
    }

    /**
     * Set nombelevmascredo
     *
     * @param integer $nombelevmascredo
     * @return EffectiveeleveEleveeablissementprivee
     */
    public function setNombelevmascredo($nombelevmascredo)
    {
        $this->nombelevmascredo = $nombelevmascredo;

        return $this;
    }


    /**
     * Get nombelevmascredo
     *
     * @return integer 
     */
    public function getNombelevmascredo()
    {
        return $this->nombelevmascredo;
    }

    /**
     * Set nombelevfemiredo
     *
     * @param integer $nombelevfemiredo
     * @return EffectiveeleveEleveeablissementprivee
     */
    public function setNombelevfemiredo($nombelevfemiredo)
    {
        $this->nombelevfemiredo = $nombelevfemiredo;

        return $this;
    }



    /**
     * Get nombelevfemiredo
     *
     * @return integer 
     */
    public function getNombelevfemiredo()
    {
        return $this->nombelevfemiredo;
    }

    /**
     * Set nombtotaelevmasc
     *
     * @param integer $nombtotaelevmasc
     * @return EffectiveeleveEleveeablissementprivee
     */
    public function setNombtotaelevmasc($nombtotaelevmasc)
    {
        $this->nombtotaelevmasc = $nombtotaelevmasc;

        return $this;
    }

    /**
     * Get nombtotaelevmasc
     *
     * @return integer 
     */
    public function getNombtotaelevmasc()
    {
        return $this->nombtotaelevmasc;
    }

    /**
     * Set nombtotaelevfemi
     *
     * @param integer $nombtotaelevfemi
     * @return EffectiveeleveEleveeablissementprivee
     */
    public function setNombtotaelevfemi($nombtotaelevfemi)
    {
        $this->nombtotaelevfemi = $nombtotaelevfemi;

        return $this;
    }

    /**
     * Get nombtotaelevfemi
     *
     * @return integer 
     */
    public function getNombtotaelevfemi()
    {
        return $this->nombtotaelevfemi;
    }

    /**
     * Set nombtotaelev
     *
     * @param integer $nombtotaelev
     * @return EffectiveeleveEleveeablissementprivee
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
     * Set codenivescol
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire $codenivescol
     * @return EffectiveeleveEleveeablissementprivee
     */
    public function setCodenivescol(\Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire $codenivescol)
    {
        $this->codenivescol = $codenivescol;

        return $this;
    }

    /**
     * Get codenivescol
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire 
     */
    public function getCodenivescol()
    {
        return $this->codenivescol;
    }
}
