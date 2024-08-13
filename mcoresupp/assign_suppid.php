<style type="text/css">
	
	#employee_list {
		height: auto;
		max-height: 800px;
		overflow-y: auto;
	}

</style>

<form>
	
	<div class="container-fluid" style="padding: 40px;">
		
		<div class="row">

			<!-- Left Container -->
			<div class="col-sm-5 bg-light p-3 border">
				<div class="mt-2">
					<h4>Employee List</h4>
				</div>

				<div class="mt-3 table-responsive">
					
					<div id="employee_list"></div>

				</div>
			</div>



			<!-- Right Container -->
			<div class="col-sm-7 bg-light p-3 border">
				<div class="mt-2">
					<h4>Employee Lists with assigned suppliers</h4>
				</div>


				<div class="mt-3 table-responsive">
					
					<div id="assigned_supp"></div>

				</div>

			</div>
		</div>

	</div>


	<!-- MODALS -->
    <div class="modal fade" id="SetSupplierID" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="ModalLabel"><b>Assign Supplier ID:</b></h1>
                </div>
                <div class="modal-body">
                    
                    <select id="supplier_name" class="form-select">
                    	
                    </select>

                </div>
                <div class="modal-footer">
                    <button id="btn_save_supplier" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="AddSupplier_Task" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="ModalLabel"><b><label id="vname-modal"></label></b></h1>
                </div>
                <div class="modal-body">
                    
                    <div id="add-supplier"></div>

                </div>
                <div class="modal-footer">
                    <button id="btn_add_supplier" class="btn btn-success" onclick="checktask()">Set</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>



<script type="text/javascript">

    getEmployeeList();
    getSuppName();

    function getEmployeeList() {
        event.preventDefault();

        $.post('mcoresupp/datatables/employee_list_datatable.php', {}, function(result) {
            $('#employee_list').html(result);
        });
    }


    // GET SUPPLIER NAMES
    function getSuppName() {
        event.preventDefault();

        $.post('mcoresupp/php/suppname.php', {}, function(result) {
            $('#supplier_name').html(result);
        });
    }



    // THIS IS FOR SETTING SUPPLIER ID
    function setID(nameidxx) {
        event.preventDefault();

        $("#SetSupplierID").modal('show');
    }


    // THIS IS FOR VIEWING EMPLOYEE WITH ASSIGNED SUPPLIERS
    function showsUp(nameid) {
    	showlistwithsupp(nameid);
    }

    function showlistwithsupp(nameidz) {
    	event.preventDefault();

    	nameidxx = nameidz;

    	console.log("nameidxx: " + nameidxx);

    	$.post('mcoresupp/datatables/assigned_list_datatable.php', {nameidxx: nameidxx}, function(result) {
            $('#assigned_supp').html(result);
        });
    }



    // THIS IS FOR ADDING SUPPLIER
    function addSupplier(nameidxx, vname) {
        event.preventDefault();

        document.getElementById('vname-modal').innerText = vname;

        $.post('mcoresupp/datatables/add_supplier_datatable.php', {nameidxx: nameidxx}, function(result) {
            $('#add-supplier').html(result);
        });

        $("#AddSupplier_Task").modal('show');
    }


</script>