<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Confirmation</h1>
    <?php 

    $document_root = $_SERVER['DOCUMENT_ROOT'];
        $bub = $_POST['bub'];
        $bab = $_POST['bab'];
        $address = $_POST['address'];


        //create a file
        $fileAddress =  "$document_root/orders/orders.txt";
        $fp = fopen($fileAddress, "wb");
        $outputstring = "$bub, $bab, adressed to: $address".PHP_EOL; 
        //
        flock($fp, LOCK_EX);
        fwrite($fp, $outputstring, strlen($outputstring));
        flock($fp, LOCK_UN);
        fclose($fp);
        echo "<p>Your order has been processed for this address:<br/>".htmlspecialchars($address)."</p>";

    
    ?>
</body>
</html>