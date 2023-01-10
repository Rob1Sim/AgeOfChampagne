<?php
// src/Command/CreateUserCommand.php
namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Factory\CompteFactory;


// the name of the command is what users type after "php bin/console"
#[AsCommand(
    name: 'app:create-user',
    description: 'Créer un nouvel utilisateur.',
    aliases: ['app:add-user'],
    hidden: false
)]
class CreateUserCommand extends Command
{

    private string $mdp;
    private string $email;
    private string $role;

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // ... put here the code to create the user
        CompteFactory::createOne(['email' => 'root@example.fr', 'roles' => ['ROLE_ADMIN'], 'login' => 'Admin']);
        // this method must return an integer number with the "exit status code"
        // of the command. You can also use these constants to make code more readable

        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))
        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;

        // or return this to indicate incorrect command usage; e.g. invalid options
        // or missing arguments (it's equivalent to returning int(2))
        // return Command::INVALID
    }

    protected function configure(): void
    {
        $this
            ->addArgument("Email",InputArgument::REQUIRED,"Email de l'utilisateur")
            ->addArgument('mot de passe',InputArgument::REQUIRED,"Mot de passe de l'utilisateur")
            ->addArgument('Rôle',InputArgument::REQUIRED,"Rôle de l'utilisateur(admin,premium,user")
            ->setHelp('Email, mot de passe, rôle')
        ;
    }
}