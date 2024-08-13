<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCORE-ADMIN | CANVASS</title>
    
    <!-- Bootstrap 5.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap-icons-1.10.5/font/bootstrap-icons.css">

    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="css/jquery.datatables.min.css">
    <link href='css/buttons.datatables.min.css' rel='stylesheet' type='text/css'>

    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.7.0.js"></script>

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="assets/hricon.png">
    <link rel="stylesheet" href="stylesheets/styles-general.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/printStyle.css">

    <!-- Data Tables Min -->
    <script type="text/javascript" charset="utf8" src="js/jquery.datatables.min.js"></script>
    <script src="js/datatables.buttons.min.js"></script>
    <script src="js/jszip.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
    <script src="js/buttons.html5.min.js"></script>

    <!-- SELECT2 -->
    <link rel="stylesheet" href="css/select2.min.css" />
    <script src="js/select2.min.js"></script>


</head>

<body>


    <!--Main Navigation-->
    <header>
        <!-- Navbar -->
        <nav class="navbar shadow-sm">
            <div class="col-lg-3">
                <a href="home.php"><img src="assets/image2.PNG" height="40" alt="MBD-Logo"/></a>
            </div>
            <div class="col-lg-6 justify-content-center menu">
                <button class="menu-button link_vass" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="CREATE CANVASS">
                    <i class="bi bi-pencil-fill fa-lg"></i>
                </button>
                <button class="menu-button link_rprt" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="CANVASS REPORT">
                    <i class="bi bi-file-earmark-text fa-lg"></i>
                </button>
            </div>
            <div class="col-lg-3 d-flex justify-content-end">
                <button class="menu-button link_back" id="link_back" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="GO BACK">
                    <i class="bi bi-box-arrow-left fa-lg"></i>
                </button>
                <i class="btn btn-sm btn-light bi bi-list sidebar-button"></i>
            </div>
        </nav>

        <div class="sidebar shadow-sm row">
            <div class="mt-5">&nbsp;</div>
            <button class="menu-button link_vass fs-6 text-start text-nowrap"><i class="bi bi-pencil-fill"></i>&nbsp;Create Canvass</button>
            <button class="menu-button link_rprt fs-6 text-start text-nowrap"><i class="bi bi-file-earmark-text"></i>&nbsp;Canvass Report</button>
            <button class="menu-button link_back fs-6 text-start text-nowrap"><i class="bi bi-box-arrow-left"></i>&nbsp;Go Back</button>
        </div>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->


    <!--Main layout-->
    <main>
        <div id="masterDiv">

        </div>
    </main>
    <!--Main layout-->


    <script>

        readfilesphp("canvass/canvass_create.php");

        $(".link_vass").click(function(e) {
            readfilesphp("canvass/canvass_create.php");
        });

        $(".link_rprt").click(function(e) {
            readfilesphp("canvass/canvass_report.php");
        });

        $(".link_back").click(function(e) {
            location.href = "index.php";
        });
        

        function readfilesphp(url) {
            datas = "";
            $.get(url, function(data) {
                $("#masterDiv").html(data);
            });
        }

        // THIS IS THE SIDE BAR FUNCTION
        var sidebar = document.querySelector('.sidebar');
        document.querySelector('.sidebar-button').addEventListener('click', () => {
            sidebar.classList.toggle('open');
        });

        // THIS IS THE TOOLTIP FUNCTION
        $(document).ready(function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });

        // THIS IS THE ACTIVE AND ON CLICK FUNCTION
        $(".link_vass").addClass("clicked animate");
        $('.menu-button').on("click", function() {
            $('.menu-button').removeClass("clicked animate");
            $(this).addClass("clicked animate");

            var tooltip = bootstrap.Tooltip.getInstance(this);
            if (tooltip) {
                tooltip.hide();
            }
        });
        
    </script>

</body>

</html>