# Trip Sorter

Sorts a stack of boarding cards for various transportations that will take from a point A to point B via several stops on the way. 

## Notes

1. Boarding cards are taken from a JSON file containing information such as: mode of transportation, flight/bus/train number, and to/from locations

## Installation

On project root, run:

```bash
composer update
```

## Usage

Open the project on your local server through **localhost/trip-sorter** or whatever your local server setup may be

## Testing

On you terminal, run:
```bash
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/TripSorterTest
```
