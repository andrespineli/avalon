<?php

namespace App\Controllers;

class MovieController
{
    public function home()
    {
        render('home', [
        	"movie" => $movieName,
        	"director" => $directorName
        ]);
    }   
   
}