<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;

class ClaculateSalaryDateCommand extends Command
{
	public function configure()
	{
		$this->setName('run')
		     ->setDescription('Get the year and calculate the pay dates.')
		     ->addArgument('year', InputArgument::REQUIRED, 'The Year');
	}

	public function execute(InputInterface $input, OutputInterface $output)
	{
		$year = $input->getArgument('year');
		$app  = new PayEntries($year);

		$table = new Table($output);
		$table->setHeaders(['Month Name', '1st Expenses Date', '2nd Expenses Date', 'Salary Date'])
		      ->setRows($app->outputAsTable())
		      ->render();

		$fs = new Filesystem();

		$fs->dumpFile("{$year}.txt", $app->outputToFile());
	}
}