<?php

namespace App\Provider;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SmtpProvider
 *
 * @author an
 */
class SesProvider implements mailerProvider {
    //put your code here
    private $tipo = 'ses';
    
    
    public function getTipo(): ?string {
       return $this->tipo;
    }
    
    public function send($email, $message): string
    {
       $result = 'true';
        return $result;
    }
    
   
}
