<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EtablissementResponsable
 *
 * @ORM\Table(name="etablissement_responsable", indexes={@ORM\Index(name="FK_Etablissement_Responsable_Nomenclature_Grade", columns={"CodeGradDire"}), @ORM\Index(name="FK_Etablissement_Responsable_Nomenclature_Grade1", columns={"CodeGradDireAdjo"})})
 * @ORM\Entity
 */
class EtablissementResponsable
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
     * @ORM\Column(name="IdenUniqDire", type="string", length=50, nullable=true)
     */
    private $idenuniqdire;

    /**
     * @var string
     *
     * @ORM\Column(name="NomPrenDire", type="string", length=50, nullable=true)
     */
    private $nomprendire;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeGradDire", type="string", length=50, nullable=true)
     */
    private $codegraddire;

    /**
     * @var float
     *
     * @ORM\Column(name="AnciDireEnse", type="float", precision=10, scale=0, nullable=true)
     */
    private $ancidireense;

    /**
     * @var float
     *
     * @ORM\Column(name="AnciDireAdmi", type="float", precision=10, scale=0, nullable=true)
     */
    private $ancidireadmi;

    /**
     * @var string
     *
     * @ORM\Column(name="TeleMobiDire", type="string", length=50, nullable=true)
     */
    private $telemobidire;

    /**
     * @var string
     *
     * @ORM\Column(name="MailDire", type="string", length=100, nullable=true)
     */
    private $maildire;

    /**
     * @var string
     *
     * @ORM\Column(name="IdenUniqDireAdjo", type="string", length=50, nullable=true)
     */
    private $idenuniqdireadjo;

    /**
     * @var string
     *
     * @ORM\Column(name="NomPrenDireAdjo", type="string", length=50, nullable=true)
     */
    private $nomprendireadjo;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeGradDireAdjo", type="string", length=50, nullable=true)
     */
    private $codegraddireadjo;

    /**
     * @var float
     *
     * @ORM\Column(name="AnciDireAdjoEnse", type="float", precision=10, scale=0, nullable=true)
     */
    private $ancidireadjoense;

    /**
     * @var float
     *
     * @ORM\Column(name="AnciDireAdjoAdmi", type="float", precision=10, scale=0, nullable=true)
     */
    private $ancidireadjoadmi;

    /**
     * @var string
     *
     * @ORM\Column(name="TeleMobiDireAdjo", type="string", length=50, nullable=true)
     */
    private $telemobidireadjo;

    /**
     * @var string
     *
     * @ORM\Column(name="MailDireAdjo", type="string", length=100, nullable=true)
     */
    private $maildireadjo;



    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EtablissementResponsable
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
     * @return EtablissementResponsable
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
     * @return EtablissementResponsable
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
     * @return EtablissementResponsable
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
     * Set idenuniqdire
     *
     * @param string $idenuniqdire
     * @return EtablissementResponsable
     */
    public function setIdenuniqdire($idenuniqdire)
    {
        $this->idenuniqdire = $idenuniqdire;

        return $this;
    }

    /**
     * Get idenuniqdire
     *
     * @return string 
     */
    public function getIdenuniqdire()
    {
        return $this->idenuniqdire;
    }

    /**
     * Set nomprendire
     *
     * @param string $nomprendire
     * @return EtablissementResponsable
     */
    public function setNomprendire($nomprendire)
    {
        $this->nomprendire = $nomprendire;

        return $this;
    }

    /**
     * Get nomprendire
     *
     * @return string 
     */
    public function getNomprendire()
    {
        return $this->nomprendire;
    }

    /**
     * Set codegraddire
     *
     * @param string $codegraddire
     * @return EtablissementResponsable
     */
    public function setCodegraddire($codegraddire)
    {
        $this->codegraddire = $codegraddire;

        return $this;
    }

    /**
     * Get codegraddire
     *
     * @return string 
     */
    public function getCodegraddire()
    {
        return $this->codegraddire;
    }

    /**
     * Set ancidireense
     *
     * @param float $ancidireense
     * @return EtablissementResponsable
     */
    public function setAncidireense($ancidireense)
    {
        $this->ancidireense = $ancidireense;

        return $this;
    }

    /**
     * Get ancidireense
     *
     * @return float 
     */
    public function getAncidireense()
    {
        return $this->ancidireense;
    }

    /**
     * Set ancidireadmi
     *
     * @param float $ancidireadmi
     * @return EtablissementResponsable
     */
    public function setAncidireadmi($ancidireadmi)
    {
        $this->ancidireadmi = $ancidireadmi;

        return $this;
    }

    /**
     * Get ancidireadmi
     *
     * @return float 
     */
    public function getAncidireadmi()
    {
        return $this->ancidireadmi;
    }

    /**
     * Set telemobidire
     *
     * @param string $telemobidire
     * @return EtablissementResponsable
     */
    public function setTelemobidire($telemobidire)
    {
        $this->telemobidire = $telemobidire;

        return $this;
    }

    /**
     * Get telemobidire
     *
     * @return string 
     */
    public function getTelemobidire()
    {
        return $this->telemobidire;
    }

    /**
     * Set maildire
     *
     * @param string $maildire
     * @return EtablissementResponsable
     */
    public function setMaildire($maildire)
    {
        $this->maildire = $maildire;

        return $this;
    }

    /**
     * Get maildire
     *
     * @return string 
     */
    public function getMaildire()
    {
        return $this->maildire;
    }

    /**
     * Set idenuniqdireadjo
     *
     * @param string $idenuniqdireadjo
     * @return EtablissementResponsable
     */
    public function setIdenuniqdireadjo($idenuniqdireadjo)
    {
        $this->idenuniqdireadjo = $idenuniqdireadjo;

        return $this;
    }

    /**
     * Get idenuniqdireadjo
     *
     * @return string 
     */
    public function getIdenuniqdireadjo()
    {
        return $this->idenuniqdireadjo;
    }

    /**
     * Set nomprendireadjo
     *
     * @param string $nomprendireadjo
     * @return EtablissementResponsable
     */
    public function setNomprendireadjo($nomprendireadjo)
    {
        $this->nomprendireadjo = $nomprendireadjo;

        return $this;
    }

    /**
     * Get nomprendireadjo
     *
     * @return string 
     */
    public function getNomprendireadjo()
    {
        return $this->nomprendireadjo;
    }

    /**
     * Set codegraddireadjo
     *
     * @param string $codegraddireadjo
     * @return EtablissementResponsable
     */
    public function setCodegraddireadjo($codegraddireadjo)
    {
        $this->codegraddireadjo = $codegraddireadjo;

        return $this;
    }

    /**
     * Get codegraddireadjo
     *
     * @return string 
     */
    public function getCodegraddireadjo()
    {
        return $this->codegraddireadjo;
    }

    /**
     * Set ancidireadjoense
     *
     * @param float $ancidireadjoense
     * @return EtablissementResponsable
     */
    public function setAncidireadjoense($ancidireadjoense)
    {
        $this->ancidireadjoense = $ancidireadjoense;

        return $this;
    }

    /**
     * Get ancidireadjoense
     *
     * @return float 
     */
    public function getAncidireadjoense()
    {
        return $this->ancidireadjoense;
    }

    /**
     * Set ancidireadjoadmi
     *
     * @param float $ancidireadjoadmi
     * @return EtablissementResponsable
     */
    public function setAncidireadjoadmi($ancidireadjoadmi)
    {
        $this->ancidireadjoadmi = $ancidireadjoadmi;

        return $this;
    }

    /**
     * Get ancidireadjoadmi
     *
     * @return float 
     */
    public function getAncidireadjoadmi()
    {
        return $this->ancidireadjoadmi;
    }

    /**
     * Set telemobidireadjo
     *
     * @param string $telemobidireadjo
     * @return EtablissementResponsable
     */
    public function setTelemobidireadjo($telemobidireadjo)
    {
        $this->telemobidireadjo = $telemobidireadjo;

        return $this;
    }

    /**
     * Get telemobidireadjo
     *
     * @return string 
     */
    public function getTelemobidireadjo()
    {
        return $this->telemobidireadjo;
    }

    /**
     * Set maildireadjo
     *
     * @param string $maildireadjo
     * @return EtablissementResponsable
     */
    public function setMaildireadjo($maildireadjo)
    {
        $this->maildireadjo = $maildireadjo;

        return $this;
    }

    /**
     * Get maildireadjo
     *
     * @return string 
     */
    public function getMaildireadjo()
    {
        return $this->maildireadjo;
    }
}
