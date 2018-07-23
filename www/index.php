<?php
use Tracy\Debugger;

require '../vendor/autoload.php';

Debugger::$logDirectory = __DIR__ . '/../log';
Debugger::enable(Debugger::DEVELOPMENT); //ip cimet ideadom pl tajneheslo@10.0.0.201
Debugger::$strictMode = true;
Debugger::$showLocation = true;
Debugger::$maxDepth = 10;
Debugger::$logSeverity = E_ALL;
Debugger::$email = 'admin@example.com';

Debugger::log('ahoj');

//echo Tracy\Debugger;

$arr = ['jednadva', true, false, new DateTime, [1,2, ['a' => [132]], 3]];

dump($arr);

dump($_SERVER);

dump(10+5);

Debugger::$logDirectory = __DIR__ . '/log';
Debugger::log('ahoj');



