<?php

namespace amadare\example\controller;

use Bitrix\Main\Engine\Controller;
use Bitrix\Main\UserTable;

class Api extends Controller
{
    public function getUserDataAction()
    {
        $allUsers = UserTable::query()->setSelect(array('ID', 'LAST_NAME'))->fetchAll();
        return $allUsers;
    }
}