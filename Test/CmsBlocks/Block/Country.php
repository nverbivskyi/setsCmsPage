<?php

namespace Test\CmsBlocks\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Test\CmsBlocks\Model\ResourceModel\View\CollectionFactory as ViewCollectionFactory;

class Country extends Template
{
    /**
     * CollectionFactory
     * @var null|ViewCollectionFactory
     */
    protected $viewCollectionFactory = null;

    /**
     * Constructor
     *
     * @param Context $context
     * @param ViewCollectionFactory $viewCollectionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        ViewCollectionFactory $viewCollectionFactory,
        array $data = []
    ) {
        $this->viewCollectionFactory  = $viewCollectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return mixed
     */
    public function getCollection()
    {
        $viewCollection = $this->viewCollectionFactory ->create();
        $viewCollection->addFieldToSelect('*')->load();
        return $viewCollection->getItems();
    }


//    /**
//     * @param $viewId
//     * @return string
//     */
//    public function getArticleUrl($viewId) {
//        return $this->getUrl('blog/index/view/'.$view->getId(), ['_secure' => true]);
//    }
}
