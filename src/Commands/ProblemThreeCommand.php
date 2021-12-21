<?php declare(strict_types=1);

namespace ProjectEuler\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ProblemThreeCommand extends Command 
{
    /**
     * The name of the command.
     *
     * @var string
     */
    protected static $defaultName = 'project-euler:problem-3';
    protected string $description = "" .
        "The prime factors of 13195 are 5, 7, 13 and 29." . PHP_EOL .
        "" . PHP_EOL .
        "What is the largest prime factor of the number 600851475143 ?" . PHP_EOL;

    /**
     * {@inheritdoc}
     */
    protected function configure(): void
    {
        $this->setDescription('Generates the solution for Problem 3.') 
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
        $solution = 0;

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
