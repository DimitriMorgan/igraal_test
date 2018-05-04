<?php

namespace Infrastructure\Command;

use Application\Command\User\SendMailHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SendMail extends Command
{
    public const NAME = 'send-mail';

    /** @var SendMailHandler */
    private $handler;

    public function __construct(SendMailHandler $handler)
    {
        parent::__construct(self::NAME);
        $this->handler = $handler;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName(self::NAME)
            ->setDescription('Send mail to user')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->handler->handle(new \Application\Command\User\SendMail());
    }
}