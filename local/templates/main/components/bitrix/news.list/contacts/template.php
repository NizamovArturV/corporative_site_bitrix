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
?>

<section class="first-wrapper wrapper-grey">
    <div class="container">
        <div class="contacts">
            <div class="contacts__title title">
                Контакты
            </div>
            <? if ($arResult['MAIN_CONTACT']):?>
            <div class="contacts-top">
                <div class="contacts__block">
                    <div class="contacts__block-title">
                        <?=$arResult['MAIN_CONTACT']['NAME']?>
                    </div>
                    <div class="contacts-top__text">
                        <p><strong>Телефон (доступен WhatsApp):</strong> <?=$arResult['MAIN_CONTACT']['PROPERTIES']['PHONE']['VALUE']?></p>
                        <p><strong>Почта:</strong><?=$arResult['MAIN_CONTACT']['PROPERTIES']['EMAIL']['VALUE']?> </p>
                        <p><strong>Адрес:</strong> <?=$arResult['MAIN_CONTACT']['PROPERTIES']['ADDRESS']['VALUE']?></p>
                    </div>
                </div>
            </div>
            <? endif;?>
            <div class="contacts-bottom">
                <div class="contacts__block">
                    <div class="contacts__block-title">
                        Все подразделения
                    </div>
                    <div class="contacts__block-input">
                        <input type="text" id="search">
                        <label for="search">Поиск подразделения</label>
                        <div class="contacts__search-icon">
                            <svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.333 15c1.479 0 2.915-.495 4.08-1.407l3.664 3.664 1.178-1.179-3.663-3.663a6.627 6.627 0 001.407-4.082 6.674 6.674 0 00-6.666-6.666 6.674 6.674 0 00-6.667 6.666A6.674 6.674 0 008.333 15zm0-11.667c2.757 0 5 2.243 5 5 0 2.758-2.243 5-5 5-2.758 0-5-2.242-5-5 0-2.757 2.242-5 5-5z"
                                    fill="#1A1621" opacity=".4" />
                            </svg>
                        </div>
                    </div>
                    <div class="contacts__tabs tabs" id="tabs">
                        <ul class="tabs__caption">
                            <li class="active" id="tab2">Карта</li>
                            <li id="tab1">Cписок</li>
                        </ul>
                        <div class="contacts-subdivisions">
                            <div class="contacts-subdivisions-map tabs__content active tab1">
                                <div class="map" id="map"></div>
                            </div>
                            <div class="contacts-subdivisions-left tabs__content  tab2">
                                <? foreach ($arResult['ITEMS'] as $arItem):?>
                                <div class="subdivisions__row" data-id="<?=$arItem['ID']?>" data-city="<?=mb_strtolower($arItem['NAME'])?>">
                                    <div class="contacts-subdivisions-left__title"><?=$arItem['NAME']?></div>
                                    <div class="contacts-subdivisions-left__text">
                                        <p><?=$arItem['PROPERTIES']['ADDRESS']['VALUE']?></p>
                                        <p><?=$arItem['PROPERTIES']['OPENING_HOURS']['VALUE']?></p>
                                        <p><?=$arItem['PROPERTIES']['PHONE']['VALUE']?><?=$arItem['PROPERTIES']['EMAIL']['VALUE'] ? ', ' . $arItem['PROPERTIES']['EMAIL']['VALUE'] : ''?></p>
                                    </div>
                                </div>
                                <? endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

    let centerMap = [<?=$arResult['ITEMS'][0]['PROPERTIES']['YMAP_WIDTH']['VALUE']?>, <?=$arResult['ITEMS'][0]['PROPERTIES']['YMAP_DURATION']['VALUE']?>];
    let pathToImageCluster = '<?=SITE_TEMPLATE_PATH?>/images/map-icon.svg';
    let dataMap = [
        <? foreach ($arResult['ITEMS'] as $arItem):?>
        {
            type: "Feature",
            id: <?=$arItem['ID']?>,
            geometry: {
                type: "Point",
                coordinates: [<?=$arItem['PROPERTIES']['YMAP_WIDTH']['VALUE']?>, <?=$arItem['PROPERTIES']['YMAP_DURATION']['VALUE']?>]
            },
            properties: {
                id: '<?=$arItem['ID']?>',
                iconUrl: '<?=SITE_TEMPLATE_PATH?>/images/map-icon.svg',
                balloonContent: `<div class="pin-card">
                          <div class="pin-card__title"><?=$arItem['NAME']?></div>
                          <div class="pin-card__text"><?=$arItem['PROPERTIES']['ADDRESS']['VALUE']?></div>
                          <div class="pin-card__text"><?=$arItem['PROPERTIES']['OPENING_HOURS']['VALUE']?></div>
                          <div class="pin-card__text"><?=$arItem['PROPERTIES']['PHONE']['VALUE']?>, <?=$arItem['PROPERTIES']['EMAIL']['VALUE']?></div>
                      </div>`,
                clusterCaption: "<?=$arItem['NAME']?>",
                hintContent: "<?=$arItem['NAME']?>",
            },
            options: {
                iconLayout: 'default#image',
                iconImageHref: '<?=SITE_TEMPLATE_PATH?>/images/map-icon.svg',
                iconImageSize: [48, 48],
                iconImageOffset: [-24, -24],
                city: '<?=mb_strtolower($arItem['NAME'])?>',
            },
        },
        <? endforeach;?>


    ];
</script>

