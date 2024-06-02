<?php

namespace amadare\example\controller;

class TaxCalculator
{
    public function getFields(){
        \Bitrix\Main\Loader::includeModule('crm');
        $fields = \CCrmDeal::GetList()->arUserFields;

    }
}