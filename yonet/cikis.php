<?php 

require_once '../sistem/ayar.php';

session_destroy();

header ('Location:'.$ayarrow['site_url'].'/yonet');

?>