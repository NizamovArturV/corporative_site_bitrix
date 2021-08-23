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
<div class="directions-professions__body wow fadeInUp">
    <div class="directions-professions__title">Востребованные профессии</div>
    <div class="directions-professions__discription">
        Выберите наиболее подходящие вам профессии, либо перейдите в Каталог, чтобы посмотреть все профессии
    </div>
    <div class="directions-professions__blocks-wrap">
        <div class="blocks">
            <? foreach ($arResult['ITEMS'] as $arItem):?>
                <? $counter = Counter::getCountForProffesion($arItem['PROPERTIES']['STUDYING_PROGRAMS']['VALUE'], $arItem['PROPERTIES']['DIRECTION']['VALUE']);
                    $section = $arResult['SECTIONS'][$arItem['IBLOCK_SECTION_ID']]; ?>
            <div class="block-wrap block-wrap-4">
                <a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="block">
                    <div class="block-caption-profession" style="background: <?=$section['UF_BTN_CLASS']?>">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <circle cx="6" cy="6" r="6" fill="<?=$section['UF_BTN_CIRCLE']?>" />
                        </svg>
                        <p><?=$section['UF_SHORT'] ?? $section['NAME']?></p>
                    </div>
                    <div class="block-title">
                        <?=$arItem['NAME']?>
                    </div>
                    <div class="block-subtitle">
                        <p><?=$counter['PROGRAMS']?> <?=Main::num2word($counter['PROGRAMS'], ['программа','программы','программ'])?>,</p>
                        <p><?=$counter['SCHOOLS']?> <?=Main::num2word($counter['SCHOOLS'], ['учебное заведение','учебных заведений','учебных заведений'])?></p>
                    </div>
                </a>
            </div>
            <? endforeach;?>
        </div>
    </div>
    <div class="block-btn">
        <a href="/professions/" class="btn btn_purple">
            Перейти в каталог
        </a>
    </div>
</div>

