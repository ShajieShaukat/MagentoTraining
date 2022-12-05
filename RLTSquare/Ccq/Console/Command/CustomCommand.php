<?php

declare(strict_types=1);

namespace RLTSquare\Ccq\Console\Command;

use Magento\Framework\MessageQueue\PublisherInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\Serialize\Serializer\Json;

class CustomCommand extends Command
{
    const TOPIC_NAME = 'rltsquare';
    const Var1 = 'var1';
    const Var2 = 'var2';
    /**
     * @var Json
     */
    protected Json $json;
    /**
     * @var PublisherInterface
     */
    protected PublisherInterface $publisher;
    /**
     * @var LoggerInterface
     */
    protected LoggerInterface $logger;

    /**
     * @param LoggerInterface $logger
     * @param PublisherInterface $publisher
     * @param Json $json
     * @param string|null $name
     */
    public function __construct(
        LoggerInterface $logger,
        PublisherInterface $publisher,
        Json $json,
        string $name = null,
    ) {
        $this->publisher = $publisher;
        $this->logger = $logger;
        $this->json = $json;
        parent::__construct($name);
    }

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->setName('rltsquare:hello:world');
        $this->setDescription('Console command for adding a message into a queue');
        $this->addArgument(
            self::Var1,
            null,
            InputArgument::IS_ARRAY,
            'Var1'
        );
        $this->addArgument(
            self::Var2,
            null,
            InputArgument::IS_ARRAY,
            'Var2'
        );
        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $exitCode = 0;
        $var1 = $input->getArgument(self::Var1);
        $var2 = $input->getArgument(self::Var2);
        $arr = $this->json->serialize(["var1" => $var1, "var2" => $var2]);
        $this->publisher->publish(self::TOPIC_NAME, $arr);
        $this->logger->info($arr);
        return $exitCode;
    }
}
