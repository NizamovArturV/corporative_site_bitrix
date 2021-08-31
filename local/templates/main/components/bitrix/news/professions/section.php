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
        LocalRedirect('/professions/' . $_GET['SECTION_CODE'] . '/' . '?SORT_BY=' . $_GET['SORT_BY'] . '&SORT_ORDER=' . $_GET['SORT_ORDER'] . '&search=' . $_GET['search']);
    } elseif($_GET['SECTION_CODE'] === '') {
        LocalRedirect('/professions/' . '?SORT_BY=' . $_GET['SORT_BY'] . '&SORT_ORDER=' . $_GET['SORT_ORDER'] . '&search=' . $_GET['search']);
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
                <form class="catalog__content-search-wrapper" method="get">
                    <div class="catalog__content-search-title">
                        Поиск по профессиям
                    </div>
                    <div class="catalog__content-search">
                        <label for="search">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.8315 10.9884L9.60683 8.77999C10.4704 7.70246 10.8886 6.33477 10.7754 4.95814C10.6623 3.58151 10.0264 2.30059 8.9985 1.37875C7.97062 0.456919 6.62888 -0.0357596 5.24917 0.00202291C3.86946 0.0398054 2.55665 0.605177 1.58069 1.58189C0.604718 2.5586 0.0397752 3.8724 0.00202138 5.25316C-0.0357324 6.63392 0.456573 7.97668 1.37771 9.00534C2.29884 10.034 3.57879 10.6704 4.95437 10.7836C6.32996 10.8968 7.69661 10.4783 8.77332 9.61413L10.98 11.8225C11.0358 11.8787 11.1021 11.9234 11.1752 11.9538C11.2482 11.9843 11.3266 12 11.4058 12C11.4849 12 11.5633 11.9843 11.6364 11.9538C11.7094 11.9234 11.7758 11.8787 11.8315 11.8225C11.9396 11.7106 12 11.5611 12 11.4054C12 11.2498 11.9396 11.1003 11.8315 10.9884ZM5.40932 9.61413C4.57914 9.61413 3.76759 9.36776 3.07732 8.90618C2.38704 8.4446 1.84904 7.78855 1.53134 7.02097C1.21364 6.25339 1.13051 5.40877 1.29247 4.59392C1.45444 3.77907 1.85421 3.03057 2.44124 2.4431C3.02827 1.85562 3.7762 1.45554 4.59043 1.29346C5.40467 1.13137 6.24865 1.21456 7.01564 1.5325C7.78263 1.85044 8.4382 2.38885 8.89942 3.07965C9.36065 3.77045 9.60683 4.58262 9.60683 5.41343C9.60683 6.52753 9.16459 7.59599 8.37741 8.38377C7.59022 9.17156 6.52257 9.61413 5.40932 9.61413Z" fill="#8A8A8A"/>
                            </svg>
                        </label>
                        <? foreach ($_GET as $name => $value):?>
                            <? if (is_array($value)):?>
                                <?foreach ($value as $arrValue):?>
                                    <input type="hidden" name="<?=$name?>[]" value="<?=$arrValue?>">
                                <? endforeach;?>
                            <? else:?>
                                <input type="hidden" name="<?=$name?>" value="<?=$value?>">
                            <? endif;?>
                        <? endforeach;?>
                        <input type="text" class="js-search-input" placeholder="Введите название профессии" name="search" value="<?=$_GET['search']?>">
                        <button class="catalog__content-search-btn" type="submit">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.8311 15.0201L12.0847 11.2795C13.2268 9.92964 13.803 8.19056 13.6928 6.42579C13.5825 4.66102 12.7944 3.00716 11.4932 1.80992C10.192 0.612675 8.47837 -0.0352843 6.71055 0.00148336C4.94272 0.038251 3.25752 0.7569 2.00721 2.00721C0.7569 3.25752 0.038251 4.94272 0.00148336 6.71055C-0.0352843 8.47837 0.612675 10.192 1.80992 11.4932C3.00716 12.7944 4.66102 13.5825 6.42579 13.6928C8.19056 13.803 9.92964 13.2268 11.2795 12.0847L15.0201 15.8311C15.0732 15.8846 15.1364 15.9271 15.206 15.9561C15.2756 15.9851 15.3502 16 15.4256 16C15.501 16 15.5756 15.9851 15.6452 15.9561C15.7148 15.9271 15.778 15.8846 15.8311 15.8311C15.8846 15.778 15.9271 15.7148 15.9561 15.6452C15.9851 15.5756 16 15.501 16 15.4256C16 15.3502 15.9851 15.2756 15.9561 15.206C15.9271 15.1364 15.8846 15.0732 15.8311 15.0201ZM1.14843 6.8593C1.14843 5.72979 1.48336 4.62565 2.11088 3.68651C2.7384 2.74736 3.63032 2.01538 4.67384 1.58314C5.71737 1.1509 6.86563 1.0378 7.97343 1.25816C9.08123 1.47851 10.0988 2.02242 10.8975 2.8211C11.6962 3.61978 12.2401 4.63736 12.4604 5.74516C12.6808 6.85296 12.5677 8.00123 12.1355 9.04475C11.7032 10.0883 10.9712 10.9802 10.0321 11.6077C9.09294 12.2352 7.9888 12.5702 6.8593 12.5702C5.34468 12.5702 3.8921 11.9685 2.8211 10.8975C1.7501 9.8265 1.14843 8.37391 1.14843 6.8593Z" fill="white"/>
                            </svg>
                        </button>
                    </div>
                </form>
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