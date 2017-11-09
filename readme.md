This app is the task have been given to calculate the salary and expense dates:
To install the app and run it, please follow this instructions:

# Installation

- Download the app.
- Run: `composer install`.
- Navigate to the root of the app and run: `./index run 2017` or another year such as `./index run 2016` and so on.
- This will show the output on the console and create a file on the root of the application, named by year and extension of `.txt`: For eample: `2017.txt`.

### Note

You can also see the tests on **test/Unit** directory and run the tests: `phpunit` or if you don't have PHPUnit `./vendor/bin/phpunit`.

I could build this app with Laravel and it's command console integration but since it's a simple app I only used these packages:

- `symfony/console`
- `symfony/filesystem`
- `nesbot/carbon` 

I could also remove the `symfony/filesystem` package and output the file by the help of Unix and Bash: 

```bash
./index run 2017 > 2017.txt
./index run 2016 > 2016.txt
./index run 2015 > 2015.txt
./index run 2014 > 2014.txt
``` 

_However this is nto necessary as we generate a file automatically with the help of symfony's filesystem_.