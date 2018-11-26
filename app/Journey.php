<?php

namespace app;

/**
 * Class Journey
 *
 * Prints the journey from sorted boarding cards
 *
*/
class Journey
{
	
	protected $cards = array();
	
	public function __construct($cards)
	{
		$this->cards = $cards;
	}
	
	/**
     * Get cards value
     *
    */
	public function getCards()
	{
		return $this->cards;
	}

    /**
     * Print the complete journey
     *
     * @return string
    */
    public function printDescription()
    {
        $cards = $this->getCards();
        $step = 1;

		foreach ($cards as $card) {
            $message = '';
            $seatAssignment = isset($card['seatAssignment']) && !empty($card['seatAssignment'])
                                ? $card['seatAssignment']  
                                : 'No seat assignment.';
            $additionalInfo = isset($card['additionalInfo'])  && !empty($card['additionalInfo'])
                                ? '<div>' . $card['additionalInfo'] . '</div>' 
                                : '';
            
            if (strtolower($card['transportationMode']) == 'train') {
                $message = 'Take train ' . $card['transportationModeNumber'] . ' from ' . $card['from'] . ' to ' . $card['to'] . '. ';

                if (isset($card['seatAssignment']) && !empty($card['seatAssignment']))
                    $seatAssignment = ' Sit in seat ' . $seatAssignment . '.';
            }
            elseif (strtolower($card['transportationMode']) == 'bus') {
                $message = 'Take the airport bus from ' . $card['from'] . ' to ' . $card['to'] . '. ';

                if (isset($card['seatAssignment']) && !empty($card['seatAssignment']))
                    $seatAssignment = ' Sit in seat ' . $seatAssignment . '.';
            }
            elseif (strtolower($card['transportationMode']) == 'airplane') {
                $message = 'From ' . $card['from'] . ', take flight ' . $card['transportationModeNumber'] . ' to ' . $card['to'] . '. ';
            }

            echo '<div>' . $step . '. ' . $message . $seatAssignment . $additionalInfo . '</div>';

            $step++;
        }
        
        echo '<div>' . $step . '. You have arrived at your final destination.</div>';
    }
}