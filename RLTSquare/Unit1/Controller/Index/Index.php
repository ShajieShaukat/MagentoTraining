<?php

declare(strict_types=1);

namespace RLTSquare\Unit1\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\View\Result\PageFactory;
use RLTSquare\Unit1\Helper\Email;

/**
 * class for showing a string
 */
class Index implements ActionInterface
{
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;
    /**
     * @var PageFactory
     */
    private PageFactory $pageFactory;
    /**
     * @var Email
     */
    protected Email $helperEmail;

    /**
     * @param LoggerInterface $logger
     * @param PageFactory $pageFactory
     * @param Email $helperEmail
     */
    public function __construct(
        LoggerInterface $logger,
        PageFactory $pageFactory,
        Email $helperEmail,
    ) {
        $this->logger = $logger;
        $this->pageFactory = $pageFactory;
        $this->helperEmail = $helperEmail;
    }

    /**
     * @inheriDoc
     */
    public function execute()
    {
        $this->helperEmail->sendEmail();
        $this->logger->info('Page Visited');
        return $this->pageFactory->create();
    }
}
