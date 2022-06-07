<?php

namespace Test\CmsBlocks\Ui\Component\Form;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Ui\Component\Form\FieldFactory;
use Magento\Ui\Component\Form\Fieldset;

class Country  extends Fieldset
{
    protected $fieldFactory;

    public function __construct(
        ContextInterface $context,
        FieldFactory $fieldFactory,
        array $components = [],
        array $data = [])
    {
        parent::__construct($context, $components, $data);
        $this->fieldFactory = $fieldFactory;
    }
    public function getChildComponents()
    {
        $options = [
            0 => [
                'label' => 'Test1',
                'value' => 1
            ],
            1  => [
                'label' => 'Test2',
                'value' => 2
            ],
            2 => [
                'label' => 'Test3',
                'value' => 3
            ],
        ];
        $fields = [
            [
                'label' => __('Country'),
                'options' => $options,
                'formElement' => 'select',
            ],
        ];
        foreach ($fields as $key => $field) {
            $fieldInstance = $this->fieldFactory->create();
            $name = 'custom_field_' . $key;
            $fieldInstance->setData(
                [
                    'config' => $field,
                    'name' => $name
                ]
            );
            $fieldInstance->prepare();
            $this->addComponent($name, $fieldInstance);
        }
        return parent::getChildComponents();
    }
}
