<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
use \Wptt\Main as Main;
?>
<div class="big-block__content">
    <div class="news-body">
        <? foreach ($arResult['ITEMS'] as $arItem):?>
        <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="news__row">
            <div class="news__image"
                 style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>');"></div>
            <div class="news__text">
                <h4 class="news__title">
                    <?=$arItem['NAME']?>
                </h4>
                <p>
                    Город: <strong><?=$arItem['PROPERTIES']['CITY']['VALUE']?></strong>
                </p>
                <div class="university-programs">
                    <?=$arItem['COUNT_SCHOOLS']?> <?=Main::num2word($arItem['COUNT_SCHOOLS'], ['программа','программы','программ'])?>
                </div>
            </div>
        </a>
        <? endforeach;?>

    </div>
    <?= $arResult["NAV_STRING"] ?>

</div>

