<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParametreStatuseleve
 *
 * @ORM\Table(name="parametre_statuseleve")
 * @ORM\Entity
 */
class ParametreStatuseleve
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeStat", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codestat;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeStatFr", type="string", length=50, nullable=true)
     */
    private $libestatfr;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeStatAr", type="string", length=50, nullable=true)
     */
    private $libestatar;


    /**
     * Get codestat
     *
     * @return string
     */
    public function getCodestat()
    {
        return $this->codestat;
    }

    /**
     * Set libestatfr
     *
     * @param string $libestatfr
     * @return ParametreStatuseleve
     */
    public function setLibestatfr($libestatfr)
    {
        $this->libestatfr = $libestatfr;

        return $this;
    }

    /**
     * Get libestatfr
     *
     * @return string
     */
    public function getLibestatfr()
    {
        return $this->libestatfr;
    }

    /**
     * Set libestatar
     *
     * @param string $libestatar
     * @return ParametreStatuseleve
     */
    public function setLibestatar($libestatar)
    {
        $this->libestatar = $libestatar;

        return $this;
    }

    /**
     * Get libestatar
     *
     * @return string
     */
    public function getLibestatar()
    {
        return $this->libestatar;
    }
}
