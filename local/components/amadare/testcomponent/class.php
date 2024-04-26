<?php

/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}


class TestComponent extends CBitrixComponent
{
    /** TODO : Implement new class for user object. */
    private function prepareUserObject()
    {
        return new class {
            public $name;
            public $lastName;
            public $dateRegister;
            public $lastLogin;
            public $secondName;
            public $email;
            public $timezone;
        };
    }


    public function executeComponent()
    {
        $this->arResult['USERS'] = $this->processAllUserData();
        $this->includeComponentTemplate();
    }

    private function getAllUserData()
    {
        $rawUserData = \Bitrix\Main\UserTable::query()->setSelect(array('*'))->fetchAll();
        return $rawUserData;
    }

    private function processAllUserData()
    {
        $allUserData = $this->getAllUserData();
        $users = array();
        foreach ($allUserData as $user) {
            $userObject = $this->prepareUserObject();
            $userObject->name = $user['NAME'];
            $userObject->lastName = $user['LAST_NAME'];
            $userObject->dateRegister = $user['DATE_REGISTER'];
            $userObject->lastLogin = $user['LAST_LOGIN'];
            $userObject->secondName = $user['SECOND_NAME'];
            $userObject->email = $user['EMAIL'];
            $userObject->timezone = $this->detectUserTimeZone($user['DATE_REGISTER']);
            $users[] = $userObject;
        }
        return $users;
    }

    private function detectUserTimeZone($userDate)
    {
        /** @var \Bitrix\Main\Type\DateTime $usertimezone */
        $usertimezone = $userDate;
        $timezoneName = $usertimezone->getTimeZone()->getName();
        return $timezoneName;
    }

}

