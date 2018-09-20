<?php
error_reporting(E_ALL & ~E_NOTICE);

define("SITE_NAME", "RSU");

define("ROOT", dirname(__FILE__) . "/");
define("NDD", "rsu");
define("DOMAIN", "localhost:8080/" . NDD);
define("THEME", ROOT . "theme/");
define("LIB", ROOT . "libs/");
define("BINDIR", ROOT . "bin/");
define("IMGDIR", ROOT . "images/");
define("LOCALE", ROOT . "locales/");
define("HTTP", "http://");
define("WEBROOT", HTTP . DOMAIN . "/");
define("BIN", HTTP . DOMAIN . "/bin/");
define("IMG", HTTP . DOMAIN . "/images/");
define("CDN", HTTP . DOMAIN . "/assets/");
define("TOOL", HTTP . DOMAIN . "/tools/");


define("MINPASS", 8);
define("NBRESULT", 20);

define("IMG_LARGE", "1024");
define("IMG_MEDIUM", "800");
define("IMG_SMALL", "480");
define("IMG_THUMB", "240");

require ROOT . '/vendor/autoload.php';
if (!isset($_SESSION["lang"])) $lang = "fr";
else $lang = $_SESSION["lang"];
require_once LOCALE . $lang . ".php";

require LIB . 'autoload.php';


$DB = new \PDO('mysql:dbname=rsu;host=localhost;', 'root', 'Nasa2020');
$auth = new \Delight\Auth\Auth($DB);