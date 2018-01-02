<?php

// include composer autoload
require '../vendor/autoload.php';

// import the INtervention Image Manager Class
use Intervention\Image\ImageManager;

// create an image manager instance
$manager = new ImageManager();

$name = urldecode($_SERVER['QUERY_STRING']);
$name = strtolower($name);
$name = ucwords($name);

if (strlen($name) < 6) {
    $font_size = 40;
} elseif (strlen($name) < 8) {
    $font_size = 30;
} elseif (strlen($name) < 12) {
    $font_size = 28;
} elseif (strlen($name) >= 12) {
    $font_size = 22;
}

// create image instances
$image = $manager->make('eastlink_balloons.jpg');

$image->text('HAPPY BIRTHDAY', 323, 295, function($font) use($font_size) {
    $font->file('AmaticSC-Regular.ttf');
    $font->size(88);
    $font->color('#36268A');
    $font->align('center');
    $font->valign('middle');
});

$image->text($name, 323, 385, function($font) use($font_size) {
    $font->file('AmaticSC-Regular.ttf');
    $font->size(88);
    $font->color('#36268A');
    $font->align('center');
    $font->valign('middle');
});


print $image->response();