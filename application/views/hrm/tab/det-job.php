<div class="tab-pane fade" id="dework" role="tabpanel">
        <!-- <div class="card"> -->
        <!-- <div class="card-body"> -->
            <h2 style="font-size: 18px;">Employee Main Status</h2>
            <form class="forms-sample mb-4" action="post">
            <!-- <button class="btn btn-light">Cancel</button> -->
            </form>
            <div class="row mb-2 mr-0">
            <div class="col-sm-8">
                <div class="row" style="font-size: medium;font-weight: 600;">
                <label for="employeestatus" class="col-3 col-form-label">Status</label>
                <label class="col-1 col-form-label"> : </label>
                <select name="employee-status" id="employee-status" class="single-select form-control col-7" disabled>
                    <option selected="selected" disabled="disabled"> - Select Status - </option>
                    <option value="active">Active</option>
                    <option value="terminate">Terminated</option>
                    <option value="deceased">Deceased</option>
                    <option value="resigned">Resigned</option>
                </select>
                </div>
            </div>
            <!-- <h2 class="col-sm-8" style="font-size: 18px;" >Employee Status</h2> -->
            <button class="col-sm-4 btn btn-success" id="btnUptStatus" data-toggle="modal" data-target="#formStatus">Update Status</button>
            </div>
            <div class="table-responsive mb-5 mr-0">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>
                    Date
                    </th>
                    <th>
                    Employe Status
                    </th>
                    <th>
                    Comment
                    </th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
            </div>
            <div class="row mb-2 mr-0">
            <h2 class="col-sm-8" style="font-size: 18px;" >Compensation</h2>
            <button type="submit" class="col-sm-4 btn btn-success">Update Compensation</button>
            </div>
            <div class="table-responsive mb-5 mr-0">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>
                    Date
                    </th>
                    <th>
                    Pay Rate
                    </th>
                    <th>
                    Pay Time
                    </th>
                    <th>
                    Change Reason
                    </th>
                    <th>
                    Comment
                    </th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
            </div>
            <div class="row mb-2 mr-0">
            <h2 class="col-sm-8" style="font-size: 18px;" >Job Information</h2>
            <button type="submit" class="col-sm-4 btn btn-success">Update Job Information</button>
            </div>
            <div class="table-responsive mb-5 mr-0">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>
                    Date
                    </th>
                    <th>
                    Location
                    </th>
                    <th>
                    Department
                    </th>
                    <th>
                    Job Title
                    </th>
                    <th>
                    Reports To
                    </th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
            </div>
        <!-- </div> -->
        <!-- </div> -->
        <!-- <div class="float-right">
            <button type="button" class="btn btn-rounded btn-warning" onclick="back_basicd()"><< Back</button>
            <button type="button" class="btn btn-rounded btn-primary" onclick="next_personald()">Next >></button>
        </div> -->
        </div>