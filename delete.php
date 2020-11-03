<?php

if (isset($_GET['delete']) && $_GET['delete'] <> ''){
    if (file_exists("uploads/".$_GET['delete'])){
        unlink("uploads/".$_GET['delete']);
        echo "Delete ok !";
        echo '<meta http-equiv="refresh" content="2;URL=index.php">';
    }
}