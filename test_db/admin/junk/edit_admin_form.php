<?php 
    include_once ('../includes/Admin.php');
    include_once ('../includes/session.php');
    include_once ('../includes/function.php'); 
    include_once 'admin_header.php';
    $msg = "";
    // if(!$session->is_logged_in()) redirect('logout.php');
    $admin = new Admin();
  if(isset($_GET['id'])){
    $admin = Admin::find($_GET['id']);
  }
  if(isset($_POST['submit'])){
    $admin = Admin::instantiate($_POST);
    if(Admin::find($admin->admin_id)) {
      ($admin->update()) ? $msg = 'Successful': $msg = 'Failed';   
    } 
  }
 ?>

            <form  class='form-horizontal' action='edit_admin.php' method='post'>  
              <div class='form-group'>
                <!-- <label class='control-label col col-lg-4'>Last Name</label> -->
                 <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                  <input class='form-control' name='admin_id' type='text' placeholder="Admin ID" value='<?php echo $admin->admin_id; ?>'>
                </div>
              </div>            
              <div class='form-group'>
                <!-- <label class='control-label col col-lg-4'>Last Name</label> -->
                 <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                  <input class='form-control' name='username' type='text' placeholder="User name" value='<?php echo $admin->username; ?>'">
                </div>
              </div>
              <div class='form-group'>
                <!-- <label class='control-label col col-lg-4'>email</label> -->
                 <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                  <input class='form-control' name='email' type='email' placeholder="Email" value='<?php echo $admin->email; ?>'>
                </div>
              </div>              
             
               <div class='col col-lg-7 col-md-7 col-sm-9 col-sm-offset-5 col-lg-offset-5 col-md-offset-5 col-xs-offset-5'>
                <button type='submit' name='submit' class ='btn btn-primary'>Edit Admin</button>
              </div>
            </form>
            </div>
          </section>       
        </article>
      </div>
    </form>