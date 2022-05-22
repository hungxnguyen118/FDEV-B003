<?php
// $ten_lop = "PHP/Laravel";
// echo "Học lớp $ten_lop nhé" . " test 123";
// $a += 1; //(a = a + 1)
// $chuoi .= "abc"; //(chuoi = chuoi . "abc")

// $a = 'ba123';
// $b = "b011";
// if(!!$a){
//     echo 'đúng';
// }
// else{
//     echo 'sai';
// }

if(isset($mang)){
    echo 'có tồn tại';
}
else{
    echo 'không tồn tại';
}

empty($bien);

echo pi() . '<br/>';

echo pow(9,10) . '<br/>';

echo rand(0,100) . '<br/>';

$mang = [1,2,3,4,5];
foreach($mang as $gia_tri){
    echo $gia_tri . '<br/>';
}

foreach($mang as $key => $gia_tri){
    echo $key . ':' . $gia_tri . '<br/>';
}

$chuoi_test = "Hôm nay em đi học";

$mang_test = ['Nguyễn Xuân Hùng', 'Lê Minh Hùng', 'Nguyễn Văn Lâm Sơn', 'Lê Thế Vinh'];

$mang_chuoi = explode('dfdfd', $chuoi_test);
echo '<pre>', print_r($mang_chuoi), '</pre>';

echo implode('<br/>', $mang_test);

echo mktime(24);
?>