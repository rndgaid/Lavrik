<?php

use Lesson03\hw03\FileStorage;
use Lesson03\hw03\Article;

require_once __DIR__ . '/../../../vendor/autoload.php';

$ms = FileStorage::getInstance('articles.json');

$art1 = new Article($ms);
$art1->title = '===New art===';
$art1->content = '===Content new art===';
$art1->create();

$art2 = new Article($ms);
$art2->title = '****New art****';
$art2->content = '****Content new art****';
$art2->create();

echo '<pre>';
print_r($art1);
print_r($art2);
echo '</pre>';

$art1->save();

//$art2 = new Article($ms);
//$art2->load(1);
//echo '<pre>';
//print_r($art2);
//echo '</pre>';
//
//$art2->title = 'NZ';
//$art2->save();
//
//
//$art3 = new Article($ms);
//$art3->load(1);
//echo '<pre>';
//print_r($art3);
//echo '</pre>';
