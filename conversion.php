<?php
function currency($from, $to, $amount)
{
   $content = file_get_contents('https://www.google.com/finance/converter?a='.$amount.'&from='.$from.'&to='.$to);

   $doc = new DOMDocument;
   @$doc->loadHTML($content);
   $xpath = new DOMXpath($doc);

   $result = $xpath->query('//*[@id="currency_converter_result"]/span')->item(0)->nodeValue;

   return str_replace(' '.$to, '', $result);
}
?>

// run it like this
currency('USD', 'GBP', 1);
