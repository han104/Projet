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
    private $Users_Join;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Menu", mappedBy="reservation_join")
     */
    private $Menu_Join;

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
    public function getUsersJoin()
    {
        return $this->Users_Join;
    }

    /**
     * @param mixed $Users_Join
     */
    public function setUsersJoin($Users_Join)
    {
        $this->Users_Join = $Users_Join;
    }

    /**
     * @return mixed
     */
    public function getMenuJoin()
    {
        return $this->Menu_Join;
    }

    /**
     * @param mixed $Menu_Join
     */
    public function setMenuJoin($Menu_Join)
    {
        $this->Menu_Join = $Menu_Join;
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

