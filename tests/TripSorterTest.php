<?php

namespace tests;

use app\TripData;
use app\Cards;
use app\Journey;

use PHPUnit\Framework\TestCase;

final class TripSorterTest extends TestCase
{
    protected $journey;
    protected $dataFile;
    protected $tripData;
    protected $cardsData;
    protected $cards;
    protected $sortedCards;

    protected $expectedResult = array(
        array(
            'from' => 'Madrid',
            'to' => 'Barcelona',          
        ),
        array(
            'from' => 'Barcelona',
            'to' => 'Gerona Airport',
        ),
        array(
            'from' => 'Gerona Airport',
            'to' => 'Stockholm',       
        ),
		array(
            'from' => 'Stockholm',
            'to' => 'New York JFK',          
        )	
    );
 
    protected function setUp()
    {
        $upOne = realpath(__DIR__ . '/..');
        $this->dataFile = $upOne . '/data/boarding-cards.json';
        $this->tripData = new TripData($this->dataFile);
        $this->cardsData = $this->tripData->toArray();

        $this->cards = new Cards($this->cardsData);
        $this->sortedCards = $this->cards->sortCards();
    }
 
    protected function tearDown()
    {
        $this->dataFile = NULL;
        $this->tripData = NULL;
        $this->journey = NULL;
    }

    public function testSort()
    {
        $result = $this->sortedCards;

        $this->assertTrue($this->validateArrays($this->expectedResult, $result));
    }
 
    /**
     * check if sorted cards array matches with expected result
     */
	private function validateArrays($expectedResult, $sortedCards)
    {
		$valid = true;
        foreach ($sortedCards as $key => $card){
            if ($card['from'] != $expectedResult[$key]['from'] ) {
               $valid = false;
			}
		}
        return $valid;
    }

}