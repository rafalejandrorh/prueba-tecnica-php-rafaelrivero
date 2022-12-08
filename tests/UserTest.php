<?php

use PHPUnit\Framework\TestCase;

require_once("models/User.php");

class UserTest extends TestCase{

    private $users;

    public function setUp():void
    {
        $this->users = new User();
    }

    public function tearDown():void
    {
        unset($this->users);
    }

    public function getDataUserProvider()
    {
        return [
            ['rafael.rivero', '27903883', 'Rafael', 'Rivero', '4241385808', 'rafalejandrorivero@gmail.com'],
            ['alejandro.herrera', '388303972', 'Alejandro', 'Herrera', '4120187171', 'alejandroherrera@gmail.com']
        ];
    }

    public function getUserProvider()
    {
        return [
            ['rafael.rivero'],
            ['alejandro.herrera']
        ];
    }

    public function getIdentificationProvider()
    {
        return [
            ['27903883'],
            ['388303972']
        ];
    }

    public function getFirstnameProvider()
    {
        return [
            ['Rafael'],
            ['Alejandro']
        ];
    }

    public function getLastnameProvider()
    {
        return [
            ['Rivero'],
            ['Herrera']
        ];
    }

    public function getContactNumberProvider()
    {
        return [
            ['4241385808'],
            ['4120187171']
        ];
    }

    public function getEmailProvider()
    {
        return [
            ['rafalejandrorivero@gmail.com'],
            ['alejandroherrera@gmail.com']
        ];
    }

    /**
     * @dataProvider getDataUserProvider
     */
    public function testUserGetDataUser($user, $identification, $firstname, $lastname, $contactNumber, $email)
    {
        $this->users->setDataUser($user, $identification, $firstname, $lastname, $contactNumber, $email);
        $result = $this->users->getDataUser();
        $this->assertIsArray($result);
    }

    /**
     * @dataProvider getUserProvider
     */
    public function testGetUser($user)
    {
        $this->users->setUser($user);
        $result = $this->users->getUser();
        $this->assertIsString($result);
    }

    /**
     * @dataProvider getIdentificationProvider
     */
    public function testGetIdentification($identification)
    {
        $this->users->setIdentification($identification);
        $result = $this->users->getIdentification();
        $this->assertIsString($result);
    }

    /**
     * @dataProvider getFirstnameProvider
     */
    public function testGetFirstname($firstname)
    {
        $this->users->setFirstname($firstname);
        $result = $this->users->getFirstname();
        $this->assertIsString($result);
    }

    /**
     * @dataProvider getLastnameProvider
     */
    public function testGetLastname($lastname)
    {
        $this->users->setLastname($lastname);
        $result = $this->users->getLastname();
        $this->assertIsString($result);
    }

    /**
     * @dataProvider getContactNumberProvider
     */
    public function testGetContactNumber($contactNumber)
    {
        $this->users->setContactNumber($contactNumber);
        $result = $this->users->getContactNumber();
        $this->assertIsString($result);
    }

    /**
     * @dataProvider getEmailProvider
     */
    public function testGetEmail($email)
    {
        $this->users->setEmail($email);
        $result = $this->users->getEmail();
        $this->assertIsString($result);
    }



}

?>