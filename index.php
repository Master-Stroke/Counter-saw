<?php
$files = $_SERVER['TXT']."viewsifun.txt";
if ( !file_exists($files) ) {file_put_contents($files, date('d.m.Y').":0,0%%%0,0"); }
else {
$rez = file_get_contents($files);
$rez = explode("%%%", $rez);
$rezall = explode(",", $rez[1]);
//echo $rezall[0]; //Просмотры за все врем
$rezdata = preg_replace('/:.*/', '', $rez[0]);
$rezpr = preg_replace('/.*:/', '', $rez[0]);
$rezpr = explode(",", $rezpr);
if (strtotime(date('d.m.Y')) == strtotime($rezdata)) {
$rezpr[0] = $rezpr[0] + 1; //просмотры +1
file_put_contents($files, date('d.m.Y').":".$rezpr[0].",".$rezpr[1]."%%%".$rezall[0].",".$rezall[1]."");
}
$rezall[0] = $rezpr[0] + $rezall[0];
if (!isset($_COOKIE['visitors'])) {
else $ynikuser = 0;
file_put_contents($files, date('d.m.Y').":1,".$ynikuser."%%%".$rezall[0].",".$rezall[1]."");
}
}

//Вывод данных счетчика
$rezview = file_get_contents($files);
$rezview = explode("%%%", $rezview);
$rezview = preg_replace('/.*:/', '', $rezview[0]);
$rezview = explode(",", $rezview);
echo "<div style='color: white'>Просмотров: ".$rezview[0];"</div>"
?>
