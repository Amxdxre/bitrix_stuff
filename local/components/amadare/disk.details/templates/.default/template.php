<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

\Bitrix\Main\UI\Extension::load('ui.layout-form');

/**
 * @var $arParams
 * @var $arResult
 */
?>

<?php foreach ($arResult['FILES'] as $file) : ?>
    <div class="ui-form ui-form-section">
        <div class="ui-form-row">
            <div class="ui-form-label">
                <div class="ui-ctl-label-text">
                    Имя файла
                    <span data-hint="Моя первая подсказка" data-hint-init="y" class="ui-hint">
		</span>
                </div>
            </div>
            <div class="ui-form-content">
                <div class="ui-form-row">
                    <label class="ui-ctl ui-ctl-checkbox">
                        <div class="ui-ctl-label-text"> <?php echo $file->name; ?></div>
                    </label>
                </div>
            </div>
        </div>
        <div class="ui-form-row">
            <div class="ui-form-label">
                <div class="ui-ctl-label-text">
                    Размер файла
                    <span data-hint="Моя первая подсказка" data-hint-init="y" class="ui-hint">
		</span>
                </div>
            </div>
            <div class="ui-form-content">
                <div class="ui-form-row">
                    <label class="ui-ctl ui-ctl-checkbox">
                        <div class="ui-ctl-label-text"><?php echo $file->size ; ?> байт</div>
                    </label>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>