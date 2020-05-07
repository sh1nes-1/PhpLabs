<?php
const FONT_PATH = __DIR__ . "/ArialUnicodeMS.ttf";

// user defined constants
$img_padding = 20;

$img_width = 1800;
$img_height = 900;

$x_visible_divisions = 40;
$y_visible_divisions = 20;
$division_size = 12;

$division_weight_x = 1;
$division_weight_y = 0.5;

$font_size = 10;
$hint_margin = 14;

if (isset($_REQUEST['img_padding'])) {
    $img_padding = $_REQUEST['img_padding'];
}

if (isset($_REQUEST['img_width'])) {
    $img_width = $_REQUEST['img_width'];
}

if (isset($_REQUEST['img_height'])) {
    $img_height = $_REQUEST['img_height'];
}

if (isset($_REQUEST['x_visible_divisions'])) {
    $x_visible_divisions = $_REQUEST['x_visible_divisions'];
}

if (isset($_REQUEST['y_visible_divisions'])) {
    $y_visible_divisions = $_REQUEST['y_visible_divisions'];
}

if (isset($_REQUEST['division_size'])) {
    $division_size = $_REQUEST['division_size'];
}

if (isset($_REQUEST['division_weight_x'])) {
    $division_weight_x = $_REQUEST['division_weight_x'];
}

if (isset($_REQUEST['division_weight_y'])) {
    $division_weight_y = $_REQUEST['division_weight_y'];
}

// calculated values
$draw_width = $img_width - $img_padding;
$draw_height = $img_height - $img_padding;

$center_x = $img_width / 2;
$center_y = $img_height / 2;

$interval_width = $draw_width / $x_visible_divisions;
$interval_height = $draw_height / $y_visible_divisions;

// create image and colors
$img = imagecreatetruecolor($img_width, $img_height);
$color_white = imagecolorallocate($img, 255, 255, 255);
$color_black = imagecolorallocate($img, 0, 0, 0);
$color_blue = imagecolorallocate($img, 0, 200, 50);

imageantialias($img, true);

// fill background
imagefill($img, 0, 0, $color_white);

// draw axis
imageline($img, $img_padding / 2, $center_y, $img_padding / 2 + $draw_width, $center_y, $color_black);
imageline($img, $center_x, $img_padding / 2, $center_x, $img_padding / 2 + $draw_height, $color_black);

// draw scale x
for ($i = 1; $i <= $x_visible_divisions / 2; $i++) {
    $left_division_x = $center_x - $interval_width * $i;
    $right_division_x = $center_x + $interval_width * $i;

    // draw negative
    imageline(
        $img, 
        $left_division_x, 
        $center_y - $division_size / 2, 
        $left_division_x, 
        $center_y + $division_size / 2, 
        $color_black
    );

    $left_hint = -$i * $division_weight_x;
    $left_hint_size = imagettfbbox($font_size, 0, FONT_PATH, $left_hint);

    // https://www.php.net/manual/en/function.imagettfbbox.php
    $left_hint_width = $left_hint_size[2] - $left_hint_size[0];

    imagettftext($img, $font_size, 0, $left_division_x - $left_hint_width / 2, $center_y + $font_size + $hint_margin, $color_black, FONT_PATH, $left_hint);

    // draw positive
    imageline(
        $img, 
        $right_division_x, 
        $center_y - $division_size / 2, 
        $right_division_x, 
        $center_y + $division_size / 2, 
        $color_black
    );

    $right_hint = $i * $division_weight_x;
    $right_hint_size = imagettfbbox($font_size, 0, FONT_PATH, $right_hint);

    // https://www.php.net/manual/en/function.imagettfbbox.php
    $right_hint_width = $right_hint_size[2] - $right_hint_size[0];

    imagettftext($img, $font_size, 0, $right_division_x - $right_hint_width / 2, $center_y + $font_size + $hint_margin, $color_black, FONT_PATH, $right_hint);    
}

// draw scale y
for ($i = 1; $i <= $y_visible_divisions / 2; $i++) {
    $top_division_y = $center_y - $interval_height * $i;
    $bottom_division_y = $center_y + $interval_height * $i;

    imageline(
        $img, 
        $center_x - $division_size / 2, 
        $top_division_y, 
        $center_x + $division_size / 2, 
        $top_division_y, 
        $color_black
    );

    $top_hint = $i * $division_weight_y;
    imagettftext($img, $font_size, 0, $center_x + $hint_margin, $top_division_y + $font_size / 2, $color_black, FONT_PATH, $top_hint);

    imageline(
        $img, 
        $center_x - $division_size / 2, 
        $bottom_division_y, 
        $center_x + $division_size / 2, 
        $bottom_division_y, 
        $color_black
    );

    $bottom_hint = -$i * $division_weight_y;
    imagettftext($img, $font_size, 0, $center_x + $hint_margin, $bottom_division_y + $font_size / 2, $color_black, FONT_PATH, $bottom_hint);
}

// draw 0
imagettftext($img, $font_size, 0, $center_x + $hint_margin / 2, $center_y + $font_size + $hint_margin / 2, $color_black, FONT_PATH, "0");

$prev_x = null;
$prev_y = null;

for ($x = 0; $x <= $x_visible_divisions / (2 * $division_weight_x); $x += 0.0007) {        
    $y = sin($x);        

    if ($prev_x != null && $prev_y != null) {
        imageline(
            $img, 
            $center_x + $prev_x * $interval_width * $division_weight_x, 
            $center_y + $prev_y * $interval_height / $division_weight_y, 
            $center_x + $x * $interval_width * $division_weight_x, 
            $center_y + $y * $interval_height / $division_weight_y, 
            $color_blue
        );  

        imageline(
            $img, 
            $center_x + (-$prev_x * $interval_width * $division_weight_x), 
            $center_y + (-$prev_y * $interval_height / $division_weight_y), 
            $center_x + (-$x * $interval_width * $division_weight_x), 
            $center_y + (-$y * $interval_height / $division_weight_y), 
            $color_blue
        );         
    }

    $prev_x = $x;
    $prev_y = $y;
}

unset($prev_x);
unset($prev_y);

header("Content-type: image/png");
imagepng($img);
imagedestroy($img);