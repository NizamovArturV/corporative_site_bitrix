<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';



$strReturn .= '<div class="breadcrumbs"><ul>';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);


	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
			<li>
				<a href="'.$arResult[$index]["LINK"].'" class="">
					'.$title.'
				</a>
			</li>';
	}
	else
	{
		$strReturn .= '
			<p class="breadcrumbs__this-page">
				'.$title.'
			</p>';
	}
}

$strReturn .= '</ul></div>';

return $strReturn;