<?php
// Autoload aktiveras
spl_autoload_register(function ($class) {
    include 'classes/**/' . $class . '.class.php';
    include 'classes/' . $class . '.class.php';
});