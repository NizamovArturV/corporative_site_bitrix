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
<div class="news-opened__date">
    <!-- 17 июня 2021 -->
</div>
<h2 class="news-opened__title">
    <?=$arResult['NAME']?>
</h2>
<div class="big-block__wrap">
    <div class="big-block">
        <div class="big-block__content">
            <div class="news-opened__image" style="background-image: url('<?=$arResult['DETAIL_PICTURE']['SRC']?>');">
                <!-- <img src="/images/news/news-big.jpg" alt=""> -->
            </div>
            <div class="news-opened__text-wrap">
                <?=$arResult['DETAIL_TEXT']?>

            </div>
        </div>