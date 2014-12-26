<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * EtablissementRecensement
 *
 * @ORM\Table(name="etablissement_recensement",indexes={@ORM\index(name="etablissement_recensement_id", columns={"etablissement_recensement_id"})})
 * @ORM\Entity(repositoryClass="Sise\Bundle\CoreBundle\Repository\EtablissementRecensementRepository")
 */
class EtablissementRecensement
{
    /**
     * @var integer
     * @ORM\Column(name="etablissement_recensement_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */

    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeEtab", type="string", length=50, nullable=false)
     */
    private $codeetab;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeEtab", type="string", length=50, nullable=false)
     */
    private $codetypeetab;

    /**
     * @var integer
     *
     * @ORM\Column(name="AnneScol", type="integer", nullable=false)
     */
    private $annescol;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeRece", type="string", length=50, nullable=false)
     */
    private $coderece;


    /**
     * @var EffectiveeleveRepartioneleveLieuhabitation
     *
     * @ORM\OneToMany(targetEntity="EffectiveeleveRepartioneleveLieuhabitation", mappedBy="etablissement_recensement", cascade={"persist", "remove"})
     */
    protected $lieuhabitation;

    public function __construct()
    {
        $this->lieuhabitation = new ArrayCollection();
    }


    /**
     * Set id
     *
     * @param string $id
     * @return EtablissementRecensement
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EtablissementRecensement
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
     * @return EtablissementRecensement
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
     * @return EtablissementRecensement
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
     * @return EtablissementRecensement
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
     * Add lieuhabitation
     *
     * @param \Sise\Bundle\CoreBundle\Entity\EffectiveeleveRepartioneleveLieuhabitation $lieuhabitation
     * @return EtablissementRecensement
     */
    public function addLieuhabitation(\Sise\Bundle\CoreBundle\Entity\EffectiveeleveRepartioneleveLieuhabitation $lieuhabitation)
    {
        $this->lieuhabitation[] = $lieuhabitation;

        return $this;
    }

    /**
     * Remove lieuhabitation
     *
     * @param \Sise\Bundle\CoreBundle\Entity\EffectiveeleveRepartioneleveLieuhabitation $lieuhabitation
     */
    public function removeLieuhabitation(\Sise\Bundle\CoreBundle\Entity\EffectiveeleveRepartioneleveLieuhabitation $lieuhabitation)
    {
        $this->lieuhabitation->removeElement($lieuhabitation);
    }

    /**
     * Get lieuhabitation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLieuhabitation()
    {
        return $this->lieuhabitation;
    }

    /*public function setLieuhabitation(ArrayCollection $lieuhabitations)
    {

        foreach ($lieuhabitations as $lieuhabitation) {
            $lieuhabitation->addEtablissementRecensement($this);
        }

        $this->lieuhabitation = $lieuhabitations;
    }
*/

    public function __toString()
    {
        return ($this->getId()) ? $this->getId() : null;
    }
}
