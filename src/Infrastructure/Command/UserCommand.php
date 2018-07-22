<?php

namespace App\Infrastructure\Command;

use App\Domain\User\UserCollection;
use App\Domain\User\UserReader;
use App\Infrastructure\User\UserTransformer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UserCommand extends Command
{
    /** @var UserReader[] */
    private $readers;

    public function __construct(?string $name = null, UserReader ...$readers)
    {
        parent::__construct($name);
        $this->readers = $readers;
    }

    protected function configure(): void
    {
        $this
            ->setName('read:user')
            ->setDescription('set xml/json resource read: like xml');
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $users = new UserCollection();

        foreach ($this->readers as $reader) {
            $users->addUsers($reader->read());
        }

        $table = new Table($output);
        $table
            ->setHeaders(['Nombre', 'Email', 'Teléfono', 'Empresa'])
            ->setRows(UserTransformer::transform($users));

        $table->render();
    }

}