<?

    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
        die();
    }
?>

<div class="question-form__layout-wrapper">
    <div class="question-form__layout
    <?= is_array($arResult["FORM_ERRORS"]) || ($arResult["isFormNote"] != "Y") !== true ? 'active' : '' ?>">
        <?= $arResult["FORM_HEADER"] ?>
        <div class="question-form__row">
            <div class="question-form__block-left">
                <div class="question-form__title">
                    Подать заявку
                </div>
                <div class="question-form__description">
                    <?= $arResult['arForm']["DESCRIPTION"] ?>
                </div>
            </div>
            <?
                if ($arResult["isFormNote"] != "Y") {
            ?>
            <div class="question-form__block-right">


                <div class="question-form__field-wrap <?= is_array($arResult["FORM_ERRORS"]) && array_key_exists(
                    'name',
                    $arResult['FORM_ERRORS']
                ) ? 'warning ' : '' ?>" >
                    <div class="question-form__field
                                <?= $arResult['arrVALUES']['form_text_4'] ? 'change' : '' ?>">
                        <?= $arResult['QUESTIONS']['name']["HTML_CODE"] ?>
                        <label for="firstname2">
                            <span><?= $arResult['QUESTIONS']['name']["CAPTION"] ?></span>
                            <span class="question-form__field-star">*</span>
                        </label>
                    </div>
                    <div class="question-form__field-error">
                        Введите Имя
                    </div>
                </div>
                <div class="question-form__fields">
                    <div class="question-form__field-wrap <?= is_array($arResult["FORM_ERRORS"]) && array_key_exists(
                        'phone',
                        $arResult['FORM_ERRORS']
                    ) ? 'warning' : '' ?>">
                        <div class="question-form__field
                                    <?= $arResult['arrVALUES']['form_text_5'] ? 'change' : '' ?>">
                            <?= $arResult['QUESTIONS']['phone']["HTML_CODE"] ?>
                            <label for="phone2">
                                <span><?= $arResult['QUESTIONS']['phone']["CAPTION"] ?></span>
                                <span class="question-form__field-star">*</span>
                            </label>
                        </div>
                        <div class="question-form__field-error">
                            Введите Телефон
                        </div>
                    </div>
                    <div class="question-form__field-wrap <?= is_array($arResult["FORM_ERRORS"]) && array_key_exists(
                        'email',
                        $arResult['FORM_ERRORS']
                    ) ? 'warning' : '' ?>">
                        <div class="question-form__field
                                    <?= $arResult['arrVALUES']['form_text_6'] ? 'change' : '' ?>">
                            <?= $arResult['QUESTIONS']['email']["HTML_CODE"] ?>
                            <label for="email2">
                                <span><?= $arResult['QUESTIONS']['email']["CAPTION"] ?></span>
                                <span class="question-form__field-star">*</span>
                            </label>
                        </div>
                        <div class="question-form__field-error">
                            Введите E-mail
                        </div>
                    </div>

                </div>
                <input type="hidden" name="form_hidden_7" value="<?= $APPLICATION->GetCurPage() ?>">
                <input type="hidden" name="form_hidden_8" value="<?= implode(",", $arParams['INFO_PROGRAM']); ?>">

                <?
                    /*
                                                   if ($arResult["isUseCaptcha"] == "Y") {
                                                       ?>
                                                       <tr>
                                                           <th colspan="2"><b><?= GetMessage("FORM_CAPTCHA_TABLE_TITLE") ?></b></th>
                                                       </tr>
                                                       <tr>
                                                           <td>&nbsp;</td>
                                                           <td><input type="hidden" name="captcha_sid"
                                                                      value="<?= htmlspecialcharsbx($arResult["CAPTCHACode"]); ?>"/><img
                                                                       src="/bitrix/tools/captcha.php?captcha_sid=<?= htmlspecialcharsbx(
                                                                           $arResult["CAPTCHACode"]
                                                                       ); ?>" width="180" height="40"/></td>
                                                       </tr>
                                                       <tr>
                                                           <td><?= GetMessage(
                                                                   "FORM_CAPTCHA_FIELD_TITLE"
                                                               ) ?><?= $arResult["REQUIRED_SIGN"]; ?></td>
                                                           <td><input type="text" name="captcha_word" size="30" maxlength="50" value=""
                                                                      class="inputtext"/></td>
                                                       </tr>
                                                       <?
                                                   }*/ // isUseCaptcha
                ?>
                <div class="question-form__btn-wrap">
                    <button class="btn btn_purple question-form__btn"<?= (intval(
                        $arResult["F_RIGHT"]
                    ) < 10 ? "disabled=\"disabled\"" : ""); ?>
                            type="submit" name="web_form_submit" value="<?= htmlspecialcharsbx(
                        trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage(
                            "FORM_ADD"
                        ) : $arResult["arForm"]["BUTTON"]
                    ); ?>"><?= htmlspecialcharsbx(
                            trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage(
                                "FORM_ADD"
                            ) : $arResult["arForm"]["BUTTON"]
                        ); ?></button>
                    <div class="question-form__btn-description">
                        Нажимая на кнопку, я соглашаюсь на <a href="/privacy/" target="_blank"
                                                              class="question-form__link">обработку
                            персональных данных</a>
                        <?
                            /*и с
                                                    <a href="#" target="_blank" class="question-form__link">правилами пользования
                                                        Платформы</a>*/ ?>
                    </div>
                </div>
            </div>

                    <?
                        } else {
                        ?>
                    <div class="question-form__block-right-sent-message">
                        <p>Спасибо за заявку!</p>
                    </div>
                    <?
                    } ?>

        </div>
        <a href="javascript:void(0)" class="question-form__close">
        </a>
        <?= $arResult["FORM_FOOTER"] ?>
    </div>
</div>
<script>
    if ($("input").is("#phone")) {
        $("#phone").click(function () {
            $(this).setCursorPosition(3)
        }).mask("+7(999) 999-9999", { autoclear: false })
    }

    if ($("input").is("#phone1")) {
        $("#phone1").click(function () {
            $(this).setCursorPosition(3)
        }).mask("+7(999) 999-9999", { autoclear: false })
    }

    /* Маска на поле ввода e-mail */
    if ($("input").is("#email")) {
        $("#email").blur(function () {

            var email = $(this).val(); // Получаем e-mail пользователя
            var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

            if (pattern.test(email)) {
                (this).classList.add('valid')
            } else {
                (this).classList.remove('valid')
            }
        })
    }

    if ($("input").is("#email1")) {
        $("#email1").blur(function () {

            var email = $(this).val(); // Получаем e-mail пользователя
            var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

            if (pattern.test(email)) {
                (this).classList.add('valid')
            } else {
                (this).classList.remove('valid')
            }
        })
    }
</script>