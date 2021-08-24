<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use \Wptt\Settings as Settings;?>
<?php if (ERROR_404 !== 'Y'):?>
<?php if ($_COOKIE['agree'] !== 'Y'):?>
    <section class="cookie__wrapper">
        <div class="container">
            <div class="cookie active">
                <p>
                    Этот сайт использует cookie для хранения данных. Продолжая использовать сайт, вы даете согласие на
                    работу с
                    этими файлами
                </p>
                <a href="javascript:void(0)" class="cookie__btn btn btn_purple">Принять и закрыть</a>
            </div>
        </div>
    </section>
    <?php endif;?>
<footer>

    <?$APPLICATION->IncludeComponent("bitrix:form", "questions", Array(
        "AJAX_MODE" => "Y",	// Включить режим AJAX
        "AJAX_OPTION_ADDITIONAL" => "form",	// Дополнительный идентификатор
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
        "WEB_FORM_ID" => "1",	// ID веб-формы
    ),
                                     false
    );?>


    <section class="footer">
        <div class="container">
            <div class="footer__top">
                <div class="footer__row">
                    <div class="footer__contacts">
                        <div class="footer__contacts-phone">
                            <a href="tel:<?=Settings::showSetting('PHONE','PHONE')?>"><?=Settings::showSetting('PHONE')?></a>
                        </div>
                        <div class="footer__contacts-mail">
                            <a href="mailto:<?=Settings::showSetting('EMAIL')?>"><?=Settings::showSetting('EMAIL')?></a>
                        </div>
                    </div>
                    <div class="footer__main">
                        <?$APPLICATION->IncludeComponent("bitrix:menu", "bottom", Array(
                            "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                            "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                            "DELAY" => "N",	// Откладывать выполнение шаблона меню
                            "MAX_LEVEL" => "1",	// Уровень вложенности меню
                            "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                                0 => "",
                            ),
                            "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                            "MENU_CACHE_TYPE" => "A",	// Тип кеширования
                            "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                            "ROOT_MENU_TYPE" => "bottom",	// Тип меню для первого уровня
                            "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                        ),
                                                         false
                        );?>
                    </div>
                    <div class="footer__social">
                        <div class="footer__icons">
                            <div class="footer__icon-wrap">
                                <a href="<?=Settings::showSetting('VK_LINK')?>" target="_blank" class="footer__icon">
                                    <svg width="20" height="12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M19.579.855c.14-.465 0-.806-.662-.806h-2.193c-.558 0-.813.295-.953.619 0 0-1.115 2.719-2.695 4.482-.51.513-.743.675-1.021.675-.139 0-.341-.162-.341-.627V.855c0-.558-.161-.806-.626-.806H7.642c-.348 0-.558.258-.558.504 0 .528.79.65.871 2.138v3.228c0 .707-.127.836-.407.836-.743 0-2.551-2.73-3.624-5.853-.209-.607-.42-.852-.98-.852H.752C.125.05 0 .345 0 .669c0 .582.743 3.462 3.461 7.27 1.812 2.602 4.363 4.012 6.687 4.012 1.393 0 1.565-.313 1.565-.853V9.132c0-.626.133-.752.574-.752.324 0 .882.164 2.183 1.417 1.486 1.486 1.732 2.153 2.567 2.153h2.192c.626 0 .939-.313.759-.931-.197-.615-.907-1.51-1.849-2.57-.512-.603-1.277-1.253-1.51-1.578-.325-.42-.231-.604 0-.976.001 0 2.672-3.761 2.95-5.04z"
                                                fill="" />
                                    </svg>
                                </a>
                            </div>
                            <div class="footer__icon-wrap">
                                <a href="<?=Settings::showSetting('INSTA_LINK')?>" target="_blank" class="footer__icon">
                                    <svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M10 6.914A3.092 3.092 0 006.914 10c0 1.699 1.387 3.085 3.086 3.085 1.699 0 3.085-1.386 3.085-3.085 0-1.7-1.386-3.086-3.085-3.086zM19.254 10c0-1.278.012-2.544-.06-3.82-.072-1.481-.41-2.796-1.493-3.88-1.085-1.085-2.398-1.42-3.88-1.492-1.277-.072-2.543-.06-3.819-.06-1.278 0-2.544-.012-3.82.06-1.48.071-2.796.41-3.88 1.493C1.218 3.386.883 4.699.811 6.18.738 7.457.75 8.723.75 10c0 1.275-.012 2.544.06 3.82.072 1.48.41 2.796 1.493 3.879 1.086 1.086 2.398 1.421 3.88 1.493 1.277.072 2.544.06 3.819.06 1.278 0 2.544.012 3.82-.06 1.481-.072 2.796-.41 3.88-1.493 1.085-1.086 1.42-2.398 1.492-3.88.074-1.275.06-2.541.06-3.82zM10 14.748A4.741 4.741 0 015.252 10 4.741 4.741 0 0110 5.252 4.741 4.741 0 0114.747 10 4.741 4.741 0 0110 14.748zm4.942-8.581a1.107 1.107 0 01-1.109-1.11c0-.613.495-1.108 1.109-1.108a1.107 1.107 0 01.784 1.893 1.108 1.108 0 01-.784.325z"
                                                fill="" />
                                    </svg>
                                </a>
                            </div>
                            <div class="footer__icon-wrap">
                                <a href="<?=Settings::showSetting('FACEBOOK_LINK')?>" target="_blank" class="footer__icon">
                                    <svg width="12" height="20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M10.654 11.25l.556-3.62H7.736V5.283c0-.99.485-1.956 2.041-1.956h1.579V.246S9.923 0 8.553 0c-2.86 0-4.73 1.733-4.73 4.872V7.63H.646v3.62h3.179V20h3.912v-8.75h2.918z"
                                                fill="" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="footer__row">
                    <div class="footer__col">
                        <a <?=$APPLICATION->GetCurPage() !== '/' ? 'href="/"' : '' ?>>© ООО «ПроЗнание», <?=date('Y')?> — Все права защищены</a>
                    </div>
                    <div class="footer__col">
                        <div class="footer_privacy">
                            <a href="/privacy/">Соглашение на обработку персональных данных</a>
                        </div>
                    </div>
                    <div class="footer__col">
                        <div class="footer_creator">
                            <a href="http://www.wptt.ru/" target="_blank">Разработка — Вебпространство</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
<?php endif;?>

<script src="https://api-maps.yandex.ru/2.1.78/?apikey=25626947-1e23-46ba-ac8a-a2cec9a6d111&lang=ru_RU">
</script>
<?php if ($APPLICATION->GetCurPage() === '/contacts/'):?>
<script src="<?=SITE_TEMPLATE_PATH?>/js/ymap.js"></script>
<?php endif;?>
<script src="<?=SITE_TEMPLATE_PATH?>/js/imask.es.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/nouislider.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/wNumb.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/range-slider.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/wow.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/main.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/additional.js"></script>

<script>
    (function(w,d,u){
        var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
        var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
    })(window,document,'https://office.elearningrb.ru/upload/crm/site_button/loader_4_rjgl2g.js');
</script>
<?php if(!strpos($_SERVER['SERVER_NAME'], 'wptt.su')):?>
    <script type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://vk.com/js/api/openapi.js?169",t.onload=function(){VK.Retargeting.Init("VK-RTRG-1058156-2wAGV"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-1058156-2wAGV" style="position:fixed; left:-999px;" alt=""/></noscript>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(84394681, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/84394681" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

<?php endif;?>
</body>

</html>