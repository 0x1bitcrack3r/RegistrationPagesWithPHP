<?php
/**
 * Created by PhpStorm.
 * User: VishnuVarmaRamineni
 * Date: 3/1/2016
 * Time: 8:05 PM
 */

//First check if everything is filled in
mysql_connect("localhost","root","admin");
mysql_select_db("comments");
$name=$_POST['name'];
$comment=$_POST['comment'];
$submit=$_POST['submit'];

$dbLink = mysql_connect("comments", "root", "");


if($submit){
//Do a mysql_real_escape_string() to all fields

//Then insert comment
    mysql_query("INSERT INTO comment VALUES ($author,$postid,$body,$etc)");
}
else
{
    die("Fill out everything please. Mkay.");
}
?>