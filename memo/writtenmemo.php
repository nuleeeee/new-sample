    <div class="container" style="padding-top: 10px;">
        <div class="col alert alert-warning alert-dismissible fade show col-lg-12 shadow-sm mt-5 p-2" role="alert">
            <strong>Please Note!</strong> If there is no penalty code shown, please select/change to other options first, and then re-select to the category you wish to select to reload the penalty code area.
            <br>
            <br>
            If the selections did not load properly, please click on Issue Written Memo button again.
            <button type="button" class="btn-close" style="width: 5px; height: 2px; margin-right: 10px; background-color: transparent;" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

    <form>
        <div class="container">

            <div class="row p-3">
                <div class="col-sm-6 bg-light shadow-sm p-3 border left-container">
                    <div class="mt-2">
                        <label class="fw-bold">Main Category</label><br>
                        <select id="main_cat" class="form-select" onchange="getSubCategory1(); ClearCategories();">

                        </select>
                    </div>

                    <div class="mt-2">
                        <label class="fw-bold">Sub Category 1</label><br>
                        <select id="sub_cat_one" class="form-select" onchange="getSubCategory2();">

                        </select>
                    </div>

                    <div class="mt-2">
                        <label class="fw-bold">Sub Category 2</label><br>
                        <select id="sub_cat_two" class="form-select" onchange="getSubCategory3();">

                        </select>
                    </div>

                    <div class="mt-2 SubCat3 d-none">
                        <label class="fw-bold">Sub Category 3</label><br>
                        <select id="sub_cat_three" class="form-select" onchange="displaySubCategory3();">

                        </select>
                    </div>

                    <div class="row">
                        <div class="col-lg-9 mt-2">
                            <label for="emp_name" class="fw-bold">Employee Name</label><br>
                            <select id="emp_name" class="form-select">

                            </select>
                        </div>

                        <div class="col-lg-3 mt-2">
                            <label class="fw-bold text-nowrap">Penalty Code</label>
                            <input type="text" id="penalty_code" class="form-control form-control-sm text-center fw-bold" readonly>
                        </div>
                    </div>

                    <div class="mt-2">
                        <label for="infraction_date" class="fw-bold">Infraction Date</label><br>
                        <input type="date" id="infraction_date" class="form-control" onchange="checkWarnings();">
                    </div>

                    <div class="mt-2">
                        <label class="fw-bold">Details of Offense</label><br>
                        <textarea id="smalldesc" rows="15" class="form-control"></textarea> 
                    </div>
                </div>


                <!-- Right Container -->
                <div class="col-sm-6 bg-light shadow-sm p-3 border right-container">
                    <div>
                        <button type="button" class="btn generate-btn d-none btn-md next mt-4 w-100" id="nextmemo" data-bs-toggle="modal" data-bs-target="#ViewMemos" style="margin-bottom: -20px;">
                            Next
                        </button>

                        <button type="button" class="btn generate-btn d-none btn-md gene mt-4 w-100" onclick="IssueMemo();">
                            Generate
                        </button>
                    </div>

                    <div>
                        <div class="table-warnings mt-5" id="checkwarnings">
                
                        </div>
                    </div>
                </div>
            </div>


        <!-- MODAL TO NEXT BUTTON -->
        <div class="modal fade" id="ViewMemos" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: rgb(49, 49, 117); color:white;">
                        <h1 class="modal-title fs-5 text-center" id="ModalLabel"><b>Issue Written Memo</b></h1>
                    </div>
                    <div class="modal-body">

                        <?php include "modals/modalviewmemos.php" ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-closee bouncy" data-bs-dismiss="modal" style="background-color: white; color: rgb(49, 49, 117); border: 2px solid rgb(49, 49, 117);">Close</button>
                        <span style="margin: 0 5px;"></span>
                        <button id="btn_sent" class="btn save bouncy" onclick="IssueMemo()">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert Modal for Submission -->
        <div class="modal fade modal-success" id="submitReload" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="submitSuccessLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-submitSuccess">
                        <h1 class="modal-title fs-5" id="submitSuccessLabel">Successful</h1>
                    </div>
                    <div class="modal-body">
                        Submitted.
                        
                        <br><br>

                        <i><b>NOTE:</b> Please double check the Suspension Date Effectivity. Avoid submitting of the same suspension date.</i>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success bouncy" data-bs-toggle="modal" data-bs-target="#ViewMemos" style="background-color: white; color: green; border: 2px solid green;">Continue</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert Modal for Submission -->
        <div class="modal fade modal-success" id="submitDone" data-bs-backdrop="static" tabindex="-1" aria-labelledby="submitSuccessLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-submitSuccess">
                        <h1 class="modal-title fs-5" id="submitSuccessLabel">Successful</h1>
                    </div>
                    <div class="modal-body">
                        Done
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-closeee bouncy" data-bs-dismiss="modal" style="background-color: white; color: green; border: 2px solid green;">OK</button>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </form>


<script type="text/javascript">

    // Initialization
    getMainCategory();
    getEmployee();

    var previousPenalty = "";

    function ClearCategories() {
        event.preventDefault();

        $("#sub_cat_one").val([]);
        $("#sub_cat_two").val([]);
        $("#sub_cat_three").val([]);
        $("#penalty_code").val([]);
    }

    function getMainCategory() {
        event.preventDefault();

        $.post('memo/php/getmaincat.php', {}, function(result) {
            $("#main_cat").html(result);
        });
    }

    function getSubCategory1() {
        event.preventDefault();

        maincat = $("#main_cat").val();

        $.post('memo/php/getsubcat1.php', {maincat: maincat}, function(result) {
            $("#sub_cat_one").html(result);
        });
    }

    function getSubCategory2() {
        event.preventDefault();

        subcat1 = $("#sub_cat_one").val();
        subCatItems = subcat1.split("/");

        firstItem = subCatItems[0]; // Contains infcod2idxx
        secondItem = subCatItems[1]; // Contains inf2code
        thirdItem = subCatItems[2]; // Contains penalty

        if (subcat1 == 0) {
            $("#penalty_code").val("");
        }

        if (secondItem == 5.8) {
            $(".SubCat3").removeClass("d-none");
        } else {
            $(".SubCat3").addClass("d-none");
        }

        previousPenalty = thirdItem;

        $("#penalty_code").val(thirdItem);

        $.post('memo/php/getsubcat2.php', {subcat1: firstItem}, function(result) {
            $("#sub_cat_two").html(result);
        });
    }

    function getSubCategory3() {
        event.preventDefault();

        subcat2 = $("#sub_cat_two").val();
        subCatItems = subcat2.split("/");

        firstItem = subCatItems[0]; // Contains infcod3idxx
        secondItem = subCatItems[1]; // Contains inf3code
        thirdItem = subCatItems[2]; // Contains penalty

        if (subcat2 == 0) {
            $("#penalty_code").val(previousPenalty);
        } else {
            $("#penalty_code").val(thirdItem);
        }

        $.post('memo/php/getsubcat3.php', {subcat2: firstItem}, function(result) {
            $("#sub_cat_three").html(result);
        });
    }

    function displaySubCategory3() {
        event.preventDefault();

        subcat3 = $("#sub_cat_three").val();
        subCatItems = subcat3.split("/");

        firstItem = subCatItems[0]; // Contains infcod3idxx
        secondItem = subCatItems[1]; // Contains inf3code
        thirdItem = subCatItems[2]; // Contains penalty

        if (subcat3 == 0) {
            $("#penalty_code").val(previousPenalty);
        } else {
            $("#penalty_code").val(thirdItem);
        }
    }

    $("#emp_name").select2();
    function getEmployee() {
        event.preventDefault();

        $.post('memo/php/getemployee.php', {}, function(result) {
            $("#emp_name").html(result);
        });
    }

    // check warnings
    function checkWarnings() {
        emp_name = $('#emp_name').val();
        memo_start = $('#infraction_date').val();
        penalty_code = $('#penalty_code').val();

        $('.table-warnings').removeClass("d-none");

        $.post('memo/datatables/writtenwarning_table.php', {
            emp_name: emp_name,
            memo_start: memo_start,
            penalty_code: penalty_code
        }, function(result) {
            var data = JSON.parse(result);
            $('#checkwarnings').html(data.display);
            var noData = data.no_data_flag;
            var trueSus = data.havesuspensions;
            var term = data.terminations;

            if (noData) {
                $('#checkwarnings').html(data.display);
                $('.gene').removeClass("d-none");
                $('.next').addClass("d-none");
            } else {
                $('#checkwarnings').html(data.display);
                $('.gene').addClass("d-none");
                $('.next').removeClass("d-none");
            }

            if (trueSus == 'SUSPENDED') {
                $('.suseffdate').removeClass("d-none");
            } else if (trueSus == 'NO SUSPENSION') {
                $('.suseffdate').addClass("d-none");
            } else if (penalty_code == 'D') {
                $('.gene').addClass("d-none");
                $('.next').removeClass("d-none");
                $('.termdate').removeClass("d-none");
            } else if (trueSus == 'TERMINATED') {
                $('.gene').addClass("d-none");
                $('.next').removeClass("d-none");
                $('.termdate').removeClass("d-none");
            } else {
                $('.suseffdate').addClass("d-none");
            }


            // this is for disabling the next button
            if (term == 'SUBJECT FOR TERMINATION') {
                $('#nextmemo').prop('disabled', true);
                $("#errorTermination").modal("show");
            } else if (term == 'DISMISSAL / TERMINATION') {
                $('#nextmemo').prop('disabled', true);
                $("#errorTermination").modal("show");
            } else if (term == 'None') {
                $('#nextmemo').prop('disabled', false);
                $("#errorFillUp").modal("hide");
            }

        });
    }

    function IssueMemo() {
        event.preventDefault();

        maincat = $("#main_cat").val();
        subcat1 = $("#sub_cat_one").val().split("/")[1];
        subcat2 = $("#sub_cat_two").val().split("/")[1];
        subcat3 = $(".SubCat3").hasClass("d-none") ? null : $("#sub_cat_three").val().split("/")[1];
        penalty = $("#penalty_code").val();
        employee = $("#emp_name").val();
        infraction = formatDate($("#infraction_date").val());
        smalldesc = $("#smalldesc").val().replace(/\'/g, "`").replace(/(\r\n|\n|\r)/gm, "<br>");

        $.post('memo/php/issuememo.php', {
            maincat: maincat,
            subcat1: subcat1,
            subcat2: subcat2,
            subcat3: subcat3,
            penalty: penalty,
            employee: employee,
            infraction: infraction,
            smalldesc: smalldesc
        }, function(result) {
            $("#submitDone").modal("show");
            $("#submitDone .modal-body").html(result);
        });
    }

    function ViewMemo() {
        document.getElementById("empnum").innerHTML = document.getElementById("emp_name").value;
        document.getElementById("empname").innerHTML = document.querySelector('#emp_name option:checked').text;
        document.getElementById("maincat").innerHTML = document.querySelector('#main_cat option:checked').text;
        document.getElementById("catone").innerHTML = document.querySelector('#sub_cat_one option:checked').text;
        document.getElementById("cattwo").innerHTML = document.querySelector('#sub_cat_two option:checked').text;
        document.getElementById("penalcode").innerHTML = document.getElementById("penalty_code").value;
        document.getElementById("memostart").innerHTML = document.getElementById("infraction_date").value;
        document.getElementById("details").innerHTML = document.getElementById("smalldesc").value;
    }

    document.getElementById("nextmemo").addEventListener("click", function() {
        ViewMemo();
        $('#ViewMemos').modal('show');
    });

    function formatDate(date) {
        var d = new Date(date);
        var month = '' + (d.getMonth() + 1);
        var day = '' + d.getDate();
        var year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 2) day = '0' + day;
        return [year, month, day].join('-');
    }

    function isValidDate(dateString) {
        var dateRegex = /^(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$/;
        return dateRegex.test(dateString);
    }

</script>