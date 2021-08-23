<?php

    require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
    $APPLICATION->SetTitle("Соглашение на обработку персональных данных");

    use \Wptt\Settings as Settings;

    $privacy = Settings::showSetting('TEXT_POLITICAL'); ?>

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