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

<section class="articles wow fadeInUp">
    <div class="container">
        <div class="articles__title <?= $arParams['SHOW_HIDDEN_ARTICLE'] === 'Y' ? '' : 'articles__title_hidden'?>">
            Полезно знать
        </div>
        <div class="articles-body">
            <? foreach ($arResult['ITEMS'] as $arItem):?>
            <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="article">
                <div class="article__image" style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>');">
                </div>
                <div class="article__date"><?=FormatDateFromDB($arItem['DATE_ACTIVE_FROM'], 'DD MMMM YYYY')?></div>
                <div class="article__description">
                    <?/*=mb_strimwidth($arItem['PREVIEW_TEXT'], 0, 195, "...");*/?>
                    <?=$arItem['NAME']?>
                </div>
            </a>
            <? endforeach;?>
        </div>
        <div class="articles__btn">
            <a href="/good-to-know/" class="btn">
                Все статьи
            </a>
        </div>
    </div>
</section>

