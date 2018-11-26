<?php

define('ROOT', __DIR__ . '/');

// autoload
require ROOT . '/vendor/autoload.php';

// get data from file and convert to array
$dataFile = ROOT . '/data/boarding-cards.json';
$tripData = new app\TripData($dataFile);
$cardsData = $tripData->toArray();

// load the cards, sort from start to end of trip, and print each leg of the trip
$cards = new app\Cards($cardsData);
$sortedCards = $cards->sortCards();

// print complete journey
$journey = new app\Journey($sortedCards);
$journey->printDescription();
