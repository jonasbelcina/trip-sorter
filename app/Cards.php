<?php

namespace app;

/**
 * Class Cards
 *
 * Sorts boarding cards
 *
*/
class Cards
{
	protected $cards = null;
	
	public function __construct($cards)
	{
		$this->cards = $cards;
	}
	
	/**
     * Set boarding cards
     *
    */
	public function setCards($cards)
	{
		$this->cards = $cards;
	}
	
	/**
     * Get boarding cards
     *
    */
	public function getCards()
	{
		return $this->cards;
	}
	
	/**
     * Sort the boarding cards from start to end
     *
     * @return array
    */
	public function sortCards() 
	{
		$_cards = $this->cards;	

		for ($x = 0; $x < count($_cards); $x++) {
			$to = $_cards[$x]['to'];

			for ($y = 0; $y < count($_cards); $y++) {

				if ($to == $_cards[$y]['from']) {
					if (!isset($_cards[$x + 1])) {
						$_cards[] = null;
					}

					$tmp = $_cards[$x + 1];
					$_cards[$x + 1] = $_cards[$y];
					$_cards[$y] = $tmp;
				}
			}
		}
		
		$this->setCards($_cards);
		$this->cleanCardsStack();
		
		return $this->getCards();	
	}

	/**
	 * Clean cards array
	 */
	public function cleanCardsStack()
	{
		// remove empty arrays 
		$this->cards = array_filter($this->getCards());

		// re-index the array correctly
		$this->cards = array_values($this->getCards());
	}

}