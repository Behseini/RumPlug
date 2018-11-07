<?php
require_once("../../wp-load.php");
$file = "http://eye/Data/we.csv";
if (($handle = fopen($file, "r")) !== FALSE) {
    $count = 0;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $count++;
    if ($count == 1) { continue; }
        if (count($data) > 1) {
            we_load_posts($data[0],
                          $data[1],
                          $data[2],
                          $data[3],
                          $data[4],
                          $data[5],
                          $data[6],
                          $data[7],
                          $data[8],
                          $data[9],
                          $data[10],
                          $data[11],
                          $data[12],
                          $data[13],
                          $data[14],
                          $data[15],
                          $data[16],
                          $data[17]
                        );
        }
    }
    echo $count-1 . " Rows Successfuly Inserted";
    fclose($handle);
}

// $onSale          =  'onSale_box';
// $onSaleDiscount  = 'onSaleDiscount_box';
// $name            = 'name_box';
// $brand           = 'brand_box;
// $price           = 'price_box';
// $SKU             = 'sku_box';
// $material        = 'material_box';
// $gender          = 'gender_box';
// $colorsNumber    = 'cNumber_box';
// $colorsNames     = 'cNames_box';
// $colorIDs        = 'cIDs_box';
// $colorImages     = 'cImages_box';
// $sizeNumber      = 'sNumber_box';
// $sizeOptions     = 'sOptions_box';
// $shape           = 'shape_box';
// $rim             = 'rim_box';
// $thumbnail       = 'thumbnail_box';
function we_load_posts($onSale,$onSaleDiscount, $title, $brand, $price, $SKU,$material, $gender, $colorsNumber,$colorsNames,$colorIDs,$colorImages,$sizeNumber,$sizeOptions,$shape,$rim, $thumbnail)
{
    wp_insert_post(array(
        "post_type" => "women_eyeglasses",
        "post_title" => $title,
        "meta_input" => array(
                            "onSale_box" => $onSale,
                            "onSaleDiscount_box" => $onSaleDiscount,
                            "name_box"=>$title,
                            "brand_box"=>$brand,
                            "price_box" => $price,
                            "sku_box" => $SKU,
                            "material_box" => $material,
                            "gender_box" => $gender,
                            "cNumber_box" => $colorsNumber,
                            "cNames_box" => $colorsNames,
                            "cIDs_box"   => $colorIDs,
                            "cImages_box" => $colorImages,
                            "sNumber_box" => $sizeNumber,
                            "sOptions_box" => $sizeOptions,
                            "shape_box" => $shape,
                            "rim_box" => $rim,
                            "thumbnail_box"=>$thumbnail,
        ),
        "post_status" => "publish"
    ));


}
