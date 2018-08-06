<?php

namespace DW\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gang
 *
 * @ORM\Table(name="gang")
 * @ORM\Entity(repositoryClass="DW\CoreBundle\Repository\GangRepository")
 */
class Gang
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
     * @var \DateTime
     *
     * @ORM\Column(name="workStart", type="time")
     */
    private $workStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="workEnd", type="time")
     */
    private $workEnd;

    /**
     * @ORM\ManyToOne(targetEntity="DW\CoreBundle\Entity\Tavern")
     */
    private $tavern;

    /**
     * @ORM\ManyToOne(targetEntity="DW\CoreBundle\Entity\Tunnel")
     */
    private $tunnel;


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
     * Set workStart
     *
     * @param \DateTime $workStart
     *
     * @return Gang
     */
    public function setWorkStart($workStart)
    {
        $this->workStart = $workStart;

        return $this;
    }

    /**
     * Get workStart
     *
     * @return \DateTime
     */
    public function getWorkStart()
    {
        return $this->workStart;
    }

    /**
     * Set workEnd
     *
     * @param \DateTime $workEnd
     *
     * @return Gang
     */
    public function setWorkEnd($workEnd)
    {
        $this->workEnd = $workEnd;

        return $this;
    }

    /**
     * Get workEnd
     *
     * @return \DateTime
     */
    public function getWorkEnd()
    {
        return $this->workEnd;
    }

    /**
     * Set tavern
     *
     * @param \DW\CoreBundle\Entity\Tavern $tavern
     *
     * @return Gang
     */
    public function setTavern(Tavern $tavern = null)
    {
        $this->tavern = $tavern;

        return $this;
    }

    /**
     * Get tavern
     *
     * @return \DW\CoreBundle\Entity\Tavern
     */
    public function getTavern()
    {
        return $this->tavern;
    }

    /**
     * Set tunnel
     *
     * @param \DW\CoreBundle\Entity\Tunnel $tunnel
     *
     * @return Gang
     */
    public function setTunnel(Tunnel $tunnel = null)
    {
        $this->tunnel = $tunnel;

        return $this;
    }

    /**
     * Get tunnel
     *
     * @return \DW\CoreBundle\Entity\Tunnel
     */
    public function getTunnel()
    {
        return $this->tunnel;
    }
}
