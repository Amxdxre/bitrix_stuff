<?php

class amadare_example extends CModule
{
    public function __construct()
    {
        $this->MODULE_ID = 'amadare.example';
        $this->MODULE_NAME = 'Пробный модуль';
        $this->MODULE_DESCRIPTION = 'Пробный модуль для развития своих навыков';
        $this->PARTNER_NAME = 'Amadare';
        $this->PARTNER_URI = 'https://github.com/Amxdxre';

        $version = include __DIR__ . '/version.php';

        $this->MODULE_VERSION = $version['VERSION'];
        $this->MODULE_VERSION_DATE = $version['VERSION_DATE'];
    }

    public function DoInstall()
    {
        \Bitrix\Main\ModuleManager::registerModule($this->MODULE_ID);
        \Bitrix\Main\Loader::requireModule($this->MODULE_ID);
        $this->InstallDB();
    }

    public function DoUninstall()
    {
        $this->UnInstallDB();
        \Bitrix\Main\ModuleManager::unRegisterModule($this->MODULE_ID);
    }

    public function InstallDB()
    {
        //region:Подписываюсь на события.
        $eventManager = \Bitrix\Main\EventManager::getInstance();
        $eventManager->registerEventHandler(
            'main',
            'OnBeforeUserAdd',
            $this->MODULE_ID,
            \amadare\example\ExampleEventHandlers::class,
            'onBeforeUserAddHandler'
        );
        //endregion

        //region:Создаю таблицы.
        $connection = \Bitrix\Main\Application::getConnection();
        $isTableExists = $connection->isTableExists(\amadare\example\entity\PerfumeTable::getTableName());
        if (!$isTableExists) {
             \amadare\example\entity\PerfumeTable::getEntity()->createDbTable();
        }
        //endregion
    }

    public function UnInstallDB()
    {
        $eventManager = \Bitrix\Main\EventManager::getInstance();
        $eventManager->unRegisterEventHandler(
            'main',
            'OnBeforeUserAdd',
            $this->MODULE_ID,
            \amadare\example\ExampleEventHandlers::class,
            'onBeforeUserAddHandler'
        );

    }


}