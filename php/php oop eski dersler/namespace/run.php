<?php 
include ("Selman/CMS/Models/User.php");
include ("Selman/CMS/Controllers/UserController.php");
//$a=new Selman\CMS\Controllers\UserController ();
use Selman\CMS\Controllers\UserController;
$a=new UserController ();
print_r ($a->get());