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
<div class="news-body">
    <? foreach ($arResult['ITEMS'] as $arItem):?>
    <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="news__row">
        <div class="news__image"
             style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>');"></div>
        <div class="news__text">
            <div class="news__date">
                <?=FormatDateFromDB($arItem['DATE_ACTIVE_FROM'], 'DD MMMM YYYY')?>
            </div>
            <h4 class="news__title">
                <?=$arItem['NAME']?>
            </h4>
            <p>
                <?=mb_strimwidth($arItem['PREVIEW_TEXT'], 0, 195, "...");?>
            </p>
        </div>
    </a>
    <? endforeach;?>
</div>
<?=$arResult["NAV_STRING"]?>

