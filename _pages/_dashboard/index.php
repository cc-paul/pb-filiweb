<?php
  if(!isset($_SESSION)) { session_start(); } 
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Filicash Administrator">
    <meta name="twitter:description" content="Filicash Administrator">
    <meta name="twitter:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/dashforge">
    <meta property="og:title" content="DashForge">
    <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

    <meta property="og:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ThemePixels">

    <!-- Favicon -->

    <title>Filicash Administrator</title>

    <!-- vendor css -->
    <link href="../../lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../../lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="../../assets/css/dashforge.css">
    <link rel="stylesheet" href="../../assets/css/dashforge.filemgr.css">

  </head>
  <body class="app-filemgr">

    <header class="navbar navbar-header navbar-header-fixed">
      <a href="" id="filemgrMenu" class="burger-menu d-lg-none"><i data-feather="arrow-left"></i></a>
      <div class="navbar-brand">
        <a href="#" class="df-logo">Fili<span>Cash</span></a>
      </div><!-- navbar-brand -->
    </header><!-- navbar -->

    <div class="filemgr-wrapper">
      <div class="filemgr-sidebar">
        <div class="filemgr-sidebar-header">
          <div class="dropdown dropdown-icon flex-fill">
            <button class="btn btn-xs btn-block btn-white" data-toggle="dropdown">Website Navigation <i data-feather="chevron-down"></i></button>
          </div><!-- dropdown -->
        </div><!-- filemgr-sidebar-header -->
        <div class="filemgr-sidebar-body">
          <div class="pd-t-20 pd-b-10 pd-x-10">
            <label class="tx-sans tx-uppercase tx-medium tx-10 tx-spacing-1 tx-color-03 pd-l-10">My Drive</label>
            <nav class="nav nav-sidebar tx-13">
              <a href="" class="nav-link active"><i data-feather="folder"></i> <span>For Verification</span></a>
            </nav>
          </div>
        </div><!-- filemgr-sidebar-body -->
      </div><!-- filemgr-sidebar -->

      <div class="filemgr-content">
        <div class="filemgr-content-header">
          <i data-feather="search"></i>
          <div class="search-form">
            <input type="search" class="form-control" placeholder="Search data here...">
          </div><!-- search-form -->
          <nav class="nav d-none d-sm-flex mg-l-auto">
            <a href="" class="nav-link"><i data-feather="list"></i></a>
            <a href="" class="nav-link"><i data-feather="alert-circle"></i></a>
            <a href="" class="nav-link"><i data-feather="settings"></i></a>
          </nav>
        </div><!-- filemgr-content-header -->
        <div class="filemgr-content-body">
          <div class="pd-20 pd-lg-25 pd-xl-30">
            <h4 class="mg-b-15 mg-lg-b-25">For Verification</h4>

            <label class="d-block tx-medium tx-10 tx-uppercase tx-sans tx-spacing-1 tx-color-03 mg-b-15">Reports of Users for Approval</label>
            <div class="row row-xs">
              <div class="col-12 col-md-6 col-lg-8 mg-t-10">
                <div class="card">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h6 class="mg-b-0">Approval List</h6>
                    <div class="d-flex tx-18">
                      <a href="" class="link-03 lh-0"><i class="icon ion-md-refresh"></i></a>
                      <a href="" class="link-03 lh-0 mg-l-10"><i class="icon ion-md-more"></i></a>
                    </div>
                  </div>
                  <ul class="list-group list-group-flush tx-13">
                    <?php
                      include '../_php/conn.php';
                      
                      $sql    = 'SELECT a.* FROM fc_approval a ORDER BY a.dateCreated DESC';
                      $result = mysqli_query($con,$sql);
     
                      while ($row  = mysqli_fetch_row($result)) {
                        ?>
                          <li class="list-group-item d-flex pd-sm-x-20">
                            <div class="avatar d-none d-sm-block">
                              <?php
                                if ($row[7] == "Pending") {
                                  ?>
                                    <span class='avatar-initial rounded-circle bg-indigo op-5'>
                                      <i class='icon ion-md-return-left'></i>
                                    </span>
                                  <?php
                                } else if ($row[7] == "Rejected") {
                                  ?>
                                    <span class='avatar-initial rounded-circle bg-danger'>
                                      <i class='icon ion-md-close'></i>
                                    </span>
                                  <?php
                                } else {
                                  ?>
                                    <span class='avatar-initial rounded-circle bg-teal'>
                                      <i class='icon ion-md-checkmark'></i>
                                    </span>
                                  <?php
                                }
                              ?>
                            </div>
                            <div class="pd-sm-l-10">
                              <p class="tx-medium mg-b-2">
                                <?php
                                  echo "Ref : " .$row[1] . "&nbsp;&nbsp; Name : " .$row[2] . " " .$row[3];
                                ?>
                              </p>
                              <small class="tx-12 tx-color-03 mg-b-0">
                                <?php
                                  echo date_format(date_create($row[6]),"M d Y, h:i A");
                                ?>
                              </small>
                            </div>
                            <div class="mg-l-auto text-right">
                              <a href="#" onclick="viewDetails(<?php echo $row[0]; ?>,'<?php echo $row[1]; ?>','<?php echo $row[2] ." ".$row[3] ; ?>','<?php echo $row[4]; ?>','<?php echo $row[5]; ?>','<?php echo $row[7] ?>','<?php echo $row[10] ?>')"><span>View Details</span></a>
                              <br>
                              <small class="tx-12
                                <?php
                                  if ($row[7] == "Pending") {
                                    echo "tx-info";
                                  } else if ($row[7] == "Rejected") {
                                    echo "tx-danger";
                                  } else {
                                    echo "tx-success";
                                  }
                                ?>
                              mg-b-0">
                                <?php
                                  echo $row[7];
                                ?>
                              </small>
                            </div>
                          </li>
                        <?php
                      }
                      
                      mysqli_free_result($result);
                      mysqli_close($con);
                    ?>
                  </ul>
                  <div class="card-footer text-center tx-13">
    
                  </div><!-- card-footer -->
                </div><!-- card -->
              </div><!-- col -->
              <div class="col-12 col-md-6 col-lg-4 mg-t-10">
                <div class="card">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h6 class="mg-b-0">Details and Attachments</h6>
                    <div class="d-flex tx-18">
                      <a href="" class="link-03 lh-0"><i class="icon ion-md-refresh"></i></a>
                      <a href="" class="link-03 lh-0 mg-l-10"><i class="icon ion-md-more"></i></a>
                    </div>
                  </div>
                  <ul class="list-group list-group-flush tx-13">
                    <li class="list-group-item d-flex pd-sm-x-20">
                      <div class="pd-sm-l-12">
                        <p class="tx-medium mg-b-2">Wallet ID :</p>
                        <span id="spWalletID">--</span>
                        <br>
                        <p class="tx-medium mg-b-2">Name :</p>
                        <span id="spName">--</span>
                        <br>
                        <p class="tx-medium mg-b-2">Mobile :</p>
                        <span id="spMobile">--</span>
                        <br>
                        <p class="tx-medium mg-b-2">Address :</p>
                        <span id="spAddress">--</span>
                      </div>
                    </li>
                    <div id="imgContainer">
                    </div>
                  </ul>
                  <div class="card-footer text-center tx-13">
                    <button id="btnApprove" type="button" class="btn btn-primary btn-icon">
                      Approve
                      <i data-feather="check"></i>
                    </button>
                    <button id="btnReject" type="button" class="btn btn-danger btn-icon">
                      Reject
                      <i data-feather="x"></i>
                    </button>
                  </div><!-- card-footer -->
                </div><!-- card -->
              </div><!-- col -->
            </div><!-- row -->

          </div>
        </div><!-- filemgr-content-body -->
      </div><!-- filemgr-content -->

    </div><!-- filemgr-wrapper -->

    <label id="lblid">
        <?php
          if (!isset($_SESSION['username'])) {
            echo 0;
          } else {
            echo $_SESSION['username'];
          }
        ?>
    </label>
    <div class="pos-fixed b-10 r-10">
      <div id="toast" class="toast bg-dark bd-0 wd-300" data-delay="3000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-transparent bd-white-1">
          <h6 class="tx-white mg-b-0 mg-r-auto">Downloading</h6>
          <button type="button" class="ml-2 mb-1 close tx-normal tx-shadow-none" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="toast-body pd-10 tx-white">
          <h6 class="mg-b-0">Medical_Certificate.pdf</h6>
          <span class="tx-color-03 tx-11">1.2mb of 4.5mb</span>
          <div class="progress ht-5 mg-t-5">
            <div class="progress-bar wd-50p" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div><!-- toast -->
    </div>
  
    <div id="mdLogin" class="modal tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Login Credentials</h5>
          </div>
          <div class="modal-body">
              <label class="tx-uppercase tx-sans tx-11 tx-medium tx-spacing-1 tx-color-03">Username</label>
              <div class="row row-xs">
                <div class="col-12">
                  <input id="txtUsername" type="text" value="" class="form-control" placeholder="Enter Username">
                </div><!-- col-7 -->
              </div><!-- row -->
              <label class="tx-uppercase tx-sans tx-11 tx-medium tx-spacing-1 tx-color-03">Password</label>
              <div class="row row-xs">
                <div class="col-12">
                  <input id="txtPassword" type="password" value="" class="form-control" placeholder="Enter Password">
                </div><!-- col-7 -->
              </div><!-- row -->
          </div>
          <div class="modal-footer">
            <button id="btnLogin" type="button" class="btn btn-primary" style="width:100%;">Login</button>
          </div>
        </div>
      </div>
    </div>
  
    <script src="../../lib/jquery/jquery.min.js"></script>
    <script src="../../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../lib/feather-icons/feather.min.js"></script>
    <script src="../../lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="../../assets/js/dashforge.js"></script>
    <script src="../../assets/js/dashforge.filemgr.js"></script>
    
    <script>
      var current_id = 0;
      
      if ($("#lblid").text() == 0) {
        $("#mdLogin").modal("show");
      }
      
      function viewDetails(id,walletID,name,mobile,address,status,tid) {
        current_id = id;
        $("#spWalletID").text(walletID);
        $("#spName").text(name);
        $("#spMobile").text(mobile);
        $("#spAddress").text(address);
        
        if (status != "Pending") {
          $("#btnApprove").prop("disabled",true);
          $("#btnReject").prop("disabled",true);
        } else {
          $("#btnApprove").prop("disabled",false);
          $("#btnReject").prop("disabled",false);
        }
        
        if (status != 'Rejected') {
          $.ajax({
            url: "../_php/get_image.php",
            data: {
              tid : tid
            },
            type: 'post',
            success: function (data) {
              var data = jQuery.parseJSON(data);
              $("#imgContainer").html("");
              
              for (var i = 0; i < data.length; i++) {
                $('#imgContainer').append('<li class="list-group-item d-flex pd-sm-x-20"><img src="' + data[i].imageUrl + '" class="rounded float-left" alt="" style="width:100%; height:200px; object-fit: contain;"></li>');
              }
            }
          });
        }
      }
      
      $("#btnLogin").click(function(){
        var username = $("#txtUsername").val();
        var password = $("#txtPassword").val();
        
        if (username == "" || password == "") {
          alert("Please provide username and password");
        } else {
          $.ajax({
            url: "../_php/login.php",
            data: {
              username   : username,
              password   : password,
            },
            type: 'post',
            success: function (data) {
              var data = data.trim();
              
              if (data == 1) {
                $("#mdLogin").modal("hide");
              } else {
                alert("Account does not exist");
              }
            }
          });
        }
      });
      
      $("#btnApprove").click(function(){
        if (current_id == 0) {
          alert("Nothing to approve");
        } else {
          updateStatus("Approved"); 
        }
      });
      
      $("#btnReject").click(function(){
        if (current_id == 0) {
          alert("Nothing to reject");
        } else {
          updateStatus("Rejected"); 
        }
      });
      
      function updateStatus(status) {
        $.ajax({
          url: "../_php/updateStatus.php",
          data: {
            id     : current_id,
            status : status
          },
          type: 'post',
          success: function (data) {
            var data = data.trim();
            
            if (data == 1) {
              alert("Account has been " + status);
              location.reload(); 
            }
          }
        });
      }
    </script>
  </body>
</html>
