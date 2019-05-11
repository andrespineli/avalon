<?php

namespace App\Controllers;

use App\DAO\MovieDAO;
use App\Models\Movie;

class MovieController
{
    public function get()
    {
        $movie = new Movie;         
                
        $movieDAO = new MovieDAO($movie);
        $result = $movieDAO->get();

        return $result;     
    }

}