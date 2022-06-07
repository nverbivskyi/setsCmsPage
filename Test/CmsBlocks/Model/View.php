<?php

namespace Test\CmsBlocks\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Test\CmsBlocks\Api\Data\ViewInterface;

class View extends AbstractModel implements ViewInterface, IdentityInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'test_cmsblocks_view';

    /**
     * Post Initialization
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Test\CmsBlocks\Model\ResourceModel\View');
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->getData(self::PAGE_ID);
    }

    /**
     * @return string|null
     */
    public function getCountryFieldset(): ?string
    {
        return $this->getData(self::COUNTRY_FIELDSET);
    }

    /**
     * Return identities
     * @return string[]
     */
    public function getIdentities(): array
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Set Country
     *
     * @param $country
     * @return $this
     */
    public function setCountryFieldset($country): View
    {
        return $this->setData(self::COUNTRY_FIELDSET, $country);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id): View
    {
        return $this->setData(self::PAGE_ID, $id);
    }
}
