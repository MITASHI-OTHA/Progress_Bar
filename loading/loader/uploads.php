<?php

$erreur = "Erreur lors du transfert";
$erreur2 = "Image trop grande";	
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
$imageInformation = getimagesize($_FILES['photo']['tmp_name']);
$name=$_FILES['photo']['name'];

$imageWidth = $imageInformation[0]; 
$imageHeight = $imageInformation[1];
$extension_upload = strtolower(substr(strrchr($_FILES['photo']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) ) {
	
if(file_exists('photo/'.$_FILES['photo']['name']))
{
	$rand = rand(5, 50);
	$nom_fichier = $rand."_".$_FILES['photo']['name'];
	$resultat = move_uploaded_file($_FILES['photo']['tmp_name'],'photo/'.$nom_fichier);
	$parts=$rand."_".$_FILES['photo']['name'];
	echo "<div style='width:100%;background-color:#41F33B;color:#ffffff'><font size='3pt'><b>  VOUS AVEZ UPLOADE</b></font></div>";
}else{
$resultat = move_uploaded_file($_FILES['photo']['tmp_name'],'photo/'.$_FILES['photo']['name']);
	echo "<div style='width:100%;background-color:#41F33B;color:#ffffff'><font size='3pt'><b>  VOUS AVEZ UPLOADE</b></font></div>";
}
}	

?>