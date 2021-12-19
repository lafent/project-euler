<?php declare(strict_types=1);

namespace ProjectEurler\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DisplayEnvironmentCommand extends Command 
{
    /**
     * The name of the command.
     *
     * @var string
     */
    protected static $defaultName = 'project-euler:display-environment';
    protected $client = null;

    /**
     * {@inheritdoc}
     */
    protected function configure(): void
    {
        $this->setDescription('Gets the Project Euler environment') 
             ->setHelp('This command allows you to query the environment.')
         ;
    }

    public function __construct()
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("Server Version: ");

        return Command::SUCCESS;
    }
}
