<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Upload Files</h1>
    <div class="container">
        <div class="col">
            <div class="row">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Upload photo</label>
                    <input type="file" name="files[]" multiple class="form-control-file" id="exampleFormControlFile1">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <br>

        <div class="col">
            <div class="row">
        
              <?php
              $path = "uploads/";
              $it = new FilesystemIterator($path);
              foreach ($it as $fileinfo) {
                $file_path = $path.$fileinfo->getFilename();
                $file_name = $fileinfo->getFilename();
                ?>
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="<?=$file_path ?>" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title"><?= $file_name ?></h5>
                    <a role="button" href="delete.php?delete=<?=$file_name ?>" class="btn btn-danger">Delete</a>
                  </div>
                </div>
              <?php 
              }
              ?>
    </div>

                


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>