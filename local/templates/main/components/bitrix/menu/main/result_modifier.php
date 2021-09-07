<?php if(!empty($arResult)) {

    $items = array();
    $key = 0;

    foreach($arResult as $arItem) {
        if($arItem['DEPTH_LEVEL'] == 1) {
            $items[] = $arItem;
            $key++;
        } else {
            $items[$key-1]['CHILDREN'][] = $arItem;
        }
    }

    $arResult = $items;

}