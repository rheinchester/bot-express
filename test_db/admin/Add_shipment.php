<?php 
  include_once ('../includes/session.php');
  include_once ('../includes/function.php');
  include_once '../includes/shipment.php';
  include_once 'admin_header.php';
  if(!$session->is_logged_in()) redirect('logout.php');
  $msg = "";
  if(isset($_POST['submit'])){
    $shipment = Shipment::instantiate($_POST);
    // var_dump($shipment); 
    ($shipment->insertShipment()) ? $msg ='Shipment successfully added' : $msg = 'Shipment Not added';
  }

 ?>
   
<!-- 

date time location origin destination description

 -->
            <div class="content">
                <h4 class="text-center" style="color: #333"><?php echo $msg;  ?></h4>
                <div class="container-fluid">
                    <div class="row">
                       <div class="col-md-8 col-md-offset-2">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add shipment</h4>
                            </div>
                            <div class="content">
                                <form action="Add_shipment.php" method="post">
                                  <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" class="form-control" placeholder="Place the location here" value="" name="location" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Time </label>
                                                <input type="time" class="form-control" placeholder="Time" name="time" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date </label>
                                                <input type="date" class="form-control" placeholder="date" name="date" required>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>shipment status</label>
                                                <select class ='form-control' name="status" value = 'status' required>
                                                  <option>select status</option>
                                                  <option value='Delivered'>delivered</option>
                                                  <option value='Transit'>Transit</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea rows="5" class="form-control" placeholder="Here can be your description" value="" name="description" required=""></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button name="submit" type="submit" class="btn btn-info btn-fill pull-right">Add shipment</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
               </div>    
            </div>
        </div>

<?php
    include_once 'Admin_footer.php';
  ?>
<!-- Template for creating additional pages -->
 
         