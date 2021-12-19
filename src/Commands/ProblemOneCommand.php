<?php declare(strict_types=1);

namespace ProjectEuler\Commands;

// If we list all the natural numbers below 10 that are multiples of 3 or 5,
// we get 3, 5, 6 and 9. The sum of these multiples is 23.
//
// Find the sum of all the multiples of 3 or 5 below 1000.

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ProblemOneCommand extends Command 
{
    /**
     * The name of the command.
     *
     * @var string
     */
    protected static $defaultName = 'project-euler:problem-1';
    protected string $description = "" .
            "Problem: " . PHP_EOL . 
            "If we list all the natural numbers below 10 that are multiples of 3 or 5, we get 3, 5, 6 and 9. The sum of these multiples is 23." . PHP_EOL . 
            "" . PHP_EOL . 
            "Find the sum of all the multiples of 3 or 5 below 1000." . PHP_EOL;

    /**
     * {@inheritdoc}
     */
    protected function configure(): void
    {
        $this->setDescription('Generates the solution for Problem 1.') 
             ->setHelp('This command allows you to query the environment.')
             ->addOption(
                'describe',
                'd',
                InputOption::VALUE_NONE,
                'Print the problem description?'
             )
             ->addOption(
                'timed',
                't',
                InputOption::VALUE_NONE,
                'Should the solution be timed?'
             )
         ;
    }

    public function __construct()
    {
        parent::__construct();
    }

    private function solveProblem() : string
    {
        $max_count = 1000;
        $solution = 0;

        for ($i = 1; $i < $max_count; $i++) {
            if ($i % 3 === 0 || $i % 5 === 0) {
                $solution += $i;
            }
        }

        return "{$solution}";
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if ($input->getOption('describe')) {
            $output->writeln($this->description);
        }
        
        $runtime = -hrtime(true);
        $solution = $this->solveProblem();
        $runtime += hrtime(true);

        $output->writeln("Solution: {$solution}");
        if ($input->getOption('timed')) {
            $output->writeln("Time: " . ($runtime / 1e+6) . " microseconds.");
        }

        return Command::SUCCESS;
    }
}
