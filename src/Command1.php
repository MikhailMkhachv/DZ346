<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class Command1 extends Command
{
    protected function configure(): void
    {
        $this
            ->setName('say_hello')
            ->setDescription('saying hello to the subject you pass')
            ->addArgument('something', InputArgument::REQUIRED)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $line = 'Hello, ' . $input->getArgument('something'); 
        $output->writeln($line);

        return Command::SUCCESS;
    }
}