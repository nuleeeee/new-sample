
<table width="100%" class="table table-bordered mt-3 mb-3">
    <tbody>
        <tr>
            <td style="text-align: left; width: 30%; background-color: #7777AC; color: white;">
                <label>Employee Number</label>
            </td>
            <td style="text-align: left; width: 70%;">
                <div>
                    <label id="empnum"></label>
                </div>
            </td>
        </tr>
        <tr>
            <td style="text-align: left; width: 30%; background-color: #7777AC; color: white;">
                <label>Employee Name</label>
            </td>
            <td style="text-align: left; width: 70%;">
                <div>
                    <label id="empname"></label>
                </div>
            </td>
        </tr>
    </tbody>
</table>



<table width="100%" class="table table-bordered mt-3 mb-3">
    <thead>
        <tr>
            <td style="width: 30%; background-color: #7777AC; color: white;">Running Warnings</td>
            <td style="width: 30%; background-color: #7777AC; color: white;">Running Suspensions</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="text" id="runningwarning" name="runningwarning" style="border-style: none; text-align: center; pointer-events: none; user-select: none;" readonly></td>
            <td><input type="text" id="runningsus" name="runningsus" style="border-style: none; text-align: center; pointer-events: none; user-select: none;" readonly></td>
            <td class="d-none"><input type="text" id="runningterm" name="runningterm" style="border-style: none; text-align: center; pointer-events: none; user-select: none;" readonly></td>
        </tr>
    </tbody>
</table>


<table width="100%" class="table table-bordered mt-3 mb-3">
    <tbody>
        <tr>
            <td style="text-align: left; width: 30%; background-color: #7777AC; color: white;">
                <label>Main Category</label>
            </td>
            <td style="text-align: left; width: 70%;">
                <div>
                    <label id="maincat"></label>
                </div>
            </td>
        </tr>
        <tr>
            <td style="text-align: left; width: 30%; background-color: #7777AC; color: white;">
                <label>Sub Category 1</label>
            </td>
            <td style="text-align: left; width: 70%;">
                <div>
                    <label id="catone"></label>
                </div>
            </td>
        </tr>
        <tr>
            <td style="text-align: left; width: 30%; background-color: #7777AC; color: white;">
                <label>Sub Category 2</label>
            </td>
            <td style="text-align: left; width: 70%;">
                <div>
                    <label id="cattwo"></label>
                </div>
            </td>
        </tr>
    </tbody>
</table>


<div class="row"></div>


<table width="100%" class="table table-bordered mt-3 mb-3">
    <tbody>
        <tr>
            <td style="text-align: left; width: 30%; background-color: #7777AC; color: white;">
                <label>Infraction Date</label>
            </td>
            <td style="text-align: left; width: 70%;">
                <div>
                    <label id="memostart"></label>
                </div>
            </td>
        </tr>
        <tr>
            <td style="text-align: left; width: 30%; background-color: #7777AC; color: white;">
                <label>Penalty Code</label>
            </td>
            <td style="text-align: left; width: 70%;">
                <div>
                    <label id="penalcode"></label>
                </div>
            </td>
        </tr>
    </tbody>
</table>



<table width="100%" class="table table-bordered mt-4 mb-3 suseffdate d-none">
    <tbody>
        <tr>
            <td style="text-align: left; width: 30%; background-color: #7777AC; color: white;">
                <label>Suspension Date Effectivity</label>
            </td>
            <td style="text-align: left; width: 70%;">
                <input type="date" id="sus_effectivity_date" name="sus_effectivity_date" style="border-top: none; border-right: hidden; border-left: hidden; border-radius: 0px; margin-top: 5px; width: 100%; outline: none;">
            </td>
        </tr>
    </tbody>
</table>


<table width="100%" class="table table-bordered mt-4 mb-3 termdate d-none">
    <tbody>
        <tr>
            <td style="text-align: left; width: 30%; background-color: #7777AC; color: white;">
                <label>Termination</label>

            </td>
            <td style="text-align: left; width: 70%;">
                <input type="date" id="term_suspension_date" name="term_suspension_date" style="border-top: none; border-right: hidden; border-left: hidden; border-radius: 0px; margin-top: 5px; width: 100%; outline: none;">
                <div class="col mt-2 cb-sb" style="display: flex; justify-content: space-between;">
                    <div style="width: 50%;">
                        <input type="checkbox" id="cb1" name="cb1" onclick="handleCheckboxChange(this)">
                        <label for="cb1" style="white-space: nowrap;"> Proceed with suspension date</label>
                    </div>
                    <div style="width: 50%;">
                        <input type="checkbox" id="cb2" name="cb2" onclick="handleCheckboxChange(this)">
                        <label for="cb2" style="white-space: nowrap;"> Proceed with Termination</label>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
</table>


<!-- THIS IS TO SELECT HOW MANY OF DAYS SHOULD BE FINED -->
<table width="100%" class="table table-bordered mt-4 mb-3 fineddate d-none">
    <tbody>
        <tr>
            <td style="text-align: left; width: 30%; background-color: #7777AC; color: white;">
                <label>Number of Suspension Days in regards to Termination</label>

            </td>
            <td style="text-align: left; width: 70%;">
                <input type="number" id="term_suspension_count" name="term_suspension_count" min="1" style="border-top: none; border-right: hidden; border-left: hidden; border-radius: 0px; margin-top: 5px; width: 100%; outline: none;" onkeyup="countChecker(this)">
                <i style="color:gray;">* Required. </i>
            </td>
        </tr>
    </tbody>
</table>


<div class="row"></div>


<table width="100%" class="table table-bordered mt-3 mb-3">
    <tbody>
        <tr>
            <td style="text-align: left; width: 30%; background-color: #7777AC; color: white;">
                <label>Details of Offense</label>
            </td>
            <td style="text-align: left; width: 70%;">
                <label id="details"></label>
            </td>
        </tr>
    </tbody>
</table>


<script type="text/javascript">
    function handleCheckboxChange(checkbox) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function (cb) {
            if (cb !== checkbox) {
                cb.checked = false;
            }
        });

        var termDateInput = document.getElementById('term_suspension_date');
        termDateInput.disabled = checkbox.id === 'cb2';

        if (termDateInput.disabled) {
            termDateInput.value = '';
            $('.fineddate').addClass("d-none");
        }

        if (!checkbox.checked) {
            termDateInput.disabled = false;
            if (checkbox.id === 'cb1') {
                $('.fineddate').addClass("d-none");
            }
        } else {
            if (checkbox.id === 'cb1') {
              $('.fineddate').removeClass("d-none");
            }
        }
    }

    
    function countChecker(inputElement) {
        const min = 1;
        const inputValue = parseInt(inputElement.value, 10);

        // If the input value is less than the minimum, set it to the minimum value
        if (isNaN(inputValue) || inputValue < min) {
            inputElement.value = '';
        }
    }

</script>
                
<style>
    .btn-view:hover {
        background-color: rgb(49, 49, 117) !important;
        color: white !important;
    }

    .btn-closee:hover {
        background-color: rgb(49, 49, 117) !important;
        color: white !important;
    }

    .modal-footer .btn-closee {
        margin: 0;
        width: auto;
    }

    .bouncy {
        animation: bouncy 5s infinite linear;
        position: relative;
    }

    .save {
        background-color: white; color: #7777AC; border: 2px solid #7777AC;
    }
    .save:hover {
        border: 1px solid #7777AC;
        color: white;
        background-color: #7777AC;
    }

    @keyframes bouncy {
        0% {
            top: 0em
        }

        40% {
            top: 0em
        }

        43% {
            top: -0.9em
        }

        46% {
            top: 0em
        }

        48% {
            top: -0.4em
        }

        50% {
            top: 0em
        }

        100% {
            top: 0em;
        }
    }
</style>