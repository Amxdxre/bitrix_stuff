<?php

namespace amadare\example;

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
        if (preg_match('@(crm/deal/category/[0-9]{0,100})@i',$page)) {
            ob_start();
            ?>
            <script>
                BX.ajax.runAction('amadare:example.api.Api.getExpense').then(
                    function (data) {
                        Expense = document.getElementById('Expense');
                        if (Expense == undefined || Expense == null)
                        {
                            let div = document.createElement('div');
                            div.id = "Expense";
                            div.innerHTML = "Расход : "+data.data;
                            let list = document.querySelector('#crm_deal_list_v12_c_0_row_count_wrapper');
                            list.append(div);
                        }})
                console.log('Хуй')
            </script>
            <?php
            $script = ob_get_clean();
            Asset::getInstance()->addString($script);
        }
    }
}