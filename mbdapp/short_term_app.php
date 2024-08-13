<style type="text/css">
    .dataTables_scroll {
        height: auto !important;
        max-height: 600px !important;
        overflow-y: auto;
    }
    .dataTables_scrollHead {
        position: sticky !important;
        z-index: 1 !important;
        top: 0px !important;
    }
</style>


<div class="container" style="padding-top: 10px;">

    <div class="row d-flex justify-content-evenly shadow-sm bg-light mt-5 p-2">        
        <button type="button" class="btn btn-md btn-secondary generate-btn w-25" id="btn_forcompany" onclick="forCompany()">
            For Company
        </button>

        <button type="button" class="btn btn-md btn-secondary generate-btn w-25" id="btn_forindividual" onclick="forIndividual()">
            For Individual
        </button>

        <button type="button" class="btn btn-md btn-secondary generate-btn w-25" id="btn_forequipmentandassets" onclick="forEquipmentAndAssets()">
            For Equipment and Assets
        </button>
    </div>

</div>

<div class="seperator"></div>

<div class="container mt-3 mb-5 p-2 bg-light shadow-sm">
    <div style="padding: 5px;">
        <h4>SHORT - TERM APPLICATION</h4>
        <hr>
    </div>

    <div id="stapp_table"></div>
</div>

<div class="seperator"></div>


<!-- Viewing of Files -->
<?php include "modals/modal_viewattachments.php"; ?>

<!-- Uploading of Files -->
<?php include "modals/modal_uploadattachments.php"; ?>

<!-- Viewing Details -->
<div class='modal fade' id='ViewDetails' tabindex='-1' aria-hidden='true'>
    <div class='modal-dialog modal-xl'>
        <div class='modal-content'>

            <?php include "modals/modal_viewdetails.php"; ?>
            
            <div class='modal-footer'>
                <button type='button' class='btn btn-sm btn-secondary' data-bs-dismiss='modal'>Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Viewing Form -->
<div class='modal fade' id='ViewForm' tabindex='-1' aria-hidden='true'>
    <div class='modal-dialog modal-lg'>
        <div class='modal-content'>

            <?php include "modals/modal_viewform.php"; ?>

            <div class='modal-footer'>
                <button type='button' class='btn btn-sm btn-secondary' data-bs-dismiss='modal'>Close</button>
                <button type='button' class='btn btn-sm btn-primary' data-bs-dismiss='modal' id="printForm">Print</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    var loadGif = "<p align='center'><img src=\"assets/eclipse.gif\" width=\"10%\"></p>";

    getApplications();

    function getApplications() {
        $("#stapp_table").html(loadGif);

        $.post('mbdapp/datatables/stapp_table.php', {}, function(result) {
            setTimeout(function() {
                $('#stapp_table').html(result);
                $("#stapp_table").hide().fadeIn("slow");
                $("#loadGif").hide();
            }, 1000);
        });
    }

    function forCompany() {
        event.preventDefault();
        readfilesphp("mbdapp/forcompany.php");
    }

    function forIndividual() {
        event.preventDefault();
        readfilesphp("mbdapp/forindividual.php");
    }

    function forEquipmentAndAssets() {
        event.preventDefault();
        readfilesphp("mbdapp/forequipmentandassets.php");
    }


    function viewDetails(appid, lastname, firstname, middlename, suffix, address, zipcode, birthdate, status, telno, mobileno, spousename, spouseoccupation, spousecompany, spousecontact, businessname, businessdti, businessaddress, businesszipcode, businesstelno, businessmobileno, businessfaxno, businessyearsoperation, business_branches, business_branchesv2, business_addresses, business_addressesv2)
    {
        event.preventDefault();

        $("#modal_comp_lastname").html(lastname);
        $("#modal_comp_firstname").html(firstname);
        $("#modal_comp_middlename").html(middlename);
        $("#modal_comp_suffix").html(suffix);
        $("#modal_comp_address").html(address);
        $("#modal_comp_zipcode").html(zipcode);
        $("#modal_comp_birthdate").html(birthdate);
        $("#modal_comp_status").html(status);
        $("#modal_comp_telno").html(telno);
        $("#modal_comp_mobileno").html("+63" + mobileno);
        $("#modal_comp_spousename").html(spousename);
        $("#modal_comp_spouseoccupation").html(spouseoccupation);
        $("#modal_comp_spousecompany").html(spousecompany);
        $("#modal_comp_spousecontactno").html(spousecontact);

        $("#modal_comp_bizinfo_compname").html(businessname);
        $("#modal_comp_bizinfo_dti").html(businessdti);
        $("#modal_comp_bizinfo_compaddress").html(businessaddress);
        $("#modal_comp_bizinfo_zipcode").html(businesszipcode);
        $("#modal_comp_bizinfo_telno").html(businesstelno);
        $("#modal_comp_bizinfo_cellno").html(businessmobileno);
        $("#modal_comp_bizinfo_faxno").html(businessfaxno);
        $("#modal_comp_bizinfo_yearsoperation").html(businessyearsoperation);
        $("#modal_comp_bizinfo_branches").html(business_branches);
        $("#modal_comp_bizinfo_branchesv2").html(business_branchesv2);
        $("#modal_comp_bizinfo_address").html(business_addresses);
        $("#modal_comp_bizinfo_addressv2").html(business_addressesv2);

        $("#ViewDetails").modal("show");
    }

    function viewForm(appid, lastname, firstname, address, mobileno, date, branch, loggedinuser) {
        event.preventDefault();

        $("#customer_name").html(firstname + " " + lastname);
        $("#mc_idnumber").html("MC-" + appid.replace(/\./g, "") + date.replace(/\-/g, ""));
        $("#customer_address").html(address);
        $("#customer_contactnum").html("+63" + mobileno);
        $("#customer_date").html(date);
        $("#customer_identification").html(lastname);
        $("#mc_accountname").html(firstname + " " + lastname);
        $("#mc_branchname").html(branch);
        $("#customer_fullname").html(firstname + " " + lastname);
        $("#loggedinuser_fullname").html(loggedinuser);

        $("#ViewForm").modal("show");
    }


    // this is for viewing attachments
    function viewAttachments(appid, lastname, firstname) {
        event.preventDefault();

        name = lastname + ', ' + firstname + '_';

        $.post("mbdapp/php/getattachments.php", {
            appid: appid,
            name: name
        }, function(result) {
            $("#carouselExampleIndicators").html(result);

            $("#carouselExampleIndicators").empty();
            $("#carouselExampleIndicators").html(loadGif);

            $("#ViewAttachments").modal('show');

            $("#ViewAttachments").on('shown.bs.modal', function () {
                $("#carouselExampleIndicators").html(result);
            });
        });
    }


    // this is for updating attachments
    var update_attachments = document.querySelector("#update_attachments");
    var updateSelected = [];
    var updateformData = new FormData();

    $('.close-modal').on("click", function() {
        updateSelected = [];
        updateformData.delete("update_attachments[]");
        $('#update_attachments').val([]);
        updateButtonState();
    });

    // Function to update the update button state based on file input
    function updateButtonState() {
        if (updateSelected.length > 0) {
            $('.update-btn').removeClass("disabled").prop("disabled", false);
        } else {
            $('.update-btn').addClass("disabled").prop("disabled", true);
        }
    }

    updateButtonState(); // initialize

    $('.update-btn').on("click", function() {
        if ($(this).hasClass("disabled")) {
            return; // Don't do anything if the button is disabled
        }

        $.ajax({
            url: 'mbdapp/php/addfiles.php',
            type: 'POST',
            data: updateformData,
            processData: false,
            contentType: false,
            cache: false,
            success: function(result) {
                console.log("File uploaded");
                $("#UploadAttachment").modal('hide');
                getApplications();
            }
        });
    });

    function uploadAttachments(appid, lastname, firstname) {
        event.preventDefault();

        var customer = lastname + ', ' + firstname;

        $("#UploadAttachment").modal('show');

        update_attachments.addEventListener("change", handleFileUpload);

        function handleFileUpload(event) {
            var files = event.target.files;

            // Clear previously selected files when new files are added
            updateSelected = [];
            updateformData.delete("update_attachments[]");
        
            if (files.length === 0) { // Aside from return, these are added to disabled button when no files attached and clear its cache.
                updateSelected = [];
                updateformData.delete("update_attachments[]");
                $('.update-btn').addClass("disabled").prop("disabled", true);
                return;
            }

            for (const file of files) {
                updateSelected.push(file);
                updateformData.append("update_attachments[]", file);
            }

            updateButtonState(); // Update the button state whenever file input changes
        }

        updateformData.append("appidxx", appid);
        updateformData.append("customer", customer);
        
    }



    // PRINT MODAL PDF
    document.getElementById("printForm").addEventListener("click", function() {
        var divToPrint = document.getElementById('printFormModal');
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

</script>

<!-- Bootstrap Initialization -->
<script src="js/bootstrap.bundle.min.js"></script>