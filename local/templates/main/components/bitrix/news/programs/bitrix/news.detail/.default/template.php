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
<section class="first-block__wrap wow fadeInUp">
    <div class="container">
        <div class="first-block">
            <div class="first-block__text">
                <? if ($arResult['PROPERTIES']['LEVEL_EDUCATION']['VALUE']):?>
                <div class="kind-program">
                    <?=$arResult['PROPERTIES']['LEVEL_EDUCATION']['VALUE']?>
                </div>
                <? endif;?>
                <div class="first-block__title">
                    <?=$arResult['NAME']?>
                </div>
                <div class="first-block__subtitle">
                    <?=$arResult['PROPERTIES']['SCHOOL']['ITEM']['NAME']?>
                </div>
                <strong>Направление: </strong>
                <p>
                    <?=$arResult['PROPERTIES']['DIRECTION']['ITEM']['NAME']?>
                </p>
                <strong>Описание: </strong>
                <?=$arResult['PREVIEW_TEXT']?>



                <div class="first-block__row-buttons">
                    <? if ($arResult['PROPERTIES']['FILE']['REAL_PATH']):?>
                    <a href="<?=$arResult['PROPERTIES']['FILE']['REAL_PATH']?>" class="program-download" download>
                        <div class="program-download__icon">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.1" width="48" height="48" rx="12" fill="#5B17D0" />
                                <path
                                    d="M23.8147 28.233C23.8367 28.2601 23.8648 28.2821 23.8969 28.2972C23.929 28.3123 23.9643 28.3202 24 28.3202C24.0357 28.3202 24.071 28.3123 24.1031 28.2972C24.1352 28.2821 24.1633 28.2601 24.1853 28.233L27.4794 24.2074C27.6 24.0597 27.4912 23.8409 27.2941 23.8409H25.1147V14.2273C25.1147 14.1023 25.0088 14 24.8794 14H23.1147C22.9853 14 22.8794 14.1023 22.8794 14.2273V23.8381H20.7059C20.5088 23.8381 20.4 24.0568 20.5206 24.2045L23.8147 28.233ZM34.7647 27.2386H33C32.8706 27.2386 32.7647 27.3409 32.7647 27.4659V31.8409H15.2353V27.4659C15.2353 27.3409 15.1294 27.2386 15 27.2386H13.2353C13.1059 27.2386 13 27.3409 13 27.4659V33.0909C13 33.5938 13.4206 34 13.9412 34H34.0588C34.5794 34 35 33.5938 35 33.0909V27.4659C35 27.3409 34.8941 27.2386 34.7647 27.2386Z"
                                    fill="#5B17D0" />
                            </svg>
                        </div>
                        <div class="program-download__text">
                            <div class="program-download__title">Скачать презентацию</div>
                            <div class="program-download__subtitle"><?=$arResult['PROPERTIES']['FILE']['INFO']?></div>
                        </div>
                    </a>
                    <? endif;?>
                    <a href="javascript:void(0)" class="first-block__btn btn btn_purple">Подать заявку</a>
                </div>

            </div>
            <div class="first-block__image-wrap">
                <div class="first-block__image" style="background-image: url('<?=$arResult['DETAIL_PICTURE']['SRC'] ?? $arResult['PROPERTIES']['SCHOOL']['ITEM']['PREVIEW_PICTURE']?>');">
                </div>
            </div>
        </div>
        <div class="first-block__row-wrapper">
            <div class="first-block__row">
                <? if ($arResult['STUDYING_PERIOD'] !== 'от '):?>
                <div class="first-block__col">
                    <div class="first-block__box">
                        <div class="first-block__box-title">
                            <?=$arResult['STUDYING_PERIOD']?>
                        </div>
                        <div class="first-block__box-subtitle">
                            Срок обучения
                        </div>
                    </div>
                </div>
                <? endif;?>
                <? if ($arResult['PROPERTIES']['FORM_EDUCATION']['VALUE']):?>
                <div class="first-block__col">
                    <div class="first-block__box">
                        <div class="first-block__box-title">
                            <?=$arResult['PROPERTIES']['FORM_EDUCATION']['VALUE']?>
                        </div>
                        <div class="first-block__box-subtitle">
                            Форма обучения
                        </div>
                    </div>
                </div>
                <? endif;?>

                <div class="first-block__row-mobile">
                    <? if ($arResult['PROPERTIES']['BUDGET_PLACE']['VALUE']):?>
                    <div class="first-block__col">
                        <div class="first-block__box">
                            <div class="first-block__box-title">
                                <?=$arResult['PROPERTIES']['BUDGET_PLACE']['VALUE']?>
                            </div>
                            <div class="first-block__box-subtitle">
                                Бюджетных мест
                            </div>
                        </div>
                    </div>
                    <? endif;?>
                    <? if ($arResult['PROPERTIES']['COMMERCIAL_PLACE']['VALUE']):?>
                    <div class="first-block__col">
                        <div class="first-block__box">
                            <div class="first-block__box-title">
                                <?=$arResult['PROPERTIES']['COMMERCIAL_PLACE']['VALUE']?>
                            </div>
                            <div class="first-block__box-subtitle">
                                Коммерческих мест
                            </div>
                        </div>
                    </div>
                    <? endif;?>
                </div>

                <div class="first-block__col">
                    <div class="first-block__box">
                        <div class="first-block__box-title">
                            <? $noPrice = $arResult['IBLOCK_SECTION_ID'] === '5' ? 'Бесплатно' : 'Бюджет';?>
                            <?=$arResult['PROPERTIES']['AMOUNT']['VALUE'] ? number_format($arResult['PROPERTIES']['AMOUNT']['VALUE'], 0, '', ' ') . ' ₽' : $noPrice?>
                        </div>
                        <div class="first-block__box-subtitle">
                            Стоимость обучения
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?$APPLICATION->IncludeComponent("bitrix:form", "program", Array(
    "AJAX_MODE" => "Y",	// Включить режим AJAX
    "AJAX_OPTION_ADDITIONAL" => "form-detail",	// Дополнительный идентификатор
    "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
    "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
    "AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
    "CACHE_TIME" => "3600",	// Время кеширования (сек.)
    "CACHE_TYPE" => "A",	// Тип кеширования
    "CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
    "CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
    "EDIT_ADDITIONAL" => "N",	// Выводить на редактирование дополнительные поля
    "EDIT_STATUS" => "N",	// Выводить форму смены статуса
    "IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
    "NOT_SHOW_FILTER" => array(	// Коды полей, которые нельзя показывать в фильтре
        0 => "",
        1 => "",
    ),
    "NOT_SHOW_TABLE" => array(	// Коды полей, которые нельзя показывать в таблице
        0 => "",
        1 => "",
    ),
    "RESULT_ID" => $_REQUEST[RESULT_ID],	// ID результата
    "SEF_MODE" => "N",	// Включить поддержку ЧПУ
    "SHOW_ADDITIONAL" => "N",	// Показать дополнительные поля веб-формы
    "SHOW_ANSWER_VALUE" => "N",	// Показать значение параметра ANSWER_VALUE
    "SHOW_EDIT_PAGE" => "N",	// Показывать страницу редактирования результата
    "SHOW_LIST_PAGE" => "N",	// Показывать страницу со списком результатов
    "SHOW_STATUS" => "Y",	// Показать текущий статус результата
    "SHOW_VIEW_PAGE" => "N",	// Показывать страницу просмотра результата
    "START_PAGE" => "new",	// Начальная страница
    "SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
    "USE_EXTENDED_ERRORS" => "Y",	// Использовать расширенный вывод сообщений об ошибках
    "VARIABLE_ALIASES" => array(
        "action" => "action",
    ),
    "WEB_FORM_ID" => "2",	// ID веб-формы
    'INFO_PROGRAM' => $arResult['INFO_PROGRAM']
),
                                 false
);?>

<section class="about-program__wrap wow fadeInUp">
    <div class="container">
        <div class="about-program__title">
            Информация о программе
        </div>
        <div class="about-program__body">
            <div class="about-program">
                <? if ($arResult['DETAIL_TEXT']):?>
                <a href="javascript:void(0)" class="about-program__row active">
                    <div class="about-program__subtitle">Программа обучения</div>
                    <div class="about-program__description">

                        <?=$arResult['DETAIL_TEXT']?>
                    </div>
                    <div class="about-program__icon">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path d="M1.14355 5.71429L7.8779 12.4486L14.6123 5.7143" stroke="#1A1621"
                                      stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                        </svg>
                    </div>
                </a>
                <? endif;?>
                <? if ($arResult['PROPERTIES']['HOW_STUDING']['VALUE']['TEXT']):?>
                <a href="javascript:void(0)" class="about-program__row active">
                    <div class="about-program__subtitle">Как проходит обучение</div>
                    <div class="about-program__description">
                        <?=htmlspecialchars_decode($arResult['PROPERTIES']['HOW_STUDING']['VALUE']['TEXT'])?>
                    </div>
                    <div class="about-program__icon">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path d="M1.14355 5.71429L7.8779 12.4486L14.6123 5.7143" stroke="#1A1621"
                                      stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                        </svg>
                    </div>
                </a>
                <? endif;?>
                <? if ($arResult['PROPERTIES']['EMPLOYMENT']['VALUE']['TEXT']):?>
                <a href="javascript:void(0)" class="about-program__row active">
                    <div class="about-program__subtitle">Трудоустройство</div>
                    <div class="about-program__description">
                        <?=htmlspecialchars_decode($arResult['PROPERTIES']['EMPLOYMENT']['VALUE']['TEXT'])?>
                    </div>
                    <div class="about-program__icon">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path d="M1.14355 5.71429L7.8779 12.4486L14.6123 5.7143" stroke="#1A1621"
                                      stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                        </svg>
                    </div>
                </a>
                <? endif;?>
                <? if ($arResult['PROPERTIES']['SCHOOL']['ITEM']['PREVIEW_TEXT']):?>
                    <? $school = $arResult['PROPERTIES']['SCHOOL']['ITEM']['SHORT']['VALUE'];?>
                <a href="javascript:void(0)" class="about-program__row active">
                    <div class="about-program__subtitle">Информация <?= Main::isFirstVowels($school) ? 'об' : 'о'?> <?=$school?></div>
                    <div class="about-program__description">
                        <?=$arResult['PROPERTIES']['SCHOOL']['ITEM']['PREVIEW_TEXT']?>
                    </div>
                    <div class="about-program__icon">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path d="M1.14355 5.71429L7.8779 12.4486L14.6123 5.7143" stroke="#1A1621"
                                      stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                        </svg>
                    </div>
                </a>
                <? endif;?>
            </div>
            <div class="about-program__help-wrap">
                <div class="about-program__help">
                    <div class="about-program__help-title">
                        Нужна помощь?
                    </div>
                    <div class="about-program__help-description">
                        Если вы сомневаетесь в выборе учебного заведения или не можете определиться с направлением,
                        мы поможем вам
                    </div>
                    <div class="about-program__btn">
                        <a href="javascript:void(0)" class="btn btn_purple">
                            Помогите мне выбрать
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>