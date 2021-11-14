<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Card Application</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="dist/css/cardapplication.css">
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body>
    <div class="container wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Card Application Form</h3>
                </div>
                <div class="card-body">
                  <button class="btn btn-primary" id="modelopens"><i class="bi bi-plus-circle-fill"></i> Add New User</button>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Users Data</h3>
                </div>
                <div class="card-body" id="loadDataUser">
                </div>
              </div>
            </div>
          </div>
          <!-- Modal HTML -->
          <div id="modalLoginForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-login">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add New User</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <p class="text-center" id="errormsg" style="color:blue;"></p>
                <div class="modal-body">
                  <form method="post" id="addForm">
                    <div class="form-group">
                      <div class="input-group">
                      <div class="input-group-prepend">
                       <div class="input-group-text"><i class="bi bi-person"></i></div>
                       </div>
                      <input type="text" class="clsdfgdff form-control" name="unamess" id="unamess" placeholder="Name">
                    </div>
                    <span id="name_error" style="color:red;"></span>
                  </div>
                    <div class="form-group">
                      <div class="input-group">
                      <div class="input-group-prepend">
                       <div class="input-group-text"><i class="bi bi-envelope"></i></div>
                       </div>
                      <input type="email" id="uemailss" name="uemailss" class="gfhbgnhgff form-control" placeholder="Email" >
                    </div>
                    <span id="uemailss_error" style="color:red;"></span>
                  </div>
                    <div class="form-group">
                      <div class="input-group">
                      <div class="input-group-prepend">
                       <div class="input-group-text"><i class="bi bi-vector-pen"></i></div>
                       </div>
                      <input type="text" class="bghfdsdfhf form-control" id="udesignat" name="udesignat" placeholder="Designation" >
                    </div>
                    <span id="udesignat_error" style="color:red;"></span>
                  </div>
                    <div class="form-group">
                      <div class="input-group">
                      <div class="input-group-prepend">
                       <div class="input-group-text"><i class="bi bi-currency-dollar"></i></div>
                       </div>
                      <input type="text" id="usalarys" name="usalarys" class="dvbnvcddgd form-control" placeholder="Salary" >
                    </div>
                    <span id="usalarys_error" style="color:red;"></span>
                  </div>
                    <div class="form-group">
                      <div class="input-group">
                      <div class="input-group-prepend">
                       <div class="input-group-text"><i class="bi bi-calendar-fill"></i></div>
                       </div>
                      <input type="date" class="gdfdrdsdsfgd form-control" name="datess" id="datess" >
                    </div>
                    <span id="datess_error" style="color:red;"></span>
                  </div>
                   <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="6LeK7DAdAAAAAAYk98fcPfKRxs7aJ3Z0bEm_hGEx">
                      </div>
                      <span id="g-recaptcha_error" style="color:red;"></span>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-block btn-lg" id="addbtnuser" value="Add User">
                    </div>

                  </form>
                </div>
                <div class="modal-footer">
                  <a href="#">Card Application</a>
                </div>
              </div>
            </div>
          </div>
        </section>
        <script type="text/javascript">
          $(document).ready(function(){
            $(document).on('click',"#modelopens",function(){
              $("#modalLoginForm").modal('show');});
              $('#addForm').on('submit', function(event){
              event.preventDefault();
              $.ajax({
                url:"adduser_db.php",
                method:"POST",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function()
                {
                  $('#addbtnuser').attr('disabled','disabled');
                },
                success:function(data){
                  $('#addbtnuser').attr('disabled', false);
                  if(data==1){
                      $('#addForm')[0].reset();
                      grecaptcha.reset();
                      $("#errormsg").html('User Successfully Added').fadeIn();
                      $('#errormsg').fadeOut(3000);
                      /*$('#name_error').text('');
                      $('#uemailss_error').text('');
                      $('#udesignat_error').text('');
                      $('#usalarys_error').text('');
                      $('#datess_error').text('');
                      $('#g-recaptcha_error').text('');*/
                    }else{
                      $('#name_error').text(data.unamess).fadeIn();
                      $('#name_error').fadeOut(7000);
                      $('#uemailss_error').text(data.uemailss).fadeIn();
                      $('#uemailss_error').fadeOut(7000);
                      $('#udesignat_error').text(data.udesignat).fadeIn();
                      $('#udesignat_error').fadeOut(7000);
                      $('#usalarys_error').text(data.usalarys).fadeIn();
                      $('#usalarys_error').fadeOut(7000);
                      $('#datess_error').text(data.datess).fadeIn();
                      $('#datess_error').fadeOut(7000);
                      $('#g-recaptcha_error').text(data.captcha_error).fadeIn();
                      $('#g-recaptcha_error').fadeOut(7000);
                    }
                  }
                })
            });
           $("#usalarys").on("input", function(evt) {
            var self = $(this);
            self.val(self.val().replace(/[^0-9\.]/g, ''));
            if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) {
              evt.preventDefault();
            }
          });
           setInterval(function(){
            fetch_user(); },1000);
           function fetch_user(){
              $.ajax({
                url:"fetchdata.php",
                type:"POST",
                success:function(data){
                  $("#loadDataUser").html(data);
                }
              });
            }
          });
        </script>
      </div>
      <script src="plugins/jquery/jquery.min.js"></script>
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    </body>
  </html>
