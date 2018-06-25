                        <form  class='form-horizontal' action='Add_shipment.php' method='post'>          
                        <div class='row text-center'>
                         <div class="col-lg-offset-4 col-md-offset-5 col-sm-offset-3 ">
                          <div>
                            <div class='form-group'>
                              <!-- <label class='control-label col col-lg-4'>First Name</label> -->
                                <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                                <input class='form-control' name='date' type='date' placeholder="date of shipment" required>
                              </div>                
                            </div>

                            <div class='form-group'>
                              <!-- <label class='control-label col col-lg-4'>Last Name</label> -->
                              <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                                <input class='form-control' name='time' type='time' placeholder="time of shipment" required>
                              </div>
                            </div>
                            <div class='form-group'>
                              <!-- <label class='control-label col col-lg-4'>email</label> -->
                              <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                                <input class='form-control' name='location' type='text' placeholder="location" required>
                              </div>
                            </div>

                     
                            <div class='form-group'>
                              <!-- <label class='control-label col col-lg-4'>Password</label> -->
                              <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                                <input class='form-control' name='status' type='text' placeholder="status" required>
                              </div>
                            </div>

                            <div class='form-group'>
                              <!-- <label class='control-label col col-lg-4'>Confirm Password</label> -->
                              <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                                <input class='form-control' name='origin' type='text' placeholder="origin" required>
                              </div>
                            </div>

                           <div class='form-group'>
                              <!-- <label class='control-label col col-lg-4'>Phone</label> -->
                              <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                                <input class='form-control' name='destination' type='text' placeholder="destination" required>
                              </div>
                            </div>

                            <div class='form-group'>
                              <!-- <label class='control-label col col-lg-4'>Address</label> -->
                              <div class='col col-lg-9 col-md-9 col-sm-9 col-xs-9'>
                                <textarea class='form-control ' name='description' placeholder="description"></textarea>
                              </div>
                            </div>
                            </div>
                            <br>
                             <div class='col col-lg-6 col-lg-offset-3'>
                              <button type='submit' name='submit' class ='btn panel-footer-btn'>Submit Form</button>
                            </div>
                          </form>