<?php

namespace Selman\CMS\Controllers;

use Selman\CMS\Models\User; 

class UserController
{

    public function get()
    {
     $a=new User();
	   // print_r($a->selman());
		return $a->selman();
        // baþka iþlemler
    }

    public function delete($id)
    {
        $user = new User($id);
        // baþka iþlemler
    }

}


