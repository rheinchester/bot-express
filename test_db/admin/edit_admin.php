<?php 
    include_once ('../includes/Admin.php');
    include_once ('../includes/session.php');
    include_once ('../includes/function.php'); 
    include_once 'admin_header.php';
    if(!$session->is_logged_in()) redirect('logout.php');
    $msg = "";
    $admin = new Admin();
  if(isset($_GET['id'])){
    $admin = Admin::find($_GET['id']);
  }
  if(isset($_POST['submit'])){
    $new_admin = Admin::instantiate($_POST);
    if ($admin->getAdminId()) {
       $new_admin->setAdminId($admin->getAdminId());

      if ($new_admin->update()){ 
        $admin = $new_admin;
        $msg = 'Successful';
       }
       else{$msg = 'Failed';}
     }
     else{
      $msg = 'Not seen';
     }
  }
 ?>
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
                        <form action="edit_admin.php?id=<?php echo $admin->getAdminId();?>" method="post">
                          <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Admin Name</label>
                                        <input type="text" class="form-control" placeholder="Place Your full name here" value='<?php echo $admin->admin_name;?>' name="admin_name" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username </label>
                                        <input type="text" class="form-control" placeholder="Place Username here" name="username" value='<?php echo $admin->username;?>' required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>email </label>
                                        <input type="email" class="form-control" placeholder="Place email here"  name="email" value='<?php echo $admin->email;?>' required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Place password here" name="password" value='<?php echo $admin->password;?>'  required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" placeholder="Place password here" name="password1" required>
                                    </div>
                                </div>
                            </div>
                              <button name="submit" type="submit" class="btn btn-info btn-fill pull-right">Edit Admin</button>
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