<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>
    <ul class="header__menu">

        <?
        foreach ($arResult as $arItem):
            if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                continue;
            ?>

            <? if (isset($arItem['CHILDREN']) && !empty($arItem['CHILDREN'])): ?>
            <li class="js-menu-inner">

                    <a href="javascript:void(0)" class="header__menu-item js-menu-about"><?= $arItem['TEXT'] ?></a>
                    <div class="header__menu-item-hidden-text">
                        <? foreach ($arItem['CHILDREN'] as $children): ?>
                            <a href="<?= $children['LINK'] ?>"><?= $children['TEXT'] ?></a>
                        <? endforeach; ?>
                    </div>
                <? else: ?>
            <li>
                    <a href="<?= $arItem["LINK"] ?>" class="header__menu-item"><?= $arItem["TEXT"] ?></a>
                <? endif; ?>
            </li>


        <? endforeach ?>

    </ul>
<? endif ?>