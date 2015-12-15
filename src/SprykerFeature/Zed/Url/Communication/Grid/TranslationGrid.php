<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\Url\Communication\Grid;

use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;

class TranslationGrid extends AbstractTable
{

    const ID_LOCALE = 'id_locale';
    const IS_ACTIVE = 'is_active';
    const LOCALE_NAME = 'locale_name';

    /**
     * @return void
     */
    protected function configure(TableConfiguration $config)
    {
        // @todo: Implement configure() method.
    }

    /**
     * @return void
     */
    protected function prepareData(TableConfiguration $config)
    {
        // @todo: Implement prepareData() method.
    }

    public function definePlugins()
    {
        return [
            $this->createDefaultRowRenderer(),
            $this->createPagination(),

            $this->createDefaultColumn()
                ->setName(self::ID_LOCALE)
                ->filterable()
                ->sortable(),

            $this->createDefaultColumn()
                ->setName(self::LOCALE_NAME)
                ->filterable()
                ->sortable(),

            $this->createDefaultColumn()
                ->setName(self::IS_ACTIVE)
                ->filterable()
                ->sortable(),
        ];
    }

}
