<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureMatiereoptionnelleniveauscolaire
 *
 * @ORM\Table(name="nomenclature_matiereoptionnelleniveauscolaire")
 * @ORM\Entity
 */
class NomenclatureMatiereoptionnelleniveauscolaire
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeMatiOpti", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codematiopti;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeNiveScol", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codenivescol;


    /**
     * Set codematiopti
     *
     * @param string $codematiopti
     * @return NomenclatureMatiereoptionnelleniveauscolaire
     */
    public function setCodematiopti($codematiopti)
    {
        $this->codematiopti = $codematiopti;

        return $this;
    }

    /**
     * Get codematiopti
     *
     * @return string
     */
    public function getCodematiopti()
    {
        return $this->codematiopti;
    }

    /**
     * Set codenivescol
     *
     * @param string $codenivescol
     * @return NomenclatureMatiereoptionnelleniveauscolaire
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
}
