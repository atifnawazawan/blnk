<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_form extends CI_Model {
    public function location_form($records){
        ?>
        <div class="col-lg-12">
            <h2>Work Location</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Location Name</th>
                        <th>add</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php echo form_open('data/create'); ?>
                    <tr>
                        <input type="hidden" name="action" value="add_location">
                        <td ><input class="form-control" style="width:100%" type="text" name="locationname"></td>

                        <td><button >Add Location</button></td>

                    </tr>
                    </form>
                    </tbody>
                </table>
            </div>
        </div>



        <div class="col-lg-12">
            <h2>Company Table</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Sr #</th>
                        <th>Name</th>
                        <th>options</th>
                    </tr>
                    </thead>
                    <?php $a=1;foreach ($records as $record){ ?>

                        <tbody>


                        <td><?php echo $a++; ?></td>

                        <td>
                            <a href="<?php echo base_url();?>index.php/data/companydata?id=<?php echo $record['location_id'];?>&page=2">
                                <?php echo $record['location_name'];
                                ?></a>
                        </td>
                        <td>
                            <!--a-- href="<?php echo base_url();?>index.php/data/deletecompany?id=<?php echo $record['location_id']?>">
                                    <i class="glyphicon glyphicon-trash"></i>  </a-->
                            <a href="<?php echo base_url();?>index.php/data/editlocation?id=<?php echo $record['location_id']?>"> <i class="glyphicon glyphicon-pencil"></i></a>

                        </td>                            </tbody>
                    <?php }?>

                </table>
            </div>
        </div>


        <?php
    }
    public function paytake_form($records){
        ?>
        <div class="col-lg-12">
            <h2>Work Location</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>payment taker Name</th>
                        <th>add</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php echo form_open('data/create'); ?>
                    <tr>
                        <input type="hidden" name="action" value="add_paytake">
                        <td ><input class="form-control" style="width:100%" type="text" name="paytakename"></td>

                        <td><button >Add taker</button></td>

                    </tr>
                    </form>
                    </tbody>
                </table>
            </div>
        </div>



        <div class="col-lg-12">
            <h2>Company Table</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Sr #</th>
                        <th>Name</th>
                        <th>options</th>
                    </tr>
                    </thead>
                    <?php $a=1;foreach ($records as $record){ ?>

                        <tbody>


                        <td><?php echo $a++; ?></td>

                        <td>
                            <a href="<?php echo base_url();?>index.php/data/companydata?id=<?php echo $record['payment_taker_id'];?>&page=2">
                                <?php echo $record['name'];
                                ?></a>
                        </td>
                        <td>
                            <!--a-- href="<?php echo base_url();?>index.php/data/deletecompany?id=<?php echo $record['payment_taker_id']?>">
                                    <i class="glyphicon glyphicon-trash"></i>  </a-->
                            <a href="<?php echo base_url();?>index.php/data/editlocation?id=<?php echo $record['payment_taker_id']?>"> <i class="glyphicon glyphicon-pencil"></i></a>

                        </td>                            </tbody>
                    <?php }?>

                </table>
            </div>
        </div>


        <?php
    }

    public function company_form($records){
        ?>
        <div class="col-lg-12">
            <h2>Professional users</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>CompanyName</th>
                        <th>add</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php echo form_open('data/create'); ?>
                    <tr>
                        <input type="hidden" name="action" value="add_company">
                        <td ><input class="form-control" style="width:100%" type="text" name="companyname"></td>

                        <td><button >Add Company</button></td>

                    </tr>
                    </form>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-12">
            <h2>Company Table</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Sr #</th>
                        <th>Name</th>
                        <th>options</th>
                    </tr>
                    </thead>
                    <?php $a=1;foreach ($records as $record){ ?>

                        <tbody>


                        <td><?php echo $a++; ?></td>

                        <td>
                            <a href="<?php echo base_url();?>index.php/data/companydata?id=<?php echo $record['comp_id'];?>&page=2">
                                <?php echo $record['comp_name'];
                                ?></a>
                        </td>
                        <td>
                            <!--a-- href="<?php echo base_url();?>index.php/data/deletecompany?id=<?php echo $record['comp_id']?>">
                                    <i class="glyphicon glyphicon-trash"></i>  </a-->
                            <a href="<?php echo base_url();?>index.php/data/editcompany?id=<?php echo $record['comp_id']?>"> <i class="glyphicon glyphicon-pencil"></i></a>

                        </td>                            </tbody>
                    <?php }?>

                </table>
            </div>
        </div>

        <?php
    }
    public function diesel_form($data,$owner){
        ?>
        <div class="col-lg-12">
            <h2>Add details</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Shovel owner</th>
                        <th>Date</th>
                        <th>Invoice No</th>
                        <th>details</th>
                        <th>Gallon</th>
                        <th>Rate</th>
                        <th>Total Amount</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php echo form_open('data/companydata'); ?>
                    <tr>
                        <input type="hidden" name="action" value="add_diesel_data">

                        <td><select name="shoown"><option>select shovel owner</option>
                                <?php foreach($owner as $own):?>
                                    <option value="<?php  echo $own['shovel_owner_id'];?>"><?php  echo $own['owner_name'];?></option>
                                <?php endforeach;?>
                            </select></td>
                        <td ><input class="form-control" style="width:100%" type="date" name="date"></td>
                        <td ><input class="form-control" style="width:100%" type="text" name="invo"></td>
                        <td ><input class="form-control" style="width:100%" type="text" name="detail"></td>
                        <td ><input class="form-control" style="width:100%" type="text" name="gallon"></td>
                        <td ><input class="form-control" style="width:100%" type="number" name="rate"></td>
                        <td ><input class="form-control" style="width:100%" type="text" name="totamount"></td>


                    </tr>
                    </tbody>
                </table>
                <input class="btn btn-success" type="submit" name="submit" value="Add Details" />

                </form>
            </div>
        </div>
        <h2>Previous details</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Owner</th>
                    <th>invoice No</th>
                    <th>details</th>
                    <th>Gallon</th>
                    <th>Rate</th>
                    <th>Total Amount</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach($data as $dat){?>
                    <tr>
                        <td ><?php echo $dat['date'];?></td>
                        <td><?php echo $dat['owner_name'];?></td>
                        <td ><?php echo $dat['invoice_no'];?></td>
                        <td ><?php echo $dat['details'];?></td>
                        <td ><?php echo $dat['gallon'];?></td>
                        <td ><?php echo $dat['rate'];?></td>
                        <td ><?php echo $dat['total_amount'];?></td>


                    </tr>
                <?php }?>
                </tbody>
            </table>



        </div>

        <?php
    }
    public function expense_form($data){
        ?>
        <div class="col-lg-12">
            <h2>Add details</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Invoice No</th>
                        <th>details</th>
                        <th>Gallon</th>
                        <th>Rate</th>
                        <th>Total Amount</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php echo form_open('data/create'); ?>
                    <tr>
                        <input type="hidden" name="action" value="add_expense_data">

                        <td ><input class="form-control" style="width:100%" type="date" name="date"></td>
                        <td ><input class="form-control" style="width:100%" type="text" name="inv"></td>
                        <td ><input class="form-control" style="width:100%" type="text" name="detail"></td>
                        <td ><input class="form-control" style="width:100%" type="text" name="gallon"></td>
                        <td ><input class="form-control" style="width:100%" type="number" name="rate"></td>
                        <td ><input class="form-control" style="width:100%" type="text" name="totamount"></td>


                    </tr>
                    </tbody>
                </table>
                <input class="btn btn-success" type="submit" name="submit" value="Add Details" />

                </form>
            </div>
        </div>
        <h2>Previous details</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>invoice No</th>
                    <th>details</th>
                    <th>Gallon</th>
                    <th>Rate</th>
                    <th>Total Amount</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach($data as $dat){?>
                    <tr>
                        <td ><?php echo $dat['date'];?></td>
                        <td ><?php echo $dat['Inv_no'];?></td>
                        <td ><?php echo $dat['Details'];?></td>
                        <td ><?php echo $dat['Gallon'];?></td>
                        <td ><?php echo $dat['rate'];?></td>
                        <td ><?php echo $dat['total_amount'];?></td>


                    </tr>
                <?php }?>
                </tbody>
            </table>



        </div>

        <?php
    }
    public function shovown_form($records){
        ?>
        <div class="col-lg-12">
            <h2>Shovel Owner</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Owner Name</th>
                        <th>add</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php echo form_open('data/create'); ?>
                    <tr>
                        <input type="hidden" name="action" value="add_owner">
                        <td ><input class="form-control" style="width:100%" type="text" name="ownername"></td>

                        <td><button >Add Owner</button></td>

                    </tr>
                    </form>
                    </tbody>
                </table>
            </div>
        </div>



        <div class="col-lg-12">
            <h2>Owner Table</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Sr #</th>
                        <th>Name</th>
                        <th>options</th>
                    </tr>
                    </thead>
                    <?php $a=1;foreach ($records as $record){ ?>

                        <tbody>


                        <td><?php echo $a++; ?></td>

                        <td>
                            <a href="<?php echo base_url();?>index.php/data/companydata?id=<?php echo $record['shovel_owner_id'];?>&page=2">
                                <?php echo $record['owner_name'];
                                ?></a>
                        </td>
                        <td>
                            <!--a-- href="<?php echo base_url();?>index.php/data/deletecompany?id=<?php echo $record['shovel_owner_id']?>">
                                    <i class="glyphicon glyphicon-trash"></i>  </a-->
                            <a href="<?php echo base_url();?>index.php/data/editlocation?id=<?php echo $record['shovel_owner_id']?>"> <i class="glyphicon glyphicon-pencil"></i></a>

                        </td>                            </tbody>
                    <?php }?>

                </table>
            </div>
        </div>


        <?php
    }
    public function paydet_form($data){
        ?>
        <div class="col-lg-12">
            <h2>Add details</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>details</th>
                        <th>trip/m3/hours</th>
                        <th>Gallon</th>
                        <th>Rate</th>
                        <th>Total Amount</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php echo form_open('data/create'); ?>
                    <tr>
                        <input type="hidden" name="action" value="add_paymentdetail_data">

                        <td ><input class="form-control" style="width:100%" type="date" name="date"></td>
                        <td ><input class="form-control" style="width:100%" type="text" name="detail"></td>
                        <td ><input class="form-control" style="width:100%" type="text" name="trip"></td>
                        <td ><input class="form-control" style="width:100%" type="text" name="gallon"></td>
                        <td ><input class="form-control" style="width:100%" type="number" name="rate"></td>
                        <td ><input class="form-control" style="width:100%" type="text" name="totamount"></td>


                    </tr>
                    </tbody>
                </table>
                <input class="btn btn-success" type="submit" name="submit" value="Add Details" />

                </form>
            </div>
        </div>
        <h2>Previous details</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>details</th>
                    <th>Trip/m3/hour</th>
                    <th>Gallon</th>
                    <th>Rate</th>
                    <th>Total Amount</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach($data as $dat){?>
                    <tr>
                        <td ><?php echo $dat['date'];?></td>
                        <td ><?php echo $dat['details'];?></td>
                        <td ><?php echo $dat['trip_m3_hour'];?></td>
                        <td ><?php echo $dat['gallon'];?></td>
                        <td ><?php echo $dat['rate'];?></td>
                        <td ><?php echo $dat['total_amount'];?></td>


                    </tr>
                <?php }?>
                </tbody>
            </table>



        </div>

        <?php
    }
    public function showok_form($data,$owner){
        ?>
        <div class="col-lg-12">
            <h2>Add details</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>shovel owner</th>
                        <th>details</th>
                        <th>hours</th>
                        <th>Rate</th>
                        <th>Total Amount</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php echo form_open('data/create'); ?>
                    <tr>
                        <input type="hidden" name="action" value="add_shovelwork_data">
                        <td ><input class="form-control" style="width:100%" type="date" name="date"></td>
                        <td><select name="shoown"><option>select shovel owner</option>
                                <?php foreach($owner as $own):?>
                                  <option value="<?php  echo $own['shovel_owner_id'];?>"><?php  echo $own['owner_name'];?></option>
                                <?php endforeach;?>
                                </select></td>
                        <td ><input class="form-control" style="width:100%" type="text" name="detail"></td>
                        <td ><input class="form-control" style="width:100%" type="text" name="hour"></td>
                        <td ><input class="form-control" style="width:100%" type="number" name="rate"></td>
                        <td ><input class="form-control" style="width:100%" type="text" name="totamount"></td>


                    </tr>
                    </tbody>
                </table>
                <input class="btn btn-success" type="submit" name="submit" value="Add Details" />

                </form>
            </div>
        </div>
        <h2>Previous details</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>owner</th>
                    <th>details</th>
                    <th>hour</th>
                    <th>Rate</th>
                    <th>Total Amount</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach($data as $dat){?>
                    <tr>
                        <td ><?php echo $dat['date'];?></td>
                        <td ><?php echo $dat['owner_name'];?></td>
                        <td ><?php echo $dat['details'];?></td>
                        <td ><?php echo $dat['hours'];?></td>
                        <td ><?php echo $dat['rate'];?></td>
                        <td ><?php echo $dat['total_amount'];?></td>


                    </tr>
                <?php }?>
                </tbody>
            </table>



        </div>

        <?php
    }

}