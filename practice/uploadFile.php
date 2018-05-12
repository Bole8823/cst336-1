<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        
        
        <?php
        function reArrayFiles(&$file_post) {
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}
// http://php.net/manual/en/features.file-upload.multiple.php

if (isset($_POST['uploadForm'])) {

    $file_ary = reArrayFiles($_FILES['fileName']);

    foreach ($file_ary as $file) {
        if ($file["error"] > 0) {
          echo "Error: " . $file["error"] . "<br>";
        }
        else {
          echo "Upload: " . $file["name"] . "<br>";
          echo "Type: " . $file["type"] . "<br>";
          echo "Size: " . ($file["size"] / 1024) . " KB<br>";
          echo "Stored in: " . $file["tmp_name"] . "<br><br>";
        }  
        // print 'File Name: ' . $file['name'];
        // print 'File Type: ' . $file['type'];
        // print 'File Size: ' . $file['size'];
    }

} //endIf form submission
?>
        <form method="POST" action="uploadFile.php" enctype="multipart/form-data">
    <!--Use multiple attribute and array for input name-->
    Select file: <input type="file" multiple name="fileName[]" /> <br />
    <input type="submit" name="uploadForm" value="Upload File" />
</form>
    </body>
</html>