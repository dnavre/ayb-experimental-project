<?php
/**
 * Created by PhpStorm.
 * User: yervandaghababyan
 * Date: 12/6/14
 * Time: 10:41 AM
 */


$smarty->assign("menu_item", "souvenir");
$smarty->setTitle("Cool T-Shirt!");
$smarty->assign("css_link", "/css/website/souvenir.css");
$smarty->display("website/souvenir.tpl");
?>

<html>
<body>

<div classs="photoes">
  <div class="main photo"></div>
  <div class="other photos"></div>
</div>
<div class="featured souvenires"></div>

<div class="souvenir imformaton">
	
</div>
</body>
</html>
