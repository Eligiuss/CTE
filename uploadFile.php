<?php
    $allowedExts = array("csv", "xls", "xlsx", "pdf");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);

    if (file_exists("upload/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
    }
?> 