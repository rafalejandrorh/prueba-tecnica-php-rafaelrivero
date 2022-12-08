<?php

use PHPUnit\Framework\TestCase;

require_once("models/UserRepository.php");

class UserRepositoryTest extends TestCase{

    private $userRepository;

    public function setUp():void
    {
        $this->userRepository = new UserRepository();
    }

    public function tearDown():void
    {
        unset($this->userRepository);
    }

    public function getDataUserProvider()
    {
        return [
            ['rafael.rivero', '27903883', 'Rafael', 'Rivero', '4241385808', 'rafalejandrorivero@gmail.com'],
            ['alejandro.herrera', '388303972', 'Alejandro', 'Herrera', '4120187171', 'alejandroherrera@gmail.com']
        ];
    }

    /**
     * @dataProvider getDataUserProvider
     */
    public function testUserRepositoryCreate($user, $identification, $firstname, $lastname, $contactNumber, $email)
    {
        $result = $this->userRepository->create($user, $identification, $firstname, $lastname, $contactNumber, $email);
        $this->assertArrayHasKey('message', $result);
    }
}

?>