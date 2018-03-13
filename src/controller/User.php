<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Etudiant
 */
class User {
    private $username;
    private $userpass;
    
    public function __construct(string $name, $pass) {
        $this->username = $name;
        $this->userpass = $pass;
    }
    
    function getUsername() {
        return $this->username;
    }

    function getUserpass() {
        return $this->userpass;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setUserpass($userpass) {
        $this->userpass = $userpass;
    }


}
