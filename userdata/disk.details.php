<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
global $APPLICATION;
$APPLICATION->SetTitle('Информация о файлах диска');
$APPLICATION->IncludeComponent('amadare:disk.details','');
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');