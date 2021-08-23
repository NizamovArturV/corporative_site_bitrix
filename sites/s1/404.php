<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");

@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404");

?>
    <section class="error wow fadeInUp">
        <div class="container">
            <div class="first-block">
                <div class="first-block__text">
                    <div class="first-block__title">
                        Такой страницы
                        не существует
                    </div>
                    <p>
                        Ссылка, по которой вы перешли, никуда не ведет. Возможно, в ней была опечатка, или эта страница была
                        удалена.
                    </p>
                    <div class="error__btn">
                        <a href="/" class="btn btn_purple">Перейти на главную</a>
                    </div>
                </div>
                <div class="first-block__image">
                    <img src="<?=SITE_TEMPLATE_PATH?>/images/page_not_found.png" alt="">
                </div>
            </div>
        </div>
    </section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>