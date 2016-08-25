<?php
function resize($size, $dw = 2, $dh = 2) {
    $x = 0;
    $y = 0;

    if(strpos($size, "x")) {
        $ex = explode("x", $size);
        if($this->width/$this->height <= $ex[0]/$ex[1]) {
            $new_width = $ex[0];
            $new_height = floor($ex[0]/($this->width/$this->height));
            $y = floor(0-(($new_height-$ex[1])/$dh));
        } else {
            $new_width = floor($this->width/$this->height*$ex[1]);
            $new_height = $ex[1];
            $x = floor(0-(($new_width-$ex[0])/$dw));
        }
        $this->thumb = imagecreatetruecolor($ex[0], $ex[1]);
    } else {
        if($this->width > $this->height) {
            $new_width = $size;
            $new_height = floor($size*$this->height/$this->width);
        } else {
            $new_width = floor($size*$this->width/$this->height);
            $new_height = $size;
        }
        $this->thumb = imagecreatetruecolor($new_width, $new_height);
    }
    imagecopyresized($this->thumb, $this->original, $x, $y, 0, 0, $new_width, $new_height, $this->width, $this->height);
}
// исходная картинка
$img = "https://www.totalproduce.com/content/uploads/2016/02/france_map.png";
// накладываемая картинка
$watermark_src = 'http://www.iconsdb.com/icons/preview/soylent-red/map-marker-2-xxl.png';
// получаем ее размер
$sizeWM = getimagesize($watermark_src);
$heightWM = $sizeWM[1]; // высота
$widthWM = $sizeWM[0]; // ширина
// Загружаем изображения
$image = imagecreatefrompng($img);
$watermark = imagecreatefrompng($watermark_src);
// задаем прозрачность
imagesavealpha($watermark, true);
imagesavealpha($image, true);
// координаты верхнего левого угла накладываемой картинки
$x = 5;
$y = 5;
// Копируем
imagecopy(
    $image, $watermark, $x, $y, 0, 0,
    $widthWM, $heightWM
);
// задаем заголовок, чтоб вывести результат в браузере
header('Content-Type: image/jpeg');
// выводим картинку
imagepng($image);
// очищаем память
imagedestroy($image);
imagedestroy($watermark);

?>