<?php declare(strict_types=1);

namespace ProjectEuler\Commands;

// If we list all the natural numbers below 10 that are multiples of 3 or 5,
// we get 3, 5, 6 and 9. The sum of these multiples is 23.
//
// Find the sum of all the multiples of 3 or 5 below 1000.

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProblemOneCommand extends Command 
{
    /**
     * The name of the command.
     *
     * @var string
     */
    protected static $defaultName = 'project-euler:problem-1';
    protected $client = null;

    /**
     * {@inheritdoc}
     */
    protected function configure(): void
    {
        $this->setDescription('Generates the solution for Problem 1.') 
             ->setHelp('This command allows you to query the environment.')
         ;
    }

    public function __construct()
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("If we list all the natural numbers below 10 that are multiples of 3 or 5, we get 3, 5, 6 and 9. The sum of these multiples is 23.");
        $output->writeln("");
        $output->writeln("Find the sum of all the multiples of 3 or 5 below 1000.");
        $output->writeln("");

        $max_count = 1000;
        $solution = 0;

        for ($i = 1; $i < $max_count; $i++) {
            if ($i % 3 === 0 || $i % 5 === 0) {
                $solution += $i;
            }
        }

        $output->writeln("Solution: {$solution}");

        return Command::SUCCESS;
    }
}
