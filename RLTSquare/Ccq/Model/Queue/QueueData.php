<?php

declare(strict_types=1);

namespace RLTSquare\Ccq\Model\Queue;

class QueueData implements \RLTSquare\Ccq\Api\Data\QueueDataInterface
{

    /**
     * @var string
     */
    protected $data;

    /**
     * @param string $data
     * @return void
     */
    public function setData(string $data): void
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }
}
