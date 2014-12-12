<?php

namespace Sise\Bundle\CoreBundle\Entity;
use DoctrineCommonCollectionsArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * EtablissementFicheetablissement
 *
 * @ORM\Table(name="etablissement_ficheetablissement")
 * @ORM\Entity
 */
class EtablissementFicheetablissement
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
     * @var \NomenclatureTypeetablissement
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NomenclatureTypeetablissement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeTypeEtab", referencedColumnName="CodeTypeEtab")
     * })
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
     * @ORM\Column(name="AdreEtab", type="string", length=100, nullable=true)
     */
    private $adreetab;

    /**
     * @var string
     *
     * @ORM\Column(name="CodePost", type="string", length=50, nullable=true)
     */
    private $codepost;

    /**
     * @var string
     *
     * @ORM\Column(name="TeleFixe", type="string", length=50, nullable=true)
     */
    private $telefixe;

    /**
     * @var string
     *
     * @ORM\Column(name="Fax", type="string", length=50, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="Mail", type="string", length=50, nullable=true)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="SiteWeb", type="string", length=200, nullable=true)
     */
    private $siteweb;

    /**
     * @var boolean
     *
     * @ORM\Column(name="EducPrio", type="boolean", nullable=true)
     */
    private $educprio;

    /**
     * @var boolean
     *
     * @ORM\Column(name="EtabInteHand", type="boolean", nullable=true)
     */
    private $etabintehand;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ExisAnnePrep", type="boolean", nullable=true)
     */
    private $exisanneprep;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ExisAnnePrepInteHand", type="boolean", nullable=true)
     */
    private $exisanneprepintehand;

    /**
     * @return string
     */
    public function getCodeetab()
    {
        return $this->codeetab;
    }

    /**
     * @param string $codeetab
     */
    public function setCodeetab($codeetab)
    {
        $this->codeetab = $codeetab;
    }

    /**
     * Set codetypeetab
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureTypeetablissement $codetypeetab
     * @return EtablissementFicheetablissement
     */
    public function setCodetypeetab(\Sise\Bundle\CoreBundle\Entity\NomenclatureTypeetablissement $codetypeetab = null)
    {
        $this->codetypeetab = $codetypeetab;

        return $this;
    }

    /**
     * Get codetypeetab
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureTypeetablissement
     */
    public function getCodetypeetab()
    {
        return $this->codetypeetab;
    }

    /**
     * Set annescol
     *
     * @param integer $annescol
     * @return EtablissementFicheetablissement
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
     * @return EtablissementFicheetablissement
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
     * Set adreetab
     *
     * @param string $adreetab
     * @return EtablissementFicheetablissement
     */
    public function setAdreetab($adreetab)
    {
        $this->adreetab = $adreetab;

        return $this;
    }

    /**
     * Get adreetab
     *
     * @return string 
     */
    public function getAdreetab()
    {
        return $this->adreetab;
    }

    /**
     * Set codepost
     *
     * @param string $codepost
     * @return EtablissementFicheetablissement
     */
    public function setCodepost($codepost)
    {
        $this->codepost = $codepost;

        return $this;
    }

    /**
     * Get codepost
     *
     * @return string 
     */
    public function getCodepost()
    {
        return $this->codepost;
    }

    /**
     * Set telefixe
     *
     * @param string $telefixe
     * @return EtablissementFicheetablissement
     */
    public function setTelefixe($telefixe)
    {
        $this->telefixe = $telefixe;

        return $this;
    }

    /**
     * Get telefixe
     *
     * @return string 
     */
    public function getTelefixe()
    {
        return $this->telefixe;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return EtablissementFicheetablissement
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return EtablissementFicheetablissement
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set siteweb
     *
     * @param string $siteweb
     * @return EtablissementFicheetablissement
     */
    public function setSiteweb($siteweb)
    {
        $this->siteweb = $siteweb;

        return $this;
    }

    /**
     * Get siteweb
     *
     * @return string 
     */
    public function getSiteweb()
    {
        return $this->siteweb;
    }

    /**
     * Set educprio
     *
     * @param boolean $educprio
     * @return EtablissementFicheetablissement
     */
    public function setEducprio($educprio)
    {
        $this->educprio = $educprio;

        return $this;
    }

    /**
     * Get educprio
     *
     * @return boolean 
     */
    public function getEducprio()
    {
        return $this->educprio;
    }

    /**
     * Set etabintehand
     *
     * @param boolean $etabintehand
     * @return EtablissementFicheetablissement
     */
    public function setEtabintehand($etabintehand)
    {
        $this->etabintehand = $etabintehand;

        return $this;
    }

    /**
     * Get etabintehand
     *
     * @return boolean 
     */
    public function getEtabintehand()
    {
        return $this->etabintehand;
    }

    /**
     * Set exisanneprep
     *
     * @param boolean $exisanneprep
     * @return EtablissementFicheetablissement
     */
    public function setExisanneprep($exisanneprep)
    {
        $this->exisanneprep = $exisanneprep;

        return $this;
    }

    /**
     * Get exisanneprep
     *
     * @return boolean 
     */
    public function getExisanneprep()
    {
        return $this->exisanneprep;
    }

    /**
     * Set exisanneprepintehand
     *
     * @param boolean $exisanneprepintehand
     * @return EtablissementFicheetablissement
     */
    public function setExisanneprepintehand($exisanneprepintehand)
    {
        $this->exisanneprepintehand = $exisanneprepintehand;

        return $this;
    }

    /**
     * Get exisanneprepintehand
     *
     * @return boolean 
     */
    public function getExisanneprepintehand()
    {
        return $this->exisanneprepintehand;
    }
    /**
     * @var \EtablissementResponsable
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="EtablissementResponsable",mappedBy="fichetab")
     */
    private $resp;

    /**
     * @return \EtablissementResponsable
     */
    public function getResp()
    {
        return $this->resp;
    }

    /**
     * @param \EtablissementResponsable $resp
     */
    public function setResp($resp)
    {
        $this->resp = $resp;
    }
    /**
     * @var \EtablissementInfrastructure
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="EtablissementInfrastructure",mappedBy="fichetabinfr")
     */
    private $infr;

    /**
     * @return \EtablissementInfrastructure
     */
    public function getInfr()
    {
        return $this->infr;
    }

    /**
     * @param \EtablissementInfrastructure $infr
     */
    public function setInfr($infr)
    {
        $this->infr = $infr;
    }

    /**
     * @var \NomenclatureEtablissement
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NomenclatureEtablissement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeEtab", referencedColumnName="CodeEtab"),
     *   @ORM\JoinColumn(name="CodeTypeEtab", referencedColumnName="CodeTypeEtab"),
     * })
     */
    private $nomeetab;

    /**
     * @return \NomenclatureEtablissement
     */
    public function getNomeetab()
    {
        return $this->nomeetab;
    }

    /**
     * @param \NomenclatureEtablissement $nomeetab
     */
    public function setNomeetab($nomeetab)
    {
        $this->nomeetab = $nomeetab;
    }
}
