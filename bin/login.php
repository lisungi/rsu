<?php

if (isset($_POST['remember']) && ($_POST['remember'] == 1 || $_POST['remember'] == "on")) {
    $rememberDuration = (int) (60 * 60 * 24 * 365.25);
} else {
    $rememberDuration = null;
}


try {
    // $auth->login($_POST['uid'], $_POST['pwd'], $rememberDuration);
    $auth->login($_POST['uid'], $_POST['pwd']);
} catch (\Delight\Auth\InvalidEmailException $e) {
    \Delight\Cookie\Session::set("error", "mail");
    echo "wrong email address";
} catch (\Delight\Auth\InvalidPasswordException $e) {
    \Delight\Cookie\Session::set("error", "pass");
    //echo "wrong password";
} catch (\Delight\Auth\EmailNotVerifiedException $e) {
    \Delight\Cookie\Session::set("error", "active");
    //echo "email not verified";
} catch (\Delight\Auth\TooManyRequestsException $e) {
    \Delight\Cookie\Session::set("error", "bug");
    //echo "too many requests";
}

GoBack();
