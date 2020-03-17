<?php

namespace App\Command;

use App\Service\NotificationService;
use App\Entity\User;
use App\Provider\SesProvider;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SendNotificationCommand extends Command
{
    protected static $defaultName = 'SendNotificationCommand';
    private $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;

        parent::__construct();
    }
    
    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::REQUIRED, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You passed an argument id user: %s', $arg1));
            $user = new User();
            $message = 'Este es el texto de un mensaje de notificación desde su uso por el proveedor de envío ses, a través de la consola';
            $proveedor = new SesProvider(); 
            $resultNotify = $this->notificationService->notify($user, $message, $proveedor);
            $io->note(sprintf('id: %s', $user->getId()));
            $io->note(sprintf('email: %s', $user->getEmail()));
            $io->note(sprintf('message: %s', $message));
            $io->note(sprintf('result: %s', $resultNotify));
            
            $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
        }else{
            $io->error('Se necesita id del usuario como argumento');
        }
          

        if ($input->getOption('option1')) {
            // ...
        }
        return 0;
    }
}
