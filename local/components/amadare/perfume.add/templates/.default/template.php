<?php

use Bitrix\UI\Buttons\Button;
use Bitrix\UI\Buttons\Color;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

\Bitrix\Main\UI\Extension::load('ui.layout-form');
$sendButton = new Button();
$sendButton->setColor(Color::SUCCESS);
$sendButton->setText('Отправить');
/**
 * @var $arParams
 * @var $arResult
 */

?>
<input value="<?php echo $sendButton->getUniqId()?>" hidden="hidden" id="sendbutton">
<div class="ui-form">
    <div class="ui-form-row">
        <div class="ui-form-label">
            <div class="ui-ctl-label-text">Название<strong class="requered">*</strong></div>
        </div>
        <div class="ui-form-content">
            <div class="ui-ctl ui-ctl-textbox ui-ctl-w100">
                <input type="text" class="ui-ctl-element" placeholder="The Icon Elixir Eau De Parfum..." id="name">
            </div>
        </div>
    </div>
    <div class="ui-form-row">
        <div class="ui-form-label">
            <div class="ui-ctl-label-text">Производитель<strong class="requered">*</strong></div>
        </div>
        <div class="ui-form-content">
            <div class="ui-ctl ui-ctl-textbox ui-ctl-w100">
                <input type="text" class="ui-ctl-element" placeholder="ANTONIO BANDERAS..." id="producer">
            </div>
        </div>
    </div>    <div class="ui-form-row">
        <div class="ui-form-label">
            <div class="ui-ctl-label-text">Страна производства</div>
        </div>
        <div class="ui-form-content">
            <div class="ui-ctl ui-ctl-textbox ui-ctl-w100">
                <input type="text" class="ui-ctl-element" placeholder="Испания..." id="producer_country">
            </div>
        </div>
    </div>    <div class="ui-form-row">
        <div class="ui-form-label">
            <div class="ui-ctl-label-text">Обьем (мл)<strong class="requered">*</strong></div>
        </div>
        <div class="ui-form-content">
            <div class="ui-ctl ui-ctl-textbox ui-ctl-w100">
                <input type="text" class="ui-ctl-element" placeholder="50..." id="value">
            </div>
        </div>
    </div>    <div class="ui-form-row">
        <div class="ui-form-label">
            <div class="ui-ctl-label-text">Цена ₽<strong class="requered">*</strong></div>
        </div>
        <div class="ui-form-content">
            <div class="ui-ctl ui-ctl-textbox ui-ctl-w100">
                <input type="text" class="ui-ctl-element" placeholder="2494..." id="price">
            </div>
        </div>
    </div>
</div>
<?php
echo $sendButton->render();
?>

