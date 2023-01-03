<?php
include'../include/config.php';

if(isset($_POST['insertBook'])){
    $name = sec($_POST['name']);
    $make = sec($_POST['make']);
    $booktag = sec($_POST['categ']);
    $language = sec($_POST['language']);
    $paper = sec($_POST['paper']);
    $link = sec($_POST['link']);
    $idcate = sec($_POST['idcate']);
    
    $file = $_FILES['img'];
	$fileName = $file['name'];
	$fileType = $file['type'];
	$fileTmpName = $file['tmp_name'];
	$fileError = $file['error'];
	$fileSize = $file['size'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	$fileAllowed = array('png' , 'jpg' , 'jpeg' , 'svg' , 'gif');

	if(in_array($fileActualExt , $fileAllowed)){
		if($fileError === 0){
			if($fileSize < 10000000){

				$fileNewName = rand().".".$fileActualExt;
				$fileDestinition = "../../assets/upload/$fileNewName";
				move_uploaded_file($fileTmpName , $fileDestinition);
			}
		}
	}

    
        $PhotoQuery = mysqli_query($db , "INSERT INTO 
		`book`(`names`, `photo`, `make`, `languageobject`,`booktag`, `categories`, `numpaper`, `views`, `link`)
		 VALUES('$name', '$fileNewName', '$make' , '$language', '$booktag' , '$idcate', '$paper' , 1, '$link')");
		if($PhotoQuery){
			header('Location: ../main.php?success');
	    } else{
            header('Location: ../main.php?fail');
        }
    
}

?>