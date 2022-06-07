<?php

namespace Test\CmsBlocks\Model\ResourceModel\View;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Test\CmsBlocks\Model\View as Model;
use Test\CmsBlocks\Model\ResourceModel\View as ResourceModel;

class Collection  extends AbstractCollection
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }

//    public function toOptionArray()
//    {
//        foreach ($this as $item) {
//            $res = $item->getData('country_fieldset');
//        }
//        return $res;
//    }
}
