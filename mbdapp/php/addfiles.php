<?php

include '../../phpconfig/allfunction.php';

if (isset($_POST['appidxx'])) {

    $appidxx = $_POST['appidxx'];
    $customer = $_POST['customer'];

    $files_names = array();

    // Create a new folder based on the $appidxx
    $folder_path = '../../assets/attachments/' . $customer . '_' . $appidxx;
    if (!file_exists($folder_path)) {
        mkdir($folder_path, 0777, true);
    }

    for ($i = 0; $i < count($_FILES['update_attachments']['name']); $i++) {
        $file_name = $_FILES['update_attachments']['name'][$i];
        $file_tmp = $_FILES['update_attachments']['tmp_name'][$i];
        
        if ($file_name != '') {
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $name = uniqid('attachment_') . '.' . $ext;
            $location = $folder_path . '/' . $name;

            // Check if the file name is already in the attachment names array
            while (in_array($location, $files_names)) {
                // If the file name is already in the array, regenerate the name
                $name = uniqid('attachment_') . '.' . $ext;
                $location = $folder_path . '/' . $name;
            }

            move_uploaded_file($file_tmp, $location);
        }
    }

} else {
    echo "Invalid request.";
}

?>