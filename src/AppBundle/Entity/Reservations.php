<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Tests\Fixtures\Validation\Category;

/**
 * Reservations
 *
 * @ORM\Table(name="reservations")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReservationsRepository")
 */
class Reservations
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
     * @ORM\Column(type="date", name="reservation_date")
     */
    private $reservation_date;

    /**
     * @ORM\Column(type="time", name="reservation_time")
     */
    private $reservation_time;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="reservations")
     */
    private $user;


    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Menu", cascade={"persist"})
     */
    private $menu;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getReservationDate()
    {
        return $this->reservation_date;
    }

    /**
     * @param mixed $reservation_date
     */
    public function setReservationDate($reservation_date)
    {
        $this->reservation_date = $reservation_date;
    }

    /**
     * @return mixed
     */
    public function getReservationTime()
    {
        return $this->reservation_time;
    }

    /**
     * @param mixed $reservation_time
     */
    public function setReservationTime($reservation_time)
    {
        $this->reservation_time = $reservation_time;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * @param mixed $menu
     */
    public function setMenu($menu)
    {
        $this->menu = $menu;
    }

    /**
     * @return mixed
     */
    public function getUserNonMembre()
    {
        return $this->user_non_membre;
    }






}

