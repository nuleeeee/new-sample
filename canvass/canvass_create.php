<style type="text/css">
	
	#canvass-item-breakdown {
		height: auto;
		max-height: 400px;
		overflow-y: auto;
	}

	#another-canvass {
		height: auto;
		max-height: 600px;
		overflow-y: auto;
	}

</style>

<form>
	
	<div class="container-fluid" style="padding: 40px; margin-top: 60px;">
		
		<div class="row">

			<!-- Left Container -->
			<div class="col-sm-4 bg-light p-3 border">
				<div class="d-flex justify-content-between">
					<div class="mt-2">
						<h4>CUSTOMER DETAILS</h4>
					</div>
					<div class="dropdown">
						<a class="btn btn-link text-decoration-none" data-bs-toggle="dropdown">
							<i class="bi bi-search"></i> Search
						</a>

						<div class="dropdown-menu">
							<select id="selectDropdown" style="width: 100%;"></select>
						</div>
					</div>
				</div>

				<div class="row mt-3">
					<div class="col">
						<label>First Name</label><br>
						<input type="text" id="fname" name="fname" class="form-control">
					</div>
					<div class="col">
						<label>Customer ID</label><br>
						<input type="text" id="cus_id" name="cus_id" class="form-control">
					</div>
				</div>

				<div class="row mt-3">
					<div class="col">
						<label>Last Name</label><br>
						<input type="text" id="lname" name="lname" class="form-control">
					</div>
					<div class="col">
						<label>Contact Number</label><br>
						<input type="text" id="contactnum" name="contactnum" class="form-control">
					</div>
				</div>

				<div class="mt-3">
					<label>Company Name (optional)</label><br>
					<input type="text" id="company" name="company" class="form-control">
				</div>

				<div class="mt-3">
					<label>Email Address</label><br>
					<input type="text" id="email_add" name="email_add" class="form-control">
				</div>

				<div class="mt-3">
					<label>Barangay</label><br>
					<input type="text" id="barangay" name="barangay" class="form-control">
				</div>

				<div class="mt-3">
					<label>Municipality</label><br>
					<input type="text" id="municipality" name="municipality" class="form-control">
				</div>

				<div class="mt-3">
					<label>Province</label><br>
					<input type="text" id="province" name="province" class="form-control">
				</div>

				<div class="mt-4">
					<button type="button" class="btn w-100 generate-btn" id="set_customer">Set Customer Details</button>
				</div>
			</div>



			<!-- Right Container -->
			<div class="col-sm-8 bg-light p-3 border">
				<div class="row">
					<div class="col-sm-3 mt-2">
						<h4>CANVASS ID</h4>
					</div>
					<div class="col-sm-3">
						<input type="text" id="canvass_id" name="canvass_id" class="form-control">
					</div>
				</div>


				<div class="row mt-3">
					
					<div class="col-sm-3">
						<label>Customer ID</label><br>
						<input type="text" id="customeridz" name="customeridz" class="form-control">
					</div>

					<div class="col-sm-3">
						<label>Customer Name</label><br>
						<input type="text" id="custom_name" name="custom_name" class="form-control">
					</div>

					<div class="col-sm-3">
						<label>Gross Amount</label><br>
						<input type="text" id="gross_amount" name="gross_amount" class="form-control">
					</div>

					<div class="col-sm-3">
						<label>Net Amount</label><br>
						<input type="text" id="net_amount" name="net_amount" class="form-control">
					</div>

				</div>



				<div class="row mt-3 text-nowrap">
					
					<div class="col-sm-4" style="color: #434EA0;">
						<label>Search by Barcode</label><br>
						<input type="text" id="search_barcode" name="search_barcode" class="form-control search-divs">
					</div>

					<div class="col-sm-4" style="color: #434EA0;">
						<label>Search by Item Description</label><br>
						<input type="text" id="search_itemdesc" name="search_itemdesc" class="form-control search-divs">
					</div>

					<div class="col-sm-4" style="color: #434EA0;">
						<label>Seach by Supplier Name</label><br>
						<input type="text" id="search_suppname" name="search_suppname" class="form-control search-divs">
					</div>

				</div>


				<div class="mt-4">
					<h4>CANVASS ITEM BREAKDOWN</h4>

					<div id="canvass-item-breakdown"></div>
				</div>
				

			</div>
		</div>


		<div class="row mt-3">
			
			<div class="col-sm-12 bg-light p-3 border">
				<div class="table-responsive">
					<!-- DATATABLE -->
					<div id="another-canvass"></div>
				</div>
			</div>

		</div>

	</div>
</form>



<script type="text/javascript">

    getBreakdown();
    getcanvass();
    getEmployees();

    function getBreakdown() {
        event.preventDefault();

        $.post('canvass/datatables/item_breakdown_datatable.php', {}, function(result) {
            $('#canvass-item-breakdown').html(result);
        });
    }

    function getcanvass() {
        $.post('canvass/datatables/another_canvass_datatable.php', {}, function(result) {
            $('#another-canvass').html(result);
        });
    }

    $('#selectDropdown').select2();
    function getEmployees() {
        $.post('canvass/php/getemployees.php', {}, function(result) {
            $('#selectDropdown').html(result);
        });
    }
    
    $('.dropdown').on('click', function() {
        $('#selectDropdown').select2('open');
    });


</script>