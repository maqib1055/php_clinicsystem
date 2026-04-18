
<form action="">
    Item: <input type="text" placeholder="item Name">
    Barcode: <?php $random = rand(); ?>
    <input type="number" name="item_barcode" value="<?= $random ?>" readonly  >
</form>

<?php

//yeh barcode k liye library load ki ha autoload ki file jitne libraries hongi composer mein sb ka path load kr degi jo library apko use krni ho ap use ka keyword laga kr ya new ka keyword laga kr usay object bana kr use kr skte hain
require 'vendor/autoload.php';

//yeh aik random method ha jo random numbers generate krta ha
$inv = rand();
// $item_barcode = $_POST['item_barcode'];

//yeh aik live API + website ha jahan random QRcode generate kr skte ha
 $qrcode = "https://quickchart.io/qr?text=$inv";

 //yeh barcode ki library ka object ha qk hamain sticker chaiye esliye PNG generate kia 
 $generate = new Picqer\Barcode\BarcodeGeneratorPNG();

 //yeh folder banaiya ha tah k barcode ke label jise hum sticker bhi kehte woh save ho ske
 $barcodeImages = "barcode/" . time() . ".png";

 //yeh function barcode generate krega behalf on random number or usey barcode k folder mein image ki trah save krega har bar
 file_put_contents($barcodeImages, $generate->getBarcode($inv,$generate::TYPE_CODE_128) );

 


?>

<img src="<?= $qrcode ?>" alt="" >
<br>
<img src="<?= $barcodeImages ?>" alt=""> <br><span><?= $inv ?></span>