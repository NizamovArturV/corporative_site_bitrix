<?php foreach ($arResult['ITEMS'] as $key => $arItem){
    $arResult['ITEMS'][$key]['COUNT_SCHOOLS'] = \Wptt\Counter::getCountForUniversity($arItem['ID'])['COUNT'];
}