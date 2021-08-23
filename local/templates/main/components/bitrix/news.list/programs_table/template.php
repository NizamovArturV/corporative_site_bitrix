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
use \Wptt\Main as Main;
?>
<div class="catalog__content-programs list-program">
    <div class="list-program__row list-program__header">
        <div class="list-program__program">Программа обучения</div>
        <div class="list-program__descriptions-wrap">
            <div class="list-program__descriptions">
                <div class="list-program__term">Срок</div>
                <div class="list-program__row-mobile">
                    <div class="list-program__form">Форма</div>
                    <div class="list-program__price">Стоимость</div>
                </div>
            </div>
        </div>
    </div>
    <? foreach ($arResult['ITEMS'] as $arItem):?>
    <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="list-program__row">
        <div class="list-program__program">
            <div class="list-program__image" style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC'] ?? $arItem['PROPERTIES']['SCHOOL']['ITEM']['FIELDS']['PREVIEW_PICTURE']?>');">
            </div>
            <div class="list-program__text">
                <div class="list-program__program-title">
                    <?=$arItem['NAME']?>
                </div>
                <div class="list-program__program-subtitle">
                    <?/*<?=$arItem['PROPERTIES']['SCHOOL']['ITEM']['PROPS']['CITY']['VALUE']?>,*/?>
                    <?=$arItem['PROPERTIES']['SCHOOL']['ITEM']['FIELDS']['NAME']?>
                </div>
            </div>
        </div>
        <div class="list-program__descriptions-wrap">
            <div class="list-program__descriptions">
                <div class="list-program__term">
<!--                    --><?//
//                        $suffix = $arItem['IBLOCK_SECTION_ID'] === '5' ? 'ч' : Main::num2word($arItem['PROPERTIES']['STUDYING_PERIOD']['VALUE'], ['год','года','лет']);?>
<!--                    --><?//=$arItem['PROPERTIES']['STUDYING_PERIOD']['VALUE'] . ' ' . $suffix?>
                    <?=$arItem['STUDYING_PERIOD'] !== 'от ' ? $arItem['STUDYING_PERIOD'] : ''?>
                </div>
                <div class="list-program__row-mobile">

                    <div class="list-program__form">
                        <p>форма</p> <?=$arItem['PROPERTIES']['FORM_EDUCATION']['VALUE']?>
                    </div>
                    <div class="list-program__price">
                        <p>Стоимость</p>
                        <? $noPrice = $arItem['IBLOCK_SECTION_ID'] === '5' ? 'бесплатно' : 'бюджет';?>
                        <?=$arItem['PROPERTIES']['AMOUNT']['VALUE'] ? number_format($arItem['PROPERTIES']['AMOUNT']['VALUE'], 0, '', ' ') . ' ₽' : $noPrice?>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <? endforeach;?>
</div>
<?=$arResult["NAV_STRING"]?>

