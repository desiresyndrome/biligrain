<?php 
if(in_category('nasinnya')) {
	include 'single-product.php'; 
}
elseif(in_category('nishovi-kulturi')) {
	include 'single-product.php'; 
}
else {
	include 'single-news.php'; 
}
?>