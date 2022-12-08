<?php

use PHPUnit\Framework\TestCase;

require_once("models/UserRepository.php");

class UserRepositoryTest extends TestCase{

    private $userRepository;

    public function setUp():void
    {
        $this->userRepository = new UserRepository();
    }

    public function testUserRepositoryCreate()
    {
        $user = 'rafael.rivero';
        $identification = '27903883';
        $firstname = 'Rafael';
        $lastname = 'Rivero';
        $contactNumber = '4241385808';
        $email = 'rafalejandrorivero@gmail.com';
        
        $result = $this->userRepository->create($user, $identification, $firstname, $lastname, $contactNumber, $email);
        $this->assertArrayHasKey('message', $result);
    }
}

?>