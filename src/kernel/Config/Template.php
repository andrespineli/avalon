<?php

namespace Config;

class Template
{
	private $view;

	public function render($view, $data)
	{		
		//define("TEMPLATES_FOLDER", __DIR__."..\\..\\templates\{$template}.html");

		///echo TEMPLATES_FOLDER;
		$index = __DIR__."\\..\\..\\templates\\index.html";
		$path = __DIR__."\\..\\..\\templates\\$view.html";

		$this->index = file_get_contents($index);	
		$this->view = file_get_contents($path);	

		$this->bindTemplateData($data);		
		$this->bindContentIndex();				
		echo $this->view;
	}

	private function bindTemplateData($data)
	{				
		foreach ($data as $key => $value) {
			if (!is_array($value)) {				
				$this->view = str_replace('{'.$key.'}', $value, $this->view);				
			}			
		}
	}

	private function bindContentIndex()
	{		
		$this->index = str_replace('{title}', env('APP_NAME'), $this->index);
		$this->view = str_replace('{content}', $this->view, $this->index);
	}
}