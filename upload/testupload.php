<?php
require_once  "src/bulletproof.php";

$image = new Bulletproof\Image($_FILES);

if($image["pictures"]){
    $upload = $image->upload(); 
	
    if($upload){
        echo $upload->getFullPath(); // uploads/cat.gif
    }else{
        echo $image["error"]; 
    }
}