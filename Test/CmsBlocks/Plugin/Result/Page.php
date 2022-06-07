<?php
declare(strict_types=1);

namespace Test\CmsBlocks\Plugin\Result;

use Magento\Framework\App\Request\Http;
use Magento\Cms\Controller\Page\View;
use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Cms\Helper\Page as PageHelper;
use Test\CmsBlocks\Block\Country;

class Page
{
    /**
     * @var Http
     */
    private Http $request;

    /**
     * @var PageRepositoryInterface
     */
    private PageRepositoryInterface $pageFactory;

    /**
     * @var PageHelper
     */
    private PageHelper $pageHelper;

    /**
     * @var Country
     */
    private Country $country;

    /**
     * @param Http $request
     * @param PageRepositoryInterface $pageFactory
     * @param PageHelper $pageHelper
     */
    public function __construct(
        Http $request,
        PageRepositoryInterface $pageFactory,
        PageHelper $pageHelper,
        Country $country
    ){
        $this->request = $request;
        $this->pageFactory = $pageFactory;
        $this->pageHelper = $pageHelper;
        $this->country = $country;
    }

    /**
     * @param View $subject
     * @return ResultInterface
     * @throws LocalizedException
     */
    public function afterExecute(View $subject): ResultInterface
    {
        $pageId = $this->request->getParam('page_id');
        $page = $this->pageFactory->getById($pageId);
        $pageIdentifier = $page->getIdentifier();
        $pageCollection = $this->country->getCollection();
        $resultPage = $this->pageHelper->prepareResultPage($subject, '1');

        foreach ($pageCollection as $page) {
            $countryValue = $page->getData('country_fieldset');

            if ($pageIdentifier === 'about-us') {
                switch ($countryValue) {
                    case 'us':
                        $resultPage = $this->pageHelper->prepareResultPage($subject, '1');
                        break;
                    case 'ua':
                        $resultPage = $this->pageHelper->prepareResultPage($subject, '2');
                        break;
                }
            }
        }

        return $resultPage;
    }
}
