<?php   
    include_once ('../includes/session.php');
    include_once ('../includes/function.php'); 
    include_once '../includes/shipment.php';
    include_once ('Admin_header.php'); 
    if(!$session->is_logged_in()) redirect('logout.php');
    $msg = "";
    if (isset($_GET['id']) && isset($_GET['opt']))  {
        $shipment = Shipment::find($_GET['id']);
        if ($_GET['opt'] == 0 && $shipment) {
            $confirm = "<script> 
            confirm('Are you sure you want to delete')
            </script>";
            // $shipment->delete();
            // redirect('All_shipment.php');
        }
    }
?> 
 
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header ">
                        <h4 class="title">List of all the shipments</h4>
                        <a class='btn btn-success col-md-offset-10' href='Add_shipment.php'>Add</a>
                        <p class="category">You can add, edit or delete any item Here</p>
                    </div>
                    <!-- <div class='content table-responsive  table-bordered table-full-width'> -->
                        <?php
                            $shipments = Shipment::all();
                            if (is_array($shipments)) {
                                $table = "
                                <table class='table table-hover table-bordered table-striped'>
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Location</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                                    $i = 1;
                                foreach ($shipments as $shipment) {
                                    $table .= "
                                        <tr>
                                            <td>$i</td>
                                            <td>{$shipment->getShipmentId()}</td>
                                            <td>{$shipment->date}</td>
                                            <td>{$shipment->time}</td>
                                            <td>{$shipment->description}</td>
                                            <td>{$shipment->status}</td>
                                            <td>{$shipment->location}</td>
                                            <td>
                                                <a class='btn btn-info' href='edit_shipment1.php?id={$shipment->getShipmentId()}'>Edit</a>
                                            </td>
                                            <td>
                                                <a class='btn btn-danger' href='All_shipment.php?id={$shipment->getShipmentId()}&opt=0'>Delete</a>
                                            </td>

                                            
                                        </tr>";
                                    $i++;
                                }
                                $table.="</tbody></table>";
                                echo $table;
                            } else {
                               $table = "
                                    <table class='table table-hover table-bordered table-striped'>
                                            <thead>
                                                <tr>
                                                    <th>S/No.</th>
                                                    <th>Admin ID</th>
                                                    <th>Admin Name</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <td colspan='7'>
                                                    <h4 class='text-center' style='color: #333'>Shipment List is empty
                                                    </h4>
                                                </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    ";
                                echo $table;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    include_once 'Admin_footer.php';
  ?>
  <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Welcome <?php echo $admin->admin_name;  ?> to the admin page "

            },{
                type: 'info',
                timer: 4000
            });

        });
    </script>