<?php

namespace RLTSquare\FlowerShop\Model\Adminhtml\Customer;

use Magento\Customer\Model\ResourceModel\Group\CollectionFactory;
use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class for get customer groups
 */
class Group implements ArrayInterface
{

    protected $_options;
    /**
     * @var CollectionFactory
     */
    private CollectionFactory $_groupCollectionFactory;

    /**
     * @param CollectionFactory $groupCollectionFactory
     */
    public function __construct(CollectionFactory $groupCollectionFactory)
    {
        $this->_groupCollectionFactory = $groupCollectionFactory;
    }

    /**
     * @return array
     */
    public function toOptionArray()
    {
        if (!$this->_options) {
            $this->_options = $this->_groupCollectionFactory->create()->loadData()->toOptionArray();
        }
        return $this->_options;
    }
}
