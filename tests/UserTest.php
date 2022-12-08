<?php

use PHPUnit\Framework\TestCase;

require_once("models/User.php");

class UserTest extends TestCase{

    private $users;

    public function setUp():void
    {
        $this->users = new User();
    }

    public function testUserGetDataUser()
    {
        $user = 'rafael.rivero';
        $identification = '27903883';
        $firstname = 'Rafael';
        $lastname = 'Rivero';
        $contactNumber = '4241385808';
        $email = 'rafalejandrorivero@gmail.com';
        $this->users->setDataUser($user, $identification, $firstname, $lastname, $contactNumber, $email);
        $result = $this->users->getDataUser();
        $this->assertIsArray($result);
    }

}

?>