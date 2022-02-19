<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class Command2 extends Command
{
    protected static $defaultName = 'app:command2';

    protected function configure(): void
    {
        $this
        	->setName('multiplier')
        	->setDescription('multiply your string')
        	->addArgument('line', InputArgument::REQUIRED)
        	->addArgument('times', InputArgument::OPTIONAL);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $string = $input->getArgument('line');
        $times = $input->getArgument('times') ?? 2;

        for ($i = 0; $i < $times; $i++) {
        	$output->writeln($string);
        }

        return Command::SUCCESS;
    }
}