<?php
declare(strict_types=1);

namespace Test\CmsBlocks\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class View extends AbstractDb
{
    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('cms_page', 'page_id');
        $this->_useIsObjectNew = true;
    }
}
