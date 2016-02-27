<?php
global $smarty;
http_response_code(404);

$smarty -> display("website/404.tpl");
die();
?>