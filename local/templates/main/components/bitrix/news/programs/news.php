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

    $arFilter = Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'GLOBAL_ACTIVE'=>'Y');
    $arSelect = ['ID', 'IBLOCK_ID', 'SECTION_PAGE_URL', 'CODE' , 'NAME'];
    $db_list = CIBlockSection::GetList(Array('ID'=>'ASC'), $arFilter, false, $arSelect);

    while($ar_result = $db_list->GetNext())
    {
        $sections[$ar_result['ID']] = $ar_result;
    }


    $filters = [
            'DIRECTION' => ['NAME' => 'Направление подготовки', 'TYPE' => 'SELECT'],
            'SCHOOL' => ['NAME' => 'Учебное заведение', 'TYPE' => 'SELECT'],
            'LEVEL_EDUCATION' => ['NAME' => 'Уровень образования', 'TYPE' => 'CHECKBOX'],
            'FORM_EDUCATION' => ['TYPE' => 'CHECKBOX'],
            'AMOUNT' => ['TYPE' => 'RANGES'],
            'TYPE' => ['TYPE' =>'CHECKBOX']
    ];
    
    if (isset($_GET['PROPERTY_DIRECTION']) && $_GET['PROPERTY_DIRECTION'] !== '' && count($_GET['PROPERTY_DIRECTION']) <= 1) {
        $arParams['SET_TITLE'] = 'N';
        $elementID = is_array($_GET['PROPERTY_DIRECTION']) ?  $_GET['PROPERTY_DIRECTION'][0] : $_GET['PROPERTY_DIRECTION'];
        $res = CIBlockElement::GetByID($elementID);
        if($ar_res = $res->GetNext()) {
            $APPLICATION->SetTitle($ar_res['NAME']);
        }
    }
?>



<section class="catalog-wrapper">
    <div class="container wow fadeInUp">
        <div class="catalog__title title">
            <?=$APPLICATION->ShowTitle();?>
        </div>
        <div class="catalog-selector__body">
            <div class="catalog-selector__wrapper">
                <ul class="catalog-selector">
                    <li><a href="javascript:void(0)" class="catalog-selector__item active">Все</a></li>
                    <? foreach ($sections as $SECTION):?>
                        <li><a href="<?=$SECTION['SECTION_PAGE_URL']?>" class="catalog-selector__item"><?=$SECTION['NAME']?></a>
                        </li>
                    <? endforeach;?>
                </ul>
            </div>
        </div>
        <div class="catalog">


            <? $APPLICATION->IncludeComponent(
                "wptt:filter",
                ".default",
                Array(
                    'FILTERS' => $filters,
                    'IBLOCK_ID' => $arParams['IBLOCK_ID']
                ),
                false
            );?>
            <div class="catalog__content">
                <? $APPLICATION->IncludeComponent(
                    "wptt:sorting",
                    ".default",
                    Array(
                    ),
                    false
                );?>
                <? foreach ($_GET as $codeGet => $get) {
                   $GLOBALS[$arParams['FILTER_NAME']][$codeGet] = $get;
                }?>
                    <? if (isset($_GET['PROPERTY_AMOUNT_FROM']) && $_GET['PROPERTY_AMOUNT_FROM'] !== '') {
                       $GLOBALS[$arParams['FILTER_NAME']]['>=PROPERTY_AMOUNT'] = $_GET['PROPERTY_AMOUNT_FROM'];
                    }?>
                <? if (isset($_GET['PROPERTY_AMOUNT_TO']) && $_GET['PROPERTY_AMOUNT_TO'] !== '') {
                    $GLOBALS[$arParams['FILTER_NAME']]['<=PROPERTY_AMOUNT'] = $_GET['PROPERTY_AMOUNT_TO'];
                }?>
                <? if (isset($_GET['PROPERTY_STUDYING_PERIOD_FROM']) && $_GET['PROPERTY_STUDYING_PERIOD_FROM'] !== '') {
                       $GLOBALS[$arParams['FILTER_NAME']]['>=PROPERTY_STUDYING_PERIOD'] = $_GET['PROPERTY_STUDYING_PERIOD_FROM'];
                    }?>
                <? if (isset($_GET['PROPERTY_STUDYING_PERIOD_TO']) && $_GET['PROPERTY_STUDYING_PERIOD_TO'] !== '') {
                    $GLOBALS[$arParams['FILTER_NAME']]['<=PROPERTY_STUDYING_PERIOD'] = $_GET['PROPERTY_STUDYING_PERIOD_TO'];
                }?>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "programs_table",
                    Array(
                        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                        "NEWS_COUNT" => $arParams["NEWS_COUNT"],
                        "SORT_BY1" => $arParams["SORT_BY1"],
                        "SORT_ORDER1" => $arParams["SORT_ORDER1"],
                        "SORT_BY2" => $arParams["SORT_BY2"],
                        "SORT_ORDER2" => $arParams["SORT_ORDER2"],
                        "FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
                        "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
                        "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
                        "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                        "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
                        "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
                        "SET_TITLE" => $arParams["SET_TITLE"],
                        "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
                        "MESSAGE_404" => $arParams["MESSAGE_404"],
                        "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                        "SHOW_404" => $arParams["SHOW_404"],
                        "FILE_404" => $arParams["FILE_404"],
                        "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
                        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                        "CACHE_TIME" => $arParams["CACHE_TIME"],
                        "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                        "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
                        "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
                        "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                        "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                        "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
                        "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                        "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
                        "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
                        "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
                        "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                        "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
                        "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
                        "PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
                        "ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
                        "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
                        "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
                        "FILTER_NAME" => $arParams["FILTER_NAME"],
                        "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
                        "CHECK_DATES" => $arParams["CHECK_DATES"],
                    ),
                    $component
                );?>
            </div>
        </div>
    </div>
</section>

    <?php if (isset($_GET['PROPERTY_DIRECTION']) && $_GET['PROPERTY_DIRECTION'] !== '' && count($_GET['PROPERTY_DIRECTION']) <= 1):?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:news.detail",
        "direction",
        Array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "ADD_ELEMENT_CHAIN" => "N",
            "ADD_SECTIONS_CHAIN" => "N",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "BROWSER_TITLE" => "-",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "DISPLAY_TOP_PAGER" => "N",
            "ELEMENT_CODE" => "",
            "ELEMENT_ID" => is_array($_GET['PROPERTY_DIRECTION']) ?  $_GET['PROPERTY_DIRECTION'][0] : $_GET['PROPERTY_DIRECTION'],
            "FIELD_CODE" => array("NAME","PREVIEW_TEXT","PREVIEW_PICTURE",""),
            "IBLOCK_ID" => "5",
            "IBLOCK_TYPE" => "catalog",
            "IBLOCK_URL" => "",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "MESSAGE_404" => "",
            "META_DESCRIPTION" => "-",
            "META_KEYWORDS" => "-",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "Страница",
            "PROPERTY_CODE" => array("TITLE",""),
            "SET_BROWSER_TITLE" => "N",
            "SET_CANONICAL_URL" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "STRICT_SECTION_CHECK" => "N",
            "USE_PERMISSIONS" => "N",
            "USE_SHARE" => "N"
        )
    );?>
<?php endif;?>
