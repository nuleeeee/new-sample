<style type="text/css">
.dataTables_scroll {
    height: auto !important;
    max-height: 500px !important;
    overflow-y: auto;
}
.dataTables_scrollHead {
    position: sticky !important;
    z-index: 1 !important;
    top: 0px !important;
}
</style>

<!-- Start of the Main Body -->
<form>
    <div class="container" style="padding-top: 50px;">
        <div class="row bg-light shadow-sm rounded-3 p-2 mb-3">
            <div class="col-lg-3">
                <label>Start Date</label>
                <input type="date" class="form-control" id="startdate" name="startdate">
            </div>
            <div class="col-lg-3">
                <label>End Date</label>
                <input type="date" class="form-control" id="enddate" name="enddate">
            </div>

            <div class="col-lg-3"></div>

            <div class="col-lg-3 mt-4">
                <div class="col d-flex justify-content-end">
                    <button class="btn generate-btn w-100" id="generate" onclick="getdata()">Generate</button>
                </div>
            </div>
        </div>
    </div>

    <div class="seperator"></div>

    <div class="container bg-light shadow-sm rounded-3 p-2 mt-3 mb-3">
        <div class="po-div-label" style="padding: 5px;">
            <h4>P.O MONITORING</h4>
            <hr>
        </div>

        <div id="monitoring_datatable"></div>
    </div>

    <div class="seperator"></div>

    <div class="container bg-light shadow-sm rounded-3 p-2 mt-3 mb-5">
        <div class="po-div-label" style="padding: 5px;">
            <h4>P.O PENDING APPROVAL</h4>
            <hr>
        </div>

        <div id="pending_datatable"></div>
    </div>

    <div class="seperator"></div>

</form>


<script type="text/javascript">
    var startdate = "";
    var enddate = "";

    getdata();
    getpending();

    function getdata() {
        event.preventDefault();
        startdate = $('#startdate').val();
        enddate = $('#enddate').val();

        $.post('po/datatables/po_monitoring_datatable.php', {
            startdate: startdate,
            enddate: enddate
        }, function(result) {
            $('#monitoring_datatable').html(result);
        });
    }

    function getpending() {
        $.post('po/datatables/po_pending_datatable.php', {}, function(result) {
            $('#pending_datatable').html(result);
        });
    }

</script>