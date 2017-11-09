<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

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

		$dates = (new PayEntries($year))->output();

		$output->writeln($dates);
	}
}