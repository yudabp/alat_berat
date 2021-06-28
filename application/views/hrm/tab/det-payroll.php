<div class="tab-pane fade" id="depayroll" role="tabpanel">
    <div class="row">
        <div class="col-md-6 grid-margin">
            <div class="card">
                <div class="card-body">
                <h3 class="card-title mb-4">Detail information at a glance</h3>
                <h3 style="font-size: 16px;">Fixed Allowance</h2>
                <div class="row pt-2 mb-4" style="background-color: #DDDDDD">
                    <label class="col-sm-3" style="font-size: 10px;">Pay Item</label>
                    <div class="col-sm-3">
                        
                    </div>
                    <label class="col-sm-4" style="font-size: 10px;">Pay Item Amount</label>
                    <div class="col-sm-2">
                        
                    </div>
                </div>
                <h3 style="font-size: 16px;">Fixed Deduction</h2>
                <div class="row pt-2 mb-4" style="background-color: #DDDDDD">
                    <label class="col-sm-3" style="font-size: 10px;">Deduction Item</label>
                    <div class="col-sm-3">
                        
                    </div>
                    <label class="col-sm-4" style="font-size: 10px;">Deduction Amount</label>
                    <div class="col-sm-2">
                        
                    </div>
                </div>
                <h3 style="font-size: 16px;">Fixed Tax</h2>
                <div class="row pt-2 mb-4" style="background-color: #DDDDDD">
                    <label class="col-sm-3" style="font-size: 10px;">Tax Caption</label>
                    <div class="col-sm-3">
                        
                    </div>
                    <label class="col-sm-4" style="font-size: 10px;">Tax Amount</label>
                    <div class="col-sm-2">
                        
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin">
            <div class="card grid-margin">
                <div class="card-body">
                <h3 class="card-title">Payroll Basic and Tax Info</h3>
                <form class="forms-sample mb-4">
                    <div class="form-group row">
                        <label for="basic_pay" class="col-sm-5 col-form-label font-11">Basic Pay</label>
                        <div class="col-sm-7">
                            <input name="basic_pay" id="basic_pay" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tax_number" class="col-sm-5 col-form-label font-11">Employee Tax Number</label>
                        <div class="col-sm-7">
                            <input name="tax_number" id="tax_number" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bank_account_number" class="col-sm-5 col-form-label font-11">Bank Account Number</label>
                        <div class="col-sm-7">
                            <input name="bank_account_number" id="bank_account_number" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bank_account_name" class="col-sm-5 col-form-label font-11">Bank Account Name</label>
                        <div class="col-sm-7">
                            <input name="bank_account_name" id="bank_account_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bank_name" class="col-sm-5 col-form-label font-11">Bank Name</label>
                        <div class="col-sm-7">
                            <input name="bank_name" id="bank_name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8"></div>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-success btn-block mr-2" onclick="saveBasic()">Save</button>
                        </div>
                    </div>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                </form>
                </div>
            </div>
            <div class="card grid-margin">
                <div class="card-body">
                    <h3 class="card-title">Fixed Allowance Payments</h3>
                    <form class="forms-sample mb-4">
                        <div class="form-group row">
                            <label for="pay_item" class="col-sm-5 col-form-label font-11">Pay Item</label>
                            <div class="col-sm-7">
                                <input name="pay_item" id="pay_item" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pay_item_payment" class="col-sm-5 col-form-label font-11">Pay Item Payment</label>
                            <div class="col-sm-7">
                                <input name="pay_item_payment" id="pay_item_payment" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8"></div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-success btn-block mr-2">Save</button>
                            </div>
                        </div>
                        <!-- <button class="btn btn-light">Cancel</button> -->
                    </form>
                </div>
            </div>
            <div class="card grid-margin">
                <div class="card-body">
                    <h3 class="card-title">Fixed Deductions Payments</h3>
                    <form class="forms-sample mb-4">
                        <div class="form-group row">
                            <label for="deduction_item" class="col-sm-5 col-form-label font-11">Deduction Item</label>
                            <div class="col-sm-7">
                                <input name="deduction_item" id="deduction_item" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deduction_payment" class="col-sm-5 col-form-label font-11">Deduction Payment</label>
                            <div class="col-sm-7">
                                <input name="deduction_payment" id="deduction_payment" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8"></div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-success btn-block mr-2">Save</button>
                            </div>
                        </div>
                        <!-- <button class="btn btn-light">Cancel</button> -->
                    </form>
                </div>
            </div>
            <div class="card grid-margin">
                <div class="card-body">
                    <h3 class="card-title">Tax</h3>
                    <form class="forms-sample mb-4">
                        <div class="form-group row">
                            <label for="tax_item" class="col-sm-5 col-form-label font-11">Tax Item</label>
                            <div class="col-sm-7">
                                <input name="tax_item" id="tax_item" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tax_amount" class="col-sm-5 col-form-label font-11">Tax Amount</label>
                            <div class="col-sm-7">
                                <input name="tax_amount" id="tax_amount" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8"></div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-success btn-block mr-2">Save</button>
                            </div>
                        </div>
                        <!-- <button class="btn btn-light">Cancel</button> -->
                    </form>
                </div>
            </div>
            <div class="card grid-margin">
                <div class="card-body">
                    <h3 class="card-title">Payment Detail</h3>
                    <form class="forms-sample mb-4">
                        <div class="form-group row">
                            <label for="payment_method" class="col-sm-5 col-form-label font-11">Payment Method</label>
                            <div class="col-sm-7">
                                <select name="payment_method" id="payment_method" class="form-control single-select">
                                    <option selected="selected" disabled="disabled"> - Select Payment Method - </option>
                                    <option>Bank</option>
                                    <option>Cheque</option>
                                    <option>Cash</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8"></div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-success btn-block mr-2">Save</button>
                            </div>
                        </div>
                        <!-- <button class="btn btn-light">Cancel</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="float-right">
    <button type="button" class="btn btn-rounded btn-warning" onclick="back_workd()"><< Back</button>
    <button type="button" class="btn btn-rounded btn-primary" onclick="next_personal()">Next >></button>
    </div> -->
</div>
