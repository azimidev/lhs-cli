This app is the task have been given to calculate the salary and expense dates:
To install the app and run it, please follow these instructions:

# Installation

- Download the app.
- Run: `composer install`.
- Navigate to the root of the app and run: `./index run 2017` or another year such as `./index run 2016` and so on.
- If you could not run `./index` then make sure you have execute permission on your system. In Mac on root of the app run: `chmod +x ./index`
- This will show the output on the console as a table and create a csv file on the root of the application, named by year and extension of `.txt`: For eample: `2017.txt`.

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

## Console Output

```
+------------+-------------------+-------------------+-------------+
| Month Name | 1st Expenses Date | 2nd Expenses Date | Salary Date |
+------------+-------------------+-------------------+-------------+
| January    | 2017-01-02        | 2017-01-16        | 2017-01-31  |
| February   | 2017-02-01        | 2017-02-15        | 2017-02-28  |
| March      | 2017-03-01        | 2017-03-15        | 2017-03-31  |
| April      | 2017-04-03        | 2017-04-17        | 2017-04-28  |
| May        | 2017-05-01        | 2017-05-15        | 2017-05-31  |
| June       | 2017-06-01        | 2017-06-15        | 2017-06-30  |
| July       | 2017-07-03        | 2017-07-17        | 2017-07-31  |
| August     | 2017-08-01        | 2017-08-15        | 2017-08-31  |
| September  | 2017-09-01        | 2017-09-15        | 2017-09-29  |
| October    | 2017-10-02        | 2017-10-16        | 2017-10-31  |
| November   | 2017-11-01        | 2017-11-15        | 2017-11-30  |
| December   | 2017-12-01        | 2017-12-15        | 2017-12-29  |
+------------+-------------------+-------------------+-------------+
```

## File Output

```
Month Name, 1st Expenses Date, 2nd Expenses Date, Salary Date
January, 2017-01-02, 2017-01-16, 2017-01-31 
February, 2017-02-01, 2017-02-15, 2017-02-28 
March, 2017-03-01, 2017-03-15, 2017-03-31 
April, 2017-04-03, 2017-04-17, 2017-04-28 
May, 2017-05-01, 2017-05-15, 2017-05-31 
June, 2017-06-01, 2017-06-15, 2017-06-30 
July, 2017-07-03, 2017-07-17, 2017-07-31 
August, 2017-08-01, 2017-08-15, 2017-08-31 
September, 2017-09-01, 2017-09-15, 2017-09-29 
October, 2017-10-02, 2017-10-16, 2017-10-31 
November, 2017-11-01, 2017-11-15, 2017-11-30 
December, 2017-12-01, 2017-12-15, 2017-12-29 
```