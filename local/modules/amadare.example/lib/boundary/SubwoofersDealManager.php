<?php

namespace amadare\example\boundary;


use amadare\example\controller\SubwooferParser;
use amadare\example\entity\Subwoofer;

class SubwoofersDealManager
{
    public array $subwoofers;
    public SubwooferParser $subwooferParser;

    public function act()
    {
        $this->prepareSubwoofers();

        foreach ($this->subwoofers as $subwoofer) {
            $this->pushSubwooferToDeal($subwoofer);
        }
    }

    public function pushSubwooferToDeal(Subwoofer $subwoofer)
    {
        \Bitrix\Main\Loader::includeModule('crm');
        $arFields = array(

            'TITLE' => $subwoofer->name,
            'UF_CRM_1715707651' => $subwoofer->desc,
            'CURRENCY_ID' => 'RUB',
            'UF_CRM_1715707621' => $subwoofer->power,
            'OPPORTUNITY' => $subwoofer->price,
        );

        $deal = new \CCrmDeal();
        $deal->Add($arFields);
    }

    public function __construct()
    {
        $this->subwooferParser = new SubwooferParser();
    }

    public function prepareSubwoofers()
    {
        $this->subwoofers = $this->subwooferParser->getSubwoofers();
    }
}