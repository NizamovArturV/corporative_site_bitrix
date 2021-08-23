<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="sidebar__wrap">
    <h3 class="sidebar__title">
        Популярные программы
    </h3>
    <div class="sidebar__block">
        <?php foreach ($arResult['ITEMS'] as $arItem):?>
        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="sidebar__row">
            <div class="sidebar__subtitle">
                <?=$arItem['NAME']?>
            </div>
            <p><?=$arItem['PROPERTIES']['SCHOOL']['ITEM']['PROPS']['CITY']['VALUE']?>, <?=$arItem['PROPERTIES']['SCHOOL']['ITEM']['FIELDS']['NAME']?></p>
        </a>
        <? endforeach;?>
    </div>
</div>

