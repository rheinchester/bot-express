<?php 
    include_once '../includes/shipment.php';
    include_once ('../includes/session.php');
    include_once ('../includes/function.php');
    include_once 'admin_header.php';
    if(!$session->is_logged_in()) redirect('logout.php');
    $msg="";
    $shipment = "";
    if(isset($_POST['submit'])){
      // var_dump($_POST);
      //Use a try and catch block at bithub
      $shipment_id = $_POST['shipment_id'];
      $spaceless_shipment_id = preg_replace('/\s+/', '', $shipment_id);//strips all space bar
      $shipment = Shipment::find($spaceless_shipment_id);
    }
 ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Find shipment</h4>
                            </div>
                            <div class="content">
                                <form action="get_id1.php" method="post">
                                  <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" class="form-control" placeholder="Place the shipment ID here" value="" name="shipment_id" required>
                                            </div>
                                        </div>
                                    </div>

                                   

                            <div class='row'>
                                <div class='content table-responsive table-full-width'>
                                <?php
                                    if ($shipment) {
                                        $table = "
                                            <table class='table table-hover table-bordered table-striped'>
                                        <thead>
                                            <th>shipment_id</th>
                                            <th>date</th>
                                            <th>time</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Location</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </thead>
                                        <tbody>";
                                        $table .="
                                        <tr>                  
                                        <td>{$shipment->getShipmentId()}</td>
                                        <td>{$shipment->date}</td>
                                        <td>{$shipment->time}</td>
                                        <td>{$shipment->description}</td>
                                        <td>{$shipment->status}</td>
                                        <td>{$shipment->location}</td>
                                        <td><a class='btn btn-info' href='edit_shipment1.php?id={$shipment->getShipmentId()}'>Edit</a>
                                        <td><a class='btn btn-danger' href='All_shipment.php?id={$shipment->getShipmentId()}&opt=0'>Delete</a>
                                            </td>

                                            </tr>
                                        </tbody>
                                      </table>";
                                    }
                                    elseif ($shipment=="") {
                                         $table = "
                                      <tr>                  
                                        <h4 class='text-center'>No shipment inserted</h4>
                                        
                                      </tr>
                                      "; 
                                    }
                                    else {
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

                                    <button name="submit" type="submit" class="btn btn-info btn-fill pull-right">Find shipment</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php
include_once 'admin_footer.php';
  ?>