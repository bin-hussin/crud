<?php 
require_once __DIR__ ."/../config/connection.php"; 




function filterString($field){
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(empty($field)){
        return false;
    }
    return $field;
}



function filterEmail($field){
    $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
    if(filter_var($field , FILTER_VALIDATE_EMAIL)){
        return $field;

    }else{
        return false;
    }

}

function canUploadFile($file){
    $allowed = [
        'jpg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
        'svg' => 'image/svg',
        'text' => 'text/plain',
        'csv' => 'text/csv',
        'pdf' => 'application/pdf',
        'doc' => 'application/msword',
        'docx' => 'application/vnd.openxmlformats-officedocument',

    ];

    $maxFileSize = 100 * 1024;
    $fileMimeType = mime_content_type($file['tmp_name']);
    $fileSize = $file['size'];

    if(!in_array($fileMimeType, $allowed)) {
        return 'File type is not allowed';

    }

    if($fileSize > $maxFileSize){
       return 'File size is not allowed';
    }
    return true;
}


$nameError = $emailError = $documentsError = $messageError = '';
$name = $email= $document = $message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  
   

    $name = filterString($_POST['name']);
    if(!$name){
       
        $nameError = 'Your name is required';
    }
    $email = filterEmail($_POST['email']);
    if(!$email){
    $emailError = 'Your email is invalid';
    }
   
    $message = filterString($_POST['message']);
    if(!$message){
        $messageError = 'You must enter a message'; 
 
    }

       

    if(isset($_FILES['documents']) && $_FILES['documents']['error'] == 0){
        // echo "File is fine";
        $canUploadFile = canUploadFile($_FILES['documents']);

        if($canUploadFile === true) {

            $uploadDir = 'upload/products';

            //if(!is_dir ($uploadDir)){
            //    umask(0);
              //  mkdir ($uploadDir, 0775, );
         //   }   


            $fileName = time().$_FILES['documents']['name'];
            if(!file_exists ($uploadDir . '/' . $fileName)){
                $documentsError = 'File already exists';
                } else {    
                move_uploaded_file($_FILES['documents'][' tmp_name'], $uploadDir .'/' . $fileName);
                }

        }else{
            $documentsError = $canUploadFile;
        }
 

       // $insertMessage = 
      //  "insert into messagess (names, emails, documents, messages)".
      // / "values ('$name', '$email', '$document','$message')";
       /// $conn ->query("$insertMessage"); 
       // if($conn->error){
       //     echo $conn->error;
      //  }
       
    }

} 


