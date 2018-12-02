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
     * @ORM\Column(type="string", name="menu_name")
     */
    private $menu_name;

    /**
     * @ORM\Column(type="integer", name="menu_price")
     */
    private $menu_price;


    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Reservations", inversedBy="Menu_join")
     */
    private $reservation_join;


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
    public function getMenuName()
    {
        return $this->menu_name;
    }

    /**
     * @param mixed $menu_name
     */
    public function setMenuName($menu_name)
    {
        $this->menu_name = $menu_name;
    }

    /**
     * @return mixed
     */
    public function getReservations()
    {
        return $this->Reservations;
    }

    /**
     * @param mixed $Reservations
     */
    public function setReservations($Reservations)
    {
        $this->Reservations = $Reservations;
    }

    /**
     * @return mixed
     */
    public function getMenuPrice()
    {
        return $this->menu_price;
    }

    /**
     * @param mixed $menu_price
     */
    public function setMenuPrice($menu_price)
    {
        $this->menu_price = $menu_price;
    }




}

