<?php
$abc = 100;
$bcd = 'abc';
$cde = 'bcd';

//echo $$$cde;

$mang = [[[1,2,3],[3,4,5]],[4,5,6]];
//echo '<pre>',print_r($mang),'</pre>';

//echo $mang[0][0][1];

$mang_can_sap_xep = [5,12,4,30,27,6,8,10];

for($i = 0; $i < count($mang_can_sap_xep) - 1; $i++){
    for($j = $i + 1; $j < count($mang_can_sap_xep); $j++){
        if($mang_can_sap_xep[$i] > $mang_can_sap_xep[$j]){
            $temp = $mang_can_sap_xep[$j];
            $mang_can_sap_xep[$j] = $mang_can_sap_xep[$i];
            $mang_can_sap_xep[$i] = $temp;
        }
    }
}

echo '<pre>',print_r($mang_can_sap_xep),'</pre>';
?>