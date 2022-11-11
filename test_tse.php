<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>
           وب سایت اختصاصی کارگزاری هوشمند رابین شعبه نجف آباد
        </title>
        <link rel="stylesheet" href="moamelat.css" type="text/css" >
        
    </head>
    
    <body>
<?php
/* Najafabad HoshmanRabin Stock Broker(Modaber Asia)
 * programin by:ahmad mostafaie (ahma3090@yahoo.com)
 * under GNU/GPL Licence
 * Enable curl in php.ini
 */
require_once './tse_function.php';
$data=get_stock_price_hist("خودرو");
echo '<br>';
foreach ($data as $value) {
    foreach ($value as $key => $values) {
        echo $key." ".$values."<br>";
    }
}
?>

    </body>
</html>
