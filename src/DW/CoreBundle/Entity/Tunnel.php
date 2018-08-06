<?php

namespace DW\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tunnel
 *
 * @ORM\Table(name="tunnel")
 * @ORM\Entity(repositoryClass="DW\CoreBundle\Repository\TunnelRepository")
 */
class Tunnel
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
     * @var float
     *
     * @ORM\Column(name="progress", type="float")
     */
    private $progress;

    /**
     * @ORM\ManyToOne(targetEntity="DW\CoreBundle\Entity\Town")
     * @ORM\JoinColumn(nullable=false)
     */
    private $startTown;

    /**
     * @ORM\ManyToOne(targetEntity="DW\CoreBundle\Entity\Town")
     * @ORM\JoinColumn(nullable=false)
     */
    private $endTown;


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
     * Set progress
     *
     * @param float $progress
     *
     * @return Tunnel
     */
    public function setProgress($progress)
    {
        $this->progress = $progress;

        return $this;
    }

    /**
     * Get progress
     *
     * @return float
     */
    public function getProgress()
    {
        return $this->progress;
    }

    /**
     * Set startTown
     *
     * @param \DW\CoreBundle\Entity\Town $startTown
     *
     * @return Tunnel
     */
    public function setStartTown(Town $startTown)
    {
        $this->startTown = $startTown;

        return $this;
    }

    /**
     * Get startTown
     *
     * @return \DW\CoreBundle\Entity\Town
     */
    public function getStartTown()
    {
        return $this->startTown;
    }

    /**
     * Set endTown
     *
     * @param \DW\CoreBundle\Entity\Town $endTown
     *
     * @return Tunnel
     */
    public function setEndTown(Town $endTown)
    {
        $this->endTown = $endTown;

        return $this;
    }

    /**
     * Get endTown
     *
     * @return \DW\CoreBundle\Entity\Town
     */
    public function getEndTown()
    {
        return $this->endTown;
    }
}
