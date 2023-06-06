<?php

if (isset($_POST['msg'])) {
    $myfile = fopen("data.txt", "w");
    $msg = $_POST['msg'];

    echo $msg ;
    fwrite($myfile ,$msg."\n");
    fclose($myfile);
}
else {
}

$myfile = fopen("data.txt", "r");

while(!feof($myfile)) {
    echo fgets($myfile). "<br/>";

}
fclose($myfile);

?>
