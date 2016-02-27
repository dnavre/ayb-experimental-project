<?php

global $ss_errors;

define('SS_ERROR_SOUVENIRS_IN_CATEGORY', 1);
define('SS_ERROR_IMAGE_SIZE', 2);
define('SS_ERROR_IMAGE_EXTENSION', 3);
define('SS_ERROR_IMAGE_IN_SOUVENIR', 4);


$ss_errors[SS_ERROR_SOUVENIRS_IN_CATEGORY] = 'There is a souvenir which category is this one. First change that souvenirs category!';
$ss_errors[SS_ERROR_IMAGE_SIZE] = 'Image size is too big';
$ss_errors[SS_ERROR_IMAGE_EXTENSION] = 'You have to upload only image files.';
$ss_errors[SS_ERROR_IMAGE_IN_SOUVENIR] = 'You have to upload only image files.';
