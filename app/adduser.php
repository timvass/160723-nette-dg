<?php

if (count($argv) !== 4) {
	echo 'usage: adduser <username> <password> <email>';
	exit(2);
}

list(, $username, $password, $email) = $argv;

$container = require 'bootstrap.php';

$manager = $container->getByType(\App\Model\UserManager::class);

//$manager = new \App\Model\UserManager();

try {
	$manager->add($username, $email, $password);
} catch (\App\Model\DuplicateNameException $e) {
	echo 'Chyba: duplicitni jmeno nebo email';
	exit(1);
}

echo 'OK';

