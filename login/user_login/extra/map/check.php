<?php
session_start();
include("db.php");

$flag = 0;
$query = "SELECT * FROM valid_con";
$result = mysqli_query($conn,$query);
while($output = mysqli_fetch_array($result,MYSQLI_ASSOC))
{
    //compare
    //$flag =1; if matches
    if($_GET['adm'] === $output['adm_no'])
    {
        $flag = 1;
        break;
    }
}

if($flag === 1){
    //valid condidate
    $data=array("link" => "book.php");
    print_r(json_encode($data));
    return json_encode($data);
}
else
{
    //not valid
    $data=array("link" => "invalid");
    print_r(json_encode($data));
    return json_encode($data);
}
?>