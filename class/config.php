<?php

/** 
 * Config File Management Class
 *
 */

class config {

	public function __construct($filename = null)
	{
		if ($filename)
		{
			$this->loadIni($filename);
		}
	}

	private function loadIni($filename)
	{
		$configfile = file($filename);
		//var_dump($array);
	
		$config = array();

		foreach($configfile as $line)
		{
		// Find Header
			if($this->isSectionElement($line))
			{
				echo "Is Section Element: ".$line;
				$sectionelement = strtolower(preg_replace(array('$\[$','$\]$'),'',$line));
				echo $sectionelement;
			}
		// Find Items
			if($this->isItem($line))
			{
				echo "Item<br />";
				$item = array();
				preg_match('$(.*)={1}(.*)$', $line, $item);
				var_dump($item);
				//$config[$sectionelement] =  
			}
		// Repeat
		// Build Array
		// Profit!
		}
	}

	private function isSectionElement($line)
	{
		return preg_match('$\[.*\]$', $line);
	}

	private function isItem($line)
	{
		return preg_match('$.*={1}.*$', $line);
	}
}

