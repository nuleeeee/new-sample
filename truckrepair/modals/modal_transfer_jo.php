<div class="modal fade" id="TransferJO" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="logobranch">
                <img src="https://maquilingbuildersdepot.com/HRIMS/assets/top.png" style="width:100%;">
            </div>
            <div class="modal-body">
                <div class="row mb-2 p-3">
                    <div class="col-lg-6">
                        <label>Change From:</label>
                        <input type="text" id="transfer_Type" class="form-select" disabled>
                        <input type="hidden" id="transfer_Nameid">
                        <input type="hidden" id="transfer_JobOrderID">
                    </div>
                    <div class="col-lg-6">
                        <label>Change Into:</label>
                        <select id="transfer_Type_into" class="form-select">
                            <option value="" selected></option>
                            <option value="TRUCK">Truck Repair</option>
                            <option value="BUILDING">Building Repair</option>
                            <option value="WATER">Water</option>
                            <option value="ELECTRIC">Electric</option>
                            <option value="COMMUNICATION">Communication (Bill + Load)</option>
                            <option value="STATIONARY">Stationary</option>
                            <option value="MARKETING COLLATERALS">Marketing Collaterals</option>
                            <option value="EQUIPMENT AND ASSETS">Equipment and Assets</option>
                            <option value="MIS">MIS Branch Repair</option>
                            <option value="HR">HR Request</option>
                        </select>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <label>Notify Deparments:</label>
                        <select class="form-select" id="department_emails" multiple style="height: auto; overflow-x: auto;">
                            <option value="auditdeptmbd@gmail.com">AUDIT Department</option>
                            <option value="financedeptmbd@gmail.com">FINANCE Department</option>
                            <option value="maquilinghr@gmail.com">HR Department/Security</option>
                            <option value="rize07.elca@gmail.com">HR Department/Payroll</option>
                            <option value="mis@maquilingbuildersdepot.com">MIS Department</option>
                            <option value="teammbdoperation@gmail.com">OPERATIONS Department(SIR VINCENT)</option>
                            <option value="operations@maquilingbuildersdepot.com">OPERATIONS/SALES Dept(MAM AYRA)</option>
                            <option value="mbdpurchasedept@gmail.com">PURCHASING Department</option>
                            <option value="michie9428@gmail.com">ARCHITECT</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type='button' class='btn btn-sm btn-secondary close-modal' data-bs-dismiss='modal'>Close</button>
                <button type='button' class='btn btn-sm btn-warning' onclick="beginTransferring()">Transfer</button>
            </div>
        </div>
    </div>
</div>