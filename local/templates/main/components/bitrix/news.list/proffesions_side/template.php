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
use \Wptt\Counter as Counter;
use \Wptt\Main as Main;
?>
<div class="sidebar__wrap">
    <h3 class="sidebar__title">
        Популярные профессии
    </h3>
    <div class="sidebar__block">
        <? foreach ($arResult['ITEMS'] as $arItem):?>
        <? $counter = Counter::getCountForProffesion($arItem['PROPERTIES']['STUDYING_PROGRAMS']['VALUE'], $arItem['PROPERTIES']['DIRECTION']['VALUE']);?>
        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="sidebar__row">
            <div class="sidebar__subtitle">
                <?=$arItem['NAME']?>
            </div>
            <div class="sidebar__block-description">
                <p><?=$counter['PROGRAMS']?> <?=Main::num2word($counter['PROGRAMS'], ['программа','программы','программ'])?>,</p>
                <p><?=$counter['SCHOOLS']?> <?=Main::num2word($counter['SCHOOLS'], ['учебное заведение','учебных заведений','учебных заведений'])?></p>
            </div>
        </a>
        <? endforeach;?>
    </div>
</div>

