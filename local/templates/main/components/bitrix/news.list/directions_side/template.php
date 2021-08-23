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
        Популярные направления
    </h3>
    <div class="sidebar__block">
        <? foreach ($arResult['ITEMS'] as $arItem):?>
        <? $counter = Counter::getCountForDirection($arItem['ID'])?>
        <a href="/professions/?direction=<?=$arItem['CODE']?>" class="sidebar__row">
            <div class="sidebar__subtitle">
                <?=$arItem['NAME']?>
            </div>
            <p>
                <?=$counter['PROFESSIONS']?> <?=Main::num2word($counter['PROFESSIONS'], ['профеессия','профессии','профессий'])?>, <?=$counter['PROGRAMS']?> <?=Main::num2word($counter['PROGRAMS'], ['программа','программы','программ'])?>
            </p>
        </a>
        <? endforeach;?>
    </div>
</div>
