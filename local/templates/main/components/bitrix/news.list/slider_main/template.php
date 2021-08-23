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
<section class="slider">
    <div class="container">
        <div class="slide wow fadeInUp">
            <div class="slide__description">
                <p>Центры сопровождения обучающихся «ПроЗнание» помогут вам бесплатно:</p>
                <div class="slide__description-title">
                    <span><?=$arResult['ITEMS'][0]['NAME']?></span> <?=$arResult['ITEMS'][0]['PROPERTIES']['BLACK_TEXT']['VALUE']?>
                </div>
                <a href="<?=$arResult['ITEMS'][0]['PROPERTIES']['HREF']['VALUE']?>" class="btn btn_purple slide-link">
                    <?=$arResult['ITEMS'][0]['PROPERTIES']['BTN_TEXT']['VALUE']?>
                </a>
            </div>
            <div class="slide__image">
                <img src="<?=$arResult['ITEMS'][0]['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arResult['ITEMS'][0]['NAME']?> <?=$arResult['ITEMS'][0]['PROPERTIES']['BLACK_TEXT']['VALUE']?>">
            </div>
        </div>
        <div class="slide__pagination">
            <p>А также:</p>
            <div class="slide__buttons">
                <? foreach ($arResult['ITEMS'] as $key => $arItem):?>
                    <? if ($key === 0) { continue;}?>
                <div class="slide__button-wrap">
                    <a href="#" class="slide__button"
                       data-subtitle="Центры сопровождения обучающихся «ПроЗнание» помогут вам бесплатно:"
                       data-link="<?=$arItem['PROPERTIES']['HREF']['VALUE']?>"
                       data-img="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                        data-name="<?=$arItem['PROPERTIES']['BTN_TEXT']['VALUE']?>">
                        <div class="slide-hidden">
                            <span><?=$arItem['NAME']?></span> <?=$arItem['PROPERTIES']['BLACK_TEXT']['VALUE']?>
                        </div>
                        <?=$arItem['PROPERTIES']['BTN_TEXT']['VALUE']?>
                    </a>
                </div>
                <? endforeach;?>
                <div class="slide__button-wrap">
                    <a href="#" class="slide__button"
                       data-subtitle="Центры сопровождения обучающихся «ПроЗнание» помогут вам бесплатно:"
                       data-link="<?=$arResult['ITEMS'][0]['PROPERTIES']['HREF']['VALUE']?>" data-img="<?=$arResult['ITEMS'][0]['PREVIEW_PICTURE']['SRC']?>"
                       data-name="<?=$arResult['ITEMS'][0]['PROPERTIES']['BTN_TEXT']['VALUE']?>">
                        <div class="slide-hidden">
                            <span><?=$arResult['ITEMS'][0]['NAME']?></span> <?=$arResult['ITEMS'][0]['PROPERTIES']['BLACK_TEXT']['VALUE']?>
                        </div>
                        <?=$arResult['ITEMS'][0]['PROPERTIES']['BTN_TEXT']['VALUE']?>
                    </a>
                </div>
            </div>
        </div>
        <div class="slider__blocks">
            <div class="slider__block-tablet-wrap">
                <div class="slider__block-wrap">
                    <a href="/programs/" class="slider__block">
                        <div class="slider__block-title">
                            <?=$schools = Counter::getCount('catalog','schools')?>
                        </div>
                        <p><?=Main::num2word($schools, ['Образовательная организация','Образовательных организации','Образовательных организаций'])?></p>
                    </a>
                </div>
                <div class="slider__block-wrap">
                    <a href="/programs/" class="slider__block">
                        <div class="slider__block-title">
                            <?=$direction = Counter::getCount('catalog','direction')?>
                        </div>
                        <p><?=Main::num2word($direction, ['Направление подготовки','Направления подготовки','Направлений подготовки'])?></p>
                    </a>
                </div>
            </div>
            <div class="slider__block-tablet-wrap">
                <div class="slider__block-wrap">
                    <a href="/programs/" class="slider__block">
                        <div class="slider__block-title">
                            <?=$programs = Counter::getCount('catalog','programs')?>
                        </div>
                        <p><?=Main::num2word($programs, ['Образовательная программа','Образовательных программы','Образовательных программ'])?> </p>
                    </a>
                </div>
                <div class="slider__block-wrap">
                    <a href="/professions/" class="slider__block">
                        <div class="slider__block-title">
                            <?=$professions = Counter::getCount('catalog','professions')?>
                        </div>
                        <p><?=Main::num2word($professions, ['Профессия на выбор','Профессии на выбор','Профессий на выбор'])?></p>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
