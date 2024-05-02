<?php

include_once('istorage.php');
include_once('memorystorage.php');

$ms = new MemoryStorage();
$id = $ms->create();
$ms->update($id, ['a' => 1]);
var_dump($ms);
echo '<hr>';
$ms->remove($id);
var_dump($ms);
echo '<hr>';