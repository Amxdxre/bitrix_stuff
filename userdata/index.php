<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');

global $APPLICATION;
$APPLICATION->SetTitle('Демонастрационная страница компонента пользователя');
$APPLICATION->IncludeComponent('amadare:testcomponent','');
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');