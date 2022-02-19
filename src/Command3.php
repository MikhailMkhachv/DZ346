<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Question\ChoiceQuestion;

class Command3 extends Command
{
    protected static $defaultName = 'app:command3';

    protected function configure(): void
    {
        $this
            ->setName('question')
            ->setDescription('несколько вопросов о вас')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $helper = $this->getHelper('question');

        $yourNameQuestion = new Question('Как вас зовут? ');
        $name = $helper->ask($input, $output, $yourNameQuestion);

        $yourAgeQuestion = new Question('Сколько вам лет? ');
        $age = $helper->ask($input, $output, $yourAgeQuestion);

        $question = new ChoiceQuestion(
        'Укажите ваш пол (по умолчанию: М)',
        ['М', 'Ж'],
        0
    );

        $question->setErrorMessage('Некоректно введет пол.');

        $gender = $helper->ask($input, $output, $question);
    
        $output->writeln('Здравствуйте ' . $name . ', ваш возраст: ' . $age . ', пол: ' . $gender);

        return Command::SUCCESS;
    }
}