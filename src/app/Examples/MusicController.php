<?php

namespace App\Controllers;

use App\Models\Product;

class MusicController
{
	public function __construct()
	{
		$this->product = (new Product)->repository;
	}

    public function get()
    {    
        return $this->product->all()->get();
    }
}