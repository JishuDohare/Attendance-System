<?php


$host = 'localhost';
$user = 'root';
$password = '';
$database = 'bolt_shukla';
$link = mysqli_connect($host, $user, $password, $database);
if(!$link)
{
    die("Database connectivity is not available");
}



$arr = file_get_contents('http://192.168.43.206/serialRead');
$arr = (string)$arr;
$arr = trim($arr);
$arr = substr($arr, 24, strlen($arr)-2);
$arr = str_replace(' ', '-', $arr);
$arr = preg_replace('/[^A-Za-z0-9\-]/', '', $arr);
$arr = str_replace('-', ' ', $arr);;
$query = 'SELECT * FROM `students` WHERE details= "'.$arr.'"';
$result = mysqli_query($link, $query);




if ($result)
{
    $query = 'UPDATE `students` SET counter=counter+1 WHERE details= "'.$arr.'"';
    $result = mysqli_query($link, $query);
    if ($result)
    {
        echo "This is working!!!!!";
    }
    print_r(mysqli_fetch_array($result));
    echo "Yeahhhhhh";
}
else
{
    $query = 'INSERT INTO `students` (details, counter) VALUES ("'.$arr.'", 1)';
    $result = mysqli_query($link, $query);
    if ($result)
    {
        echo 'Yesssssssssssss';
    }
    else{
        echo 'NOOOOOOOOOOOOOO';
    }

}



$myfile = fopen("attendence.txt", "a+") or die("Unable to open file!");
$txt = "John Doe\n";

file_put_contents('attendence.txt',$txt. "\r\n", FILE_APPEND);

$txt = "Jane Doe\n";

file_put_contents('attendence.txt', $txt . "\r\n", FILE_APPEND);

fclose($myfile);








?>

<html>

<!-- <meta http-equiv="refresh" content="10"> -->

</html>