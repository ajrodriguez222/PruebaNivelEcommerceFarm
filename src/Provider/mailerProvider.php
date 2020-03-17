<?php

namespace App\Provider;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author an
 */
interface mailerProvider {
    public function send($email, $message): string;
}
