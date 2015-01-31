<?php
/**
 * Created by PhpStorm.
 * User: yervandaghababyan
 * Date: 12/6/14
 * Time: 10:43 AM
 */


$smarty->assign("menu_item", "souvenir");
$smarty->assign("css_link", "css/website/list.css");
$smarty->assign("title", "Souvenirs | AYB Souvenir Shop");
$smarty->display("website/list.tpl");