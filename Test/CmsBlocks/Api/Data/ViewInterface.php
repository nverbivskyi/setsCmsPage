<?php

namespace Test\CmsBlocks\Api\Data;

interface ViewInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const PAGE_ID            = 'page_id';
    const COUNTRY_FIELDSET   = 'country_fieldset';
    /**#@-*/


    /**
     * Get Created At
     *
     * @return string|null
     */
    public function getCountryFieldset(): ?string;

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set Content
     *
     * @param string $country
     * @return $this
     */
    public function setCountryFieldset($country);

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);
}
