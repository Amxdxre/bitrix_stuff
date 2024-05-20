<?php

namespace amadare\example\controller;

use Bitrix\Crm\DealTable;
use Bitrix\Main\Engine\Controller;
use Bitrix\Main\UserTable;

class Api extends Controller
{
    public function getUserDataAction()
    {
        $allUsers = UserTable::query()->setSelect(array('ID', 'LAST_NAME'))->fetchAll();
        return $allUsers;
    }

    public function addPerfumeAction()
    {
        $request = $this->getRequest();
        $producer = $request->get('producer');
        $name = $request->get('name');
        $producerCountry = $request->get('producer_country');
        $value = $request->get('value');
        $price = $request->get('price');
        $perfumeRepository = new PerfumeRepository();
        $perfumeRepository->create($producer,$name,$value,$price,$producerCountry);

    }

    public function getExpenseAction()
    {
        \Bitrix\Main\Loader::requireModule('crm');

        $arFields = array(
            'UF_CRM_1715713586',
        );

        $arDeals = DealTable::getList(array(
            'select' => $arFields,
            'filter' => array('!STAGE_SEMANTIC_ID' => array('F', 'S'))

        ))->fetchAll();

        $sum = 0;

        foreach ($arDeals as $value) {
            $sum = $sum + (float)$value['UF_CRM_1715713586'];
        }
        return $sum;
    }
}