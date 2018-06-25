<?php 
    include_once '../includes/shipment.php';
    include_once 'admin_header.php';
    $msg="";
    $shipment = "";
    if(isset($_POST['submit'])){
      // var_dump($_POST);
      //Use a try and catch block at bithub
      $shipment_id = $_POST['shipment_id'];
      $shipment = Shipment::find($shipment_id);
    }
 ?>
<div class="content">
      <h4 class="text-center" style="color: #333"><?php echo $msg;  ?></h4>
      <div class="container-fluid">
          <div class="row">
             <div class="col-md-8 col-md-offset-2">
              <div class="card">
                  <div class="header">
                      <h4 class="title">Find shipment</h4>
                  </div>
                  <div class="content">
                    <form  class='form-horizontal' action='get_id.php' method='post'>          
                    <div class='row text-center'>
                     <div class="col-lg-offset-4 col-md-offset-5 col-sm-offset-3 ">
                      <div>
                        
                        <div class='form-group'>
                          <!-- <label class='control-label col col-lg-4'>email</label> -->
                          <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                            <input class='form-control'  type='text' placeholder="location" name="shipment_id" required>
                          </div>
                        </div>

                 
                        
                        </div>
                        <br>
                         <div class='col col-lg-6 col-lg-offset-3'>
                          <button type='submit' name='submit' class ='btn panel-footer-btn'>Submit Form</button>
                        </div>
                      </form>
                    </section> 

                    
                         
                    <?php 
                      if($shipment){
                       $table = "
                            
                              <table class='table table-hover table-bordered table-striped'>
                                  <thead>
                                    <tr>
                                      <th>shipment_id</th>
                                      <th>date</th>
                                      <th>time</th>
                                      <th>Description</th>
                                      <th>Status</th>
                                      <th>Location</th>
                                      <th>Origin</th>
                                      <th>Destination</th>
                                    </tr>
                                  </thead>
                                  <tbody>";
                      
                      $table .= "
                          <tr>                  
                            <td>{$shipment->getShipmentId()}</td>
                            <td>{$shipment->date}</td>
                            <td>{$shipment->time}</td>
                            <td>{$shipment->description}</td>
                            <td>{$shipment->status}</td>
                            <td>{$shipment->location}</td>
                            <td>{$shipment->origin}</td>
                            <td>{$shipment->destination}</td>
                          </tr>
                        </tbody>
                      </table>
                      ";
                    } else {
                      $table = "
                      <tr>                  
                        <h4 class='text-center'>Wrong shipment ID</h4>
                        
                      </tr>
                      "; 
                    }
                      echo $table;
                     ?>      
                 
                          </div>
                        </div>
                    </div>
                    
               </div>    
            </div>
        </div>


<?php 
include_once 'admin_footer.php';
 ?>
