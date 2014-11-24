<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureDisciplineoptionnelle
 *
 * @ORM\Table(name="nomenclature_disciplineoptionnelle")
 * @ORM\Entity
 */
class NomenclatureDisciplineoptionnelle
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeNiveScol", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codenivescol;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeDisci", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codedisci;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeFili", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codefili;

    /**
     * @var boolean
     *
     * @ORM\Column(name="MatiOpti", type="boolean", nullable=true)
     */
    private $matiopti;



    /**
     * Set codenivescol
     *
     * @param string $codenivescol
     * @return NomenclatureDisciplineoptionnelle
     */
    public function setCodenivescol($codenivescol)
    {
        $this->codenivescol = $codenivescol;

        return $this;
    }

    /**
     * Get codenivescol
     *
     * @return string 
     */
    public function getCodenivescol()
    {
        return $this->codenivescol;
    }

    /**
     * Set codedisci
     *
     * @param string $codedisci
     * @return NomenclatureDisciplineoptionnelle
     */
    public function setCodedisci($codedisci)
    {
        $this->codedisci = $codedisci;

        return $this;
    }

    /**
     * Get codedisci
     *
     * @return string 
     */
    public function getCodedisci()
    {
        return $this->codedisci;
    }

    /**
     * Set codefili
     *
     * @param string $codefili
     * @return NomenclatureDisciplineoptionnelle
     */
    public function setCodefili($codefili)
    {
        $this->codefili = $codefili;

        return $this;
    }

    /**
     * Get codefili
     *
     * @return string 
     */
    public function getCodefili()
    {
        return $this->codefili;
    }

    /**
     * Set matiopti
     *
     * @param boolean $matiopti
     * @return NomenclatureDisciplineoptionnelle
     */
    public function setMatiopti($matiopti)
    {
        $this->matiopti = $matiopti;

        return $this;
    }

    /**
     * Get matiopti
     *
     * @return boolean 
     */
    public function getMatiopti()
    {
        return $this->matiopti;
    }
}
