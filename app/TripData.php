<?php

namespace app;

/**
 * Class TripData
 *
 * Loads json data from file and converts to array
 *
*/
class TripData
{
	protected $data = null;
	
	public function __construct($src)
	{
		$this->data = $src;
	}
	
	/**
     * Convert json to array
     *
     * @return array
    */
	public function toArray() 
	{
		try {
			$fileContents = file_get_contents($this->data);
			$jsonData = json_decode($fileContents, true); 
			$cards = $jsonData['boardingCards'];
			return $cards;
		} catch(Exception $e) {
			return $e;
		}
	}

}