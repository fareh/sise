<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SecuritePackage
 *
 * @ORM\Table(name="securite_package")
 * @ORM\Entity
 */
class SecuritePackage
{
    /**
     * @var string
     *
     * @ORM\Column(name="CODEPACK", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codepack;

    /**
     * @var string
     *
     * @ORM\Column(name="LIBEPACKFR", type="string", length=100, nullable=false)
     */
    private $libepackfr;

    /**
     * @var string
     *
     * @ORM\Column(name="LIBEPACKAR", type="string", length=100, nullable=false)
     */
    private $libepackar;

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsVisi", type="boolean", nullable=true)
     */
    private $isvisi;

    /**
     * @var string
     *
     * @ORM\Column(name="MainPage", type="text", nullable=true)
     */
    private $mainpage;

    /**
     * @var string
     *
     * @ORM\Column(name="BackColor", type="string", length=10, nullable=true)
     */
    private $backcolor;

    /**
     * @var integer
     *
     * @ORM\Column(name="OrdeAffi", type="integer", nullable=true)
     */
    private $ordeaffi;


    /**
     * Get codepack
     *
     * @return string
     */
    public function getCodepack()
    {
        return $this->codepack;
    }

    /**
     * Set libepackfr
     *
     * @param string $libepackfr
     * @return SecuritePackage
     */
    public function setLibepackfr($libepackfr)
    {
        $this->libepackfr = $libepackfr;

        return $this;
    }

    /**
     * Get libepackfr
     *
     * @return string
     */
    public function getLibepackfr()
    {
        return $this->libepackfr;
    }

    /**
     * Set libepackar
     *
     * @param string $libepackar
     * @return SecuritePackage
     */
    public function setLibepackar($libepackar)
    {
        $this->libepackar = $libepackar;

        return $this;
    }

    /**
     * Get libepackar
     *
     * @return string
     */
    public function getLibepackar()
    {
        return $this->libepackar;
    }

    /**
     * Set isvisi
     *
     * @param boolean $isvisi
     * @return SecuritePackage
     */
    public function setIsvisi($isvisi)
    {
        $this->isvisi = $isvisi;

        return $this;
    }

    /**
     * Get isvisi
     *
     * @return boolean
     */
    public function getIsvisi()
    {
        return $this->isvisi;
    }

    /**
     * Set mainpage
     *
     * @param string $mainpage
     * @return SecuritePackage
     */
    public function setMainpage($mainpage)
    {
        $this->mainpage = $mainpage;

        return $this;
    }

    /**
     * Get mainpage
     *
     * @return string
     */
    public function getMainpage()
    {
        return $this->mainpage;
    }

    /**
     * Set backcolor
     *
     * @param string $backcolor
     * @return SecuritePackage
     */
    public function setBackcolor($backcolor)
    {
        $this->backcolor = $backcolor;

        return $this;
    }

    /**
     * Get backcolor
     *
     * @return string
     */
    public function getBackcolor()
    {
        return $this->backcolor;
    }

    /**
     * Set ordeaffi
     *
     * @param integer $ordeaffi
     * @return SecuritePackage
     */
    public function setOrdeaffi($ordeaffi)
    {
        $this->ordeaffi = $ordeaffi;

        return $this;
    }

    /**
     * Get ordeaffi
     *
     * @return integer
     */
    public function getOrdeaffi()
    {
        return $this->ordeaffi;
    }
}
