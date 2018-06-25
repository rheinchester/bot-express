<?php
include_once 'admin_header.php';
  ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Find shipment</h4>
                            </div>
                            <div class="content">
                                <form action="Add_shipment.php" method="post">
                                  <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" class="form-control" placeholder="Place the location here" value="" name="location" required>
                                            </div>
                                        </div>
                                    </div>

                                   

                            <div class="row">
                                <div class="content table-responsive table-full-width">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Salary</th>
                                        <th>Country</th>
                                        <th>City</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Dakota Rice</td>
                                            <td>$36,738</td>
                                            <td>Niger</td>
                                            <td>Oud-Turnhout</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>

                            </div>
                                    </div>

                                    <button name="submit" type="submit" class="btn btn-info btn-fill pull-right">Add shipment</button>
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