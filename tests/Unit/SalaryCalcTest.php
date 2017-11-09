<?php

use App\PayEntries;

require __DIR__ . '/../../vendor/autoload.php';


class SalaryCalcTest extends PHPUnit\Framework\TestCase
{
	protected  $app;
	public function setUp()
	{
		parent::setUp();
		$this->app = new PayEntries(2017);
	}

	/** @test */
	public function it_gets_days_in_month()
	{
		$september  = $this->app->getDaysInMonth(2017, 9);
		$october  = $this->app->getDaysInMonth(2017, 10);
		$november  = $this->app->getDaysInMonth(2017, 11);

		$this->assertEquals(30, $september);
		$this->assertEquals(31, $october);
		$this->assertEquals(30, $november);
	}

	/** @test */
	public function it_gets_week_days_for_salary()
	{
		// Weekend Sunday
		$sunday  = $this->app->getWeekDay(2017, 12, 10, 'salary');
		// it should return 2 days ago Friday
		$this->assertEquals('2017-12-08', $sunday);

		// Weekend Saturday
		$sunday  = $this->app->getWeekDay(2017, 12, 10, 'salary');
		// it should return 1 days ago Saturday
		$this->assertEquals('2017-12-08', $sunday);
	}

	/** @test */
	public function it_gets_week_days_for_expenses()
	{
		// Weekend Sunday
		$sunday  = $this->app->getWeekDay(2017, 12, 10, 'expenses');
		// it should return tomorrow Monday
		$this->assertEquals('2017-12-11', $sunday);

		// Weekend Saturday
		$sunday  = $this->app->getWeekDay(2017, 12, 10, 'expenses');
		// it should return 2 days later Monday
		$this->assertEquals('2017-12-11', $sunday);
	}

	/** @test */
	public function it_gets_expenses_dates()
	{
		$january = $this->app->getExpenseDates();
		$this->assertEquals('2017-01-02', $january[1][0]);
		$this->assertEquals('2017-01-16', $january[1][1]);

		$february = $this->app->getExpenseDates();
		$this->assertEquals('2017-02-01', $february[2][0]);
		$this->assertEquals('2017-02-15', $february[2][1]);

		$march = $this->app->getExpenseDates();
		$this->assertEquals('2017-03-01', $march[3][0]);
		$this->assertEquals('2017-03-15', $march[3][1]);

		$april = $this->app->getExpenseDates();
		$this->assertEquals('2017-04-03', $april[4][0]);
		$this->assertEquals('2017-04-17', $april[4][1]);

		$may = $this->app->getExpenseDates();
		$this->assertEquals('2017-05-01', $may[5][0]);
		$this->assertEquals('2017-05-15', $may[5][1]);

		$june = $this->app->getExpenseDates();
		$this->assertEquals('2017-06-01', $june[6][0]);
		$this->assertEquals('2017-06-15', $june[6][1]);

		$july = $this->app->getExpenseDates();
		$this->assertEquals('2017-07-03', $july[7][0]);
		$this->assertEquals('2017-07-17', $july[7][1]);

		$august = $this->app->getExpenseDates();
		$this->assertEquals('2017-08-01', $august[8][0]);
		$this->assertEquals('2017-08-15', $august[8][1]);
	}

	/** @test */
	public function it_gets_salary_dates()
	{
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
