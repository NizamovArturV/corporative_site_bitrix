<?php    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {        die();    }        ?><div class="catalog__content-sorting sorting">    <div class="sorting__wrapper">        <span>Сортировать:</span>        <div class="sorting__selector-wrapper">            <a href="javascript:void(0)" class="sorting__selector">                <div class="sorting__selector-value">                    <?=$arResult['ACTIVE_NAME']?>                </div>                <div class="sorting__icon-arrow">                    <svg width="9" height="8" viewBox="0 0 9 8" fill="none"                         xmlns="http://www.w3.org/2000/svg">                        <g clip-path="url(#clip0)">                            <path d="M0.799805 3.36719L4.16698 6.73436L7.53415 3.36719" stroke="#5B17D0"                                  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />                        </g>                    </svg>                </div>            </a>            <div class="sorting__hidden">                <ul>                    <? foreach ($arResult['SORT'] as $sort):?>                        <li>                            <p class="<?=$sort['ACTIVE'] ? 'active' : ''?>"                               data-sort="<?=$sort['SORT_BY']?>" data-order="<?=$sort['SORT_ORDER']?>"><?=$sort['NAME']?></p>                        </li>                    <? endforeach;?>                </ul>            </div>        </div>        <div class="sorting__mobile-wrapper">            <a href="javascript:void(0)" class="sorting__mobile">                <div class="sorting__mobile-caption">                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none"                         xmlns="http://www.w3.org/2000/svg">                        <path fill-rule="evenodd" clip-rule="evenodd"                              d="M5.4285 1.57153C5.73161 1.57153 6.0223 1.69194 6.23662 1.90627C6.45095 2.1206 6.57136 2.41129 6.57136 2.71439V5.0001C6.57136 5.30321 6.45095 5.5939 6.23662 5.80823C6.0223 6.02255 5.73161 6.14296 5.4285 6.14296C5.1254 6.14296 4.83471 6.02255 4.62038 5.80823C4.40605 5.5939 4.28564 5.30321 4.28564 5.0001V2.71439C4.28564 2.41129 4.40605 2.1206 4.62038 1.90627C4.83471 1.69194 5.1254 1.57153 5.4285 1.57153V1.57153Z"                              stroke="#5B17D0" stroke-width="1.5" stroke-linecap="round"                              stroke-linejoin="round" />                        <path d="M19.143 3.85718H6.57153" stroke="#5B17D0" stroke-width="1.5"                              stroke-linecap="round" stroke-linejoin="round" />                        <path d="M4.28575 3.85718H0.857178" stroke="#5B17D0" stroke-width="1.5"                              stroke-linecap="round" stroke-linejoin="round" />                        <path fill-rule="evenodd" clip-rule="evenodd"                              d="M5.4285 13C5.73161 13 6.0223 13.1204 6.23662 13.3347C6.45095 13.5491 6.57136 13.8398 6.57136 14.1429V16.4286C6.57136 16.7317 6.45095 17.0224 6.23662 17.2367C6.0223 17.451 5.73161 17.5714 5.4285 17.5714C5.1254 17.5714 4.83471 17.451 4.62038 17.2367C4.40605 17.0224 4.28564 16.7317 4.28564 16.4286V14.1429C4.28564 13.8398 4.40605 13.5491 4.62038 13.3347C4.83471 13.1204 5.1254 13 5.4285 13Z"                              stroke="#5B17D0" stroke-width="1.5" stroke-linecap="round"                              stroke-linejoin="round" />                        <path d="M19.143 15.2859H6.57153" stroke="#5B17D0" stroke-width="1.5"                              stroke-linecap="round" stroke-linejoin="round" />                        <path d="M4.28575 15.2859H0.857178" stroke="#5B17D0" stroke-width="1.5"                              stroke-linecap="round" stroke-linejoin="round" />                        <path fill-rule="evenodd" clip-rule="evenodd"                              d="M14.5716 7.28589C14.8747 7.28589 15.1654 7.4063 15.3797 7.62062C15.594 7.83495 15.7144 8.12564 15.7144 8.42875V10.7145C15.7144 11.0176 15.594 11.3083 15.3797 11.5226C15.1654 11.7369 14.8747 11.8573 14.5716 11.8573C14.2685 11.8573 13.9778 11.7369 13.7634 11.5226C13.5491 11.3083 13.4287 11.0176 13.4287 10.7145V8.42875C13.4287 8.12564 13.5491 7.83495 13.7634 7.62062C13.9778 7.4063 14.2685 7.28589 14.5716 7.28589V7.28589Z"                              stroke="#5B17D0" stroke-width="1.5" stroke-linecap="round"                              stroke-linejoin="round" />                        <path d="M13.4286 9.57153H0.857178" stroke="#5B17D0" stroke-width="1.5"                              stroke-linecap="round" stroke-linejoin="round" />                        <path d="M19.1429 9.57153H15.7144" stroke="#5B17D0" stroke-width="1.5"                              stroke-linecap="round" stroke-linejoin="round" />                    </svg>                </div>                <p>Фильтры</p>            </a>        </div>    </div></div>