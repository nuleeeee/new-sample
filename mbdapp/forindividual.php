<form>
    <div style="padding-top: 30px;"></div>
    
    <div class="container-fluid mt-5 mb-5 w-75">
        <div class="d-flex justify-content-between">
            <div class="mb-2">
                <a id="btn_mbdappnav" class="btn btn-sm text-light" style="background-color: #434EA0" onclick="goBack()">
                    <i class="bi bi-chevron-left"></i> Go Back
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 bg-light p-3 border">
                <img src="assets/image2.PNG" height="80" alt="MBD-Logo" class="img-stapp" />

                <div class="mt-4" style="background-color: #434EA0; color: white; font-weight: bold; font-size: 30px; text-align: center; padding: 5px;">
                    MAQUILING CREDIT APPLICATION FORM
                </div>

                <div class="mt-4" style="background-color: #434EA0; color: white; padding: 2px 5px;">
                    Requirements
                </div>

                <div style="padding: 0 12px;">
                    <div class="row mt-3 border">
                        <div class="col-lg-9 p-4">
                            <table>
                                <tr>
                                    <td>
                                        <input type="checkbox" id="indv_valid_id">
                                        <label for="indv_valid_id">Valid ID (2)</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" id="indv_app_form">
                                        <label for="indv_app_form">Maquiling Home Credit Application Form</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" id="indv_billing_proof">
                                        <label for="indv_billing_proof"><b>Any proof of Billing <i>(should be at least 6 months residency)</i></b></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" id="indv_infosheet">
                                        <label for="indv_infosheet">General Information Sheet (if corporation)</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" id="indv_mayorspermit">
                                        <label for="indv_mayorspermit">Mayor’s Permit (if business)</label>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-3 p-2">
                            <div class="card text-center">
                                <div class="card-body">
                                    <img src="assets/addimg.png" height="80">
                                </div>
                                <div class="card-footer text-body-secondary">
                                    <input type="file" name="addfiles_forindividual[]" id="addfiles_forindividual" class="form-control" multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row" style="padding: 0 12px;">
                    <div class="mt-3" style="background-color: #434EA0; color: white;">
                        I. CUSTOMER INFORMATION
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Last Name</label>
                        <input type="text" class="form-control border-0 bg-light" id="indv_lastname">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>First Name</label>
                        <input type="text" class="form-control border-0 bg-light" id="indv_firstname">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Middle Name</label>
                        <input type="text" class="form-control border-0 bg-light" id="indv_middlename">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Suffix</label>
                        <input type="text" class="form-control border-0 bg-light" id="indv_suffix">
                    </div>
                    <div class="col-lg-9 p-3 border">
                        <label>Address</label>
                        <input type="text" class="form-control border-0 bg-light" id="indv_address">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Zip Code</label>
                        <input type="text" class="form-control border-0 bg-light" id="indv_zipcode">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control border-0 bg-light" id="indv_birthdate">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Status</label>
                        <select class="form-select border-0 bg-light" id="indv_status">
                            <option value="" selected></option>
                            <option value="SINGLE">SINGLE</option>
                            <option value="MARRIED">MARRIED</option>
                            <option value="SEPARATED">SEPARATED</option>
                            <option value="WIDOWED">WIDOWED</option>
                            <option value="DIVORCED">DIVORCED</option>
                        </select>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Tel No</label>
                        <input type="text" class="form-control border-0 bg-light" id="indv_telno">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Mobile No</label>
                        <div class="input-group">
                            <span class="input-group-text border-0 bg-light text-end">+63</span>
                            <input type="text" class="form-control border-0 bg-light" id="indv_mobileno">
                        </div>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Name of Spouse</label>
                        <input type="text" class="form-control border-0 bg-light" id="indv_spousename">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Occupation</label>
                        <input type="text" class="form-control border-0 bg-light" id="indv_spouseoccupation">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Company</label>
                        <input type="text" class="form-control border-0 bg-light" id="indv_spousecompany">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Contact Number (Spouse)</label>
                        <input type="text" class="form-control border-0 bg-light" id="indv_spousecontactno">
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>


<div class="submit-button" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Save Form">
    <button type="button" style="background-color: #434EA0" class="btn btn-lg text-light border-dark border-opacity-25 rounded-circle rounded-5 w-100" id="submitForm" onclick="SetLimitation()">
        <i class="bi fa-sm bi-envelope-check-fill"></i>
    </button>
</div>

<div class='modal fade' id='printForIndividual' tabindex='-1' aria-hidden='true' data-bs-keyboard="false" data-bs-backdrop="static">
    <div class='modal-dialog modal-xl'>
        <div class='modal-content'>

            <?php include "modals/modal_printforindividual.php" ?>

            <div class='modal-footer'>
                <button type='button' class='btn btn-sm btn-danger close-modal' data-bs-dismiss='modal'>Close</button>
                <button type='button' class='btn btn-sm btn-success print-btn' id="btnPrintIndividual">Print</button>
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
            if ($(this).scrollTop() > 200) {
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

    function SetLimitation() {
        event.preventDefault();
        $.post('mbdapp/php/setlimitation.php', {}, function(result) {
            if (result == "Failed") {
                $("#errorMsg").modal('show');
                $("#errorMsg .modal-body").html("The Credit Limitation for your branch has been reached. <br><br> <ul><li>* 80,000 Max Credit</li><li>* 10 Max Applicant</li></ul>");
                return;
            } else {
                submitForm();
            }
        });
    }

    function submitForm() {
        event.preventDefault();

        indv_lastname = $('#indv_lastname').val().toUpperCase();
        indv_firstname = $('#indv_firstname').val().toUpperCase();
        indv_middlename = $('#indv_middlename').val().toUpperCase();
        indv_suffix = $('#indv_suffix').val().toUpperCase();
        indv_address = $('#indv_address').val().replace(/'/g, "\`").replace(/(\r\n|\n|\r)/gm, " ").toUpperCase();
        indv_zipcode = $('#indv_zipcode').val();
        indv_birthdate = formatDate($('#indv_birthdate').val());
        indv_status = $('#indv_status').val();
        indv_telno = $('#indv_telno').val();
        indv_mobileno = $('#indv_mobileno').val();
        indv_spousename = $('#indv_spousename').val().toUpperCase();
        indv_spouseoccupation = $('#indv_spouseoccupation').val().toUpperCase();
        indv_spousecompany = $('#indv_spousecompany').val().replace(/'/g, "\`").replace(/(\r\n|\n|\r)/gm, " ").toUpperCase();
        indv_spousecontactno = $('#indv_spousecontactno').val();

        cb_agree = document.getElementById('cb_agree').checked;
        if (cb_agree) {
            cb_agree = 1;
        } else {
            cb_agree = 2;
        }

        forindividual = 2;

        if (!indv_lastname || !indv_firstname || !indv_address || !indv_mobileno || indv_status == "") {
            $("#errorMsg").modal('show');
            $("#errorMsg .modal-body").html("Please don't leave any of these blank: <hr><center>Last Name, First Name, Address, Birth Date, Status, Mobile Number</center>");
            return;
        }

        if (!isValidDate(indv_birthdate)) {
            $("#errorMsg").modal('show');
            $("#errorMsg .modal-body").html("Please check your placed birth date.");
            return;
        }

        if (!mobilenumValidator(indv_mobileno)) {
            $("#errorMsg").modal('show');
            $("#errorMsg .modal-body").html("Valid Mobile Number is 10-digit numbers only.");
            return;
        }

        $.post('mbdapp/php/forindividualsubmission.php', {
            indv_lastname: indv_lastname,
            indv_firstname: indv_firstname,
            indv_middlename: indv_middlename,
            indv_suffix: indv_suffix,
            indv_address: indv_address,
            indv_zipcode: indv_zipcode,
            indv_birthdate: indv_birthdate,
            indv_status: indv_status,
            indv_telno: indv_telno,
            indv_mobileno: indv_mobileno,
            indv_spousename: indv_spousename,
            indv_spouseoccupation: indv_spouseoccupation,
            indv_spousecompany: indv_spousecompany,
            indv_spousecontactno: indv_spousecontactno,
            cb_agree: cb_agree,
            forindividual: forindividual
        }, function(result) {
            addFiles(indv_lastname, indv_firstname);
            $.post('mbdapp/php/getmaxindividualappidxx.php', {forindividual: forindividual}, function(jsonresult) {
                var jsondata = JSON.parse(jsonresult);
                for (var i = 0; i < jsondata.length; i++) {
                    var maxappid = jsondata[i].maxid.replace(/\./g, "");
                    var dateapplied = jsondata[i].date;
                    
                    printIndividual(maxappid, dateapplied);
                }
            });
        });
    }
    
    function printIndividual(maxappid, dateapplied) {
        event.preventDefault();

        indv_lastname = document.getElementById('indv_lastname').value.toUpperCase();
        indv_firstname = document.getElementById('indv_firstname').value.toUpperCase();
        indv_middlename = document.getElementById('indv_middlename').value.toUpperCase();
        indv_suffix = document.getElementById('indv_suffix').value.toUpperCase();
        indv_address = document.getElementById('indv_address').value.toUpperCase();
        indv_zipcode = document.getElementById('indv_zipcode').value;
        indv_birthdate = document.getElementById('indv_birthdate').value;
        indv_status = document.getElementById('indv_status').value.toUpperCase();
        indv_telno = document.getElementById('indv_telno').value;
        indv_mobileno = document.getElementById('indv_mobileno').value;
        indv_spousename = document.getElementById('indv_spousename').value.toUpperCase();
        indv_spouseoccupation = document.getElementById('indv_spouseoccupation').value.toUpperCase();
        indv_spousecompany = document.getElementById('indv_spousecompany').value.toUpperCase();
        indv_spousecontactno = document.getElementById('indv_spousecontactno').value;

        $.post('mbdapp/php/getloggedinuserbranch.php', {}, function(result) {
            var data = JSON.parse(result);

            for (var i = 0; i < data.length; i++) {

                $('#modal_indv_lastname').html(indv_lastname);
                $('#modal_indv_firstname').html(indv_firstname);
                $('#modal_indv_middlename').html(indv_middlename);
                $('#modal_indv_suffix').html(indv_suffix);
                $('#modal_indv_address').html(indv_address);
                $('#modal_indv_zipcode').html(indv_zipcode);
                $('#modal_indv_birthdate').html(indv_birthdate);
                $('#modal_indv_status').html(indv_status);
                $('#modal_indv_telno').html(indv_telno);
                $('#modal_indv_mobileno').html(indv_mobileno);
                $('#modal_indv_spousename').html(indv_spousename);
                $('#modal_indv_spouseoccupation').html(indv_spouseoccupation);
                $('#modal_indv_spousecompany').html(indv_spousecompany);
                $('#modal_indv_spousecontactno').html(indv_spousecontactno);

                $('#customer_name').html(indv_firstname + " " + indv_lastname);
                $('#mc_idnumber').html("MC-" + maxappid);
                $('#customer_address').html(indv_address);
                $('#customer_contactnum').html("+63" + indv_mobileno);
                $('#customer_date').html(dateapplied);
                $('#customer_identification').html(indv_lastname);
                $('#mc_accountname').html(indv_firstname + " " + indv_lastname);
                $('#mc_branchname').html(data[i].branchname);
                $('#customer_fullname').html(indv_firstname + " " + indv_lastname);
                $('#loggedinuser_fullname').html(data[i].vname);

            }
        });

        $("#printForIndividual").modal('show');


        // PRINT MODAL PDF
        document.getElementById("btnPrintIndividual").addEventListener("click", function() {
            var divToPrint = document.getElementById('for_individual_div');
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write('<html><head><title>SHORT-TERM APPLICATION CREDIT FORM</title><link rel="stylesheet" type="text/css" href="stylesheets/printstyle.css"></head><body onload="window.print()">');
            newWin.document.write(divToPrint.innerHTML);
            newWin.document.write('</body></html>');
            newWin.document.close();
            setTimeout(function() {
                newWin.close();
            }, 200);
        });
    }


    // this is used to fetch the latest upload of the uploader
    function getAppID() {
        return new Promise(function(resolve, reject) {
            $.post('mbdapp/php/getappid.php', {}, function(result) {
                console.log("appid = " + result);
                resolve(result);
            });
        });
    }

    var addfiles_forindividual = document.querySelector("#addfiles_forindividual");
    var filesForIndividual = [];
    var formDataForIndividual = new FormData();

    addfiles_forindividual.addEventListener("change", handleFileUpload);

    function handleFileUpload(event) {
        var files = event.target.files;
        if (files.length === 0) {
            filesForIndividual = [];
            formDataForIndividual.delete("addfiles_forindividual[]");
            $('#addfiles_forindividual').val([]);
            return;
        }

        for (const file of files) {
            filesForIndividual.push(file);
            formDataForIndividual.append("addfiles_forindividual[]", file);
        }
    }

    // uploading new attachments
    function addFiles(lastname, firstname) {
        event.preventDefault();

        var customer = lastname + ', ' + firstname;

        if (filesForIndividual.length === 0) {

            // do nothing...

        } else {

            getAppID().then(function(appID) {

                formDataForIndividual.append("appidxx", appID);
                formDataForIndividual.append("customer", customer);

                $.ajax({
                    url: 'mbdapp/php/addfiles_forindividual.php',
                    type: 'POST',
                    data: formDataForIndividual,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(result) {
                        console.log("File uploaded");
                    }
                });

            }).catch(function(error) {
                console.error("Error getting app ID:", error);
            });
        }
    }


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

    function mobilenumValidator(indv_mobileno) {
        indv_mobileno = $('#indv_mobileno').val();
        var pattern = /^\d{10}$/;
        return pattern.test(indv_mobileno);
    }

</script>