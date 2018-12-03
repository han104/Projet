<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="datetime", name="reservation")
     */
    private $reservation_date_time;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users", inversedBy="reservations_join")
     */
    private $Users_join;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Menu", mappedBy="reservation_join")
     */
    private $Menu_join;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Plates", mappedBy="reservations_join")
     */
    private $Plates_join;




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
     * @return mixed
     */
    public function getReservationDateTime()
    {
        return $this->reservation_date_time;
    }

    /**
     * @param mixed $reservation_date_time
     */
    public function setReservationDateTime($reservation_date_time)
    {
        $this->reservation_date_time = $reservation_date_time;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->Users;
    }

    /**
     * @param mixed $Users
     */
    public function setUsers($Users)
    {
        $this->Users = $Users;
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
    public function getUsersJoin()
    {
        return $this->Users_join;
    }

    /**
     * @param mixed $Users_join
     */
    public function setUsersJoin($Users_join)
    {
        $this->Users_join = $Users_join;
    }

    /**
     * @return mixed
     */
    public function getMenuJoin()
    {
        return $this->Menu_join;
    }

    /**
     * @param mixed $Menu_join
     */
    public function setMenuJoin($Menu_join)
    {
        $this->Menu_join = $Menu_join;
    }

    /**
     * @return mixed
     */
    public function getPlatesJoin()
    {
        return $this->Plates_join;
    }

    /**
     * @param mixed $Plates_join
     */
    public function setPlatesJoin($Plates_join)
    {
        $this->Plates_join = $Plates_join;
    }



/**/



}

