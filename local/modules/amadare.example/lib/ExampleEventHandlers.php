<?php

namespace amadare\example;

use Bitrix\Crm\DealTable;
use Bitrix\Main\Diag\Debug;
use Bitrix\Main\Page\Asset;

class ExampleEventHandlers
{
    public static function onBeforeUserAddHandler($parameters)
    {
        Debug::dumpToFile($parameters, 'parameters', '__DEBUG.htm');
    }

    public static function onPrologHandler()
    {
        global $APPLICATION;
        $page = $APPLICATION->GetCurPage();
        if (preg_match('@(crm/deal/category/[0-9]{0,100})@i', $page)) {
            ob_start();
            ?>
            <script>
                BX.ajax.runAction('amadare:example.api.Api.getExpense').then(
                    function (data) {
                        Expense = document.getElementById('Expense');
                        if (Expense == undefined || Expense == null) {
                            let div = document.createElement('div');
                            div.id = "Expense";
                            div.innerHTML = "Расход : " + data.data;
                            let list = document.querySelector('#crm_deal_list_v12_c_0_row_count_wrapper');
                            list.append(div);
                        }
                    })
                console.log('Хуй')
            </script>
            <?php
            $script = ob_get_clean();
            Asset::getInstance()->addString($script);
        }
    }

    public static function onBeforeDealUpdateHandler(&$fields)
    {
        global $USER_FIELD_MANAGER;
        $userFields = $USER_FIELD_MANAGER->GetUserFields(DealTable::getUfId(), $fields['ID']);

        ?>
        <script>
        function validateFormBaseСost(){

        var x=document.forms["myForm"]["fname"].value;

        if (x==null || x=="")
                      {
                      alert("Необходимо заполнить поле Имя!");
                      return false;
                      }
        }
        </script>

        <?php

        if ((float)$fields['UF_CRM_1715954019342'] <= 100000) {
            $fields['UF_CRM_1715954072224'] = 26;
        }
        if ((float)$fields['UF_CRM_1715954019342'] >= 500000) {
            $fields['UF_CRM_1715954072224'] = 27;
        }
        if ((float)$fields['UF_CRM_1715954019342'] >= 1000000) {
            $fields['UF_CRM_1715954072224'] = 28;
        }

        $taxTypeID = $fields['UF_CRM_1715954072224'];


        if ($taxTypeID == 26 && $taxTypeID != $userFields['UF_CRM_1715954072224']['VALUE']) {
            $fields['UF_CRM_1715954141476'] = 29;
        }

        if ($taxTypeID == 27 && $taxTypeID != $userFields['UF_CRM_1715954072224']['VALUE']) {
            $fields['UF_CRM_1715954141476'] = 30;
        }

        if ($taxTypeID == 28 && $taxTypeID != $userFields['UF_CRM_1715954072224']['VALUE']) {
            $fields['UF_CRM_1715954141476'] = 31;
        }

        $percentTaxTypeID = $fields['UF_CRM_1715954141476'];
        if ($percentTaxTypeID == 29) {
            $taxPercent = 6;
            $formuleResult = (((float)$fields['UF_CRM_1715954019342'] / 100) * $taxPercent) + (float)$fields['UF_CRM_1715954019342'];
            $fields['UF_CRM_1715954091791'] = $formuleResult;

        }
        if ($percentTaxTypeID == 30) {
            $taxPercent = 20;
            $formuleResultBefore = (((float)$fields['UF_CRM_1715954019342'] / 100) * $taxPercent) + (float)$fields['UF_CRM_1715954019342']; 
            $fields['UF_CRM_1715954091791'] = $formuleResultBefore;
            $formuleResultAfter = (((float)$fields['UF_CRM_1715954091791'] / 100) * $taxPercent) + (float)$fields['UF_CRM_1715954019342'];
            $fields['UF_CRM_1715954091791'] = $formuleResultAfter;

        }
        if ($percentTaxTypeID == 31) {
            $taxPercent = 31;
            $formuleResultBefore = (float)$fields['UF_CRM_1715954019342'] * 100;
            $fields['UF_CRM_1715954091791'] = $formuleResultBefore;
            $formuleResultMiddle = $fields['UF_CRM_1715954091791'] / 100 * $taxPercent;
            $fields['UF_CRM_1715954091791'] = $formuleResultMiddle;
            $formuleResultFour = $fields['UF_CRM_1715954091791'] / 100 * $taxPercent;
            $fields['UF_CRM_1715954091791'] = $formuleResultFour;
            $formuleResultAfter = $fields['UF_CRM_1715954091791'] - $formuleResultMiddle;
        }

    }

}