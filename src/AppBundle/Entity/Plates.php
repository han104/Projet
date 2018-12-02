<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plates
 *
 * @ORM\Table(name="plates")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlatesRepository")
 */
class Plates
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
     * @ORM\Column(type="string", name="plate_name")
     */
    private $plate_name;

    /**
     * @ORM\Column(type="integer", name="plate_price")
     */
    private $plate_price;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Reservations", inversedBy="Plates_join")
     */
    private $reservations_join;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

