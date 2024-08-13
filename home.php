<?php 
    require_once("phpconfig/session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCORE-ADMIN • New Sample</title>
    
    <!-- Bootstrap 5.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap-icons-1.10.5/font/bootstrap-icons.css">

    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="css/jquery.datatables.min.css">
    <link href='css/buttons.datatables.min.css' rel='stylesheet' type='text/css'>

    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.7.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="assets/hricon.png">
    <link rel="stylesheet" href="stylesheets/styles-general.css">

    <!-- Data Tables Min -->
    <script type="text/javascript" charset="utf8" src="js/jquery.datatables.min.js"></script>
    <script src="js/datatables.buttons.min.js"></script>
    <script src="js/jszip.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
    <script src="js/buttons.html5.min.js"></script>

    <!-- Alertify JS -->
    <link rel=" stylesheet" href="css/alertify.min.css" />
    <link rel="stylesheet" href="css/bootstrap.rtl.min.css" />

    <!-- SELECT2 -->
    <link rel="stylesheet" href="css/select2.min.css" />
    <script src="js/select2.min.js"></script>

    <!-- Table Built-in Export -->
    <link href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF/jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/extensions/export/bootstrap-table-export.min.js"></script>

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
                <button class="menu-button link_user" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="USER PROFILE">
                    <i class="bi bi-person-circle fa-lg"></i>
                </button>
                <button class="menu-button link_truck" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="JOB ORDER">
                    <i class="bi bi-wrench-adjustable-circle fa-lg"></i>
                </button>
                <button class="menu-button link_dtr" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="DTR REPORT">
                    <i class="bi bi-clock fa-lg"></i>
                </button>
                <button class="menu-button link_po" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="P.O. HISTORY">
                    <i class="bi bi-receipt"></i>
                </button>
                <button class="menu-button link_canvass" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="CANVASS">
                    <i class="bi bi-clipboard2-check"></i>
                </button>
                <button class="menu-button link_mcoresupp" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="MCORE SUPPLIER">
                    <i class="bi bi-boxes"></i>
                </button>
                <button class="menu-button link_creditapp" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="CREDIT APPLICATION">
                    <i class="bi bi-window-plus"></i>
                </button>
                <button class="menu-button link_memo" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="INFRACTION & MEMO">
                    <i class="bi bi-info-square"></i>
                </button>
                <button class="menu-button link_sample" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="SAMPLE ONLY">
                    <i class="bi bi-code-slash"></i>
                </button>
            </div>
            <div class="col-lg-3 d-flex justify-content-end">
                <button class="logout text-dark logout-button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Click to Logout">
                    <span class="username"></span>
                    <a href="logout.php" class="hover-text">Logout</a>
                </button>
                <i class="btn btn-sm btn-light bi bi-list sidebar-button"></i>
            </div>
        </nav>

        <div class="sidebar shadow-sm row">
            <div class="mt-5">&nbsp;</div>
            <button class="menu-button link_user fs-6 text-start text-nowrap"><i class="bi bi-person-circle"></i>&nbsp;Profile</button>
            <button class="menu-button link_truck fs-6 text-start text-nowrap"><i class="bi bi-wrench-adjustable-circle"></i>&nbsp;Job Order</button>
            <button class="menu-button link_dtr fs-6 text-start text-nowrap"><i class="bi bi-clock"></i>&nbsp;DTR Report</button>
            <button class="menu-button link_po fs-6 text-start text-nowrap"><i class="bi bi-receipt"></i>&nbsp;P.O. History</button>
            <button class="menu-button link_canvass fs-6 text-start text-nowrap"><i class="bi bi-clipboard2-check"></i>&nbsp;Canvass</button>
            <button class="menu-button link_mcoresupp fs-6 text-start text-nowrap"><i class="bi bi-boxes"></i>&nbsp;MCORE Supplier</button>
            <button class="menu-button link_creditapp fs-6 text-start text-nowrap"><i class="bi bi-window-plus"></i>&nbsp;Credit Application</button>
            <button class="menu-button link_memo fs-6 text-start text-nowrap"><i class="bi bi-info-square"></i>&nbsp;Infraction & Memo</button>
            <button class="menu-button link_sample fs-6 text-start text-nowrap"><i class="bi bi-code-slash"></i>&nbsp;Sample Only</button>
            <button class="menu-button fs-6 text-start text-nowrap"><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-left"></i>&nbsp;Logout</a></button>
        </div>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->


    <!--Main layout-->
    <main>
        <div id="masterDiv" class="mt-5">

        </div>
    </main>
    <!--Main layout-->


    <!-- MODALS -->
    <div class="modal fade" id="NewModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <p>This is a modal sheet, a variation of the modal that docs itself to the bottom of the viewport like the newer share sheets in iOS.</p>
                </div>
                <div class="modal-footer flex-nowrap p-0">
                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" id="submitBtn">
                        <strong>Submit</strong>
                        <span class="spinner-border spinner-border-sm d-none"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- Alertify JS -->
    <script src="js/alertify.min.js"></script>

    <script>
        // LOGGED IN USER
        var cashiername = localStorage.getItem("login_name");

        $(document).ready(function() {
            if (localStorage.getItem("alertShown") !== "true") {
                localStorage.setItem("alertShown", "true");
                alertify.set('notifier', 'position', 'top-right');
                alertify.success('Welcome ' + cashiername);
            }

            $('.username').html(cashiername);
        });

        // THIS IS THE SIDE BAR FUNCTION
        const sidebar = document.querySelector('.sidebar');
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

        // THIS IS THE ACTIVE ON CLICK FUNCTION
        $('.menu-button').on("click", function() {
            $('.menu-button').removeClass("clicked animate");
            $(this).addClass("clicked animate");

            var tooltip = bootstrap.Tooltip.getInstance(this);
            if (tooltip) {
                tooltip.hide();
            }
        });

        // THIS IS THE ON HOVER FUNCTION
        // temporarily removed to accomodate the new logout animation
        /*$('.logout').mouseenter(function() {
            $(this).addClass("clicked animate");
        }).mouseleave(function() {
            $(this).removeClass("clicked animate");
        });*/


        // THIS IS THE LINK NAVIGATION FUNCTIONS
        $(".link_user").click(function(e) {
            readfilesphp("profile/user.php");
            $('#NewModal').modal("show");
        });

        $(".link_truck").click(function(e) {
            location.href = "truckrepairnav.php";
        });
        
        $(".link_dtr").click(function(e) {
            readfilesphp("dtr/dtr_rep.php");
        });

        $(".link_po").click(function(e) {
            readfilesphp("po/po_rqhis.php");
        });

        $(".link_canvass").click(function(e) {
            location.href = "canvassnav.php";
        });

        $(".link_mcoresupp").click(function(e) {
            readfilesphp("mcoresupp/assign_suppid.php");
        });

        $(".link_creditapp").click(function(e) {
            readfilesphp("mbdapp/short_term_app.php");
        });

        $(".link_memo").click(function(e) {
            readfilesphp("memo/writtenmemo.php");
        });

        $(".link_sample").click(function(e) {
            location.href = ("sample/samplenav.php");
        });
        
        function readfilesphp(url) {
            $.get(url, function(data) {
                $("#masterDiv").html(data);
            });
        }

        $(document).ready(function() {
            $('#submitBtn').on('click', function() {
                var button = $(this);
                var buttonText = button.find('strong');

                buttonText.text("Loading");
                button.find('.spinner-border').removeClass("d-none");

                setTimeout(function() {
                    buttonText.text("Submit");
                    button.find('.spinner-border').hide();
                }, 2000);
            });
        });
        
    </script>

</body>

</html>