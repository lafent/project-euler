<?php declare(strict_types=1);

namespace ProjectEuler\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ProblemTwoCommand extends Command 
{
    /**
     * The name of the command.
     *
     * @var string
     */
    protected static $defaultName = 'project-euler:problem-2';
    protected string $description = "Each new term in the Fibonacci sequence is generated by adding the previous two terms. By starting with 1 and 2, the first 10 terms will be:" . PHP_EOL .
        PHP_EOL . 
        "1, 2, 3, 5, 8, 13, 21, 34, 55, 89, ..." . PHP_EOL .
        PHP_EOL . 
        "By considering the terms in the Fibonacci sequence whose values do not exceed four million, find the sum of the even-valued terms." . PHP_EOL;

    /**
     * {@inheritdoc}
     */
    protected function configure(): void
    {
        $this->setDescription('Generates the solution for Problem 2.') 
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

    private function generateFibonacci(int $max_value) : array
    {
        $sequence = [1, 2];

        $value = $sequence[count($sequence) - 2] + $sequence[count($sequence) - 1];

        while ($value < $max_value) {
            $sequence[] = $value;
            $value = $sequence[count($sequence) - 2] + $sequence[count($sequence) - 1];
        }

        return $sequence;
    }

    private function solveProblem() : string
    {
        $solution = 0;

        $fib = $this->generateFibonacci(4000000);

        foreach($fib as $v) {
            if ($v % 2 === 0) {
                $solution += $v;
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
