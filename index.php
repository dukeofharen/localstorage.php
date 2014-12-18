<?php
define("LOCALSTORAGE_TYPE", "mysql");
define("LOCALSTORAGE_FOLDER", "./values");
define("LOCALSTORAGE_HOST", "localhost");
define("LOCALSTORAGE_USERNAME", "root");
define("LOCALSTORAGE_PASSWORD", "password");
define("LOCALSTORAGE_DATABASE", "localstorage");
include("./localstorage.php");
localStorage("test", array("test" => "This is a test!"));
var_dump(localStorage("test"));
localStorage("test", null);
?>