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
            <div class="directions-professions__title">Популярные направления</div>
            <div class="directions-professions__discription">
                Выберите наиболее подходящее вам направление, либо перейдите в Каталог, чтобы посмотреть все
                направления
            </div>
            <div class="directions-professions__blocks-wrap">
                <div class="blocks">
                    <? foreach ($arResult['ITEMS'] as $arItem):?>
                    <? $counter = Counter::getCountForDirection($arItem['ID'])?>
                    <div class="block-wrap block-wrap-4">
                        <a href="/programs/?PROPERTY_DIRECTION=<?=$arItem['ID']?>" class="block">
                            <div class="block__header">
                                <div class="block-caption" style="background: <?=$arItem['PROPERTIES']['COLOR']['VALUE']?>">

                                    <?=htmlspecialchars_decode($arItem['PROPERTIES']['SVG']['VALUE']['TEXT'])?>
                                </div>
                                <div class="block__text">
                                    <div class="block-title">
                                        <?=$arItem['NAME']?>
                                    </div>
                                    <? /* Попросили пока убрать, потому что не заполнен до конца контент
                                    <div class="block-subtitle">
                                        <?=$counter['PROFESSIONS']?> <?=Main::num2word($counter['PROFESSIONS'], ['профессия','профессии','профессий'])?>, <?=$counter['PROGRAMS']?> <?=Main::num2word($counter['PROGRAMS'], ['программа','программы','программ'])?>
                                    </div>
 */?>
                                </div>
                            </div>
                        </a>
                    </div>
                    <? endforeach;?>
                </div>
            </div>
            <div class="block-btn">
                <a href="/programs/" class="btn btn_purple">
                    Перейти в каталог
                </a>
            </div>
        </div>

