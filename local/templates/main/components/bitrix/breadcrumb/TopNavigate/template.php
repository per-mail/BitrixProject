<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

// комментарии с определением переменных
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

// проверяем есть ли в $arResult переменные с элементвми навигационной цепочки, если их нет возвращаем пустую строку 
if (empty($arResult)) {
    return '';
}
// выводим каркас
$res = '<div class="col-md-5 col-sm-6">
            <div class="breadcrumb-menu">
                <ol class="breadcrumb text-right">';
// выводим пункты
$elCount = count($arResult);
foreach ($arResult as $index => $item) {
// для последнего элемента не выводим ссылку, выводим пустой якорьЮ который будет вести на пустую страницу
    $link = (!empty($item['LINK']) && $index < ($elCount - 1)) ? $item['LINK'] : '#';
    $title = $item['TITLE'] ?? '';
    $res .= '<li>
                <a href="' . $link . '">' . $title . '</a>
            </li>';
}

$res .= '        </ol>
            </div>
        </div>';

return $res;