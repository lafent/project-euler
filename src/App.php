<?php declare(strict_types=1);

namespace ProjectEuler;

use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Console\Output\OutputInterface;

class App extends BaseApplication
{
    public function __construct(iterable $commands)
    {
        $commands = $commands instanceof Traversable ? iterator_to_array($commands) : $commands;

        foreach ($commands as $command) {
            $this->add($command);
        }

        parent::__construct();
    }
}
