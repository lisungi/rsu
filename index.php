<?php
require __DIR__ . '/load.php';


if ($auth->isLoggedIn()) {
    // $Author = GetAuthorInfo($auth->getUserId());
    include THEME . "rsu-config.php";

} else {
    include THEME . "login.php";
}