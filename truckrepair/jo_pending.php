<style type="text/css">
    
    #jo_pending_div {
        height: auto;
        max-height: 700px;
        overflow-y: auto;
    }

    #approved_jo_div {
        height: auto;
        max-height: 700px;
        overflow-y: auto;
    }

    #cancelled_jo_div {
        height: auto;
        max-height: 700px;
        overflow-y: auto;
    }

    #pending_for_cancellation_div {
        height: auto;
        max-height: 700px;
        overflow-y: auto;
    }

</style>

<!-- Start of the Main Body -->
<form>

    <div class="seperator" style="padding-top: 100px;"></div>

    <div class="container bg-light rounded-3 shadow-sm mb-3 p-2" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <div class="d-flex justify-content-between" style="padding: 5px;">
            <div>
                <h4>JOB ORDER PENDING</h4>
            </div>
            <div>
                <button class="btn generate-btn btn-sm set-btn" id="export_jo_pending">Export Excel</button>
            </div>
        </div>
        <hr>

        <div id="jo_pending_div"></div>
    </div>

    <div class="seperator"></div>

    <div class="container bg-light rounded-3 shadow-sm mb-3 p-2" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
        <div class="d-flex justify-content-between" style="padding: 5px;">
            <div>
                <h4>FOR CANCELLATION - PENDING</h4>
            </div>
            <div>
                <button class="btn generate-btn btn-sm set-btn" id="export_for_cancellation">Export Excel</button>
            </div>
        </div>
        <hr>

        <div id="pending_for_cancellation_div"></div>
    </div>

    <div class="seperator"></div>

    <div class="container bg-light rounded-3 shadow-sm mb-3 p-2" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
        <div class="d-flex justify-content-between" style="padding: 5px;">
            <div>
                <h4>APPROVED JOB ORDER</h4>
            </div>
            <div>
                <button class="btn generate-btn btn-sm set-btn" id="export_jo_approved">Export Excel</button>
            </div>
        </div>
        <hr>

        <div id="approved_jo_div"></div>
    </div>

    <div class="seperator"></div>

    <div class="container bg-light rounded-3 shadow-sm mb-5 p-2" data-aos="fade-up" data-aos-anchor-placement="top-center">
        <div class="d-flex justify-content-between" style="padding: 5px;">
            <div>
                <h4>CANCELLED JOB ORDER</h4>
            </div>
            <div>
                <button class="btn generate-btn btn-sm set-btn" id="export_cancelled_jo">Export Excel</button>
            </div>
        </div>
        <hr>

        <div id="cancelled_jo_div"></div>
    </div>

    <div class="seperator"></div>

</form>

<div class='modal fade' id='JOPending' tabindex='-1' aria-labelledby='JOPendingLabel' aria-hidden='true'>
    <div class='modal-dialog modal-lg'>
        <div class='modal-content'>

            <?php include "modals/modal_costbreakdown.php" ?>

            <div class='modal-footer'>
                <button type='button' class='btn btn-sm btn-danger' data-bs-dismiss='modal'>Close</button>
                <button type='button' class='btn btn-sm generate-btn set-btn' data-bs-dismiss='modal' onclick="setWinner()">Set As Winner</button>
                <button type='button' class='btn btn-sm generate-btn set-btn print-btn' id="btnPrintCostBreakdown">Print</button>
            </div>
        </div>
    </div>
</div>

<!-- View Reason Modal -->
<?php include "modals/modal_viewreason.php" ?>

<!-- Cancel This Modal -->
<?php include "modals/modal_cancel_jo.php" ?>

<!-- Cancel This Modal -->
<?php include "modals/modal_transfer_jo.php" ?>

<!-- Modal Viewing for Attachments -->
<?php include "modals/modal_viewattachments.php"; ?>


<script type="text/javascript">
    var loadGif = "<p align='center'><img src=\"assets/eclipse.gif\" width=\"20%\"></p>";

    AOS.init();

    getJOPending();
    getApprovedJO();
    getCancelledJO();
    getPendingForCancellation();

    function getJOPending() {
        event.preventDefault();
        $("#jo_pending_div").html(loadGif);

        $.post('truckrepair/datatables/orderpending.php', {}, function(result) {
            $('#jo_pending_div').html(result);
            $("#jo_pending_div").hide().fadeIn("slow");
        });
    }

    function getApprovedJO() {
        event.preventDefault();
        $("#approved_jo_div").html(loadGif);

        $.post('truckrepair/datatables/approvedorder.php', {}, function(result) {
            $('#approved_jo_div').html(result);
            $("#approved_jo_div").hide().fadeIn("slow");
        });
    }

    function getCancelledJO() {
        event.preventDefault();
        $("#cancelled_jo_div").html(loadGif);

        $.post('truckrepair/datatables/cancelledorder.php', {}, function(result) {
            $('#cancelled_jo_div').html(result);
            $("#cancelled_jo_div").hide().fadeIn("slow");
        });
    }

    function getPendingForCancellation() {
        event.preventDefault();
        $("#pending_for_cancellation_div").html(loadGif);

        $.post('truckrepair/datatables/pendingforcancellation.php', {}, function(result) {
            $('#pending_for_cancellation_div').html(result);
            $("#pending_for_cancellation_div").hide().fadeIn("slow");
        });
    }

    
    function getCostBreakdown(trigger) {
        job_order_id = $('#job_order_id').val();
        datacount = $('#datacount').val();

        if (trigger == 'cancelled_jo') {
            if (datacount == 1) {
                $('.quote1').removeClass("d-none");
                $('.quote2').addClass("d-none");
                $('.quote3').addClass("d-none");
            } else if (datacount == 2) {
                $('.quote1').removeClass("d-none");
                $('.quote2').removeClass("d-none");
                $('.quote3').addClass("d-none");
            } else if (datacount == 3) {
                $('.quote1').removeClass("d-none");
                $('.quote2').removeClass("d-none");
                $('.quote3').removeClass("d-none");
            }
        } else {
            if (datacount == 1) {
                $('.quote1').removeClass("d-none");
                $('.quote2').addClass("d-none");
                $('.quote3').addClass("d-none");
            } else if (datacount == 2) {
                $('.quote1').addClass("d-none");
                $('.quote2').removeClass("d-none");
                $('.quote3').addClass("d-none");
            } else if (datacount == 3) {
                $('.quote1').addClass("d-none");
                $('.quote2').addClass("d-none");
                $('.quote3').removeClass("d-none");
            }
        }

        for (let i = 1; i <= 3; i++) {
            $.post('truckrepair/datatables/table_laborcost_breakdown.php', {
                job_order_id: job_order_id,
                datacount: i
            }, function(result) {
                $('#table_laborcost_breakdown_quot' + i).html(result);
            });

            $.post('truckrepair/datatables/table_materialcost_breakdown.php', {
                job_order_id: job_order_id,
                datacount: i
            }, function(result) {
                $('#table_materialcost_breakdown_quot' + i).html(result);
            });
        }
    }


    // viewing attachments
    function viewAttachment(jobid, nameid) {
        event.preventDefault();

        var_jobid = jobid;
        var_nameid = nameid;

        $.post("truckrepair/php/getattachments.php", {
            var_jobid: var_jobid,
            var_nameid: var_nameid
        }, function(result) {
            $("#carouselExampleIndicators").html(result);
        });

        $("#carouselExampleIndicators").empty();
        $("#ViewAttachments").modal('show');
        $("#carouselExampleIndicators").html(loadGif);
    }


    function viewSupplier(joid, nameid, brname, vname, position, overview, driver, brand, model, year, platenum, odo, jobid, datacount, suppname, suppamount, trigger, approver, approvaldate, modeoffunds, supplier, aid_recipient, type)
    {
        event.preventDefault();

        var_joid = joid;
        var_nameid = nameid;
        var_brname = brname;
        var_vname = vname; 
        var_position = position; 
        var_overview = overview; 
        var_driver = driver;
        var_brand = brand; 
        var_model = model;
        var_year = year;
        var_platenum = platenum;
        var_odo = odo;
        var_jobid = jobid;
        var_datacount = datacount;
        var_suppname = suppname;
        var_suppamount = suppamount;
        var_approver = approver;
        var_modeoffunds = modeoffunds;
        var_aid_recipient = aid_recipient;
        var_type = type;

        $.post('truckrepair/php/getwinnersupplier.php', {
            suppname: supplier
        }, function(result) {
            supplier_contact = result;
            console.log(supplier_contact);

            $("#display_JobOrderID").html(var_joid);
            $("#display_Branch").html(var_brname);
            $("#display_Employee").html(var_vname);
            $("#display_Position").html(var_position);
            $("#display_Overview").html(var_overview);
            $("#display_Driver").html(var_driver);
            $("#display_Brand").html(var_brand);
            $("#display_Model").html(var_model);
            $("#display_Year").html(var_year);
            $("#display_PlateNo").html(var_platenum);
            $("#display_ODO").html(var_odo);

            $("#job_order_id").val(var_jobid);
            $("#datacount").val(var_datacount);
            $("#supplier").html(var_suppname + " (" + supplier_contact + ")");
            $("#total_amount").html(var_suppamount);
            $("#display_Approver").html(var_approver);
            $("#display_ModeFunds").html(var_modeoffunds);
            $("#display_Recipient").html(var_aid_recipient);

            if (trigger == 'approved_jo') {
                $("#supplier").addClass("text-primary");
                $('.set-btn').addClass("d-none");
                $('.print-btn').removeClass("d-none");
                $('.approverandfunds').removeClass("d-none");
            } else if (trigger == 'jo_pending') {
                $("#supplier").addClass("text-danger");
                $('.set-btn').removeClass("d-none");
                $('.print-btn').addClass("d-none");
                $('.approverandfunds').addClass("d-none");
            } else if (trigger == 'cancelled_jo') {
                $("#supplier").removeClass("text-danger");
                $('.set-btn').addClass("d-none");
                $('.print-btn').removeClass("d-none");
                $('.approverandfunds').removeClass("d-none");
            }

            if (var_type == "FINANCIAL AID") {
                $('.financialaidname').removeClass("d-none");
            } else {
                $('.financialaidname').addClass("d-none");
            }

            $("#JOPending").modal('show');

            getCostBreakdown(trigger);
        });
    }

    function setWinner() {
        event.preventDefault();

        var selectedEmployee = document.getElementById('job_order_id').value;
        var selectedDatacount = document.getElementById('datacount').value;
        var selectedSupplier = document.getElementById('supplier').textContent;
        var selectedWinnerElement = document.getElementById('selected_winner_' + selectedEmployee);
        
        selectedWinnerElement.innerHTML = '';
        
        var option = document.createElement('option');
        option.value = selectedDatacount;
        option.text = selectedSupplier;
        
        selectedWinnerElement.appendChild(option);
        
        selectedWinnerElement.disabled = true;
    }

    function viewReason(joid, nameid, vname, branch, position, reason) {
        event.preventDefault();

        var_joid = joid;
        var_empname = vname;
        var_branch = branch;
        var_position = position;
        var_reason = reason;

        $("#cancel_joid").val(var_joid);
        $("#user_vname").val(var_empname);
        $("#user_branch").val(var_branch);
        $("#user_position").val(var_position);
        $("#cancel_reason").val(var_reason);

        $("#ViewReason").modal('show');
    }

    function transferJO(joid, nameid, type)
    {
        event.preventDefault();

        var_joid = joid;
        var_nameid = nameid;
        var_type = type;

        $('.close-modal').on("click", function() {
            $('#department_emails').val([]);
            $('#transfer_Type_into').val([]);
        });

        $("#transfer_JobOrderID").val(var_joid);
        $("#transfer_Nameid").val(var_nameid);
        $("#transfer_Type").val(var_type);

        $("#TransferJO").modal('show');
    }

    function beginTransferring() {
        transfer_into = $('#transfer_Type_into').val();
        nameid = $('#transfer_Nameid').val();
        joid = $('#transfer_JobOrderID').val();

        selectedEmails = $('#department_emails').find('option:selected').map(function() {
            return this.value;
        }).get().join(', ');

        if (!transfer_into || transfer_into == '') {
            $("#errorMsgModal").modal('show');
            $("#errorMsgModal .modal-body").html("Please select which to transfer to.");
            return;
        }

        $.post('truckrepair/php/transfer.php', {
            transfer_into: transfer_into,
            joid: joid,
            nameid: nameid
        }, function(result) {
            $('#transfer_Type_into').val("");
            $('#transfer_Nameid').val("");
            $('#transfer_JobOrderID').val("");
            $('#department_emails').val([]);
            $("#TransferJO").modal('hide');
            $("#successMsgModal").modal('show');
            $("#successMsgModal .modal-body").html("Transferred successfully.");
            getJOPending();
            getPendingForCancellation();
        });

        $.post('truckrepair/php/sendastext.php', {selectedEmail:selectedEmails}, function(result) {console.log("Message sent.");});
    }

    function cancelJO(joid, nameid, brname, vname, position, overview, brand, model, year, platenum, odo, jobid, datacount, suppname, suppamount, trigger, cancelvalue)
    {
        event.preventDefault();

        var_joid = joid;
        var_nameid = nameid;
        var_brname = brname;
        var_vname = vname; 
        var_position = position; 
        var_overview = overview; 
        var_brand = brand; 
        var_model = model;
        var_year = year;
        var_platenum = platenum;
        var_odo = odo;
        var_jobid = jobid;
        var_datacount = datacount;
        var_suppname = suppname;
        var_suppamount = suppamount;

        $("#cancel_JobOrderID").html(var_joid);
        $("#cancel_Branch").html(var_brname);
        $("#cancel_Employee").html(var_vname);
        $("#cancel_Position").html(var_position);
        $("#cancel_Overview").html(var_overview);
        $("#cancel_Brand").html(var_brand);
        $("#cancel_Model").html(var_model);
        $("#cancel_Year").html(var_year);
        $("#cancel_PlateNo").html(var_platenum);
        $("#cancel_ODO").html(var_odo);

        $("#job_order_id").val(var_jobid);
        $("#datacount").val(var_datacount);
        $("#supplier").html(var_suppname);
        $("#total_amount").html(var_suppamount);

        $("#CancelJO").modal('show');
    }

    function submitApproval(joborderidxx, approve, modeoffunds) {
        var approvalstatus = 1;
        var joborderidxx = joborderidxx;

        var selectedWinnerElement = document.getElementById('selected_winner_' + joborderidxx);
        var datacount = selectedWinnerElement.value;

        if (datacount == "") {
            $("#errorMsgModal").modal('show');
            $("#errorMsgModal .modal-body").html("Please select a winner.");
            return;
        }

        if (modeoffunds == "") {
            $("#errorMsgModal").modal('show');
            $("#errorMsgModal .modal-body").html("Please select a mode of funds.");
            return;
        }

        $.post('truckrepair/php/pendingapproval.php', {
            approvalstatus: approvalstatus,
            joborderidxx: joborderidxx,
            datacount: datacount,
            modeoffunds: modeoffunds
        }, function(result) {
            $("#successMsgModal").modal('show');
            $("#successMsgModal .modal-body").html("Winner Approved.");
            getJOPending();
            getApprovedJO();
            getCancelledJO();
            getPendingForCancellation();
        });
    }

    function cancelApproval() {
        var approvalstatus = 2;
        var joborderidxx = $("#cancel_JobOrderID").html();
        var cancel_text = $("#cancel_text").val().replace(/'/g, "`").replace(/(\r\n|\n|\r)/gm, " ");

        if (!cancel_text) {
            inputElement = document.getElementById('cancel_text');
            inputElement.focus();
            return;
        }

        $.post('truckrepair/php/pendingapproval.php', {
            approvalstatus: approvalstatus,
            joborderidxx: joborderidxx,
            cancel_text: cancel_text
        }, function(result) {
            $("#successMsgModal").modal('show');
            $("#successMsgModal .modal-body").html("Job Order Cancelled.");
            $("#CancelJO").modal('hide');
            getJOPending();
            getApprovedJO();
            getCancelledJO();
            getPendingForCancellation();
        });
    }

    function approveRequestedCancellation(jobid, nameid, title) {
        var approvalstatus = 2;
        var joborderidxx = jobid;
        var nameid = nameid;

        $.post('truckrepair/php/pendingcancellationapproved.php', {
            approvalstatus: approvalstatus,
            joborderidxx: joborderidxx,
            nameid: nameid
        }, function(result) {
            $("#successMsgModal").modal('show');
            $("#successMsgModal .modal-body").html("Requested Cancellation Approved.");
            getCancelledJO();
            getPendingForCancellation();
        });
    }


    // PRINT MODAL PDF
    document.getElementById("btnPrintCostBreakdown").addEventListener("click", function() {
        var divToPrint = document.getElementById('printarea_breakdown');
        var newWin = window.open('', 'Print-Window');
        newWin.document.open();
        newWin.document.write('<html><head><title>Cost Breakdown</title><link rel="stylesheet" type="text/css" href="stylesheets/printcostbreakdown.css"></head><body onload="window.print()">');
        newWin.document.write(divToPrint.innerHTML);
        newWin.document.write('</body></html>');
        newWin.document.close();
        setTimeout(function() {
            newWin.close();
        }, 200);
    });

    // Export to Excel
    document.getElementById("export_jo_pending").addEventListener("click", function() {
        event.preventDefault();
        var table = document.getElementById("orderpending_datatable");

        // create a new table without the 2nd column
        var newTable = document.createElement("table");
        for (var i = 0; i < table.rows.length; i++) {
            var newRow = newTable.insertRow();
            for (var j = 0; j < table.rows[i].cells.length; j++) {
                if (j !== 9 && j !== 15 && j !== 16 && j !== 17) {
                    var newCell = newRow.insertCell();
                    newCell.innerHTML = table.rows[i].cells[j].innerHTML;
                }   
            }
        }

        var wb = XLSX.utils.book_new();
        var ws = XLSX.utils.table_to_sheet(newTable);
        XLSX.utils.book_append_sheet(wb, ws, "Job Order Pending");
        
        XLSX.writeFile(wb, "JO_Pending.xlsx");

    });

    document.getElementById("export_for_cancellation").addEventListener("click", function() {
        event.preventDefault();
        var table = document.getElementById("pendingcancellation_datatable");

        // create a new table without the 2nd column
        var newTable = document.createElement("table");
        for (var i = 0; i < table.rows.length; i++) {
            var newRow = newTable.insertRow();
            for (var j = 0; j < table.rows[i].cells.length; j++) {
                if (j !== 9 && j !== 13 && j !== 14) {
                    var newCell = newRow.insertCell();
                    newCell.innerHTML = table.rows[i].cells[j].innerHTML;
                }   
            }
        }

        var wb = XLSX.utils.book_new();
        var ws = XLSX.utils.table_to_sheet(newTable);
        XLSX.utils.book_append_sheet(wb, ws, "For Cancellation - Pending");
        
        XLSX.writeFile(wb, "For Cancellation - Pending.xlsx");

    });

    document.getElementById("export_jo_approved").addEventListener("click", function() {
        event.preventDefault();
        var table = document.getElementById("approvedorder_datatable");

        // create a new table without the 2nd column
        var newTable = document.createElement("table");
        for (var i = 0; i < table.rows.length; i++) {
            var newRow = newTable.insertRow();
            for (var j = 0; j < table.rows[i].cells.length; j++) {
                if (j !== 9) {
                    var newCell = newRow.insertCell();
                    newCell.innerHTML = table.rows[i].cells[j].innerHTML;
                }   
            }
        }

        var wb = XLSX.utils.book_new();
        var ws = XLSX.utils.table_to_sheet(newTable);
        XLSX.utils.book_append_sheet(wb, ws, "Approved Job Order");
        
        XLSX.writeFile(wb, "JO_Approved.xlsx");

    });

    document.getElementById("export_cancelled_jo").addEventListener("click", function() {
        event.preventDefault();
        var table = document.getElementById("cancelledorder_datatable");

        // create a new table without the 2nd column
        var newTable = document.createElement("table");
        for (var i = 0; i < table.rows.length; i++) {
            var newRow = newTable.insertRow();
            for (var j = 0; j < table.rows[i].cells.length; j++) {
                if (j !== 9 && j !== 13) {
                    var newCell = newRow.insertCell();
                    newCell.innerHTML = table.rows[i].cells[j].innerHTML;
                }   
            }
        }

        var wb = XLSX.utils.book_new();
        var ws = XLSX.utils.table_to_sheet(newTable);
        XLSX.utils.book_append_sheet(wb, ws, "Cancelled Job Order");
        
        XLSX.writeFile(wb, "Cancelled_JO.xlsx");

    });

</script>