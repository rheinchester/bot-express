<?php
	include_once ('../includes/Admin.php');
  	include_once ('../includes/session.php');
  	include_once ('../includes/function.php'); 
  	include_once 'Admin_header.php';
	if(!$session->is_logged_in()) redirect('logout.php');
	$msg = "";
	if (isset($_GET['id']) && isset($_GET['opt']))  {
        $shipment = Admin::find($_GET['id']);
        if ($_GET['opt'] == 0 && $shipment) {
            $shipment->delete();
            redirect('All_admin.php');
        }
    }
?>

			
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header ">
                        <h4 class="title">List of all the admin</h4>
                        <a class='btn btn-success col-md-offset-10' href='create_admin.php'>Add</a>
                        <p class="category">You can Add, Edit or Delete any item here</p>
                    </div>
							<?php
								$admins = Admin::all();
								if (is_array($admins)) {
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
												<tbody>";

												$i = 1;
												foreach ($admins as $admin) {
													// $service = Service::find($admin->service_id);
													$table .="<tr>
																<td>$i</td>
																<td>{$admin->getAdminId()}</td>
																<td>{$admin->admin_name}</td>
																<td>{$admin->username}</td>
																<td>{$admin->email}</td>
																<td><a class='btn btn-info' href='Edit_admin.php?id={$admin->getAdminId()}'>Edit</a></td>
																<td><a class='btn btn-danger' href='All_admin.php?id={$admin->getAdminId()}&opt=0'>Delete</a></td>
															</tr>";
															$i++;
												}
												$table.="</tbody></table>";
												echo $table;
										} else{
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
																<h4 class='text-center' style='color: #333'>No admin Added Yet
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
	    </div>
	

<?php
    include_once 'Admin_footer.php';
  ?>