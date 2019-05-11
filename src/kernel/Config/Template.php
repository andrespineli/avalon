<?php

namespace Config;

use Config\Path;

class Template
{
	private $view;

	public function render($view, $data)
	{		
		$templates = __TEMPLATES__;
		$index = "{$templates}/index.html";
		$path = "{$templates}/$view.html";

		$index = Path::handler($index);
		$path = Path::handler($path);

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
				if (strpos($value, '?php')) {
					$value = highlight_string($value, true);
				}				
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