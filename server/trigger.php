<?php
$file = fopen("result.txt","a");
fwrite($file,"Hello!!");
fclose($file);
$data=array("m" => "Function triggers!!");
print_r(json_encode($data));
return json_encode($data);
?>