
<div class="card m-3">
    <div class="card-body">
        <form action="/waterInput/php_submitWaterData.php" method="post">
            <div class="form-group">
                <label for="input_newTemp">Water Temp</label>
                <input type="text" class="form-control" id="input_newTemp" aria-describedby="tempHelp" placeholder="Enter Temp">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label for="input_newSalinity">Salinity</label>
                <input type="text" class="form-control" id="input_newSalinity" placeholder="Saliniity">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="input_newLat">
                    <label class="form-control" for="input_newLat">Lat</label>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="input_newLong">
                    <label class="form-control" for="input_newLong">Long</label>
                </div>
            </div>
            <div class="form-group">
                <label for="input_newDate">Date Measured</label>
                <input type="date" class="form-control" id="input_newDate" placeholder="Date">
            </div>
            <button id="btn_waterInputSubmit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>