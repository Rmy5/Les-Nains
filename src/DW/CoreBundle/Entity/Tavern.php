<?php

namespace DW\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tavern
 *
 * @ORM\Table(name="tavern")
 * @ORM\Entity(repositoryClass="DW\CoreBundle\Repository\TavernRepository")
 */
class Tavern
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
     * @var int
     *
     * @ORM\Column(name="rooms", type="integer")
     */
    private $rooms;

    /**
     * @var bool
     *
     * @ORM\Column(name="blonde", type="boolean")
     */
    private $blonde;

    /**
     * @var bool
     *
     * @ORM\Column(name="brown", type="boolean")
     */
    private $brown;

    /**
     * @var bool
     *
     * @ORM\Column(name="amber", type="boolean")
     */
    private $amber;

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
     * @return Tavern
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
     * Set rooms
     *
     * @param integer $rooms
     *
     * @return Tavern
     */
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;

        return $this;
    }

    /**
     * Get rooms
     *
     * @return int
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * Set blonde
     *
     * @param boolean $blonde
     *
     * @return Tavern
     */
    public function setBlonde($blonde)
    {
        $this->blonde = $blonde;

        return $this;
    }

    /**
     * Get blonde
     *
     * @return bool
     */
    public function getBlonde()
    {
        return $this->blonde;
    }

    /**
     * Set brown
     *
     * @param boolean $brown
     *
     * @return Tavern
     */
    public function setBrown($brown)
    {
        $this->brown = $brown;

        return $this;
    }

    /**
     * Get brown
     *
     * @return bool
     */
    public function getBrown()
    {
        return $this->brown;
    }

    /**
     * Set amber
     *
     * @param boolean $amber
     *
     * @return Tavern
     */
    public function setAmber($amber)
    {
        $this->amber = $amber;

        return $this;
    }

    /**
     * Get amber
     *
     * @return bool
     */
    public function getAmber()
    {
        return $this->amber;
    }

    /**
     * Set town
     *
     * @param \DW\CoreBundle\Entity\Town $town
     *
     * @return Tavern
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
