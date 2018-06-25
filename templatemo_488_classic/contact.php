<?php
    include_once '../test_db/includes/shipment.php';
    $shipment = "";
    if(isset($_POST['submit'])){
      // var_dump($_POST);
      $shipment_id = $_POST['shipment_id'];
      $shipment = Shipment::find($shipment_id);
      
      if(!$shipment)
        $msg= "wrong shipment id";
    }else{
        $msg = "";
    }
  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BOTExpress* - Contact Page</title>
<!--
Classic Template
http://www.templatemo.com/tm-488-classic
-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/templatemo-style.css">                                   <!-- Templatemo style -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
</head>

    <body>
      <!-- Modal -->
      <div class="tm-header">
            <div class="container-fluid">
                <div class="tm-header-inner">
                    <a href="index.html" class="navbar-brand tm-site-name">BOTExpress*</a>
                    
                    <!-- navbar -->
                    <nav class="navbar tm-main-nav">

                        <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#tmNavbar">
                            &#9776;
                        </button>
                        
                        <div class="collapse navbar-toggleable-sm" id="tmNavbar">
                            <ul class="nav navbar-nav">
                                <li class="nav-item">
                                    <a href="index.html" class="nav-link">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="about.html" class="nav-link">About</a>
                                </li>
                                <li class="nav-item">
                                    <a href="policies & terms.html" class="nav-link">Policies & Terms</a>
                                </li>
                                <li class="nav-item active">
                                    <a href="contact.php" class="nav-link">Track Shipment</a>
                                </li>
                            </ul>                        
                        </div>
                        
                    </nav>  

                </div>                                  
            </div>            
        </div>

       
       <div class="tm-contact-img-container">
            
            </div>


        <section class="tm-section"  id='shipment_details'>
            <div class="container-fluid">
                <div class="row" >
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">

                        <section>
                            <h3 class="tm-gold-text tm-form-title">Track Shipment.</h3>
                            <p class="tm-form-description">Here’s the fastest way to check the status of your shipment. No need to call Customer Service – our online results give you real-time, detailed progress as your shipment speeds through the BOTE network.</p> 


                            <form action="contact.php#shipment_details" method="post" class="tm-contact-form">                                
                                <div class="form-group">
                                    <input type="text" id="contact_name" name="shipment_id" class="form-control" placeholder="place shipment Id here"  required/>
                                </div>
                                
                                <button type="submit" name="submit" class="tm-btn" data-toggle="modal" data-target="#exampleModalCenter" >Track</button>                          
                            </form>
                            <table class="table table-striped">
                            <?php 

                            if($shipment){
                            
                                $table = "
                                <thead>
                                <tr>
                                <th scope='col' class='t-row' >TIME</th>
                                <th scope='col' class='t-row' >STATUS</th>
                                <th scope='col' class='t-row' >CONTENT</th>
                                <th scope='col' class='t-row' >LOCATION</th>
                                <th scope='col' class='t-row' >DATE</th>
                            
                                </tr>
                            </thead>
                            <tbody>
                            ";
                                
                                $table .= "
            
                                <tr>
                                    <td class='t-row' >{$shipment->time}</td>                                
                                    <td class='t-row' >{$shipment->status}</td>
                                    <td class='t-row' >{$shipment->description}</td>
                                    <td class='t-row' >{$shipment->location}</td>
                                    <td class='t-row' >{$shipment->date}</td>
                                </tr>
                                ";
                          } else {
                            $table = "
                            <tr>                  
                              <h4 class='col-lg-offset-4'> $msg</h4>
                              
                            </tr>
                            "; 
                          }
                            echo $table;
                           ?> 
                    
                    
                      
                     
                      
                    </tbody>
                  </table>   
                        </section>
                            
                        <section class="tm-margin-t-mid tm-map-section">
                            <h3 class="tm-gold-text tm-form-title">Company Location.</h3>
                            
                            <div id="google-map"></div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>

                            <p>
                                <b> NOTE that google location might no be of full function in your
                                    country due to short satelite coverage.
                                </b>
                            </p>

                        </section>                        
                 

                    </div>

           <!-- paste tracking stuff here -->
           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-contact-right">
                        
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="tm-aside-container">
                                    <h3 class="tm-gold-text tm-title">
                                        Tracking Terms
                                    </h3>
                                    <nav>
                                        <p>You are authorized to use this tracking system solely to track shipments tendered via BOTE by, for, or to you. No other use may be made of the tracking system and information without BOTE's written consent.</p>
                                    </nav>
                                    <hr class="tm-margin-t-small">   
                                    <h3 class="tm-gold-text tm-title tm-margin-t-small">
                                        Tracking FAQs
                                    </h3>
                                    <nav>   
                                        <p>
                                            Need more information about tracking an express or percel shipment with BOTE? Email us to get quick answers to common tracking questions or challenges.
                                        </p>
                                    </nav>      
                                </div>
                                 
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                
                                <div class="tm-content-box tm-content-box-contact">
                                    <img src="img/tm-img-310x180-1p.jpg" alt="Image" class="tm-margin-b-20 img-fluid">
                                    <h4 class="tm-margin-b-20 tm-gold-text">Tracking Tools</h4>
                                    <p class="tm-margin-b-20 tm-p-small">BOTE’s express tracking tools offer you the latest shipment information, in real-time, direct to your PC, mobile phone or handheld device. They are available to all BOTE customers, regardless of how shipments were booked or prepared.</p>   
                                </div> 

                                <div class="tm-content-box tm-margin-t-mid tm-content-box-contact">
                                    <img src="img/tm-img-310x180-2k.jpg" alt="Image" class="tm-margin-b-20 img-fluid">
                                    <h4 class="tm-margin-b-20 tm-gold-text">BOTE eTrack</h4>
                                    <p class="tm-margin-b-20 tm-p-small">BOTE eTrack can track up to 100 express shipments at any one time and operates on any email-enabled device. We will reply with exact status for all shipments within minutes in your own language.</p>   
                                </div>  

                            </div>
                        </div>
        </section>
        
        <footer class="tm-footer">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                        
                        <div class="tm-footer-content-box">
                            <h3 class="tm-gold-text tm-title tm-footer-content-box-title">CONTACT (U.S.A)</h3>
                            <div class="tm-gray-bg">
                                <p><strong>Phone : <br> </strong> <i>+1619-754-9227.</i></p>
                                <p><strong>Email : <br> </strong><i>support.expressbote@gmail.com</i>.</p>
                                <p><strong>Danny Egg (Executive Manager)</strong></p>    
                            </div>    
                        </div>
                                                
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                        <div class="tm-footer-content-box tm-footer-links-container">
                        
                            <h3 class="tm-gold-text tm-title tm-footer-content-box-title">OFFICIAL PARTNERS</h3>
                            <nav>
                                <ul class="nav">
                                    <li><a href="#" class="tm-footer-link"><strong>MICROSOFT</strong></a></li>
                                    <li><a href="#" class="tm-footer-link"><strong>GENERAL ELECTRICS</strong></a></li>
                                    <li><a href="#" class="tm-footer-link"><strong>MC DONALDS</strong></a></li>
                                    <li><a href="#" class="tm-footer-link"><strong>MOTO-GP</strong></a></li>
                                    <li><a href="#" class="tm-footer-link"><strong>MARY KAY</strong></a></li>
                                    <li><a href="#" class="tm-footer-link"><strong>GOLDBANK ASIA</strong></a></li>
                                </ul>
                            </nav>

                        </div>
                        
                    </div>

                    <!-- Add the extra clearfix for only the required viewport 
                        http://stackoverflow.com/questions/24590222/bootstrap-3-grid-with-different-height-in-each-item-is-it-solvable-using-only
                    -->
                    <div class="clearfix hidden-lg-up"></div>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">

                        <div class="tm-footer-content-box">
                        
                            <h3 class="tm-gold-text tm-title tm-footer-content-box-title">HEAD QUARTERS</h3>
                            <p class="tm-margin-b-30">万科四季花城15-3-1102.<br>Wan Ke Si Ji Hua Cheng 15-3-1102 <br>市区-顺义区  (Trans:City Area - ShunYi District) <br>Phone : +13013840756 </p><hr class="tm-margin-b-30">
                            <p class="tm-margin-b-30">Rm.813,Nam Fung Ctr. Castle Peak Rd. Tsuen Wan, HongKong. <br>
                            Phone : +852-62503269</p><hr class="tm-margin-b-30">
                           
                        </div>
                        
                    </div>
                 
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">

                        <div class="tm-footer-content-box">
                        
                            <h3 class="tm-gold-text tm-title tm-footer-content-box-title">TRAVEL ZONE</h3>
                            <div class="tm-margin-b-30">
                                <img src="img/tm-img-100x100-1.jpg" alt="Image" class="tm-footer-thumbnail">
                                <img src="img/tm-img-100x100-2.jpg" alt="Image" class="tm-footer-thumbnail">
                                <img src="img/tm-img-100x100-3.jpg" alt="Image" class="tm-footer-thumbnail">
                                <img src="img/tm-img-100x100-4.jpg" alt="Image" class="tm-footer-thumbnail">
                                <img src="img/tm-img-100x100-5.jpg" alt="Image" class="tm-footer-thumbnail">
                                <img src="img/tm-img-100x100-6.jpg" alt="Image" class="tm-footer-thumbnail">
                            </div>
                            
                        </div>
                        
                    </div>


                </div>

                <div class="row">
                    <div class="col-xs-12 tm-copyright-col">
                        <p class="tm-copyright-text">Copyright 2016 BOTExpress*</p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- load JS files -->
        <script src="js/jquery-1.11.3.min.js"></script>             <!-- jQuery (https://jquery.com/download/) -->
        <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script> <!-- Tether for Bootstrap, http://stackoverflow.com/questions/34567939/how-to-fix-the-error-error-bootstrap-tooltips-require-tether-http-github-h --> 
        <script src="js/bootstrap.min.js"></script>                 <!-- Bootstrap (http://v4-alpha.getbootstrap.com/) -->
        <script>     
       
            /* Google map
            ------------------------------------------------*/
            var map = '';
            var center;

            function initialize() {
                var mapOptions = {
                    zoom: 16,
                    center: new google.maps.LatLng(13.758468,100.567481),
                    scrollwheel: false
                };
            
                map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

                google.maps.event.addDomListener(map, 'idle', function() {
                  calculateCenter();
                });
            
                google.maps.event.addDomListener(window, 'resize', function() {
                  map.setCenter(center);
                });
            }

            function calculateCenter() {
                center = map.getCenter();
            }

            function loadGoogleMap(){
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
                document.body.appendChild(script);
            }
        
            // DOM is ready
            $(function() {

                // Google Map
                loadGoogleMap();
            });

        </script>             

</body>
</html>