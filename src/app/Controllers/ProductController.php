<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController
{
	public function __construct()
	{
		$this->product = (new Product)->repository;
	}

    public function get()
    {    
        return $this->product->all()->with()->get();
    }

	public function find($id)
	{		
  		$this->product->find($id);		
		return $this->product->first();
	}

    public function store($request)
    {    	
        return $this->product->insert($request->array())->get();
    }

    public function update($id, $request)
    {    	    	
    	$this->product->find($id);
		$this->product->update($request->array());
		return $this->product->get();
    }

    public function remove($id)
    {    	
    	$this->product->find($id);
  		$this->product->delete();		
		return $this->product->get();
    }
}