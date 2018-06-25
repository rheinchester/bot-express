<?php 
    // include_once '../header.php';
    include_once '../includes/shipment.php';
    include_once ('../includes/session.php');
    include_once ('../includes/function.php'); 
    if(!$session->is_logged_in()) redirect('logout.php');
    $msg = "";
    $shipment = new Shipment();
  if(isset($_GET['id'])){
    $shipment = Shipment::find($_GET['id']);
    // var_dump($shipment); exit();
  }
  if(isset($_POST['submit'])){
     $new_shipment = Shipment::instantiate($_POST);
     if ($shipment->getShipmentId()) {
       $new_shipment->setShipmentId($shipment->getShipmentId());

       if ($new_shipment->update()){
          $shipment = $new_shipment;
         $msg = 'Successful';
       }else{
        $msg = 'Failed';
      }
     }
     else{
      $msg = 'Not seen';
     }
  }
  include_once 'Admin_header.php';
 ?>
<!-- Template for creating additional pages -->

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
                                <form action='edit_shipment1.php?id=<?php echo $shipment->getShipmentId(); ?>' method='post'>
                                  <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" class="form-control" placeholder="Edit the location here" value='<?php echo $shipment->location; ?>' name="location" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Time </label>
                                                <input type="time" class="form-control" placeholder="Edit time" name="time" value='<?php echo $shipment->time; ?>' required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Date </label>
                                                <input type="date" value='<?php echo $shipment->date;?>' class="form-control" placeholder="Edit date" name="date" required>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>shipment status</label>
                                                <select class ='form-control' name="status" value='<?php echo $shipment->status; ?>'>
                                                  <option>select status</option>
                                                  <option value='Delivered'>Delivered</option>
                                                  <option value='Transit'>Transit</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea rows="5" class="form-control" placeholder="Here can be your description" name="description" value='<?php echo $shipment->description;?>' required><?php echo $shipment->description;?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button name="submit" type="submit" class="btn btn-info btn-fill pull-right">Edit shipment</button>
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

 
         