<?php

use App\PayEntries;

require __DIR__ . '/../../vendor/autoload.php';

class SalaryCalcTest extends PHPUnit\Framework\TestCase
{
	protected $app;

	public function setUp()
	{
		parent::setUp();

		// For all tests we test the current year which is 2017 ATM
		// If you change the year, all assertaions need to be changed
		// as every year is different
		$this->app = new PayEntries(2017);
	}

	/** @test */
	public function it_gets_days_in_month()
	{
		// Given is September 2017
		$september = $this->app->getDaysInMonth(2017, 9);

		// Then it should return 30 days
		$this->assertEquals(30, $september);

		// Given is October 2017
		$october   = $this->app->getDaysInMonth(2017, 10);

		// Then it should return 31 days
		$this->assertEquals(31, $october);

		// Given is November 2017
		$november  = $this->app->getDaysInMonth(2017, 11);

		// Then it should return 30 days
		$this->assertEquals(30, $november);
	}

	/** @test */
	public function it_gets_week_days_for_salary()
	{
		// Given is weekend and Sunday
		$sunday = $this->app->getWeekDay(2017, 12, 10, 'salary');

		// Then it should return 2 days ago Friday
		$this->assertEquals('2017-12-08', $sunday);

		// Given is weekend and Saturday
		$sunday = $this->app->getWeekDay(2017, 12, 10, 'salary');

		// Then it should return 1 days ago Saturday
		$this->assertEquals('2017-12-08', $sunday);
	}

	/** @test */
	public function it_gets_week_days_for_expenses()
	{
		// Given is weekend and Sunday
		$sunday = $this->app->getWeekDay(2017, 12, 10, 'expenses');

		// Then it should return tomorrow Monday
		$this->assertEquals('2017-12-11', $sunday);

		// Given is weekend and Saturday
		$sunday = $this->app->getWeekDay(2017, 12, 10, 'expenses');

		// Then it should return 2 days later Monday
		$this->assertEquals('2017-12-11', $sunday);
	}

	/** @test */
	public function it_gets_expenses_dates()
	{
		// Given is January
		$january = $this->app->getExpenseDates();
		$this->assertEquals('2017-01-02', $january[1][0]);
		$this->assertEquals('2017-01-16', $january[1][1]);

		// Given is February
		$february = $this->app->getExpenseDates();
		$this->assertEquals('2017-02-01', $february[2][0]);
		$this->assertEquals('2017-02-15', $february[2][1]);

		// Given is March
		$march = $this->app->getExpenseDates();
		$this->assertEquals('2017-03-01', $march[3][0]);
		$this->assertEquals('2017-03-15', $march[3][1]);

		// Given is April
		$april = $this->app->getExpenseDates();
		$this->assertEquals('2017-04-03', $april[4][0]);
		$this->assertEquals('2017-04-17', $april[4][1]);

		// Given is May
		$may = $this->app->getExpenseDates();
		$this->assertEquals('2017-05-01', $may[5][0]);
		$this->assertEquals('2017-05-15', $may[5][1]);

		// Given is June
		$june = $this->app->getExpenseDates();
		$this->assertEquals('2017-06-01', $june[6][0]);
		$this->assertEquals('2017-06-15', $june[6][1]);

		// Given is July
		$july = $this->app->getExpenseDates();
		$this->assertEquals('2017-07-03', $july[7][0]);
		$this->assertEquals('2017-07-17', $july[7][1]);

		// Given is August
		$august = $this->app->getExpenseDates();
		$this->assertEquals('2017-08-01', $august[8][0]);
		$this->assertEquals('2017-08-15', $august[8][1]);

		// We could add and test other months
		// but 8 months is confident enough that it's working
	}

	/** @test */
	public function it_gets_salary_dates()
	{
		// Given is
		$twentySeventeen = $this->app->getSalaryDates();

		$this->assertEquals('2017-01-31', $twentySeventeen[1]); // Jan
		$this->assertEquals('2017-02-28', $twentySeventeen[2]); // Feb
		$this->assertEquals('2017-03-31', $twentySeventeen[3]); // Mar
		$this->assertEquals('2017-04-28', $twentySeventeen[4]); // Apr
		$this->assertEquals('2017-05-31', $twentySeventeen[5]); // May
		$this->assertEquals('2017-06-30', $twentySeventeen[6]); // Jun
		$this->assertEquals('2017-07-31', $twentySeventeen[7]); // Jul
		$this->assertEquals('2017-08-31', $twentySeventeen[8]); // Aug
		$this->assertEquals('2017-09-29', $twentySeventeen[9]); // Sep
		$this->assertEquals('2017-10-31', $twentySeventeen[10]); // Oct
		$this->assertEquals('2017-11-30', $twentySeventeen[11]); // Nov
		$this->assertEquals('2017-12-29', $twentySeventeen[12]); // Dec
	}
}
