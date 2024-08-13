
<form>
    <div style="padding-top: 40px;"></div>

    <div class="container-fluid mt-5 mb-5 w-75 shadow-sm">
        <div class="d-flex justify-content-between">
            <div class="mb-2">
                <button type="button" id="btn_mbdappnav" class="btn btn-sm generate-btn" onclick="goBack()">
                    <i class="bi bi-chevron-left"></i> Go Back
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 bg-light p-3 border">
                <img src="assets/image2.PNG" height="80" alt="MBD-Logo" class="img-stapp" />

                <div class="mt-4" style="background-color: #434EA0; color: white; font-weight: bold; font-size: 30px; text-align: center; padding: 5px;">
                    EQUIPMENT ACCOUNTABILITY FORM
                </div>


                <div class="mt-3 mb-3 text-center fw-bold" style="background-color: #434EA0; color: white;">
                    Receipt for Company Property
                </div>


                <div class="row" style="padding: 0 12px;">
                    <div class="col-lg-3 p-3 border">
                        <label>Employee Name</label>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <select class="form-select border-0 bg-light" id="feas_employeename" onchange="getPosition(); getBranch();">
                            
                        </select>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Position</label>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label class="border-0 bg-light text-wrap" id="feas_position"></label>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Branch</label>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label class="border-0 bg-light text-wrap" id="feas_branch"></label>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Date</label>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <input type="date" class="form-control border-0 bg-light" id="feas_date">
                    </div>
                </div>


                <div class="mt-3 mb-3" style="background-color: #434EA0; color: white;">
                    <span style="margin-left: 15px;">I hereby acknowledge that I have received the following company property:</span>
                </div>


                <div class="row" style="padding: 0 12px;">
                    <table class="table table-bordered" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th class="text-center">Details</th>
                                <th class="text-center">Serial / Identifying Number</th>
                                <th class="text-center">Condition</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select class="form-select border-0 bg-light" id="1st_row_details" onchange="getFirstSerial()">

                                    </select>
                                </td>
                                <td>
                                    <select class="form-select border-0 bg-light" id="1st_row_id">

                                    </select>
                                </td>
                                <td>
                                    <select class="form-select border-0 bg-light" id="1st_row_condition">
                                        <option value=""></option>
                                        <option value="BRAND NEW">BRAND NEW</option>
                                        <option value="USED">USED</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-select border-0 bg-light" id="2nd_row_details" onchange="getSecondSerial()">

                                    </select>
                                </td>
                                <td>
                                    <select class="form-select border-0 bg-light" id="2nd_row_id">

                                    </select>
                                </td>
                                <td>
                                    <select class="form-select border-0 bg-light" id="2nd_row_condition">
                                        <option value=""></option>
                                        <option value="BRAND NEW">BRAND NEW</option>
                                        <option value="USED">USED</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-select border-0 bg-light" id="3rd_row_details" onchange="getThirdSerial()">

                                    </select>
                                </td>
                                <td>
                                    <select class="form-select border-0 bg-light" id="3rd_row_id">

                                    </select>
                                </td>
                                <td>
                                    <select class="form-select border-0 bg-light" id="3rd_row_condition">
                                        <option value=""></option>
                                        <option value="BRAND NEW">BRAND NEW</option>
                                        <option value="USED">USED</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-select border-0 bg-light" id="4th_row_details" onchange="getFourthSerial()">

                                    </select>
                                </td>
                                <td>
                                    <select class="form-select border-0 bg-light" id="4th_row_id">

                                    </select>
                                </td>
                                <td>
                                    <select class="form-select border-0 bg-light" id="4th_row_condition">
                                        <option value=""></option>
                                        <option value="BRAND NEW">BRAND NEW</option>
                                        <option value="USED">USED</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <select class="form-select border-0 bg-light" id="5th_row_details" onchange="getFifthSerial()">

                                    </select>
                                </td>
                                <td>
                                    <select class="form-select border-0 bg-light" id="5th_row_id">

                                    </select>
                                </td>
                                <td>
                                    <select class="form-select border-0 bg-light" id="5th_row_condition">
                                        <option value=""></option>
                                        <option value="BRAND NEW">BRAND NEW</option>
                                        <option value="USED">USED</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="row" style="padding: 0 12px;">
                    <div class="col-lg-12 p-3 border">
                        <label class="fw-bold">Check List Questions:</label>
                    </div>


                    <div class="col-lg-6 p-3 border">
                        <label class="checklist-label" style="margin-left: 50px;">Keyboard Light</label>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="keyboard_okay">
                            <label class="form-check-label" for="keyboard_okay">OKAY</label>
                        </div>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="keyboard_notokay">
                            <label class="form-check-label" for="keyboard_notokay">NOT OKAY</label>
                        </div>
                    </div>


                    <div class="col-lg-6 p-3 border">
                        <label class="checklist-label" style="margin-left: 50px;">Screen & Sound</label>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="screen_okay">
                            <label class="form-check-label" for="screen_okay">OKAY</label>
                        </div>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="screen_notokay">
                            <label class="form-check-label" for="screen_notokay">NOT OKAY</label>
                        </div>
                    </div>


                    <div class="col-lg-6 p-3 border">
                        <label class="checklist-label" style="margin-left: 50px;">Keyboard</label>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="keyboard_responsive">
                            <label class="form-check-label" for="keyboard_responsive">RESPONSIVE</label>
                        </div>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="keyboard_notresponsive">
                            <label class="form-check-label" for="keyboard_notresponsive">NOT RESPONSIVE</label>
                        </div>
                    </div>


                    <div class="col-lg-6 p-3 border">
                        <label class="checklist-label" style="margin-left: 50px;">Mouse</label>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="mouse_okay">
                            <label class="form-check-label" for="mouse_okay">OKAY</label>
                        </div>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="mouse_notokay">
                            <label class="form-check-label" for="mouse_notokay">NOT OKAY</label>
                        </div>
                    </div>


                    <div class="col-lg-6 p-3 border">
                        <label class="checklist-label" style="margin-left: 50px;">USB Ports</label>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="usbports_okay">
                            <label class="form-check-label" for="usbports_okay">OKAY</label>
                        </div>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="usbports_notokay">
                            <label class="form-check-label" for="usbports_notokay">NOT OKAY</label>
                        </div>
                    </div>


                    <div class="col-lg-6 p-3 border">
                        <label class="checklist-label" style="margin-left: 50px;">HDMI Ports</label>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="hdmiports_okay">
                            <label class="form-check-label" for="hdmiports_okay">OKAY</label>
                        </div>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="hdmiports_notokay">
                            <label class="form-check-label" for="hdmiports_notokay">NOT OKAY</label>
                        </div>
                    </div>


                    <div class="col-lg-6 p-3 border">
                        <label class="checklist-label" style="margin-left: 50px;">Laptop Bags</label>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="laptopbags_noscratches">
                            <label class="form-check-label" for="laptopbags_noscratches">NO SCRATCHES</label>
                        </div>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="laptopbags_withscratches">
                            <label class="form-check-label" for="laptopbags_withscratches">WITH SCRATCHES</label>
                        </div>
                    </div>


                    <div class="col-lg-6 p-3 border">
                        <label class="checklist-label" style="margin-left: 50px;">External Appearance (Front, Back, Sides)</label>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="externalappearance_noscratches">
                            <label class="form-check-label" for="externalappearance_noscratches">NO SCRATCHES</label>
                        </div>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="externalappearance_withscratches">
                            <label class="form-check-label" for="externalappearance_withscratches">WITH SCRATCHES</label>
                        </div>
                    </div>
                </div>


                <div class="row mb-5" style="padding: 0 12px; margin-bottom: 50px;">
                    <table>
                        <tbody>
                            <tr>
                                <td class="text-justify p-5">
                                    <ul>
                                        <li>I acknowledge that I have received the equipment mentioned above for use at the job site.</li>
                                        <li>I fully understand that it's entirely my responsibility to keep the equipment in a safe place while its in my custody.</li>
                                        <li>I am aware that if the equipment is stolen, damaged, or broken, it's my duty to immediately provide a direct report to my supervisor or the purchase manager. I also understand that I may be charged for equipment damage resulting from misuse or carelessness while in my possession. (Amount depends on the damage.)</li>
                                        <li>I understand that once my employment ends, its my responsibility to return all company equipment in its original condition. Failure to do so the company may withhold my final payment and clearance of dues.</li>
                                        <li>By signing below, I acknowledge that I have received the employee equipment responsibility Form and accept its terms and conditions.</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr class="row mt-3 mb-3">
                                <td class="col-sm-6 text-center date-td" style="text-decoration: overline;">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Date
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td class="col-sm-6 text-center sign-td" style="text-decoration: overline;">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Employee Signature&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                            </tr>
                            <tr class="row mt-5 mb-3">
                                <td class="col-sm-6 text-center date-td" style="text-decoration: overline;">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Date
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td class="col-sm-6 text-center sign-td" style="text-decoration: overline;">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MIS Department&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                            </tr>
                            <tr class="row mt-5 mb-3">
                                <td class="col-sm-6 text-center date-td" style="text-decoration: overline;">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Date
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td class="col-sm-6 text-center sign-td" style="text-decoration: overline;">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;General Manager&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</form>

<div class="print-button" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Print Form">
    <button type="button" style="background-color: #434EA0" class="btn btn-lg text-light border-dark border-opacity-25 rounded-circle rounded-5 w-100" id="printForm" onclick="printEquipAndAssets()">
        <i class="bi fa-sm bi-printer-fill"></i>
    </button>
</div>    

<div class="submit-button" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Save Form">
    <button type="button" style="background-color: #434EA0" class="btn btn-lg text-light border-dark border-opacity-25 rounded-circle rounded-5 w-100" id="submitForm" onclick="submitForm()">
        <i class="bi fa-sm bi-envelope-check-fill"></i>
    </button>
</div>


<div class='modal fade' id='printForEquipAndAssets' tabindex='-1' aria-hidden='true'>
    <div class='modal-dialog modal-xl'>
        <div class='modal-content'>

            <?php include "modals/modal_printforequipandassets.php" ?>

            <div class='modal-footer'>
                <button type='button' class='btn btn-sm btn-danger close-modal' data-bs-dismiss='modal'>Close</button>
                <button type='button' class='btn btn-sm btn-success print-btn' id="btnprintEquipAndAssets">Print</button>
            </div>
        </div>
    </div>
</div>

<div class='modal fade' id='successMsg' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog modal-sm'>
        <div class='modal-content'>
            <div class='modal-header bg-success text-light'>
                <label>Success</label>
            </div>
            <div class='modal-body'>
                <label>Short-Term Application Credit Form Submitted.</label>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-sm btn-success' data-bs-dismiss='modal'>Done</button>
            </div>
        </div>
    </div>
</div>

<div class='modal fade' id='errorMsg' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog modal-sm'>
        <div class='modal-content'>
            <div class='modal-header bg-danger text-light'>
                <label>Error</label>
            </div>
            <div class='modal-body'>
                <label>Error</label>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-sm btn-danger' data-bs-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function goBack() {
        event.preventDefault();
        readfilesphp("mbdapp/short_term_app.php");
    }


    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 700) {
                $('.submit-button, .print-button').addClass('active');
            } else {
                $('.submit-button, .print-button').removeClass('active');
            }
        });

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });


    getEmployeeNames();
    $('#feas_employeename').select2();
    function getEmployeeNames() {
        event.preventDefault();

        $.post('mbdapp/php/getemployees.php', {}, function(result) {
            $('#feas_employeename').html(result);
        });
    }


    function getPosition() {
        event.preventDefault();

        nameid = $('#feas_employeename').val();

        $.post('mbdapp/php/getposition.php', {nameid: nameid}, function(result) {
            $('#feas_position').html(result);
        });
    }

    function getBranch() {
        event.preventDefault();

        nameid = $('#feas_employeename').val();

        $.post('mbdapp/php/getbranch.php', {nameid: nameid}, function(result) {
            $('#feas_branch').html(result);
        });
    }

    getSelectionDetails();
    function getSelectionDetails() {
        event.preventDefault();

        $.post('mbdapp/php/getselectiondetails.php', {}, function(result) {
            $('#1st_row_details').html(result);
            $('#2nd_row_details').html(result);
            $('#3rd_row_details').html(result);
            $('#4th_row_details').html(result);
            $('#5th_row_details').html(result);
        });
    }

    $('#1st_row_id').select2();
    function getFirstSerial() {
        event.preventDefault();
        first = $('#1st_row_details').val();

        $.post('mbdapp/php/getserials.php', {listid: first}, function(result) {
            $('#1st_row_id').html(result);
        });
    }

    $('#2nd_row_id').select2();
    function getSecondSerial() {
        event.preventDefault();
        second = $('#2nd_row_details').val();

        $.post('mbdapp/php/getserials.php', {listid: second}, function(result) {
            $('#2nd_row_id').html(result);
        });
    }

    $('#3rd_row_id').select2();
    function getThirdSerial() {
        event.preventDefault();
        third = $('#3rd_row_details').val();

        $.post('mbdapp/php/getserials.php', {listid: third}, function(result) {
            $('#3rd_row_id').html(result);
        });
    }

    $('#4th_row_id').select2();
    function getFourthSerial() {
        event.preventDefault();
        fourth = $('#4th_row_details').val();

        $.post('mbdapp/php/getserials.php', {listid: fourth}, function(result) {
            $('#4th_row_id').html(result);
        });
    }

    $('#5th_row_id').select2();
    function getFifthSerial() {
        event.preventDefault();
        fifth = $('#5th_row_details').val();

        $.post('mbdapp/php/getserials.php', {listid: fifth}, function(result) {
            $('#5th_row_id').html(result);
        });
    }


    function submitForm() {
        event.preventDefault();

        feas_employeename = $('#feas_employeename').val();
        feas_position = $('#feas_position').val();
        feas_branch = $('#feas_branch').val();
        feas_date = $('#feas_date').val();

        if (feas_employeename.selectedIndex >= 0) {
            var employee = feas_employeename.options[feas_employeename.selectedIndex].text;
        }

        if (employee == "Please Select") {
            employee = "";
        } else {
            employee = employee;
        }

        first_row_condition = $('#1st_row_condition').val();
        second_row_condition = $('#2nd_row_condition').val();
        third_row_condition = $('#3rd_row_condition').val();
        fourth_row_condition = $('#4th_row_condition').val();
        fifth_row_condition = $('#5th_row_condition').val();

        var detailsElements = [
            document.getElementById('1st_row_details'),
            document.getElementById('2nd_row_details'),
            document.getElementById('3rd_row_details'),
            document.getElementById('4th_row_details'),
            document.getElementById('5th_row_details')
        ];

        var detailsList = [];

        for (var i = 0; i < detailsElements.length; i++) {
            var selectedIndex = detailsElements[i].selectedIndex;
            var selectedText = selectedIndex >= 0 ? detailsElements[i].options[selectedIndex].text : "";
            
            if (selectedText === "Please Select") {
                detailsList[i] = "";
            } else {
                detailsList[i] = selectedText;
            }
        }

        var first_details = detailsList[0];
        var second_details = detailsList[1];
        var third_details = detailsList[2];
        var fourth_details = detailsList[3];
        var fifth_details = detailsList[4];

        var idElements = [
            document.getElementById('1st_row_id'),
            document.getElementById('2nd_row_id'),
            document.getElementById('3rd_row_id'),
            document.getElementById('4th_row_id'),
            document.getElementById('5th_row_id')
        ];

        var idList = [];

        for (var i = 0; i < idElements.length; i++) {
            var selectedIndex = idElements[i].selectedIndex;
            var selectedText = selectedIndex >= 0 ? idElements[i].options[selectedIndex].text : "";
            
            if (selectedText === "Please Select") {
                idList[i] = "";
            } else {
                idList[i] = selectedText;
            }
        }

        var first_id = idList[0];
        var second_id = idList[1];
        var third_id = idList[2];
        var fourth_id = idList[3];
        var fifth_id = idList[4];

        keyboard_okay = $('#keyboard_okay').is(':checked');
        keyboard_notokay = $('#keyboard_notokay').is(':checked');
        screen_okay = $('#screen_okay').is(':checked');
        screen_notokay = $('#screen_notokay').is(':checked');
        keyboard_responsive = $('#keyboard_responsive').is(':checked');
        keyboard_notresponsive = $('#keyboard_notresponsive').is(':checked');
        mouse_okay = $('#mouse_okay').is(':checked');
        mouse_notokay = $('#mouse_notokay').is(':checked');
        usbport_okay = $('#usbports_okay').is(':checked');
        usbport_notokay = $('#usbports_notokay').is(':checked');
        hdmiports_okay = $('#hdmiports_okay').is(':checked');
        hdmiports_notokay = $('#hdmiports_notokay').is(':checked');
        laptopbags_okay = $('#laptopbags_noscratches').is(':checked');
        laptopbags_notokay = $('#laptopbags_withscratches').is(':checked');
        externalappearance_noscratches = $('#externalappearance_noscratches').is(':checked');
        externalappearance_withscratches = $('#externalappearance_withscratches').is(':checked');

        

        if (keyboard_okay) {
            var keyboard_light = "OKAY";
        } else if (keyboard_notokay) {
            var keyboard_light = "NOT OKAY";
        }

        if (screen_okay) {
            var screen = "OKAY";
        } else if (screen_notokay) {
            var screen = "NOT OKAY";
        } 

        if (keyboard_responsive) {
            var keyboard_responsiveness = "RESPONSIVE";
        } else if (keyboard_notresponsive) {
            var keyboard_responsiveness = "NOT RESPONSIVE";
        } 

        if (mouse_okay) {
            var mouse = "OKAY";
        } else if (mouse_notokay) {
            var mouse = "NOT OKAY";
        }

        if (usbport_okay) {
            var usbport = "OKAY";
        } else if (usbport_notokay) {
            var usbport = "NOT OKAY";
        } 

        if (hdmiports_okay) {
            var hdmiport = "OKAY";
        } else if (hdmiports_notokay) {
            var hdmiport = "NOT OKAY";
        } 

        if (laptopbags_okay) {
            var laptopbag = "NO SCRATCHES";
        } else if (laptopbags_notokay) {
            var laptopbag = "WITH SCRATCHES";
        }

        if (externalappearance_noscratches) {
            var external_appearance = "NO SCRATCHES";
        } else if (externalappearance_withscratches) {
            var external_appearance = "WITH SCRATCHES";
        }

        if (feas_employeename == 0) {
            $("#errorMsg").modal('show');
            $("#errorMsg .modal-body").html("Please select an employee name.");
            return;
        }

        if (!isValidDate(feas_date)) {
            $("#errorMsg").modal('show');
            $("#errorMsg .modal-body").html("Please check the date.");
            return;
        }

        $.post('mbdapp/php/forequipandassetsubmission.php', {
            feas_employeename: feas_employeename,
            feas_date: feas_date,
            first_row_details: first_details,
            first_row_id: first_id,
            first_row_condition: first_row_condition,
            second_row_details: second_details,
            second_row_id: second_id,
            second_row_condition: second_row_condition,
            third_row_details: third_details,
            third_row_id: third_id,
            third_row_condition: third_row_condition,
            fourth_row_details: fourth_details,
            fourth_row_id: fourth_id,
            fourth_row_condition: fourth_row_condition,
            fifth_row_details: fifth_details,
            fifth_row_id: fifth_id,
            fifth_row_condition: fifth_row_condition,
            keyboard_light: keyboard_light,
            screen: screen,
            keyboard: keyboard_responsiveness,
            mouse: mouse,
            usbport: usbport,
            hdmiport: hdmiport,
            laptopbag: laptopbag,
            external_appearance: external_appearance
        }, function(result) {
            $("#successMsg").modal('show');
            $("#successMsg .modal-body").html("Success");
        });
    }
    
    function printEquipAndAssets() {
        event.preventDefault();
        
        feas_employeename = document.getElementById('feas_employeename');
        feas_position = document.getElementById('feas_position').textContent;
        feas_branch = document.getElementById('feas_branch').textContent;
        feas_date = document.getElementById('feas_date').value;

        if (feas_employeename.selectedIndex >= 0) {
            var employee = feas_employeename.options[feas_employeename.selectedIndex].text;
        }

        if (employee == "Please Select") {
            employee = "";
        } else {
            employee = employee;
        }

        first_row_condition = document.getElementById('1st_row_condition').value;
        second_row_condition = document.getElementById('2nd_row_condition').value;
        third_row_condition = document.getElementById('3rd_row_condition').value;
        fourth_row_condition = document.getElementById('4th_row_condition').value;
        fifth_row_condition = document.getElementById('5th_row_condition').value;

        var detailsElements = [
            document.getElementById('1st_row_details'),
            document.getElementById('2nd_row_details'),
            document.getElementById('3rd_row_details'),
            document.getElementById('4th_row_details'),
            document.getElementById('5th_row_details')
        ];

        var detailsList = [];

        for (var i = 0; i < detailsElements.length; i++) {
            var selectedIndex = detailsElements[i].selectedIndex;
            var selectedText = selectedIndex >= 0 ? detailsElements[i].options[selectedIndex].text : "";
            
            if (selectedText === "Please Select") {
                detailsList[i] = "";
            } else {
                detailsList[i] = selectedText;
            }
        }

        var first_details = detailsList[0];
        var second_details = detailsList[1];
        var third_details = detailsList[2];
        var fourth_details = detailsList[3];
        var fifth_details = detailsList[4];

        var idElements = [
            document.getElementById('1st_row_id'),
            document.getElementById('2nd_row_id'),
            document.getElementById('3rd_row_id'),
            document.getElementById('4th_row_id'),
            document.getElementById('5th_row_id')
        ];

        var idList = [];

        for (var i = 0; i < idElements.length; i++) {
            var selectedIndex = idElements[i].selectedIndex;
            var selectedText = selectedIndex >= 0 ? idElements[i].options[selectedIndex].text : "";
            
            if (selectedText === "Please Select") {
                idList[i] = "";
            } else {
                idList[i] = selectedText;
            }
        }

        var first_id = idList[0];
        var second_id = idList[1];
        var third_id = idList[2];
        var fourth_id = idList[3];
        var fifth_id = idList[4];

        keyboard_okay = $('#keyboard_okay').is(':checked');
        keyboard_notokay = $('#keyboard_notokay').is(':checked');
        screen_okay = $('#screen_okay').is(':checked');
        screen_notokay = $('#screen_notokay').is(':checked');
        keyboard_responsive = $('#keyboard_responsive').is(':checked');
        keyboard_notresponsive = $('#keyboard_notresponsive').is(':checked');
        mouse_okay = $('#mouse_okay').is(':checked');
        mouse_notokay = $('#mouse_notokay').is(':checked');
        usbport_okay = $('#usbports_okay').is(':checked');
        usbport_notokay = $('#usbports_notokay').is(':checked');
        hdmiports_okay = $('#hdmiports_okay').is(':checked');
        hdmiports_notokay = $('#hdmiports_notokay').is(':checked');
        laptopbags_okay = $('#laptopbags_noscratches').is(':checked');
        laptopbags_notokay = $('#laptopbags_withscratches').is(':checked');
        externalappearance_noscratches = $('#externalappearance_noscratches').is(':checked');
        externalappearance_withscratches = $('#externalappearance_withscratches').is(':checked'); 

        if (keyboard_okay) {
            var keyboard_light = "OKAY";
        } else if (keyboard_notokay) {
            var keyboard_light = "NOT OKAY";
        }

        if (screen_okay) {
            var screen = "OKAY";
        } else if (screen_notokay) {
            var screen = "NOT OKAY";
        } 

        if (keyboard_responsive) {
            var keyboard_responsiveness = "RESPONSIVE";
        } else if (keyboard_notresponsive) {
            var keyboard_responsiveness = "NOT RESPONSIVE";
        } 

        if (mouse_okay) {
            var mouse = "OKAY";
        } else if (mouse_notokay) {
            var mouse = "NOT OKAY";
        }

        if (usbport_okay) {
            var usbport = "OKAY";
        } else if (usbport_notokay) {
            var usbport = "NOT OKAY";
        } 

        if (hdmiports_okay) {
            var hdmiport = "OKAY";
        } else if (hdmiports_notokay) {
            var hdmiport = "NOT OKAY";
        } 

        if (laptopbags_okay) {
            var laptopbag = "NO SCRATCHES";
        } else if (laptopbags_notokay) {
            var laptopbag = "WITH SCRATCHES";
        }

        if (externalappearance_noscratches) {
            var external_looks = "NO SCRATCHES";
        } else if (externalappearance_withscratches) {
            var external_looks = "WITH SCRATCHES";
        }
        

        $('#modal_feas_employeename').html(employee);
        $('#modal_feas_position').html(feas_position);
        $('#modal_feas_branch').html(feas_branch);
        $('#modal_feas_date').html(feas_date);

        $('#modal_feas_firstrow_details').html(first_details);
        $('#modal_feas_firstrow_id').html(first_id);
        $('#modal_feas_firstrow_condition').html(first_row_condition);
        $('#modal_feas_secondrow_details').html(second_details);
        $('#modal_feas_secondrow_id').html(second_id);
        $('#modal_feas_secondrow_condition').html(second_row_condition);
        $('#modal_feas_thirdrow_details').html(third_details);
        $('#modal_feas_thirdrow_id').html(third_id);
        $('#modal_feas_thirdrow_condition').html(third_row_condition);
        $('#modal_feas_fourthrow_details').html(fourth_details);
        $('#modal_feas_fourthrow_id').html(fourth_id);
        $('#modal_feas_fourthrow_condition').html(fourth_row_condition);
        $('#modal_feas_fifthrow_details').html(fifth_details);
        $('#modal_feas_fifthrow_id').html(fifth_id);
        $('#modal_feas_fifthrow_condition').html(fifth_row_condition);

        $('#keyboard_light').html(keyboard_light);
        $('#screen').html(screen);
        $('#keyboard').html(keyboard_responsiveness);
        $('#mouse').html(mouse);
        $('#usbports').html(usbport);
        $('#hdmiports').html(hdmiport);
        $('#laptopbags').html(laptopbag);
        $('#external_looks').html(external_looks);

        $("#printForEquipAndAssets").modal('show');

        // PRINT MODAL PDF
        document.getElementById("btnprintEquipAndAssets").addEventListener("click", function() {
            var divToPrint = document.getElementById('for_equipandassets_div');
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write('<html><head><title>EQUIPMENT ACCOUNTABILITY FORM</title><link rel="stylesheet" type="text/css" href="stylesheets/printstyle.css"></head><body onload="window.print()">');
            newWin.document.write(divToPrint.innerHTML);
            newWin.document.write('</body></html>');
            newWin.document.close();
            setTimeout(function() {
                newWin.close();
            }, 200);
        });

    }


    $(document).ready(function() {
        $('#keyboard_okay').on('change', function() {
            if ($(this).is(':checked')) {
                $('#keyboard_notokay').prop('checked', false);
            }
        });

        $('#keyboard_notokay').on('change', function() {
            if ($(this).is(':checked')) {
                $('#keyboard_okay').prop('checked', false);
            }
        });

        $('#screen_okay').on('change', function() {
            if ($(this).is(':checked')) {
                $('#screen_notokay').prop('checked', false);
            }
        });

        $('#screen_notokay').on('change', function() {
            if ($(this).is(':checked')) {
                $('#screen_okay').prop('checked', false);
            }
        });

        $('#keyboard_responsive').on('change', function() {
            if ($(this).is(':checked')) {
                $('#keyboard_notresponsive').prop('checked', false);
            }
        });

        $('#keyboard_notresponsive').on('change', function() {
            if ($(this).is(':checked')) {
                $('#keyboard_responsive').prop('checked', false);
            }
        });

        $('#mouse_okay').on('change', function() {
            if ($(this).is(':checked')) {
                $('#mouse_notokay').prop('checked', false);
            }
        });

        $('#mouse_notokay').on('change', function() {
            if ($(this).is(':checked')) {
                $('#mouse_okay').prop('checked', false);
            }
        });

        $('#keyboard_responsive').on('change', function() {
            if ($(this).is(':checked')) {
                $('#keyboard_notresponsive').prop('checked', false);
            }
        });

        $('#usbports_okay').on('change', function() {
            if ($(this).is(':checked')) {
                $('#usbports_notokay').prop('checked', false);
            }
        });

        $('#usbports_notokay').on('change', function() {
            if ($(this).is(':checked')) {
                $('#usbports_okay').prop('checked', false);
            }
        });

        $('#hdmiports_okay').on('change', function() {
            if ($(this).is(':checked')) {
                $('#hdmiports_notokay').prop('checked', false);
            }
        });

        $('#hdmiports_notokay').on('change', function() {
            if ($(this).is(':checked')) {
                $('#hdmiports_okay').prop('checked', false);
            }
        });

        $('#laptopbags_noscratches').on('change', function() {
            if ($(this).is(':checked')) {
                $('#laptopbags_withscratches').prop('checked', false);
            }
        });

        $('#laptopbags_withscratches').on('change', function() {
            if ($(this).is(':checked')) {
                $('#laptopbags_noscratches').prop('checked', false);
            }
        });

        $('#externalappearance_noscratches').on('change', function() {
            if ($(this).is(':checked')) {
                $('#externalappearance_withscratches').prop('checked', false);
            }
        });

        $('#externalappearance_withscratches').on('change', function() {
            if ($(this).is(':checked')) {
                $('#externalappearance_noscratches').prop('checked', false);
            }
        });
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