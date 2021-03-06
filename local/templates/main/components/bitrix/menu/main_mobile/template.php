<?

    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
        die();
    } ?>

<?
    if (!empty($arResult)): ?>

        <ul class="header-mobile__menu">

            <?
                foreach ($arResult as $arItem):
                    if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) {
                        continue;
                    } ?>
                    <?
                    if ($arItem["SELECTED"]): ?>
                        <li><a href="<?= $arItem["LINK"] ?>"
                               class="header__menu-item"><?= $arItem["TEXT"] ?></a></li>
                    <?
                    else: ?>
                        <li><a href="<?= $arItem["LINK"] ?>"
                               class="header__menu-item"><?= $arItem["TEXT"] ?></a></li>
                    <?
                    endif ?>

                <?
                endforeach ?>

        </ul>
    <?
    endif ?>