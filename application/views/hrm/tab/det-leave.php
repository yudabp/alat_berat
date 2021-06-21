<div class="tab-pane fade" id="depersonal" role="tabpanel">
        <!-- <div class="row"> -->
            <div class="row mb-2">
            <h2 class="col-sm-9" style="font-size: 18px;" >History</h2>
            <!-- <button type="submit" class="col-sm-3 btn btn-success">Update Job Information</button> -->
            </div>
            <div class="table-responsive mb-5">
            <table class="table table-bordered" id="table-leave">
                <thead>
                <tr>
                    <th>
                    Date
                    </th>
                    <!-- <th>
                    Policy
                    </th> -->
                    <th>
                    Description
                    </th>
                    <th>
                    Request
                    </th>
                    <!-- <th>
                    Status
                    </th> -->
                </tr>
                </thead>
                <tbody>
                <?php
                // $leave = $this->db->select('*')
                // ->from('leavereq')
                // ->where('mainid', $id)
                // ->get();
                foreach ($leave->result() as $key => $value) { ?>
                    <tr>
                    <td style="width: 30%;"><?php echo $value->fromdate; ?> to <?php echo $value->todate; ?></td>
                    <td style="width: 40%;"><?php echo $value->leavereson; ?></td>
                    <td style="width: 30%;"><?php echo $value->days; ?> days</td>
                    </tr>
                <?php	
                }
                ?>
                </tbody>
            </table>
            </div>
        <!-- </div> -->
        <!-- <div class="float-right">
        <button type="button" class="btn btn-rounded btn-warning" onclick="back_workd()"><< Back</button>
        <button type="button" class="btn btn-rounded btn-primary" onclick="next_payrolld()">Next >></button>
        </div> -->
        </div>