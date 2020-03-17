<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;


class NotificationService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function notify($user, $message, $proveedor)
    {
        $Conexion = $proveedor->getTipo();
        if($Conexion == 'smtp'){
            $result = $proveedor->send($user->getEmail(),$message);
            return $result;
        }elseif ($Conexion == 'ses') {
            $result = $proveedor->send($user->getEmail(),$message);
            return $result;
        }
        
    }
}