<?php
require str_replace ('/tools', '', __DIR__) . '/load.php';
$thisPath = explode('/', $_SERVER['REQUEST_URI']);
echo $_SERVER['REQUEST_URI'];