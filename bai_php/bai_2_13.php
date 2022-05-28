<?php

$mang_dong_vat = [
    "ho" => [
        "ten" => "Hổ",
        "mieu_ta" => "The tiger is the largest living cat species and a member of the genus Panthera. It is most recognisable for its dark vertical stripes on orange fur with a white underside. An apex predator, it primarily preys on ungulates such as deer and wild boar."
    ],
    "lac_da" => [
        "ten" => "Lạc Đà",
        "mieu_ta" => "A camel is an even-toed ungulate in the genus Camelus that bears distinctive fatty deposits known as \"humps\" on its back. Camels have long been domesticated and, as livestock, they provide food and textiles."
    ],
    "chim_canh_cut" => [
        "ten" => "Chim Cánh Cụt",
        "mieu_ta" => "Penguins are a group of aquatic flightless birds. They live almost exclusively in the Southern Hemisphere: only one species, the Galápagos penguin, is found at or north of the Equator. Highly adapted for life in the water, penguins have countershaded dark and white plumage and flippers for swimming."
    ],
    "gau_bac_cuc" => [
        "ten" => "Gấu Bắc Cực",
        "mieu_ta" => "The polar bear is a hypercarnivorous bear whose native range lies largely within the Arctic Circle, encompassing the Arctic Ocean, its surrounding seas and surrounding land masses. It is the largest extant bear species, as well as the largest extant land carnivore"
    ]
];

if(isset($_GET['dong_vat'])){
    $dong_vat_duoc_chon = $mang_dong_vat[$_GET['dong_vat']]['mieu_ta'];
}
else{
    $dong_vat_duoc_chon = $mang_dong_vat['ho']['mieu_ta'];
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
    <style>
        a.active {color: #f00}
    </style>
</head>
<body>
    
    <div class="container">
        
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="title">
                Các loại động vật
            </div>
            <div class="ds_dong_vat">
                <?php
                $dem = 0;
                foreach($mang_dong_vat as $key => $dong_vat){
                    $class = '';
                    if(isset($_GET['dong_vat'])){
                        if($_GET['dong_vat'] == $key){
                            $class = 'active';
                        }
                    }
                    else{
                        if($dem == 0){
                            $class = 'active'; 
                        }
                    }
                    $dem++;
                    ?>
                    <div>
                        <a class="<?php echo $class; ?>" href="?dong_vat=<?php echo $key; ?>">
                            <?php echo $dong_vat['ten']; ?>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <div class="title">
                Miêu tả động vật
            </div>
            <div class="mieu_ta">
                <?php echo $dong_vat_duoc_chon; ?>
            </div>
        </div>
        
        
    </div>

</body>
</html>