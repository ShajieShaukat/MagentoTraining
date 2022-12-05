<?php
declare(strict_types=1);

namespace RLTSquare\Ccq\Api\Data;

interface QueueDataInterface
{
    /**
     * @return void
     * @param string $data
     */
    public function setData(string $data) : void;

    /**
     * @return string
     */
    public function getData(): string;

}
