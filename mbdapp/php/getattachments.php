<?php

include '../../phpconfig/allfunction.php';

$indicators = "";
$carouselItems = "";

if (isset($_POST['appid'])) {

    $appid = $_POST['appid'];
    $name = $_POST['name'];

    $folder_path = "../../assets/attachments/" . $name . $appid;

    $files = scandir($folder_path);

    $imageUrls = array();

    foreach ($files as $index => $file) {
        if ($file != '.' && $file != '..') {
            $imageUrls[$file] = $folder_path . "/" . $file; // Store image URL in the array
        }
    }

    foreach ($imageUrls as $filename => $image_url) {
            $target = array_search($filename, array_keys($imageUrls)); // Change target for each file
            $slide = $target + 1; // Change slide for each file

            $url = str_replace("../.", "", $image_url);

            $indicators .= "<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='".$target."'";
            if ($target == 0) {
                $indicators .= " class='active' aria-current='true'";
            }
            $indicators .= " aria-label='Slide ".$slide."'></button>";

            $carouselItems .= "<div class='carousel-item";
            if ($target == 0) {
                $carouselItems .= " active";
            }
            $carouselItems .= "'>
                                 <img src='".$url."' class='d-block w-100' alt=''>
                               </div>";
    }

    // Add the carousel controls (prev and next buttons)
    $carouselControls = "<button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='prev'>
                            <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                            <span class='visually-hidden'>Previous</span>
                        </button>
                        <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='next'>
                            <span class='carousel-control-next-icon' aria-hidden='true'></span>
                            <span class='visually-hidden'>Next</span>
                        </button>";

    $carouselIndicators = "<div class='carousel-indicators'>".$indicators."</div>";
    $carouselInner = "<div class='carousel-inner'>".$carouselItems."</div>";

    $display = $carouselIndicators.$carouselInner.$carouselControls;

}

echo $display;

?>
