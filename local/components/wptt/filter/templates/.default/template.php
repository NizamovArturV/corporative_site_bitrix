<?php    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {        die();    }    use \Wptt\Main as Main;    $counterSelect = 0;    if (!function_exists('array_key_first')) {        function array_key_first(array $arr) {            foreach($arr as $key => $unused) {                return $key;            }            return NULL;        }    }    if( !function_exists('array_key_last') ) {        function array_key_last(array $array) {            if( !empty($array) ) return key(array_slice($array, -1, 1, true));        }    }    ?>    <?php//        Main::debug($arResult);        ?><div class="catalog-filter-body">    <div class="catalog-filter__higher-education">        <div class="catalog-filter__header">            <div class="catalog-filter__title">                Фильтры            </div>            <a href="javascript:void(0)" class="catalog-filter__icon-close">                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">                    <g>                        <path d="M9 13L3.10744 7.10744L9 1.21489" stroke="#1A1621" stroke-width="2"                              stroke-linecap="round" stroke-linejoin="round" />                    </g>                </svg>            </a>        </div>        <div class="catalog__filter ">            <form method="get" class="filter">                    <? foreach ($arResult['FILTERS'] as $code => $filter):?>                <? if ($filter['TYPE'] === 'SELECT'):                            $counterSelect++;?>                    <div class="filter-block">                    <div class="filter-block__header">                        <div class="filter-block__title">                            <?=$filter['NAME']?>                        </div>                    </div>                    <div class="filter-selector__wrap js-filterWrap<?=$counterSelect?>" id="filterWrap<?=$counterSelect?>">                        <div class="filter-selector__btn-show">Показать</div><!--                        <input type="hidden" name="PROPERTY_--><?//=$code?><!--" class="js-filter-input"--><!--                               value="--><?//=isset($_GET['PROPERTY_' . $code]) && $_GET['PROPERTY_' . $code] !== '' ? $_GET['PROPERTY_' . $code] : ''?><!--">-->                        <a href="javascript:void(0)" class="filter-selector">                            <? if (!isset($_GET['PROPERTY_' . $code])) {                                $titleSelect = 'Выбрать';                            } elseif ($_GET['PROPERTY_' . $code] === '') {                                $titleSelect = 'Все';                            } else {//                                $titleSelect = $filter['VALUES'][$_GET['PROPERTY_' . $code]];                                $titleSelect = 'Выбрано (' . count($_GET['PROPERTY_' . $code]) . ')';                            }?>                            <p class="all"><?=$titleSelect?></p>                            <div class="filter-selector__arrow-icon">                                <svg width="10" height="10" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <g>                                        <path d="M.714 3.571l4.209 4.21 4.209-4.21" stroke="#1A1621"                                              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />                                    </g>                                </svg>                            </div>                        </a>                            <div class="filter-selector__hidden js-hidden<?=$counterSelect?>">                                <ul>                                    <li>                                        <div class="filter-checkbox__wrap"><!--                                            <p class="filter-selector__field --><?//=$_GET['PROPERTY_' . $code] === '' ? 'active' : ''?><!--" data-value="">Все</p>-->                                            <input class="all_select" type="checkbox" id="all<?=$counterSelect?>" <?= count($_GET['PROPERTY_' . $code]) === count($filter['VALUES']) ? 'checked' : ''?>>                                            <label for="all<?=$counterSelect?>">Все</label>                                        </div>                                    </li>                                    <? foreach ($filter['VALUES'] as $idValue => $value):?>                                    <li>                                        <div class="filter-checkbox__wrap">                                            <input type="checkbox"                                                   id="<?=$code . '_' . $idValue?>"                                                   name="PROPERTY_<?=$code?>[]"                                                   value="<?=$idValue?>"                                                <?=array_search($idValue, $_GET['PROPERTY_' . $code]) !== false && isset($_GET['PROPERTY_' . $code]) ? 'checked' : ''?>                                            >                                            <label for="<?=$code . '_' . $idValue?>"><?=$value?></label>                                        </div><!--                                        <p class="filter-selector__field --><?//=$_GET['PROPERTY_' . $code] === $idValue ? 'active' : ''?><!--" data-value="--><?//=$idValue?><!--">--><?//=$value?><!--</p>-->                                    </li>                                    <? endforeach;?>                                </ul><!--                                <a href="javascript:void(0)" class="filter-selector__remove">--><!--                                    Сбросить--><!--                                </a>-->                            </div>                        <div class="filter-selector__buttons">                            <p class="filter-selector__buttons-hide">Свернуть</p>                            <p class="filter-selector__buttons-remove">Сбросить</p>                        </div>                    </div>                    </div>                            <? elseif ($filter['TYPE'] === 'CHECKBOX'  && $code !== 'TYPE'):?>                            <?/*=isset($_GET['PROPERTY_' . $code]) ? 'opened' : ''*/?>                <div class="filter-block opened">                    <div class="filter-block__header js-filter">                        <div class="filter-block__title">                            <?=$filter['NAME']?>                        </div>                        <div class="filter-block__hidden-open-icon">                            <svg width="10" height="10" fill="none" xmlns="http://www.w3.org/2000/svg">                                <g>                                    <path d="M.714 3.571l4.209 4.21 4.209-4.21" stroke="#1A1621" stroke-width="1.5"                                          stroke-linecap="round" stroke-linejoin="round" />                                </g>                            </svg>                        </div>                    </div>                    <div class="filter-block__hidden">                                <? foreach ($filter['VALUES'] as $idValue => $value):?>                                <div class="filter-checkbox__wrap">                                    <input type="checkbox" name="PROPERTY_<?=$code?>[]" value="<?=$idValue?>" id="<?=$idValue?>" <?=array_search($idValue, $_GET['PROPERTY_' . $code]) !== false && isset($_GET['PROPERTY_' . $code]) ? 'checked' : ''?>>                                    <label for="<?=$idValue?>"><?=$value?></label>                                </div>                                <? endforeach;?>                    </div>                </div>                          <? endif;?>                    <? endforeach;?>                <? if (isset($arResult['FILTERS']['AMOUNT'])):?>                <div class="filter-block opened">                    <div class="filter-block__header js-filter">                        <div class="filter-block__title">                            <?=$arResult['FILTERS']['AMOUNT']['NAME']?>                        </div>                        <div class="filter-block__hidden-open-icon">                            <svg width="10" height="10" fill="none" xmlns="http://www.w3.org/2000/svg">                                <g>                                    <path d="M.714 3.571l4.209 4.21 4.209-4.21" stroke="#1A1621" stroke-width="1.5"                                          stroke-linecap="round" stroke-linejoin="round" />                                </g>                            </svg>                        </div>                    </div>                    <div class="filter-block__hidden">                        <? if ($arParams['SECTION_CODE'] !== 'dpo'):?>                            <? foreach ($arResult['FILTERS']['TYPE']['VALUES'] as $idValue => $value):?>                        <div class="filter-checkbox__wrap">                            <input type="checkbox" name="PROPERTY_TYPE[]" value="<?=$idValue?>" id="<?=$idValue?>" <?=array_search($idValue, $_GET['PROPERTY_TYPE']) !== false && isset($_GET['PROPERTY_TYPE']) ? 'checked' : ''?>>                            <label for="<?=$idValue?>"><?=$value?></label>                        </div>                            <? endforeach;?>                            <? else:?>                            <? $idFirst = array_key_first($arResult['FILTERS']['TYPE']['VALUES']);                                $idSecond = array_key_last($arResult['FILTERS']['TYPE']['VALUES']);?>                            <div class="filter-checkbox__wrap">                                <input type="checkbox" name="PROPERTY_TYPE[]" value="<?=$idFirst?>" id="<?=$idFirst?>" <?=array_search($idFirst, $_GET['PROPERTY_TYPE']) !== false && isset($_GET['PROPERTY_TYPE']) ? 'checked' : ''?>>                                <label for="<?=$idFirst?>">Бесплатно</label>                            </div>                            <div class="filter-checkbox__wrap">                                <input type="checkbox" name="PROPERTY_TYPE[]" value="<?=$idSecond?>" id="<?=$idSecond?>" <?=array_search($idSecond, $_GET['PROPERTY_TYPE']) !== false && isset($_GET['PROPERTY_TYPE']) ? 'checked' : ''?>>                                <label for="<?=$idSecond?>">Платно</label>                            </div>                        <? endif;?>                        <? $min = str_replace(' ', '', $arResult['FILTERS']['AMOUNT']['VALUES']['MIN']) !== '' ? str_replace(' ', '', $arResult['FILTERS']['AMOUNT']['VALUES']['MIN']) : 0;                        $max = str_replace(' ', '', $arResult['FILTERS']['AMOUNT']['VALUES']['MAX']);;                        $start = isset($_GET['PROPERTY_AMOUNT_FROM']) && $_GET['PROPERTY_AMOUNT_FROM'] !== '' ? $_GET['PROPERTY_AMOUNT_FROM'] : $min;                            $finish = isset($_GET['PROPERTY_AMOUNT_TO']) && $_GET['PROPERTY_AMOUNT_TO'] !== '' ? $_GET['PROPERTY_AMOUNT_TO'] : $max;?>                        <? if ((int)$max > 0):?>                        <div class="range-slider__body">                            <div class="filter__inputs">                                <div class="filter__input-wrap">                                    <span class="filter__input-left">от</span>                                    <span class="filter__input-right">руб.</span>                                    <input type="text"  id="priceMin">                                    <input type="hidden" name="PROPERTY_AMOUNT_FROM" value="<?=$start?>" id="priceMinTrue">                                </div>                                <div class="filter__input-wrap">                                    <span class="filter__input-left">от</span>                                    <span class="filter__input-right">руб.</span>                                    <input type="text" class="filter-price__input" id="priceMax">                                    <input type="hidden" name="PROPERTY_AMOUNT_TO" value="<?=$finish?>"  id="priceMaxTrue">                                </div>                            </div>                            <div class="range-slider" id="range-slider"                                 data-min="<?=$min?>"                                 data-max="<?=$max?>"                                 data-start="<?=$start?>"                                 data-finish="<?=$finish?>"                            ></div>                        </div>                        <? endif;?>                    </div>                </div>                <? endif;?>                <? if (isset($arResult['FILTERS']['STUDYING_PERIOD'])):?>                    <? $min = str_replace(' ', '', $arResult['FILTERS']['STUDYING_PERIOD']['VALUES']['MIN']) !== '' ? str_replace(' ', '', $arResult['FILTERS']['STUDYING_PERIOD']['VALUES']['MIN']) : 0;                    $max = str_replace(' ', '', $arResult['FILTERS']['STUDYING_PERIOD']['VALUES']['MAX']);;                    $start = isset($_GET['PROPERTY_STUDYING_PERIOD_FROM']) && $_GET['PROPERTY_STUDYING_PERIOD_FROM'] !== '' ? $_GET['PROPERTY_STUDYING_PERIOD_FROM'] : $min;                    $finish = isset($_GET['PROPERTY_STUDYING_PERIOD_TO']) && $_GET['PROPERTY_STUDYING_PERIOD_TO'] !== '' ? $_GET['PROPERTY_STUDYING_PERIOD_TO'] : $max;?>                    <? if ((int)$max > 0):?>                <div class="filter-block opened">                        <div class="filter-block__header js-filter">                            <div class="filter-block__title">                                Срок обучения (по часам)                            </div>                            <div class="filter-block__hidden-open-icon">                                <svg width="10" height="10" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <g>                                        <path d="M.714 3.571l4.209 4.21 4.209-4.21" stroke="#1A1621" stroke-width="1.5"                                              stroke-linecap="round" stroke-linejoin="round" />                                    </g>                                </svg>                            </div>                        </div>                        <div class="filter-block__hidden">                            <div class="range-slider__body">                                <div class="filter__inputs">                                    <div class="filter__input-wrap">                                        <span class="filter__input-left">от</span>                                        <span class="filter__input-right">ч.</span>                                        <input type="text" id="hourMin">                                        <input type="hidden" name="PROPERTY_STUDYING_PERIOD_FROM" value="<?=$start?>" id="hourMinTrue">                                    </div>                                    <div class="filter__input-wrap">                                        <span class="filter__input-left">до</span>                                        <span class="filter__input-right">ч.</span>                                        <input type="text" id="hourMax">                                        <input type="hidden" name="PROPERTY_STUDYING_PERIOD_TO" value="<?=$finish?>"  id="hourMaxTrue">                                    </div>                                </div>                                <div class="range-slider" id="range-slider-hours"                                     data-min="<?=$min?>"                                     data-max="<?=$max?>"                                     data-start="<?=$start?>"                                     data-finish="<?=$finish?>"></div>                            </div>                        </div>                    </div>                    <? endif;?>                <? endif;?>                <? if ($arResult['FILTERS']['SECTIONS']):?>                    <div class="filter-block">                        <div class="filter-block__header">                            <div class="filter-block__title">                                <?=$arResult['FILTERS']['SECTIONS']['NAME']?>                            </div>                        </div>                        <div class="filter-selector__wrap js-filterWrap1" id="filterWrap1">                            <div class="filter-selector__btn-show">Показать</div>                            <a href="javascript:void(0)" class="filter-selector">                                <? if (!isset($_GET['SECTION_ID']) && !$arResult['FILTERS']['SECTIONS']['CODE']) {                                    $titleSelect = 'Выбрать';                                } elseif ($_GET['SECTION_ID'] === '' && empty($_GET['SECTION_ID'])) {                                    $titleSelect = 'Все';                                } elseif ($arResult['FILTERS']['SECTIONS']['CODE']) {//                                    $titleSelect = $arResult['FILTERS']['SECTIONS']['CURR_NAME']; Убрали потому что не помещается                                    $titleSelect = 'Выбрано (1)';                                } else {                                    $titleSelect = 'Выбрано (' . count($_GET['SECTION_ID']) . ')';                                }?>                                <p class="all"><?=$titleSelect?></p>                                <div class="filter-selector__arrow-icon">                                    <svg width="10" height="10" fill="none" xmlns="http://www.w3.org/2000/svg">                                        <g>                                            <path d="M.714 3.571l4.209 4.21 4.209-4.21" stroke="#1A1621"                                                  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />                                        </g>                                    </svg>                                </div>                            </a>                            <div class="filter-selector__hidden js-hidden1">                                <ul>                                    <li>                                        <div class="filter-checkbox__wrap">                                            <input class="all_select" type="checkbox" id="all1" <?= count($_GET['SECTION_ID']) === count($arResult['FILTERS']['SECTIONS']['VALUES']) ? 'checked' : ''?>>                                            <label for="all1">Все</label>                                        </div>                                    </li>                                    <? foreach ($arResult['FILTERS']['SECTIONS']['VALUES'] as $idValue => $value):?>                                        <? if (count(explode('/', $APPLICATION->GetCurPage())) > 3) {                                            $checked = $value['ACTIVE'] ? 'checked' : '';                                        } else {                                            $checked = array_search($idValue, $_GET['SECTION_ID']) !== false && isset($_GET['SECTION_ID']) ? 'checked' : '';                                        }?>                                        <li>                                            <div class="filter-checkbox__wrap">                                                <input type="checkbox"                                                       id="<?=$idValue?>"                                                       name="SECTION_ID[]"                                                       value="<?=$idValue?>"                                                    <?=$checked?>                                                >                                                <label for="<?=$idValue?>"><?=$value['NAME']?></label>                                            </div>                                        </li>                                    <? endforeach;?>                                </ul>                            </div>                            <div class="filter-selector__buttons">                                <p class="filter-selector__buttons-hide">Свернуть</p>                                <p class="filter-selector__buttons-remove">Сбросить</p>                            </div>                        </div>                    </div>                <? endif;?>                <? if ($counterSelect === 1):?>                    <div class="filter-selector__wrap" id="filterWrap2"></div>                <? endif;?>                <button type="submit" class="btn btn_purple filter__btn">Применить</button>                <a href="<?=$arParams['SECTIONS'] === 'Y' ? $arParams['PARENT_PAGE'] : $APPLICATION->GetCurPage()?>" class="btn filter__btn filter__btn_close">Сбросить</a>                <input type="hidden" name="SORT_BY" id="SORT_BY" value="<?=isset($_GET['SORT_BY']) && $_GET['SORT_BY'] !== '' ? $_GET['SORT_BY'] : ''?>">                <input type="hidden" name="SORT_ORDER" id="SORT_ORDER" value="<?=isset($_GET['SORT_ORDER']) && $_GET['SORT_ORDER'] !== '' ? $_GET['SORT_ORDER'] : ''?>">                <input type="hidden" name="search" id="search" value="<?=$_GET['search']?>">            </form>        </div>    </div></div>