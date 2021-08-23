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
use \Wptt\Counter as Counter;
    $counter = Counter::getCountForProffesion($arResult['PROPERTIES']['STUDYING_PROGRAMS']['VALUE'], $arResult['PROPERTIES']['DIRECTION']['VALUE']);
?>
<section class="first-block__wrap profession wow fadeInUp">
    <div class="container">
        <div class="first-block">
            <div class="first-block__text">
                <div class="first-block__title">
                    <?=$arResult['NAME']?>
                </div>
                <?=$arResult['PREVIEW_TEXT']?>
                <div class="first-block__row-wrapper">
                    <div class="first-block__row">
                        <div class="first-block__row-mobile">
                            <div class="first-block__col">

                                    <a href="#professions-list" class="first-block__box">
                                        <div class="first-block__box-title">
                                            <?=$counter['PROGRAMS']?>
                                        </div>
                                        <div class="first-block__box-subtitle">
                                            <?=Main::num2word($counter['PROGRAMS'], ['Программа','Программы','Программ'])?> обучения
                                        </div>
                                    </a>

                            </div>
                            <div class="first-block__col">

                                    <a href="#professions-list" class="first-block__box">
                                        <div class="first-block__box-title">
                                            <?=$counter['SCHOOLS']?>
                                        </div>
                                        <div class="first-block__box-subtitle">
                                            <?=Main::num2word($counter['SCHOOLS'], ['Учебное заведение','Учебных заведений','Учебных заведений'])?>
                                        </div>
                                    </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="first-block__image-wrap">
                <div class="first-block__image" style="background-image: url('<?=$arResult['PREVIEW_PICTURE']['SRC']?>');">
                </div>
            </div>
        </div>

    </div>
</section>

<section class="second-block wow fadeInUp">
    <div class="container">
        <div class="second-block-top">
            <div class="second-block-top__text">
                <div class="second-block-top__title">
                    О профессии
                </div>
                <div class="second-block-top__text-desktop">
                    <?=$arResult['DETAIL_TEXT']?>
                    <a href="javascript:void(0)" class="second-block-top__close">Свернуть</a>
                </div>
                <div class="second-block-top__text-mobile">
                    <?=mb_strimwidth(strip_tags($arResult['DETAIL_TEXT']), 0, 200, "...");?>
                    <a href="javascript:void(0)" class="second-block-top__open">Читать дальше</a>
                </div>

            </div>
            <div class="second-block-top__image" style="background-image: url('<?=$arResult['DETAIL_PICTURE']['SRC']?>');">
            </div>
        </div>
        <div class="second-block-bottom">
            <div class="second-block-bottom__row">
                <? foreach ($arResult['BLOCKS'] as $block):?>
                <div class="second-block-bottom__col-wrap second-block-bottom__col-4">
                    <div class="second-block-bottom__col ">
                        <div class="second-block-bottom__title">
                            <?=$block['TITLE']?>
                        </div>
                        <div class="second-block-bottom__description">
                            <?=htmlspecialchars_decode($block['TEXT'])?>
                        </div>
                    </div>
                </div>
                <? endforeach;?>

            </div>
        </div>
    </div>
</section>

<section class="list-program-wrap wow fadeInUp"  id="professions-list">
    <div class="container">
        <h2>Выберите программу для этой профессии</h2>
        <? $GLOBALS['recommendedPrograms'][] = [
                'LOGIC' => 'OR',
                ['ID' => $arResult['PROPERTIES']['STUDYING_PROGRAMS']['VALUE']],
                ['PROPERTY_DIRECTION' => $arResult['PROPERTIES']['DIRECTION']['VALUE']]
        ];?>

        <?$APPLICATION->IncludeComponent("bitrix:news.list", "programs_table", Array(
            "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
            "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
            "AJAX_MODE" => "Y",	// Включить режим AJAX
            "AJAX_OPTION_ADDITIONAL" => "random",	// Дополнительный идентификатор
            "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
            "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
            "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
            "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
            "CACHE_GROUPS" => "Y",	// Учитывать права доступа
            "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
            "CACHE_TYPE" => "A",	// Тип кеширования
            "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
            "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
            "DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
            "DISPLAY_DATE" => "N",	// Выводить дату элемента
            "DISPLAY_NAME" => "Y",	// Выводить название элемента
            "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
            "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
            "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
            "FIELD_CODE" => array(	// Поля
                0 => "",
                1 => "",
            ),
            "FILTER_NAME" => "recommendedPrograms",	// Фильтр
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
            "IBLOCK_ID" => "3",	// Код информационного блока
            "IBLOCK_TYPE" => "-",	// Тип информационного блока (используется только для проверки)
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
            "INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
            "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
            "NEWS_COUNT" => "8",	// Количество новостей на странице
            "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
            "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
            "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
            "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
            "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
            "PAGER_TITLE" => "Новости",	// Название категорий
            "PARENT_SECTION" => "",	// ID раздела
            "PARENT_SECTION_CODE" => "",	// Код раздела
            "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
            "PROPERTY_CODE" => array(	// Свойства
                0 => "POPULAR",

            ),
            "SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
            "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
            "SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
            "SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
            "SET_STATUS_404" => "N",	// Устанавливать статус 404
            "SET_TITLE" => "N",	// Устанавливать заголовок страницы
            "SHOW_404" => "N",	// Показ специальной страницы
            "SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
            "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
            "SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
            "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
            "STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
            'USE_FILTER' => 'Y'
        ),
                                         false
        );?>

    </div>
</section>

<script>
    //Скролл при нажатии на пагинацию

    document.addEventListener('click', function (e) {

        if (e.target.closest('.pagination')) {
            document.getElementById('professions-list').scrollIntoView()
        }
    })
</script>