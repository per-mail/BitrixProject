<?php
// здесь получаем id  картинок
if (!empty($arResult['PROPERTIES']['gallery']['VALUE'])) {
	// проходимся циклом по всем id
    foreach ($arResult['PROPERTIES']['gallery']['VALUE'] as $key => $photoId) {
		// метод GetFileArray() получает всю информацию о картинке по id
        $arPhoto = CFile::GetFileArray($photoId);
		// формируем массив photos и отправляем его шаблону
        $arResult['PROPERTIES']['photos'][$key]['src'] = $arPhoto['SRC'];
    }
}
