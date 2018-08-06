<?php

namespace DW\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dwarf
 *
 * @ORM\Table(name="dwarf")
 * @ORM\Entity(repositoryClass="DW\CoreBundle\Repository\DwarfRepository")
 */
class Dwarf
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="beard", type="float")
     */
    private $beard;

    /**
     * @ORM\ManyToOne(targetEntity="DW\CoreBundle\Entity\Gang")
     */
    private $gang;

    /**
     * @ORM\ManyToOne(targetEntity="DW\CoreBundle\Entity\Town")
     * @ORM\JoinColumn(nullable=false)
     */
    private $town;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Dwarf
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set beard
     *
     * @param float $beard
     *
     * @return Dwarf
     */
    public function setBeard($beard)
    {
        $this->beard = $beard;

        return $this;
    }

    /**
     * Get beard
     *
     * @return float
     */
    public function getBeard()
    {
        return $this->beard;
    }

    /**
     * Set gang
     *
     * @param \DW\CoreBundle\Entity\Gang $gang
     *
     * @return Dwarf
     */
    public function setGang(Gang $gang = null)
    {
        $this->gang = $gang;

        return $this;
    }

    /**
     * Get gang
     *
     * @return \DW\CoreBundle\Entity\Gang
     */
    public function getGang()
    {
        return $this->gang;
    }

    /**
     * Set town
     *
     * @param \DW\CoreBundle\Entity\Town $town
     *
     * @return Dwarf
     */
    public function setTown(Town $town)
    {
        $this->town = $town;

        return $this;
    }

    /**
     * Get town
     *
     * @return \DW\CoreBundle\Entity\Town
     */
    public function getTown()
    {
        return $this->town;
    }
}
