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
.generate-btn {
    --bs-btn-bg: #434EA0;
    --bs-btn-border-color: #434EA0;
    --bs-btn-hover-bg: #2D2A6D;
    --bs-btn-hover-border-color: #2D2A6D;
    --bs-btn-active-bg: #2D2A6D;
    --bs-btn-active-border-color: #2D2A6D;
}
@media (max-width: 768px) {
    .container {
        padding: 10px;
    }
}
</style>


<!-- Start of the Main Body -->
<form>
    <div class="container" style="padding-top: 50px;">

        <div class="row mt-2 mb-4 bg-light shadow-sm rounded-3 p-2">
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
                    <button class="btn btn-sm generate-btn w-100" id="generate" onclick="getdtr()">Generate</button>
                </div>
            </div>
        </div>

    </div>

    <div class="seperator"></div>

    <div class="container bg-light shadow-sm rounded-3 p-2 mb-5">
        <div class="dtr-div-label">
            <h4>DTR REPORT AND MONITORING</h4>
            <hr>
        </div>

        <div id="dtr_reprt_monitr"></div>
    </div>

    <div class="seperator"></div>

</form>


<script type="text/javascript">
    var loadGif = "<p align='center'><img src=\"assets/eclipse.gif\" width=\"10%\"></p>";
    var startdate = "";
    var enddate = "";

    getdtr();

    function getdtr() {
        event.preventDefault();
        $("#dtr_reprt_monitr").html(loadGif);
        startdate = $('#startdate').val();
        enddate = $('#enddate').val();

        $.post('dtr/datatables/dtr_reportandmonitor.php', {
            startdate: startdate,
            enddate: enddate
        }, function(result) {
            $('#dtr_reprt_monitr').html(result);
            $("#dtr_reprt_monitr").hide().fadeIn("slow");
            $("#loadGif").hide();
        });
    }

</script>