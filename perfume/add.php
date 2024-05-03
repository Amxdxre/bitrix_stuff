<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');

global $APPLICATION;
$APPLICATION->SetTitle('Добавьте данные парфюмерии');
$APPLICATION->IncludeComponent('amadare:perfume.add','');
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');