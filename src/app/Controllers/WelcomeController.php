<?php

namespace App\Controllers;

class WelcomeController
{
    public function welcome()
    {
        render('welcome');
    }

    public function hello($name)
    {
    	render('hello', ['name' => $name]);  	
    	   	   	
    }

    public function ptBR()
    {
        $examples = __EXAMPLES_PATH__;    
        $data['movie'] = file_get_contents("{$examples}/Movie.php");   
        $data['movieDAO'] = file_get_contents("{$examples}/MovieDAO.php");     
        $data['music'] = file_get_contents("{$examples}/Music.php");   
        $data['movieController'] = file_get_contents("{$examples}/MovieController.php");   
        $data['musicController'] = file_get_contents("{$examples}/MusicController.php");   
        $data['routes'] = file_get_contents("{$examples}/routes.php");   
        $data['render'] = file_get_contents("{$examples}/Render.php");   
        $data['view'] = highlight_string(file_get_contents("{$examples}/view.html"), true);  
        render('docs/pt-br', $data);
    }
}