<style type="text/css">
    
    #canvass_report_div {
        height: auto;
        max-height: 800px;
        overflow-y: auto;
    }

</style>



<!-- Start of the Main Body -->
<form>
    <div class="container mt-5" style="padding: 30px;">

        <div class="row mt-3 mb-2 bg-light shadow-sm p-2 rounded-3">
            <div class="col-lg-3">
                <label>Start Date</label>
                <input type="date" class="form-control" id="startdate" name="startdate">
            </div>
            <div class="col-lg-3">
                <label>End Date</label>
                <input type="date" class="form-control" id="enddate" name="enddate">
            </div>

            <div class="col-lg-2"></div>

            <div class="col-lg-4">
                <table class="table table-borderless text-center">
                    <thead>
                        <tr>
                            <th><label id="win">37</label></th>
                            <th><label id="pending">150</label></th>
                            <th><label id="failed">120</label></th>
                            <th><label id="closed">0</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>WIN</td>
                            <td>PENDING</td>
                            <td>FAILED</td>
                            <td>CLOSED</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                                <button class="btn generate-btn text-light w-100" id="generate" onclick="getdtr()">Generate</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="seperator mt-4 mb-4"></div>

        <div class="row mt-3 mb-2 bg-light shadow-sm p-2 rounded-3">
            <h4>CANVASS REPORT</h4>
            <hr>

            <div id="canvass_report_div"></div>
        </div>

        <div class="seperator"></div>

    </div>

</form>


<script type="text/javascript">
    var startdate = "";
    var enddate = "";

    getdtr();

    function getdtr() {
        event.preventDefault();
        startdate = $('#startdate').val();
        enddate = $('#enddate').val();

        $.post('canvass/datatables/canvass_report_datatable.php', {
            startdate: startdate,
            enddate: enddate
        }, function(result) {
            $('#canvass_report_div').html(result);
        });
    }

</script>