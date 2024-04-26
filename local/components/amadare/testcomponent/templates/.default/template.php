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
<?php foreach ($arResult['USERS'] as $user) : ?>
    <div class="ui-form ui-form-section">
        <div class="ui-form-row">
            <div class="ui-form-label">
                <div class="ui-ctl-label-text">
                    Имя
                    <span data-hint="Моя первая подсказка" data-hint-init="y" class="ui-hint">
		</span>
                </div>
            </div>
            <div class="ui-form-content">
                <div class="ui-form-row">
                    <label class="ui-ctl ui-ctl-checkbox">
                        <div class="ui-ctl-label-text"> <?php echo $user->name; ?></div>
                    </label>
                </div>
            </div>
        </div>
        <div class="ui-form-row">
            <div class="ui-form-label">
                <div class="ui-ctl-label-text">
                    Фамилия
                    <span data-hint="Моя первая подсказка" data-hint-init="y" class="ui-hint">
		</span>
                </div>
            </div>
            <div class="ui-form-content">
                <div class="ui-form-row">
                    <label class="ui-ctl ui-ctl-checkbox">
                        <div class="ui-ctl-label-text"><?php echo $user->lastName; ?></div>
                    </label>
                </div>
            </div>
        </div>
        <div class="ui-form-row">
            <div class="ui-form-label">
                <div class="ui-ctl-label-text">
                    Отчество
                    <span data-hint="Моя первая подсказка" data-hint-init="y" class="ui-hint">
		</span>
                </div>
            </div>
            <div class="ui-form-content">
                <div class="ui-form-row">
                    <label class="ui-ctl ui-ctl-checkbox">
                        <div class="ui-ctl-label-text"><?php echo $user->secondName; ?></div>
                    </label>
                </div>
            </div>
        </div>
        <div class="ui-form-row">
            <div class="ui-form-label">
                <div class="ui-ctl-label-text">
                    Дата регистрации
                    <span data-hint="Моя первая подсказка" data-hint-init="y" class="ui-hint">
		</span>
                </div>
            </div>
            <div class="ui-form-content">
                <div class="ui-form-row">
                    <label class="ui-ctl ui-ctl-checkbox">
                        <div class="ui-ctl-label-text"><?php echo $user->dateRegister; ?></div>
                    </label>
                </div>
            </div>
        </div>
        <div class="ui-form-row">
            <div class="ui-form-label">
                <div class="ui-ctl-label-text">
                    Последний раз заходил
                    <span data-hint="Моя первая подсказка" data-hint-init="y" class="ui-hint">
		</span>
                </div>
            </div>
            <div class="ui-form-content">
                <div class="ui-form-row">
                    <label class="ui-ctl ui-ctl-checkbox">
                        <div class="ui-ctl-label-text"><?php echo $user->lastLogin; ?></div>
                    </label>
                </div>
            </div>
        </div>
        <div class="ui-form-row">
            <div class="ui-form-label">
                <div class="ui-ctl-label-text">
                    Местоположение
                    <span data-hint="Моя первая подсказка" data-hint-init="y" class="ui-hint">
		</span>
                </div>
            </div>
            <div class="ui-form-content">
                <div class="ui-form-row">
                    <label class="ui-ctl ui-ctl-checkbox">
                        <div class="ui-ctl-label-text"><?php echo $user->timezone; ?></div>
                    </label>
                </div>
            </div>
        </div>
        <div class="ui-form-row">
            <div class="ui-form-label">
                <div class="ui-ctl-label-text">
                    Почта
                    <span data-hint="Моя первая подсказка" data-hint-init="y" class="ui-hint">
		</span>
                </div>
            </div>
            <div class="ui-form-content">
                <div class="ui-form-row">
                    <label class="ui-ctl ui-ctl-checkbox">
                        <div class="ui-ctl-label-text"><?php echo $user->email; ?></div>
                    </label>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

