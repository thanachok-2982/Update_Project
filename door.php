<?php
if (isset($_POST['msg'])) {
    $myfile = fopen("door.txt", "w");
    $msg = $_POST['msg'];
    
    fwrite($myfile ,$msg."\n");
    fclose($myfile);
}
else {
}

$data = file_get_contents("door.txt");
echo $data;

?>
