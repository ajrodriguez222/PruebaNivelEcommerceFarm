<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
   

    /**
     * @ORM\Column(type="integer")
     */
    private $Id = '1';

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $nombre = 'Antonio Rodriguez';

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $email = 'ajrodriguez222@gmail.com';
    
  
    
//    public function __construct() {
//    }
    public function getId(): ?int
    {
        return $this->Id;
    }

    public function setId(int $Id): self
    {
        $this->Id = $Id;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
    
    public function toString(): string
    {
        $string = 'Id: '.$this->Id.', Nombre: '.$this->nombre.', Email: '.$this->email;

        return $string;
    }
    
   
}




