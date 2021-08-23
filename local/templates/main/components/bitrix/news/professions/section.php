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
    if (isset($_GET['SECTION_CODE'])) {
        LocalRedirect('/professions/' . $_GET['SECTION_CODE'] . '/' . '?SORT_BY=' . $_GET['SORT_BY'] . '&SORT_ORDER=' . $_GET['SORT_ORDER']);
    } elseif($_GET['SECTION_CODE'] === '') {
        LocalRedirect('/professions/' . '?SORT_BY=' . $_GET['SORT_BY'] . '&SORT_ORDER=' . $_GET['SORT_ORDER']);
    }
    $strPage = $APPLICATION->GetCurPage();
    $arrPage = explode('/',$strPage);
    $sectionCode = $arrPage[2];
    $arFilter = Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'GLOBAL_ACTIVE'=>'Y');
    $arSelect = ['ID', 'IBLOCK_ID', 'SECTION_PAGE_URL', 'CODE' , 'NAME', 'UF_*'];
    $db_list = CIBlockSection::GetList(Array('ID'=>'ASC'), $arFilter, false, $arSelect);

    while($ar_result = $db_list->GetNext())
    {
        $sections[$ar_result['ID']] = $ar_result;

        if ($ar_result['CODE'] === $sectionCode) {
            $currSectionID = $ar_result['ID'];
            $sections[$ar_result['ID']]['ACTIVE'] = 'active';
            $currSectionName = $ar_result['UF_SHORT'];
        } else {
            $sections[$ar_result['ID']]['ACTIVE'] = '';
        }

    }

?>
<section class="catalog-wrapper wow fadeInUp">
    <div class="container">
        <div class="catalog__title title">
            Профессии
        </div>
        <div class="catalog">
            <?/*
            <div class="catalog-filter-body">
                <div class="catalog-filter__header">
                    <div class="catalog-filter__title">
                        Фильтры
                    </div>
                    <a href="javascript:void(0)" class="catalog-filter__icon-close">
                        <svg width="13" height="14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 13L2.107 7.107 8 1.215" stroke="#1A1621" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
                <div class="catalog__filter ">
                    <form action="" class="filter" method="get">
                        <div class="filter-block">
                            <div class="filter-block__header">
                                <div class="filter-block__title">
                                    Вид профессиональной деятельности
                                </div>
                            </div>
                            <div class="filter-selector__wrap" id="filterWrap1">
                                <input type="hidden" name="SECTION_CODE" value="<?=isset($_GET['SECTION_CODE']) && $_GET['SECTION_CODE'] !== '' ? $_GET['SECTION_CODE'] : ''?>">
                                <a href="javascript:void(0)" class="filter-selector">
                                    <p><?=$currSectionName?></p>
                                    <div class="filter-selector__arrow-icon">
                                        <svg width="10" height="10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path d="M.714 3.571l4.209 4.21 4.209-4.21" stroke="#1A1621" stroke-width="1.5"
                                                      stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                        </svg>
                                    </div>
                                </a>
                                <div class="filter-selector__hidden">
                                    <ul>
                                        <li>
                                            <p class="filter-selector__field" data-value="">Все</p>
                                        </li>
                                        <? foreach ($sections as $section):?>
                                            <li>
                                                <p class="filter-selector__field <?=$section['ACTIVE']?>" data-value="<?=$section['CODE']?>"><?= $section['NAME']?></p>
                                            </li>
                                        <? endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="filter-selector__wrap" id="filterWrap2"></div>
                        <button type="submit" class="btn btn_purple filter__btn">Применить</button>
                        <a href="/professions/" class="btn filter__btn filter__btn_close">Сбросить</a>
                        <input type="hidden" name="SORT_BY" id="SORT_BY" value="<?=isset($_GET['SORT_BY']) && $_GET['SORT_BY'] !== '' ? $_GET['SORT_BY'] : ''?>">
                        <input type="hidden" name="SORT_ORDER" id="SORT_ORDER" value="<?=isset($_GET['SORT_ORDER']) && $_GET['SORT_ORDER'] !== '' ? $_GET['SORT_ORDER'] : ''?>">
                    </form>
                </div>
            </div>*/?>
            <? $APPLICATION->IncludeComponent(
                "wptt:filter",
                ".default",
                Array(
                    'SECTIONS' => 'Y',
                    'SECTION_FILTER_NAME' => 'Вид профессиональной деятельности',
                    'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                    'PARENT_PAGE' => '/professions/'
                ),
                false
            );?>
            <div class="catalog__content">
                <? $APPLICATION->IncludeComponent(
                    "wptt:sorting",
                    ".default",
                    Array(
                        'PROFESSIONS' => 'Y'
                    ),
                    false
                );?>
                <? $GLOBALS[$arParams['FILTER_NAME']]['SECTION_ID'] = $currSectionID; ?>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "",
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