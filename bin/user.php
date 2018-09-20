<?php

use Cocur\Slugify\Slugify;

$slugify = new Slugify();

if ($_POST['uname'] <> "" && $_POST['cname'] <> "" && $_POST['umail'] <> "" && $_POST['upwd'] <> "" && $_POST['ugroup']) {

    // showDebug($_POST);

    $slug = $slugify->slugify($_POST['cname']);

    if (AddUser($_POST['uname'], $_POST['umail'], $_POST['upwd'], $slug, $_POST['ugroup'])) {
        \Delight\Cookie\Session::set("good", "user");
    } else {
        \Delight\Cookie\Session::set("user", "bug");
    }

}

// GoBack();
GoHome('user');
