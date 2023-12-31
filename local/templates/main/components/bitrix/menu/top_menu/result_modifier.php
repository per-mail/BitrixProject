<?php
// подготавливаем данные пуктов меню к выводу
// создаём массив с готовыми элементами
$arPrepItems = [];
// проверка на наличие данных в переменной
if (!empty($arResult)) {
    foreach ($arResult as $key => $item) {
// если пункт меню первого уровня добавляем его в корень
        if ($item['DEPTH_LEVEL'] === 1) {
            $arPrepItems[] = $item;
        } else {
// если уровней вложенности больше, то пункт добавляется к родительскому пункту в подмассив subitems
			//функция array_keys() - собирает все ключи массива $arPrepItems
			//функция end()- получает последний элемент массива, чтобы в него добавлять вволоженные элементы
            $arPrepItems[end(array_keys($arPrepItems))]['subitems'][] = $item;
        }
    }
}
// прсваиваем $arResult полученный массив
$arResult = $arPrepItems;