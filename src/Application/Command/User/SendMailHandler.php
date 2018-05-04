<?php

namespace Application\Command\User;

class SendMailHandler
{
    public function handle(SendMail $command)
    {
        sleep(1);
    }
}