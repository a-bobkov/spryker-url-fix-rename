<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\Url\Communication\Form;

use Spryker\Zed\Gui\Communication\Form\AbstractForm;
use Symfony\Component\Validator\Constraints;

class UrlForm extends AbstractForm
{

    /**
     * @return void
     */
    protected function buildFormFields()
    {
        // @todo: Implement buildFormFields() method.
    }

    /**
     * @return void
     */
    protected function populateFormFields()
    {
        // @todo: Implement populateFormFields() method.
    }

    /**
     * @return array
     */
    protected function getDefaultData()
    {
        return [
        ];
    }

    /**
     * @todo add constraints
     *
     * @return array
     */
    public function addFormFields()
    {
        $fields = [];
        $fields[] = $this->addField('url')
            ->setLabel('Url')
            ->setConstraints([
                new Constraints\Required([
                    new Constraints\Type([
                        'type' => 'string',
                    ]),
                    new Constraints\NotBlank(),
                ]),
            ]);
        $fields[] = $this->addField('fk_locale')
            ->setAccepts($this->getLocales());
        $fields[] = $this->addField('resource_type')
            ->setAccepts($this->getResourceTypes());
        $fields[] = $this->addField('resource')
            ->setRefresh(true)
            ->setAccepts($this->getResources());

        return $fields;
    }

    public function getResources()
    {
        $data = $this->getRequestData();

        if (isset($data['resource'])) {
            if ($data['resource'][0] === 'A') {
                return [
                    'value' => 3,
                    'label' => 'Alalal',
                ];
            }

            if ($data['resource'][0] === 'B') {
                return [
                    'value' => 3,
                    'label' => 'Bobobo',
                ];
            }
        }

        return [];
    }

    public function getResourceTypes()
    {
        return [
            [
                'value' => 'category',
                'label' => 'Category',
            ],
            [
                'value' => 'redirect',
                'label' => 'Redirect',
            ],
        ];
    }

    /**
     * @return array
     */
    public function getLocales()
    {
        $locales = $this->getLocaleQueryContainer()
            ->queryLocales()
            ->find()
            ->toArray();

        return $this->formatLocalesArray($locales);
    }

    /**
     * @return \Spryker\Zed\Locale\Persistence\LocaleQueryContainer
     */
    public function getLocaleQueryContainer()
    {
        return $this->getLocator()->locale()->queryContainer();
    }

    /**
     * @param $locales
     *
     * @return array
     */
    protected function formatLocalesArray($locales)
    {
        foreach ($locales as &$item) {
            $item = [
                'value' => $item['IdLocale'],
                'label' => $item['LocaleName'],
            ];
        }

        return $locales;
    }

}
