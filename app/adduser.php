<?php

if(count($argv) !== 4) {
	echo 'usage: adduser <username> <password> <email>';
	exit;
}

list(, $username, $password, $email) = $argv;

$manager = new \App\Model\UserManager();

try{
	$manager->add($username, $email, $password);
} catch (\App\Model\DuplicateNameException $e) {
	echo 'Chyba: duplicitni jmeno nebo email';
	exit(1);
}

echo 'OK';