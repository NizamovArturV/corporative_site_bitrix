<?php

    require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Основная идея «ПроЗнания» в том, чтобы помочь каждому человеку определиться с выбором — где и по какой программе обучаться, сопровождать его на протяжении всего периода обучения.");
$APPLICATION->SetPageProperty("keywords", "ПроЗнание, обучение, выбрать ВУЗ");
$APPLICATION->SetPageProperty("title", "О проекте «ПроЗнание»");
    $APPLICATION->SetTitle("О проекте");

    use \Wptt\Settings as Settings;

    $privacy = Settings::showSetting('TEXT_ABOUT'); ?>

    <section class="about-privacy wow fadeInUp">
        <div class="container">
            <div class="about-privacy__title">
                <?=$APPLICATION->ShowTitle();?>
            </div>
            <div class="about-privacy-body">
                <?= htmlspecialchars_decode($privacy['TEXT']) ?>
            </div>
        </div>
    </section>
<?
    require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>