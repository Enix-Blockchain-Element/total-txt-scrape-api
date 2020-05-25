<?php

$doc = new DomDocument;
$doc->validateOnParse = true;
$doc->loadHTML(mb_convert_encoding(file_get_contents('https://explorer.enix.ai/'), 'HTML-ENTITIES', 'UTF-8'));

$xpath = new DOMXpath($doc);
$dashboard_banner_items = $xpath->query('//span[@class="dashboard-banner-network-stats-value"]');
$totalTransactions = 0;

foreach($dashboard_banner_items as $container) {
	
  if ($container->getAttribute('data-selector') == "transaction-count"){
  	$totalTransactions = $container->nodeValue;
  }
  
}

echo $totalTransactions;
exit;

?>