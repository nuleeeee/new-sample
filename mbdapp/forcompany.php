
<form>
    <div style="padding-top: 30px;"></div>

    <div class="container-fluid mt-5 mb-5 w-75">
        <div class="d-flex justify-content-between">
            <div class="mb-2">
                <button type="button" id="btn_mbdappnav" class="btn btn-sm text-light" style="background-color: #434EA0" onclick="goBack()">
                    <i class="bi bi-chevron-left"></i> Go Back
                </button>
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
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="comp_valid_id">
                                            <label for="comp_valid_id">Valid ID (2)</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="comp_app_form">
                                            <label for="comp_app_form">Maquiling Home Credit Application Form</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="comp_billing_proof">
                                            <label for="comp_billing_proof"><b>Any proof of Billing <i>(should be at least 6 months residency)</i></b></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="comp_infosheet">
                                            <label for="comp_infosheet">General Information Sheet (if corporation)</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="comp_mayorspermit">
                                            <label for="comp_mayorspermit">Mayor’s Permit (if business)</label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-3 p-2">
                            <div class="card text-center">
                                <div class="card-body">
                                    <img src="assets/addimg.png" height="80">
                                </div>
                                <div class="card-footer text-body-secondary">
                                    <input type="file" name="addfiles_forcompany[]" id="addfiles_forcompany" class="form-control" multiple>
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
                        <input type="text" class="form-control border-0 bg-light" id="comp_lastname">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>First Name</label>
                        <input type="text" class="form-control border-0 bg-light" id="comp_firstname">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Middle Name</label>
                        <input type="text" class="form-control border-0 bg-light" id="comp_middlename">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Suffix</label>
                        <input type="text" class="form-control border-0 bg-light" id="comp_suffix">
                    </div>
                    <div class="col-lg-9 p-3 border">
                        <label>Address</label>
                        <input type="text" class="form-control border-0 bg-light" id="comp_address">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Zip Code</label>
                        <input type="text" class="form-control border-0 bg-light" id="comp_zipcode">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control border-0 bg-light" id="comp_birthdate">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Status</label>
                        <select class="form-select border-0 bg-light" id="comp_status">
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
                        <input type="text" class="form-control border-0 bg-light" id="comp_telno">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Mobile No</label>
                        <div class="input-group">
                            <span class="input-group-text border-0 bg-light text-end">+63</span>
                            <input type="text" class="form-control border-0 bg-light" id="comp_mobileno">
                        </div>
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Name of Spouse</label>
                        <input type="text" class="form-control border-0 bg-light" id="comp_spousename">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Occupation</label>
                        <input type="text" class="form-control border-0 bg-light" id="comp_spouseoccupation">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Company</label>
                        <input type="text" class="form-control border-0 bg-light" id="comp_spousecompany">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Contact Number (Spouse)</label>
                        <input type="text" class="form-control border-0 bg-light" id="comp_spousecontactno">
                    </div>
                </div>


                <div class="row" style="padding: 0 12px;">
                    <div class="mt-3" style="background-color: #434EA0; color: white;">
                        II. BUSINESS INFORMATION
                    </div>
                    <div class="col-lg-9 p-3 border">
                        <label>Company Name</label>
                        <input type="text" class="form-control border-0 bg-light" id="comp_bizinfo_compname">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>DTI / SEC REG #</label>
                        <input type="text" class="form-control border-0 bg-light" id="comp_bizinfo_dti">
                    </div>
                    <div class="col-lg-9 p-3 border">
                        <label>Company Address</label>
                        <input type="text" class="form-control border-0 bg-light" id="comp_bizinfo_compaddress">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Zip Code</label>
                        <input type="text" class="form-control border-0 bg-light" id="comp_bizinfo_zipcode">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Tel. No.</label>
                        <input type="text" class="form-control border-0 bg-light" id="comp_bizinfo_telno">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Cell Phone No.</label>
                        <input type="text" class="form-control border-0 bg-light" id="comp_bizinfo_cellno">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Fax Nos.</label>
                        <input type="text" class="form-control border-0 bg-light" id="comp_bizinfo_faxno">
                    </div>
                    <div class="col-lg-3 p-3 border">
                        <label>Years in Operation</label>
                        <input type="text" class="form-control border-0 bg-light" id="comp_bizinfo_yearsoperation">
                    </div>
                    <div class="col-lg-6 p-3 border">
                        <label>Branches</label>
                        <input type="text" class="form-control border-0 bg-light" id="comp_bizinfo_branches">
                    </div>
                    <div class="col-lg-6 p-3 border">
                        <label>Addresses</label>
                        <input type="text" class="form-control border-0 bg-light" id="comp_bizinfo_address">
                    </div>
                    <div class="col-lg-6 p-3 border">
                        <input type="text" class="form-control border-0 bg-light" id="comp_bizinfo_branchesv2">
                    </div>
                    <div class="col-lg-6 p-3 border">
                        <input type="text" class="form-control border-0 bg-light" id="comp_bizinfo_addressv2">
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


<div class='modal fade' id='printForCompany' tabindex='-1' aria-hidden='true' data-bs-keyboard="false" data-bs-backdrop="static">
    <div class='modal-dialog modal-xl'>
        <div class='modal-content'>

            <?php include "modals/modal_printforcompany.php" ?>

            <div class='modal-footer'>
                <button type='button' class='btn btn-sm btn-danger close-modal' data-bs-dismiss='modal'>Close</button>
                <button type='button' class='btn btn-sm btn-success print-btn' id="btnPrintCompany">Print</button>
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
                <label>MAQUILING CREDIT APPLICATION FORM Submitted.</label>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-sm btn-success print-btn' data-bs-dismiss='modal' onclick="printCompany()">Print Form</button>
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


    function SetLimitation() {
        event.preventDefault();
        $.post('mbdapp/php/setlimitation.php', {}, function(result) {
            if (result == "Failed") {
                $("#errorMsg").modal('show');
                $("#errorMsg .modal-body").html("The Credit Limitation for your branch has been reached. <br><br> <ul><li>80,000 Max Credit</li><li>10 Max Applicant</li></ul>");
                return;
            } else {
                submitForm();
            }
        });
    }


    function submitForm() {
        event.preventDefault();

        comp_lastname = $('#comp_lastname').val().toUpperCase();
        comp_firstname = $('#comp_firstname').val().toUpperCase();
        comp_middlename = $('#comp_middlename').val().toUpperCase();
        comp_suffix = $('#comp_suffix').val().toUpperCase();
        comp_address = $('#comp_address').val().replace(/'/g, "\`").replace(/"/g, "&quot;").replace(/(\r\n|\n|\r)/gm, " ").toUpperCase();
        comp_zipcode = $('#comp_zipcode').val();
        comp_birthdate = formatDate($('#comp_birthdate').val());
        comp_status = $('#comp_status').val();
        comp_telno = $('#comp_telno').val();
        comp_mobileno = $('#comp_mobileno').val();
        comp_spousename = $('#comp_spousename').val().toUpperCase();
        comp_spouseoccupation = $('#comp_spouseoccupation').val().toUpperCase();
        comp_spousecompany = $('#comp_spousecompany').val().replace(/'/g, "\`").replace(/(\r\n|\n|\r)/gm, " ").toUpperCase();
        comp_spousecontactno = $('#comp_spousecontactno').val();
        comp_bizinfo_compname = $('#comp_bizinfo_compname').val().replace(/'/g, "\`").replace(/(\r\n|\n|\r)/gm, " ").toUpperCase();
        comp_bizinfo_dti = $('#comp_bizinfo_dti').val();
        comp_bizinfo_compaddress = $('#comp_bizinfo_compaddress').val().replace(/'/g, "\`").replace(/(\r\n|\n|\r)/gm, " ").toUpperCase();
        comp_bizinfo_zipcode = $('#comp_bizinfo_zipcode').val();
        comp_bizinfo_telno = $('#comp_bizinfo_telno').val();
        comp_bizinfo_cellno = $('#comp_bizinfo_cellno').val();
        comp_bizinfo_faxno = $('#comp_bizinfo_faxno').val();
        comp_bizinfo_yearsoperation = $('#comp_bizinfo_yearsoperation').val();
        comp_bizinfo_branches = $('#comp_bizinfo_branches').val().replace(/'/g, "\`").replace(/(\r\n|\n|\r)/gm, " ").toUpperCase();
        comp_bizinfo_address = $('#comp_bizinfo_address').val().replace(/'/g, "\`").replace(/(\r\n|\n|\r)/gm, " ").toUpperCase();
        comp_bizinfo_branchesv2 = $('#comp_bizinfo_branchesv2').val().replace(/'/g, "\`").replace(/(\r\n|\n|\r)/gm, " ").toUpperCase();
        comp_bizinfo_addressv2 = $('#comp_bizinfo_addressv2').val().replace(/'/g, "\`").replace(/(\r\n|\n|\r)/gm, " ").toUpperCase();

        cb_agree = document.getElementById('cb_agree').checked;
        if (cb_agree) {
            cb_agree = 1;
        } else {
            cb_agree = 2;
        }

        forcompany = 1;

        if (!comp_lastname || !comp_firstname || !comp_address || !comp_mobileno || comp_status == "") {
            $("#errorMsg").modal('show');
            $("#errorMsg .modal-body").html("Please don't leave any of these blank: <hr><center>Last Name, First Name, Address, Birth Date, Status, Mobile Number</center>");
            return;
        }

        if (!isValidDate(comp_birthdate)) {
            $("#errorMsg").modal('show');
            $("#errorMsg .modal-body").html("Please check your placed birth date.");
            return;
        }

        if (!mobilenumValidator(comp_mobileno)) {
            $("#errorMsg").modal('show');
            $("#errorMsg .modal-body").html("Valid Mobile Number is 10-digit numbers only.");
            return;
        }

        $.post('mbdapp/php/forcompanysubmission.php', {
            comp_lastname: comp_lastname,
            comp_firstname: comp_firstname,
            comp_middlename: comp_middlename,
            comp_suffix: comp_suffix,
            comp_address: comp_address,
            comp_zipcode: comp_zipcode,
            comp_birthdate: comp_birthdate,
            comp_status: comp_status,
            comp_telno: comp_telno,
            comp_mobileno: comp_mobileno,
            comp_spousename: comp_spousename,
            comp_spouseoccupation: comp_spouseoccupation,
            comp_spousecompany: comp_spousecompany,
            comp_spousecontactno: comp_spousecontactno,
            comp_bizinfo_compname: comp_bizinfo_compname,
            comp_bizinfo_dti: comp_bizinfo_dti,
            comp_bizinfo_compaddress: comp_bizinfo_compaddress,
            comp_bizinfo_zipcode: comp_bizinfo_zipcode,
            comp_bizinfo_telno: comp_bizinfo_telno,
            comp_bizinfo_cellno: comp_bizinfo_cellno,
            comp_bizinfo_faxno: comp_bizinfo_faxno,
            comp_bizinfo_yearsoperation: comp_bizinfo_yearsoperation,
            comp_bizinfo_branches: comp_bizinfo_branches,
            comp_bizinfo_address: comp_bizinfo_address,
            comp_bizinfo_branchesv2: comp_bizinfo_branchesv2,
            comp_bizinfo_addressv2: comp_bizinfo_addressv2,
            cb_agree: cb_agree,
            forcompany: forcompany
        }, function(result) {
            addFiles(comp_lastname, comp_firstname);
            $.post('mbdapp/php/getmaxcompanyappidxx.php', {forcompany: forcompany}, function(jsonresult) {
                var jsondata = JSON.parse(jsonresult);
                for (var i = 0; i < jsondata.length; i++) {
                    var maxappid = jsondata[i].maxid.replace(/\./g, "");
                    var dateapplied = jsondata[i].date;

                    printCompany(maxappid, dateapplied);
                }
            });
        });
    }
    
    function printCompany(maxappid, dateapplied) {
        event.preventDefault();

        comp_lastname = document.getElementById('comp_lastname').value.toUpperCase();
        comp_firstname = document.getElementById('comp_firstname').value.toUpperCase();
        comp_middlename = document.getElementById('comp_middlename').value.toUpperCase();
        comp_suffix = document.getElementById('comp_suffix').value.toUpperCase();
        comp_address = document.getElementById('comp_address').value.toUpperCase();
        comp_zipcode = document.getElementById('comp_zipcode').value;
        comp_birthdate = document.getElementById('comp_birthdate').value;
        comp_status = document.getElementById('comp_status').value.toUpperCase();
        comp_telno = document.getElementById('comp_telno').value;
        comp_mobileno = document.getElementById('comp_mobileno').value;
        comp_spousename = document.getElementById('comp_spousename').value.toUpperCase();
        comp_spouseoccupation = document.getElementById('comp_spouseoccupation').value.toUpperCase();
        comp_spousecompany = document.getElementById('comp_spousecompany').value.toUpperCase();
        comp_spousecontactno = document.getElementById('comp_spousecontactno').value;
        comp_bizinfo_compname = document.getElementById('comp_bizinfo_compname').value.toUpperCase();
        comp_bizinfo_dti = document.getElementById('comp_bizinfo_dti').value.toUpperCase();
        comp_bizinfo_compaddress = document.getElementById('comp_bizinfo_compaddress').value.toUpperCase();
        comp_bizinfo_zipcode = document.getElementById('comp_bizinfo_zipcode').value;
        comp_bizinfo_telno = document.getElementById('comp_bizinfo_telno').value;
        comp_bizinfo_cellno = document.getElementById('comp_bizinfo_cellno').value;
        comp_bizinfo_faxno = document.getElementById('comp_bizinfo_faxno').value;
        comp_bizinfo_yearsoperation = document.getElementById('comp_bizinfo_yearsoperation').value;
        comp_bizinfo_branches = document.getElementById('comp_bizinfo_branches').value.toUpperCase();
        comp_bizinfo_address = document.getElementById('comp_bizinfo_address').value.toUpperCase();
        comp_bizinfo_branchesv2 = document.getElementById('comp_bizinfo_branchesv2').value.toUpperCase();
        comp_bizinfo_addressv2 = document.getElementById('comp_bizinfo_addressv2').value.toUpperCase();

        if (comp_mobileno != "") {
            comp_mobileno = "+63" + comp_mobileno;
        }

        $.post('mbdapp/php/getloggedinuserbranch.php', {}, function(result) {
            var data = JSON.parse(result);

            for (var i = 0; i < data.length; i++) {
                $('#modal_comp_lastname').html(comp_lastname);
                $('#modal_comp_firstname').html(comp_firstname);
                $('#modal_comp_middlename').html(comp_middlename);
                $('#modal_comp_suffix').html(comp_suffix);
                $('#modal_comp_address').html(comp_address);
                $('#modal_comp_zipcode').html(comp_zipcode);
                $('#modal_comp_birthdate').html(comp_birthdate);
                $('#modal_comp_status').html(comp_status);
                $('#modal_comp_telno').html(comp_telno);
                $('#modal_comp_mobileno').html(comp_mobileno);
                $('#modal_comp_spousename').html(comp_spousename);
                $('#modal_comp_spouseoccupation').html(comp_spouseoccupation);
                $('#modal_comp_spousecompany').html(comp_spousecompany);
                $('#modal_comp_spousecontactno').html(comp_spousecontactno);
                $('#modal_comp_bizinfo_compname').html(comp_bizinfo_compname);
                $('#modal_comp_bizinfo_dti').html(comp_bizinfo_dti);
                $('#modal_comp_bizinfo_compaddress').html(comp_bizinfo_compaddress);
                $('#modal_comp_bizinfo_zipcode').html(comp_bizinfo_zipcode);
                $('#modal_comp_bizinfo_telno').html(comp_bizinfo_telno);
                $('#modal_comp_bizinfo_cellno').html(comp_bizinfo_cellno);
                $('#modal_comp_bizinfo_faxno').html(comp_bizinfo_faxno);
                $('#modal_comp_bizinfo_yearsoperation').html(comp_bizinfo_yearsoperation);
                $('#modal_comp_bizinfo_branches').html(comp_bizinfo_branches);
                $('#modal_comp_bizinfo_address').html(comp_bizinfo_address);
                $('#modal_comp_bizinfo_branchesv2').html(comp_bizinfo_branchesv2);
                $('#modal_comp_bizinfo_addressv2').html(comp_bizinfo_addressv2);

                $('#customer_name').html(comp_firstname + " " + comp_lastname);
                $('#mc_idnumber').html("MC-" + maxappid);
                $('#customer_address').html(comp_address);
                $('#customer_contactnum').html("+63" + comp_mobileno);
                $('#customer_date').html(dateapplied);
                $('#customer_identification').html(comp_lastname);
                $('#mc_accountname').html(comp_firstname + " " + comp_lastname);
                $('#mc_branchname').html(data[i].branchname);
                $('#customer_fullname').html(comp_firstname + " " + comp_lastname);
                $('#loggedinuser_fullname').html(data[i].vname);
            }
        });

        $("#printForCompany").modal('show');

        // PRINT MODAL PDF
        document.getElementById("btnPrintCompany").addEventListener("click", function() {
            var divToPrint = document.getElementById('for_company_div');
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

    var addfiles_forcompany = document.querySelector("#addfiles_forcompany");
    var filesForCompany = [];
    var formDataForCompany = new FormData();

    addfiles_forcompany.addEventListener("change", handleFileUpload);

    function handleFileUpload(event) {
        var files = event.target.files;
        if (files.length === 0) {
            filesForCompany = [];
            formDataForCompany.delete("addfiles_forcompany[]");
            $('#addfiles_forcompany').val([]);
            return;
        }

        for (const file of files) {
            filesForCompany.push(file);
            formDataForCompany.append("addfiles_forcompany[]", file);
        }
    }

    // uploading new attachments
    function addFiles(lastname, firstname) {
        event.preventDefault();

        var customer = lastname + ', ' + firstname;

        if (filesForCompany.length === 0) {

            // do nothing...

        } else {

            getAppID().then(function(appID) {

                formDataForCompany.append("appidxx", appID);
                formDataForCompany.append("customer", customer);

                $.ajax({
                    url: 'mbdapp/php/addfiles_forcompany.php',
                    type: 'POST',
                    data: formDataForCompany,
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

    function mobilenumValidator(comp_mobileno) {
        comp_mobileno = $('#comp_mobileno').val();
        var pattern = /^\d{10}$/;
        return pattern.test(comp_mobileno);
    }

</script>