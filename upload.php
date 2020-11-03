<?php

// echo '<pre>', print_r($_FILES), '</pre>';
// $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);

// // get only the extension (without the dot)
// $extension = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);

// // A unique name is concatenated with a dot and the $extention avec l'extension récupérée
// $filename = uniqid() . '.' .$extension;


// if (isset($_POST["submit"]))
//     {
//     move_uploaded_file($_FILES['fichier']['tmp_name'], $uploadFile);
// }

if (!empty($_FILES['files']['name'][0])){
    $files = $_FILES['files'];
    $upload = array();
    $failed = array();
    $allowed = array('jpg', 'png', 'gif');

    foreach($files['name'] as $position => $file_name){
        $file_tmp = $files['tmp_name'][$position];
        $file_size = $files['size'][$position];
        $file_error = $files['error'][$position];

        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));

        if(in_array($file_ext, $allowed)){
            if ($file_error === 0){
                if($file_size <= 1000000){
                    $file_name_new = uniqid('', true) . '.' . $file_ext;
                    $file_destination = 'uploads/'.$file_name_new;
                    if(move_uploaded_file($file_tmp, $file_destination)){
                        $upload[$position] = $file_destination;
                        echo "Upload ok !";
                        echo '<meta http-equiv="refresh" content="1;URL=index.php">';
                    }else{
                        $failed[$position] = "[{$file_name}] failed to upload";
                    }

                }else{
                    $failed[$position] = "[{$file_name}] : file size is too big";

                }
            }else{
                $failed[$position] = "[{$file_name}] errored with code : [{$file_error}]";
            }

        }else{
            // for debugging
            $failed[$position] = "[{$file_name}] file extension ".$file_ext." is not allowed";
        }
    }
}

if(!empty($uploaded)){
    print_r($uploaded);
}
if(!empty($failed)){
    print_r($failed);
}