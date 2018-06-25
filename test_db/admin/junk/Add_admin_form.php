<?php 
  // include_once('header_template.php');
// 'admin_id','username','phone','email','address','status','password'
      include_once "../includes/Admin.php";
      include_once ('../includes/session.php');
      include_once ('../includes/function.php'); 
      // if(!$session->is_logged_in()) redirect('logout.php');
      $msg = '';
      if(isset($_POST['submit'])){
        $admin = Admin::instantiate($_POST);
       
        if($admin){
          if($admin->insertAdmin()){
            $msg = 'Admin Created Successfully.';
          }else{
            $msg = 'Failed to create new admin.';
          }
        }else{
          $msg = 'Failed to create Admin.';
        }
      }

 ?>

<!-- Template for creating additional pages -->
          <div class="col-lg-offset-4 col-md-offset-5 col-sm-offset-3    ">
           <form  class='form-horizontal' action='create_admin.php' method='post'>           
        
            <div>
            
             <div class='form-group'>
                <!-- <label class='control-label col col-lg-4'>Password</label> -->
                <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                  <input class='form-control' name='admin_id' type='text' placeholder="Admin ID">
                </div>
              </div>

              <div class='form-group'>
                <!-- <label class='control-label col col-lg-4'>Last Name</label> -->
                <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                  <input class='form-control' name='username' type='text' placeholder="User name">
                </div>
              </div>
              <div class='form-group'>
                <!-- <label class='control-label col col-lg-4'>email</label> -->
                <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                  <input class='form-control' name='email' type='email' placeholder="Email">
                </div>
              </div>

       
              <div class='form-group'>
                <!-- <label class='control-label col col-lg-4'>Password</label> -->
                <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                  <input class='form-control' name='password' type='password' placeholder="Password">
                </div>
              </div>

              <div class='form-group'>
                <!-- <label class='control-label col col-lg-4'>Confirm Password</label> -->
                <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                  <input class='form-control' name='password' type='password' placeholder="Confirm password">
                </div>
              </div>

              
              </div>
              <br>
               <div class='col col-lg-7 col-md-7 col-sm-9 col-sm-offset-5 col-lg-offset-5 col-md-offset-5 col-xs-offset-5'>
                <button type='submit' name='submit' class ='btn panel-footer-btn'>Submit Form</button>
              </div>
              
            </form>
            