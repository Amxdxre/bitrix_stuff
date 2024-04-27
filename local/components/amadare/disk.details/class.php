<?php

use Bitrix\Disk\Driver;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */

/** @global CMain $APPLICATION */
class DiskDataComponent extends CBitrixComponent
{
    private function prepareFileObject()
    {
        return new class {
            public $name;
            public $size;
        };
    }

    public function executeComponent()
    {
        $this->arResult['FILES'] = $this->processFilesData();
        $this->includeComponentTemplate();
    }

    private function getStorageData()
    {
        \Bitrix\Main\Loader::includeModule('disk');
        $result = \Bitrix\Disk\File::getList(array())->fetchAll();
        return $result;
    }

    private function getFiles()
    {
        $files = $this->getStorageData();
        $storage = array();
        foreach ($files as $file) {
            if ($file['TYPE'] != \Bitrix\Disk\Internals\ObjectTable::TYPE_FILE) {
                continue;
            }
            $storage[] = $file;
        }
        return $storage;
    }

    private function processFilesData()
    {
        $allFilesData = $this->getFiles();
        $files = array();
        foreach ($allFilesData as $dataFile) {
            $fileObject = $this->prepareFileObject();
            $fileObject->name = $dataFile['NAME'];
            $fileObject->size = $dataFile['SIZE'];
            $files[] = $fileObject;
        }
        return $files;
    }
}