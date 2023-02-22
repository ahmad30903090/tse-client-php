<?php
/* Najafabad HoshmanRabin Stock Broker(Modaber Asia)
 * programin by:ahmad mostafaie (ahma3090@yahoo.com)
 * under GNU/GPL Licence
 * Enable curl in php.ini
 */
function get_web_id($nemad = "شپنا") {
    $address = "http://www.tsetmc.com/tsev2/data/search.aspx?skey=" . $nemad;

    $useragent = "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36";
    $ch = curl_init($address);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');

    $response = curl_exec($ch);
    curl_close($ch);

    $lines = explode(';', $response);

    $sahm = "shepna";
    $$sahm = array();
    $counter = 0;
    foreach ($lines as $key => $value) {
        $myarr = explode(",", $value);
        return $myarr[2];
        $stockvalue = array('nemad' => $myarr[0], 'name' => $myarr[1], 'web_id' => $myarr[2]);
        array_push($$sahm, $stockvalue);

        break;
        $counter++;
    }
    echo 'stock array' . $sahm . 'with ' . $counter . ' Rows values Created !';
}

function get_stock_price_hist($f_nemad) {
    $web_id=get_web_id($f_nemad);
    $address = "http://members.tsetmc.com/tsev2/data/InstTradeHistory.aspx?i=".$web_id."&Top=999999&A=0";
    $content = file_get_contents($address);

    $useragent = "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36";
    $ch = curl_init($address);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
    $active=null;
    $response = curl_exec($ch);
    curl_close($ch);

    $lines = explode(';', $response);

    $sahm = $f_nemad;
    $$sahm = array();
    $counter = 0;
    foreach ($lines as $key => $value) {
        $myarr = explode("@", $value);
        if (count($myarr) != 10)
            break;
        $stockvalue = array('Date' => $myarr[0], 'High' => $myarr[1], 'Low' => $myarr[2], 'Final' => $myarr[3], 'Close' => $myarr[4], 'Open' => $myarr[5], 'Y-Final=>$myarr[6]', 'Value' => $myarr[7], 'Volume' => $myarr[8], 'No' => $myarr[9]);
        array_push($$sahm, $stockvalue);
      //  print_r($stockvalue);
        $counter++;
    }
    echo "<br> <br>";
    print_r($$sahm[0]);
    echo "<br>";
    echo 'stock array' . $sahm . 'with ' . $counter . ' Rows values Created !';
    return $$sahm;
}


 
