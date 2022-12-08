<?php

require_once("../models/UserRepository.php");
require_once("../models/User.php");

$user = $_GET['user'];
$identification = $_GET['identification'];
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$contactNumber = $_GET['contactNumber'];
$email = $_GET['email'];

$users = new User();
$userRepository = new UserRepository();

$users->setDataUser($user, $identification, $firstname, $lastname, $contactNumber, $email);

$response = $userRepository->create($user, $identification, $firstname, $lastname, $contactNumber, $email);

echo $response;
echo "\n";
echo $users->getDataUser();

?>