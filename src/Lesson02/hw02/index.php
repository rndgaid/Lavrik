<?php

use Lesson02\hw02\Animal;
use Lesson02\hw02\JSONLogger;
use Lesson02\hw02\Storage;

require_once __DIR__ . '/../../../vendor/autoload.php';

$a1 = new Animal('Murzik', 20, 5);
$a2 = new Animal('Bobik', 30, 3);
$gameStorage = new Storage();
$gameStorage->add('test', random_int(1, 100));

$logger = new JSONLogger();
$logger->addObject($a1);
$logger->addObject($a2);
$logger->addObject($gameStorage);

json_encode($logger->log(), JSON_THROW_ON_ERROR);

$a2->makeDamage($a1->calcDamage());
$gameStorage->add('other', random_int(1, 400));
