<?php

namespace amadare\example;

use Bitrix\Main\Diag\Debug;

class ExampleEventHandlers
{
    public static function onBeforeUserAddHandler($parameters)
    {
        Debug::dumpToFile($parameters,'parameters','__DEBUG.htm');
    }
}