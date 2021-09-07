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

<section class="questions-and-answers wow fadeInUp">
    <div class="container">
        <div class="questions-and-answers__title"><?=$arResult['NAME']?></div>
        <div class="questions-and-answers__body">
            <? foreach ($arResult['ITEMS'] as $arItem):?>
            <div class="questions-and-answers__row">
                <div class="questions-and-answers__headline">
                    <p><?=$arItem['NAME']?></p>
                    <div class="questions-and-answers__headline-circle">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14 0C6.27907 0 0 6.27907 0 14C0 21.7209 6.27907 28 14 28C21.7209 28 28 21.7209 28 14C28 6.27907 21.7209 0 14 0ZM14 1.86667C20.7121 1.86667 26.1333 7.28789 26.1333 14C26.1333 20.7121 20.7121 26.1333 14 26.1333C7.28789 26.1333 1.86667 20.7121 1.86667 14C1.86667 7.28789 7.28789 1.86667 14 1.86667ZM13.9903 6.20278C13.8669 6.20405 13.745 6.22978 13.6316 6.27847C13.5182 6.32716 13.4156 6.39786 13.3297 6.48646C13.2438 6.57507 13.1763 6.67982 13.1312 6.79467C13.086 6.90952 13.0641 7.03218 13.0667 7.15556V13.0667H7.15556C7.12317 13.065 7.09072 13.065 7.05833 13.0667C6.93575 13.073 6.81562 13.1035 6.70481 13.1563C6.594 13.2091 6.49467 13.2832 6.4125 13.3744C6.33033 13.4655 6.26692 13.572 6.22591 13.6877C6.18489 13.8034 6.16707 13.926 6.17345 14.0486C6.17983 14.1712 6.2103 14.2913 6.26312 14.4021C6.31593 14.5129 6.39005 14.6122 6.48125 14.6944C6.57245 14.7766 6.67894 14.8399 6.79464 14.8809C6.91034 14.9219 7.03298 14.9397 7.15556 14.9333H13.0667L13.0667 20.8444C13.0649 20.9681 13.0878 21.0909 13.1339 21.2057C13.18 21.3205 13.2485 21.4249 13.3353 21.513C13.4222 21.6011 13.5256 21.671 13.6397 21.7188C13.7539 21.7665 13.8763 21.7911 14 21.7911C14.1237 21.7911 14.2461 21.7665 14.3603 21.7188C14.4744 21.671 14.5778 21.6011 14.6647 21.513C14.7515 21.4249 14.82 21.3205 14.8661 21.2057C14.9122 21.0909 14.9351 20.9681 14.9333 20.8444L14.9333 14.9333L20.8444 14.9333C20.9681 14.9351 21.0909 14.9122 21.2057 14.8661C21.3205 14.82 21.4249 14.7515 21.513 14.6647C21.6011 14.5778 21.671 14.4744 21.7188 14.3603C21.7665 14.2461 21.7911 14.1237 21.7911 14C21.7911 13.8763 21.7665 13.7539 21.7188 13.6397C21.671 13.5256 21.6011 13.4222 21.513 13.3353C21.4249 13.2485 21.3205 13.18 21.2057 13.1339C21.0909 13.0878 20.9681 13.0649 20.8444 13.0667L14.9333 13.0667V7.15556C14.9359 7.03054 14.9134 6.90628 14.867 6.79015C14.8207 6.67402 14.7515 6.56838 14.6635 6.47951C14.5756 6.39065 14.4706 6.32036 14.355 6.27282C14.2393 6.22528 14.1153 6.20146 13.9903 6.20278Z"
                                fill="#5B17D0" />
                        </svg>
                    </div>
                </div>
                <div class="questions-and-answers__hidden-text">
                   <?=$arItem['PREVIEW_TEXT']?>
                </div>
            </div>
            <? endforeach;?>
        </div>
    </div>
</section>

