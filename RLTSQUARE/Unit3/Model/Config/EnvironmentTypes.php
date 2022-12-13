<?php

namespace RLTSquare\Unit3\Model\Config;

use Magento\Framework\Data\OptionSourceInterface;

class EnvironmentTypes implements OptionSourceInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {

        return [
            ['value' => 0, 'label' => __('Production')],
            ['value' => 1, 'label' => __('Staging')],
            ['value' => 2, 'label' => __('Development')],
        ];
    }
}
