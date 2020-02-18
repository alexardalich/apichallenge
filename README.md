# API Challenge

## Requirements

```
php 7.2 (standard Laravel 6.x)
```

## Installation

Clone the repo locally:

```
git clone https://github.com/alexardalich/apichallenge.git apichallenge
cd apichallenge
```

Install PHP dependencies:

```
composer install
```

Setup configuration:

```
cp .env.example .env
```

Generate application key:

```
php artisan key:generate
```

Run the dev server (the output will give the address): eg (http://127.0.0.1:8000/)

```
php artisan serve
```

## There are two implementations

```
1. set .env variable DATE_TIME_COMPARER=diff

To use DateTime diff implementation.

Initially did the Carbon implementation using its nice convenience methods.
Decided to try a different implementation when verifying the 'years' format 
as the Carbon version was not returning values consistent with online checks of day->year conversion
```

```
2. set .env variable DATE_TIME_COMPARER=carbon

To use Carbon implementation
```


## The api endpoints available:
(which can be hit via a browser, a request tool like Postman, or curl as GET requests)

The API has no auth (to keep this simple)
```
1. Find out the number of days between two datetime parameters.

http://127.0.0.1:8000/api/days_between
```
```
2. Find out the number of weekdays between two datetime parameters.

http://127.0.0.1:8000/api/week_days_between
```
```
3. Find out the number of complete weeks between two datetime parameters.
(Assuming a complete week can start on any day of the week)

http://127.0.0.1:8000/api/complete_weeks_between
```

Required parameters to pass on query string
```
startDateTime (a valid date time value)
endDateTime (a valid date time value)
```

Optional parameters
```
startDateTimeZone (a valid timezone)
endDateTimeZone (a valid timezone)
resultFormat (accepted values are [seconds, minutes, hours, years])
```

## Examples

```
http://127.0.0.1:8000/api/days_between?startDateTime=2020-01-01&endDateTime=2020-02-02

will return json {"data":[32]}
```
```
http://127.0.0.1:8000/api/days_between?startDateTime=2020-01-01&endDateTime=2020-02-02&startDateTimeZone=Australia/Adelaide&endDateTimeZone=Australia/Perth

to include timezone in comparison
```
```
http://127.0.0.1:8000/api/days_between?startDateTime=2020-01-01&endDateTime=2020-02-02&resultFormat=seconds

will return {"data":[2764800]} showing seconds
```

## To run tests

```
./vendor/bin/phpunit
```
