<?php
//echo $_FILES["image"]["tmp_name"];
$nom = $_FILES["image"]["name"];
if(file_exists("photo/".$_FILES["image"]["tmp_name"])){
	$rand= rand(5,100);
	$nom = $rand."_".$nom;
	move_uploaded_file($_FILES["image"]["tmp_name"], "photo/".$nom);
}else{
	
	move_uploaded_file($_FILES["image"]["tmp_name"], "photo/".$nom);
}



?>