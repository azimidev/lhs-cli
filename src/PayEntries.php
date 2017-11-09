<?php

namespace App;

use Carbon\Carbon;
use DateTime;

class PayEntries
{
	/**
	 * Get the year and assign it to property
	 *
	 * @var mixed
	 */
	protected $year;
	/**
	 * Expense dates range 1st and 15th of each month
	 *
	 * @var array
	 */
	protected $expenseDates = [1, 15];

	/**
	 * PayEntries constructor.
	 *
	 * @param mixed $year
	 */
	public function __construct($year)
	{
		$this->year = $year;
	}

	/**
	 * Calculate and output the salary, expenses dates
	 *
	 * @return string
	 */
	public function output()
	{
		$salaryDates   = $this->getSalaryDates();
		$expensesDates = $this->getExpenseDates();

		echo "Month Name, 1st Expenses Date, 2nd Expenses Date, Salary Date \n";

		$dates = '';

		for ($i = 1; $i <= 12; $i++) {
			$monthName = DateTime::createFromFormat('!m', $i)->format('F');
			$dates     .= sprintf(
				"%s, %s, %s, %s \n",
				$monthName, $expensesDates[$i][0], $expensesDates[$i][1], $salaryDates[$i]
			);
		}

		return $dates;
	}

	/**
	 * Get the salary dates for the year
	 *
	 * @return array
	 */
	public function getSalaryDates()
	{
		$salaryDates = [];
		for ($i = 1; $i <= 12; $i++) {
			$ldom = $this->getDaysInMonth($this->year, $i);
			// checks if day is on a weekend and returns the correct day
			$payDay = $this->getWeekDay($this->year, $i, $ldom);

			$salaryDates[$i] = $payDay;
		}

		return $salaryDates;
	}

	/**
	 * Calculate the days in every month
	 * given we have year and month
	 *
	 * @param $year
	 * @param $month
	 * @return int
	 */
	public function getDaysInMonth($year, $month)
	{
		return Carbon::createFromDate($year, $month, 1)->daysInMonth;
	}

	/**
	 * Get week days if type is salary then last weekday and if expenses then next monday
	 *
	 * @param $year
	 * @param $month
	 * @param $day
	 * @param string $type
	 * @return string
	 */
	public function getWeekDay($year, $month, $day, $type = 'salary')
	{
		$dt = Carbon::createFromDate($year, $month, $day);
		if ($dt->isWeekend()) {
			// pick the last weekday
			if ($type === 'salary') {
				return Carbon::parse('last weekday ' . $year . '-' . $month . '-' . $day)->toDateString();
			}

			return Carbon::parse('next monday ' . $year . '-' . $month . '-' . $day)->toDateString();
		}

		return $dt->toDateString();
	}

	/**
	 * Get expense dates and assig it to array
	 *
	 * @return array
	 */
	public function getExpenseDates()
	{
		$expenseDates = [];

		for ($i = 1; $i <= 12; $i++) {
			$monthExpenses = [];
			foreach ($this->expenseDates as $payDate) {
				$expenseDay      = $this->getWeekDay($this->year, $i, $payDate, 'expenses');
				$monthExpenses[] = $expenseDay;
			}

			$expenseDates[$i] = $monthExpenses;
		}

		return $expenseDates;
	}
}