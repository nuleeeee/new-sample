<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCORE-ADMIN | JOB ORDER</title>
    
    <!-- Bootstrap 5.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap-icons-1.10.5/font/bootstrap-icons.css">

    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.7.0.js"></script>

    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="css/jquery.datatables.min.css">
    <link href='css/buttons.datatables.min.css' rel='stylesheet' type='text/css'>

    <!-- Bootstrap Datatable -->
    <link href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/tableExport.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF/jspdf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.10.21/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/extensions/export/bootstrap-table-export.min.js"></script>

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="assets/hricon.png">
    <link rel="stylesheet" href="stylesheets/styles-general.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/printStyle.css">

    <!-- SELECT2 -->
    <link rel="stylesheet" href="css/select2.min.css" />
    <script src="js/select2.min.js"></script>

    <!-- Data Tables Min -->
    <script type="text/javascript" charset="utf8" src="js/jquery.datatables.min.js"></script>
    <script type="text/javascript" src="js/datatables.editor.js"></script>
    <script type="text/javascript" src="js/datatables.buttons.min.js"></script>
    <script type="text/javascript" src="js/datatables.select.min.js"></script>
    <script type="text/javascript" src="js/datatables.datetime.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/editor.datatables.min.css">

     <!-- Excel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

    <!-- Animate on Scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

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
                <button class="menu-button link_suppadd" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="ADD SUPPLIER">
                    <i class="bi bi-person-add fa-lg"></i>
                </button>
                <button class="menu-button link_truck" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="JOB ORDER">
                    <i class="bi bi-wrench-adjustable-circle fa-lg"></i>
                </button>
                <button class="menu-button link_rprt" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="JOB ORDER PENDING">
                    <i class="bi bi-file-text fa-lg"></i>
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
            <button class="menu-button link_suppadd fs-6 text-start text-nowrap"><i class="bi bi-person-add"></i>&nbsp;Add Supplier</button>
            <button class="menu-button link_truck fs-6 text-start text-nowrap"><i class="bi bi-wrench-adjustable-circle"></i>&nbsp;Job Order</button>
            <button class="menu-button link_rprt fs-6 text-start text-nowrap"><i class="bi bi-file-text"></i>&nbsp;Job Order Pending</button>
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


    <!-- MODALS -->
    <div class="modal fade" id="AddSupplier" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5">Add Supplier</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0 mb-3">
                    <div class='row'>
                        <div class='col-sm-6'>
                            <label for='name_addsupplier'>Name</label>
                            <input type='text' id='name_addsupplier' class='form-control' placeholder="Input Name...">
                        </div>
                        <div class='col-sm-6'>
                            <label for='contactno_addsupplier'>Contact Number</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">+63</span>
                                <input type='text' id='contactno_addsupplier' class='form-control' placeholder="9123456789" maxlength="10">
                            </div>
                            <i class="invalidnum text-danger d-none">Invalid Contact Number</i>
                        </div>
                        <div class='col-sm-12'>
                            <label for='address_addsupplier'>Address</label>
                            <input type='text' id='address_addsupplier' class='form-control' placeholder="Input Address...">
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-nowrap p-0">
                    <button type='button' class='btn btn-lg btn-link fs-6 text-decoration-none col-12 py-3 m-0 rounded-0' id="addSupplier">
                        <strong>Add Supplier</strong>
                        <span class="spinner-border spinner-border-sm d-none"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- SUCCESS MODAL -->
    <div class="modal fade" id="successMsgModal" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5">Success</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <p>Job Order Sent.</p>
                </div>
                <div class="modal-footer flex-nowrap p-0">
                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-12 py-3 m-0 rounded-0" data-bs-dismiss="modal">
                        <strong>Done</strong>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- ORDER SENT MODAL -->
    <div class="modal fade" id="ordersentMsgModal" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5">Success</h1>
                </div>
                <div class="modal-body py-0">
                    <p>Job Order Saved.</p>
                </div>
                <div class="modal-footer flex-nowrap p-0">
                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-12 py-3 m-0 rounded-0" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#SendAsEmail">
                        <strong>Send As Email</strong>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- ERROR MODAL -->
    <div class="modal fade" id="errorMsgModal" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fs-5">Error</h1>
                </div>
                <div class="modal-body py-0">
                    <p>Please check your inputs.</p>
                </div>
                <div class="modal-footer flex-nowrap p-0">
                    <button type="button" class="btn btn-lg btn-link text-danger fs-6 text-decoration-none col-12 py-3 m-0 rounded-0" data-bs-dismiss='modal'>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <input type="text" class="d-none" id="branchid" disabled value="<?php echo $_SESSION['branch']; ?>">

    <script>
        var branchid = $('#branchid').val();

        readfilesphp("truckrepair/jo_creation.php");

        $(".link_suppadd").click(function(e) {
            $("#AddSupplier").modal("show");
        });

        $(".link_truck").click(function(e) {
            readfilesphp("truckrepair/jo_creation.php");
        });

        $(".link_rprt").click(function(e) {
            readfilesphp("truckrepair/jo_pending.php");
        });

        $(".link_back").click(function(e) {
            location.href = "home.php";
        });

        function readfilesphp(url) {
            var datas = "";
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

        $('.link_suppadd').mouseenter(function() {
            $(this).addClass("clicked animate");
        }).mouseleave(function() {
            $(this).removeClass("clicked animate");
        });

        // THIS IS THE ACTIVE AND ON CLICK FUNCTION
        $(".link_truck").addClass("clicked animate");

        $('.menu-button:not(.link_suppadd)').on("click", function() {
            $('.menu-button').removeClass("clicked animate");
            $(this).addClass("clicked animate");

            var tooltip = bootstrap.Tooltip.getInstance(this);
            if (tooltip) {
                tooltip.hide();
            }
        });

        // Check for branch
        $(document).ready(function() {
            if (branchid != 0) {
                $('#link_rprt').hide();
            } else {
                $('#link_rprt').show();
            }
        });

        $('.link_truck').click(function() {
            location.reload();
            setTimeout(function() {
                location.reload();
            }, 100);
        });


        $(document).ready(function() {
            $('#addSupplier').on('click', function() {
                var button = $(this);
                var buttonText = button.find('strong');

                var add_name = $('#name_addsupplier').val().replace(/'/g, "`").replace(/(\r\n|\n|\r)/gm, " ");
                var add_contact = $('#contactno_addsupplier').val();
                var add_address = $('#address_addsupplier').val().replace(/'/g, "`").replace(/(\r\n|\n|\r)/gm, " ");

                if (add_contact.length < 10) {
                    $('.invalidnum').removeClass("d-none");
                    inputElement = document.getElementById('contactno_addsupplier');
                    inputElement.focus();
                    return;
                } else {
                    buttonText.text("Adding supplier");
                    button.find('.spinner-border').removeClass("d-none");

                    setTimeout(function() {
                        buttonText.html("<i class=\"bi bi-check-all fa-lg\"></i>");
                        button.find('.spinner-border').hide();
                        addSupplier(add_name, add_contact, add_address);
                    }, 2000);
                }
            });
        });

        // ADDING OF SUPPLIER
        function addSupplier(add_name, add_contact, add_address) {
            $.post('truckrepair/php/addnewsupplier.php', {
                add_name: add_name,
                add_contact: add_contact,
                add_address: add_address
            }, function(result) {
                clearModal();
                $('#AddSupplier').modal('hide');

                location.reload();
                setTimeout(function() {
                    location.reload();
                }, 100);
            });
        }

        function clearModal() {
            document.getElementById("name_addsupplier").value = "";
            document.getElementById("contactno_addsupplier").value = "";
            document.getElementById("address_addsupplier").value = "";
        }
    </script>

</body>

</html>