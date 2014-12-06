<?php
/**
 * Created by PhpStorm.
 * User: yervandaghababyan
 * Date: 12/6/14
 * Time: 10:43 AM
 */


$products = array();

$products[] = [
    "name" => "Yervand",
    "price" => "$25",
    "url" => "http://google.com",
    "imgSrc" => "https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-xaf1/v/t1.0-9/299220_10150376441045962_1340579550_n.jpg"
];


$smarty->assign("products", $products);
$smarty->display('website/list.tpl');