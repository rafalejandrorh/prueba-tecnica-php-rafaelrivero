<?php

require_once("../models/UserRepository.php");

$prueba = new UserRepository();

print_r($prueba->getAllData());

?>