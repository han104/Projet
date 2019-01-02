<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table(name="menu")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MenuRepository")
 */
class Menu
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
     * @ORM\Column(name="menu_libelle", type="string", length=255)
     */
    private $menuLibelle;

    /**
     * @var int
     *
     * @ORM\Column(name="menu_prix", type="integer")
     */
    private $menuPrix;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Reservations", cascade={"persist"})
     */
    private $reservation;


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
     * Set menuLibelle
     *
     * @param string $menuLibelle
     *
     * @return Menu
     */
    public function setMenuLibelle($menuLibelle)
    {
        $this->menuLibelle = $menuLibelle;

        return $this;
    }

    /**
     * Get menuLibelle
     *
     * @return string
     */
    public function getMenuLibelle()
    {
        return $this->menuLibelle;
    }

    /**
     * Set menuPrix
     *
     * @param integer $menuPrix
     *
     * @return Menu
     */
    public function setMenuPrix($menuPrix)
    {
        $this->menuPrix = $menuPrix;

        return $this;
    }

    /**
     * Get menuPrix
     *
     * @return int
     */
    public function getMenuPrix()
    {
        return $this->menuPrix;
    }

    /**
     * @return mixed
     */
    public function getReservation()
    {
        return $this->reservation;
    }

    /**
     * @param mixed $reservation
     */
    public function setReservation($reservation)
    {
        $this->reservation = $reservation;
    }


}

