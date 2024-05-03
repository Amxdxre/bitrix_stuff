<?php

namespace amadare\example\entity;

use Bitrix\Main\ORM\Fields\FloatField;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\StringField;

class PerfumeTable extends \Bitrix\Main\Entity\DataManager
{
    public static function getMap()
    {
        return array(
            (new IntegerField('ID'))
                ->configurePrimary()
                ->configureAutocomplete(),
            (new StringField('PRODUCER'))
                ->configureNullable(false)
                ->configureRequired(),
            (new StringField('NAME'))
                ->configureNullable(false)
                ->configureRequired(),
            (new StringField('PRODUCER_COUNTRY')),
            (new FloatField('VALUE'))
                ->configureNullable(false)
                ->configureRequired(),
            (new FloatField('PRICE'))
                ->configureNullable(false)
                ->configureRequired(),
        );
    }

    public static function getTableName()
    {
        return 'example_perfume';
    }
}