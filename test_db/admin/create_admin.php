<?php 
  // include_once('header_template.php');
// 'admin_id','username','phone','email','address','status','password'
      include_once "../includes/Admin.php";
      include_once ('../includes/session.php');
      include_once ('../includes/function.php'); 
      include_once 'Admin_header.php';
      if(!$session->is_logged_in()) redirect('logout.php');
      $msg = '';
      if(isset($_POST['submit'])){
        if ($_POST['password'] == $_POST['password1']){
          $admin = Admin::instantiate($_POST);
          if($admin){
            ($admin->insertAdmin()) ? $msg = 'Admin Created Successfully.':$msg = 'Failed to create new admin.';
              }
            }else {
              $msg = "Password doesn't match "; 
            }
          }
 ?>

<!-- Template for creating additional pages -->
          <div class="content">
            <h4 class="text-center" style="color: #333"><?php echo $msg;  ?></h4>
                <div class="container-fluid">
                    <div class="row">
                       <div class="col-md-8 col-md-offset-2">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Admin</h4>
                            </div>
                            <div class="content">
                              <form action="create_admin.php" method="post">
                                  <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Admin Name</label>
                                                <input type="text" class="form-control" placeholder="Place Your full name here" value="" name="admin_name" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username </label>
                                                <input type="text" class="form-control" placeholder="Place Username here" name="username" value="" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>email </label>
                                                <input type="email" class="form-control" placeholder="Place email here" name="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" placeholder="Place password here" name="password" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control" placeholder="Place password here" name="password1" required>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <button name="submit" type="submit" class="btn btn-info btn-fill pull-right">Create Admin</button>
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