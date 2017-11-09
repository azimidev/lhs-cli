This app is the task have been given to calculate the salary and expense dates:
To install the app and run it, please follow this instructions:

# Installation

- Download the app
- Run `composer install`
- To see the calculated dates on console navigate to the root of the app and run: `./index run 2017` or another year such as `./index run 2016` and so on.
- To see the calculated  dates on console and output it to a file run: `./index run 2017 > 2017.txt` or `./index run 2016 > 2016.txt`. You can name the extension of the file whatever you like.

You can also see the tests on test/Unit directory and run the tests: `phpunit` or if you don't have PHPUnit `./vendor/bin/phpunit`

### Note

I could build this app with Laravel and it's command console integration but since it's a simple app I only used these packages:

- `symfony/console`
- `nesbot/carbon` 