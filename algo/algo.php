<!-- #!/usr/bin/php
 -->
<?php
include("db.php");
include("decrypt.php");
session_start();
$adm_no = $_SESSION['login_adm_no'];
$rank = $_SESSION['rank'];
//$pref = 123;

//loop for all students
//$rank = 1;

for ($r = $rank; $r <= $rank + 6; $r++)
{
    $query = "SELECT p1,p2,p3,p4,p5,p6,p7 FROM preferences WHERE rank = '$r'";
    $result = mysqli_query($conn,$query);
    //printf("result = %d\n",$result);
    $pref = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //echo "pref1=";
    //printf("\n");
    //echo $pref["p1"];

    //for final preference
    $students_at_a_time = 7;
    $rank_mod = $r % $students_at_a_time;
    //echo "$rank_mod ";
    if($rank_mod === 1)//Student with only one preference
    {
        $f = $pref["p1"];

        $final_allot = room_no($f);
        $first_query = "INSERT INTO alloted (adm_no,rank,room_no,enc_no) VALUES ('$adm_no','$rank','$final_allot','$f')";
        $first_output = mysqli_query($conn,$first_query);
        // printf("query = %d",$first_output);
    }

}


#!/usr/bin/php
 
echo "hello world\n";
 
// ...
 


?>








