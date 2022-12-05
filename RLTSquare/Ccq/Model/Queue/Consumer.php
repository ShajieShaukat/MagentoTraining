<?php

declare(strict_types=1);

namespace RLTSquare\Ccq\Model\Queue;

use Psr\Log\LoggerInterface;

class Consumer
{
    /**
     * @var LoggerInterface
     */
    protected $logger;
    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    /**
     * @return void
     */
    public function processMessage()
    {
        $this->logger->info('hello world from rltsquare_hello_world queue job');
    }
}
