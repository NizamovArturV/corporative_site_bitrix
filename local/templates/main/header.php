<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
    use \Wptt\Settings as Settings;?>
<!DOCTYPE html>

<html lang="<?= LANGUAGE_ID; ?>">
<head>
    <? if(!strpos($_SERVER['SERVER_NAME'], 'wptt.su')):?>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-5FZZCH9');</script>
        <!-- End Google Tag Manager -->
    <? endif;?>
    <?php $APPLICATION->ShowHead(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="cmsmagazine" content="189f7bf1ce74ebf1535cc7e1d6cd03eb" />
    <title><?=$APPLICATION->ShowTitle()?></title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/nouislider.min.css">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/style.css">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/animate.css">
    <script type="text/javascript" src="https://vk.com/js/api/openapi.js?169"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" charset="utf-8"></script>
    <script src="https://yandex.st/jquery-ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.maskedinput.min.js"></script>
</head>

<body id="transition_disabled">
<? if(!strpos($_SERVER['SERVER_NAME'], 'wptt.su')):?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FZZCH9"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
<? endif;?>
<?php $APPLICATION->ShowPanel();?>
<header>
    <section class="header" <?=$USER->IsAdmin() ? 'style="z-index:0"' : ''?>>
        <div class="container">
            <div class="header-body">
                <a <?=$APPLICATION->GetCurPage() !== '/' ? 'href="/"' : '' ?> class="header__logo">
                    <img src="<?=SITE_TEMPLATE_PATH?>/images/mainpage/logo.svg" alt="logo">
                </a>
                <div class="header__menu-wrap">
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "main", Array(
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
                        "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                        "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                    ),
                                                     false
                    );?>
                </div>
                <div class="header__contacts">
                    <a href="tel:<?=Settings::showSetting('PHONE','PHONE')?>" class="header__phone"><?=Settings::showSetting('PHONE')?></a>
                    <a href="tel:<?=Settings::showSetting('PHONE','PHONE')?>" class="header__phone-mobile">
                        <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.68 9.00922L10.9378 7.26628C10.7038 7.03351 10.3905 6.90526 10.0557 6.90526C9.70729 6.90526 9.37833 7.04243 9.1296 7.29131L8.45143 7.96933C7.92445 7.67642 7.22405 7.27356 6.49686 6.54637C5.77052 5.81979 5.36761 5.12142 5.0732 4.5916L5.75202 3.91328C6.25671 3.40755 6.26703 2.59619 5.77511 2.10472L4.03326 0.36282C3.79994 0.128852 3.48664 0 3.15099 0C2.81036 0 2.48813 0.131146 2.24085 0.369851C2.09125 0.490326 1.34053 1.15304 1.06074 2.51975C0.668993 4.43273 1.56906 6.27331 4.16745 8.87274C7.07006 11.7745 9.54802 12 10.2384 12C10.3821 12 10.4688 11.9911 10.4919 11.9884C11.8456 11.8298 12.3303 11.2286 12.6842 10.7896C13.1428 10.2207 13.1412 9.47213 12.68 9.00922ZM12.1019 10.3201C11.7692 10.7327 11.4551 11.1224 10.4049 11.2455C10.4044 11.2455 10.3469 11.252 10.2384 11.252C9.62072 11.252 7.39563 11.0422 4.69637 8.34382C2.30019 5.94664 1.45916 4.30273 1.79351 2.66974C2.03755 1.47766 2.68545 0.970978 2.71063 0.95173L2.73297 0.935225L2.75257 0.915578C2.86073 0.80752 3.00219 0.74798 3.15094 0.74798C3.28638 0.74798 3.41164 0.798743 3.50399 0.891393L5.24624 2.63369C5.44669 2.83395 5.43602 3.17094 5.22275 3.38466L4.45507 4.15169L4.44246 4.16491C4.2424 4.38526 4.26593 4.68306 4.37613 4.87698C4.69413 5.45083 5.1297 6.23676 5.96784 7.07515C6.80318 7.91049 7.58796 8.34572 8.16022 8.66311C8.21751 8.69527 8.33579 8.74923 8.48384 8.74923C8.65867 8.74923 8.81919 8.67523 8.93802 8.54034L9.65847 7.82009C9.76603 7.71248 9.90705 7.65319 10.0556 7.65319C10.1913 7.65319 10.3172 7.7041 10.4094 7.79575L12.1504 9.53755C12.3716 9.7595 12.2803 10.0988 12.1019 10.3201Z" fill="white"/>
                        </svg>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=<?=Settings::showSetting('PHONE','PHONE', 'WHATS_UP')?>" class="header__whatsapp">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M13.6688 2.3252C12.1648 0.826563 10.1645 0.000878905 8.03346 0C3.64233 0 0.0685899 3.55654 0.0668237 7.92783C0.0662349 9.3252 0.433029 10.6893 1.13021 11.8916L0 16L4.22324 14.8975C5.38691 15.5292 6.69699 15.8621 8.03022 15.8625H8.03356C12.4242 15.8625 15.9983 12.3057 16 7.93418C16.0009 5.81563 15.173 3.82373 13.6688 2.3252ZM8.03346 14.5235H8.03071C6.84261 14.523 5.67736 14.2053 4.66058 13.605L4.4189 13.4621L1.91277 14.1164L2.58169 11.6847L2.4242 11.4354C1.76136 10.3861 1.41134 9.17344 1.41193 7.92832C1.41331 4.29502 4.38377 1.33906 8.03611 1.33906C9.80473 1.33965 11.4673 2.02598 12.7174 3.27158C13.9675 4.51719 14.6556 6.17285 14.655 7.93369C14.6534 11.5673 11.6832 14.5235 8.03346 14.5235ZM11.6655 9.58809C11.4665 9.48887 10.4878 9.00977 10.3053 8.94355C10.123 8.87744 9.99009 8.84453 9.85752 9.04277C9.72476 9.24102 9.34334 9.6873 9.22716 9.81943C9.11098 9.95166 8.995 9.96826 8.7959 9.86904C8.5968 9.76992 7.95545 9.56065 7.19507 8.88574C6.60338 8.36045 6.20391 7.71172 6.08772 7.51348C5.97174 7.31504 6.08674 7.21816 6.17506 7.10918C6.39054 6.84287 6.60632 6.56367 6.67265 6.43154C6.73908 6.29932 6.70582 6.18359 6.65597 6.08447C6.60632 5.98535 6.20822 5.01025 6.04239 4.61348C5.88068 4.22734 5.71671 4.27949 5.59445 4.27344C5.47846 4.26768 5.3457 4.2665 5.21293 4.2665C5.08027 4.2665 4.86459 4.31602 4.68207 4.51445C4.49966 4.71279 3.98548 5.19199 3.98548 6.16709C3.98548 7.14219 4.69875 8.08418 4.79825 8.21641C4.89775 8.34863 6.20194 10.3496 8.1987 11.2076C8.67363 11.4119 9.04435 11.5337 9.33353 11.625C9.81042 11.7758 10.2442 11.7545 10.5873 11.7035C10.9698 11.6466 11.7649 11.2242 11.9309 10.7615C12.0968 10.2987 12.0968 9.90215 12.0469 9.81943C11.9973 9.73682 11.8645 9.6873 11.6655 9.58809Z"
                                  fill="black" />
                        </svg>
                    </a>
                    <a href="http://t.me/eproznanie_bot" class="header__telegram">
                        <svg width="16" height="16" viewBox="0 0 12 10" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M11.8147 0.273775C11.6681 0.09721 11.4486 0 11.1964 0C11.0594 0 10.9142 0.0284055 10.7649 0.0845853L0.607195 3.90382C0.0681339 4.10644 -0.00446723 4.41052 0.000201939 4.57374C0.00487111 4.73696 0.0948672 5.03652 0.644732 5.20885C0.648028 5.20984 0.651323 5.21083 0.654619 5.21173L2.76161 5.80563L3.90107 9.01501C4.05644 9.45254 4.40516 9.72433 4.81129 9.72433C5.06736 9.72433 5.31922 9.61864 5.53968 9.41881L6.84293 8.23687L8.73321 9.73605C8.7334 9.73623 8.73367 9.73632 8.73385 9.7365L8.7518 9.75075C8.75345 9.75202 8.75519 9.75337 8.75683 9.75463C8.96695 9.91514 9.19629 9.99991 9.42031 10H9.42041C9.85812 10 10.2067 9.68087 10.3082 9.18706L11.9725 1.09248C12.0394 0.76758 11.9833 0.476852 11.8147 0.273775ZM3.46647 5.69282L7.53149 3.64736L5.00034 6.29646C4.95887 6.33984 4.92948 6.39295 4.91502 6.45075L4.42695 8.39802L3.46647 5.69282ZM5.06333 8.90932C5.04649 8.92456 5.02955 8.93818 5.01261 8.95071L5.46543 7.1443L6.28913 7.79763L5.06333 8.90932ZM11.2834 0.954966L9.61907 9.04963C9.60305 9.12709 9.55188 9.30736 9.42031 9.30736C9.35531 9.30736 9.27365 9.27246 9.19006 9.20906L7.0481 7.51032C7.04782 7.51005 7.04746 7.50978 7.04709 7.5096L5.77259 6.49873L9.43295 2.66777C9.55014 2.54513 9.56076 2.3573 9.45813 2.22257C9.3554 2.08785 9.16928 2.04547 9.01703 2.12212L2.99672 5.1515L0.86107 4.54966L11.0157 0.7316C11.1015 0.699316 11.1614 0.692553 11.1964 0.692553C11.2179 0.692553 11.2562 0.695078 11.2704 0.712302C11.2891 0.734756 11.3129 0.811315 11.2834 0.954966Z"
                                    fill="#2CA5E0" />
                        </svg>
                    </a>
                </div>

                <a href="javascript:void(0)" class="header__bar js-menu-btn">
                    <svg class="header__bar-burger" width="20" height="16" viewBox="0 0 20 16" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.83325 1H18.1666M1.83325 8H18.1666M1.83325 15H18.1666" stroke="#1A1621"
                              stroke-width="2" stroke-linecap="round" />
                    </svg>

                    <svg class="header__bar-close" width="20" height="20" viewBox="0 0 20 20" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 2L18 18" stroke="#1A1621" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" />
                        <path d="M2 18L18 2" stroke="#1A1621" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
    <div class="header-mobile__menu-wrap js-menu" id="menuMobile">
        <div class="container">
            <?$APPLICATION->IncludeComponent("bitrix:menu", "main_mobile", Array(
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
                "ROOT_MENU_TYPE" => "top_mobile",	// Тип меню для первого уровня
                "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
            ),
                                             false
            );?>

        </div>

    </div>
</header>

