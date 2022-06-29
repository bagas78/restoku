<div style="float:right;">
  <a class="btn btn-success" style="color:#FFFFFF;" href="<?php echo base_url('login_user');?>">Login User <i class="fa fa-user-o"></i></a>
</div><br>
<div class="row">
  <div class="col-md-12">
    <?php echo $this->session->flashdata('forgot'); ?>
  </div>
</div>
<div class="page">
  <div class="container">
    <div class="left" style="background-color: white;">
      <center>
        <div style="margin-top: 1%;">
          <img src="asset/image/logo.jpg" style="width: 100%; padding: 1%;">
        </div>
        <br/>
      </center>
        <?php if($this->session->flashdata('result_login') == true) {  ?>
          <div id="alertshow"><?php echo $this->session->flashdata('result_login'); ?></div>
          <div class="eula">Selamat Datang!. Silahkan Masukan <b>Nama Pengguna</b> dan <b>Kata Sandi</b> yang sudah Terdaftar.</div>
        <?php } else { ?>
          <div class="eula">Selamat Datang!. Silahkan Masukan <b>Nama Pengguna</b> dan <b>Kata Sandi</b> yang sudah Terdaftar.</div>
         
        <?php } ?>
    </div>
    <div class="right" style="box-shadow: none;">
      <svg viewBox="0 0 320 300">
        <defs>
          <linearGradient
            inkscape:collect="always"
            id="linearGradient"
            x1="13"
            y1="193.49992"
            x2="307"
            y2="193.49992"
            gradientUnits="userSpaceOnUse">
          <stop
            style="stop-color:#ff00ff;"
            offset="0"
            id="stop876" />
          <stop
            style="stop-color:#ff0000;"
            offset="1"
            id="stop878" />
        </linearGradient>
      </defs>
      <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
    </svg>
    <form action="<?php echo base_url('Login/proses'); ?>" method="post" >
      <div class="form">
        <label for="username">Nama Pengguna</label>
        <input class="form-control" type="text" id="username" name="username" autofocus="true" required="">
        <div class="form-group">
        <label>Password</label>
        <div class="input-group" id="password1">
        <input class="form-control" type="password" id="password" name="password" >
          <div class="input-group-addon" style="background-color:#474A59; border-color:#474A59; padding: 0px 0px;">
          </div>
        </div>
      </div>
  <!-- <a href="" style="color: #ffffff;"><i class="fa fa-eye-slash" aria-hidden="true"></i></a> -->
  <div style="float:right; font-size:12px;">
    <a id="forgot" data-toggle="modal" data-target="#insertModal">Lupa Kata Sandi?</a>
  </div>
        <!-- <label for="password">Kata Sandi</label> -->
        <!-- <input type="password" id="password" name="password" > -->
        <button class="form-control btn btn-success" style="margin-top: 10px; color: white;" type="submit" id="submit">Masuk &#160;<i class="fa fa-arrow-right"></i></button>
      </div>
    </form>
    </div>
  </div>
</div>
<script>
var current = null;
document.querySelector('#username').addEventListener('focus', function(e) {
  if (current) current.pause();
  current = anime({
    targets: 'path',
    strokeDashoffset: {
      value: 0,
      duration: 700,
      easing: 'easeOutQuart'
    },
    strokeDasharray: {
      value: '240 1386',
      duration: 700,
      easing: 'easeOutQuart'
    }
  });
});
document.querySelector('#password').addEventListener('focus', function(e) {
  if (current) current.pause();
  current = anime({
    targets: 'path',
    strokeDashoffset: {
      value: -336,
      duration: 700,
      easing: 'easeOutQuart'
    },
    strokeDasharray: {
      value: '240 1386',
      duration: 700,
      easing: 'easeOutQuart'
    }
  });
});
document.querySelector('#submit').addEventListener('focus', function(e) {
  if (current) current.pause();
  current = anime({
    targets: 'path',
    strokeDashoffset: {
      value: -730,
      duration: 700,
      easing: 'easeOutQuart'
    },
    strokeDasharray: {
      value: '550 1386',
      duration: 700,
      easing: 'easeOutQuart'
    }
  });
});
</script>
<script src="<?php echo base_url('asset/new/js/anime.min.js')?>"></script>
<script src="<?php echo base_url('asset/image/js/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('asset/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script>
$("#submit").attr('disabled', false);
$("#password1 a").on('click', function(event) {
        event.preventDefault();
        if($('#password1 input').attr("type") == "text"){
            $('#password1 input').attr('type', 'password');
            $('#password1 i').addClass( "fa-eye-slash" );
            $('#password1 i').removeClass( "fa-eye" );
        }else if($('#password1 input').attr("type") == "password"){
            $('#password1 input').attr('type', 'text');
            $('#password1 i').removeClass( "fa-eye-slash" );
            $('#password1 i').addClass( "fa-eye" );
        }
    });

</script>
<div class="modal fade" tabindex="-1" role="dialog" id="insertModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Lupa Kata Sandi</h4>
        </div>
        <form role="form" action="<?php echo base_url('login/forgot_pass') ?>" method="post" id="insertModal">
          <div class="modal-body">
            <div id="alert_update"></div>
              <div class="form-group">
                <label style="color:#332727;">Username</label>
                <input type="text" id="username" class="form-control" min="5" required="true" name="username" aria-describedby="basic-addon2">
                <div class="form-group" id="warningUsername" style="display: none;">
                  <div class="input-group" style="border:none;">
                    <span class="input-group-addon" id="basic-addon4">
                    <i id="unmatch" style="color: #c7003d;" class="fa fa-exclamation-triangle" aria-hidden="true"></i> Username hanya huruf dan angka tanpa spasi</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label style="color:#332727;">Email Valid</label>
                <input type="email" name="email" class="form-control" min="5" required="true"  aria-describedby="basic-addon2">
              </div>
              <div class="form-group">
                <label style="color:#332727;">Password</label>
                <input type="password" name="password" class="form-control" id="passwordmodal" min="5" required="true"  aria-describedby="basic-addon2">
              </div>
              <div class="form-group">
                <label style="color:#332727;">Konfirmasi Password</label>
                <input type="password" name="password1" id="passwordmodal2" class="form-control" min="5" required="true" aria-describedby="basic-addon2">
              </div>
              <div class="form-group">
                      <div id="warning" class="input-group" style="border:none;display: none;">
                        <span class="input-group-addon1" id="basic-addon4">
                        <i id="unmatch" style="color: #c7003d;display:none;" class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                        <i id="match" class="fa fa-check match-icon" aria-hidden="true"></i>
                        <label class="red-color">
                          <small style="position:relative;top:-30px;left:25px;" id="divCheckPasswordMatch"></small>
                        </label>
                      </div>
                    </div>      
              <script type="text/javascript">
                      var regx = /^[A-Za-z0-9]+$/;
                      $(document).ready(function () {
                        $('#warning').hide();
                        $("#passwordmodal").keyup(checkPasswordMatch);
                        $("#passwordmodal2").keyup(checkPasswordMatch);
                      });


                      function checkPasswordMatch() {
                        var password = $("#passwordmodal").val();
                        var confirmPassword = $("#passwordmodal2").val();
                        console.log(password);
                        console.log(confirmPassword);

                        if (password != confirmPassword) {
                          $("#submit").attr('disabled', false);
                          $('#unmatch').show();
                          $('#match').hide();
                          $('#warning').show();
                          $("#divCheckPasswordMatch").html("Password masukkan 2x yang sesuai!");
                          $('#submitLupa').prop('disabled', true);
                        } else {
                          $("#submit").attr('disabled', false);
                          $('#match').show();
                          $('#unmatch').hide();
                          $('#warning').show();
                          $("#divCheckPasswordMatch").html("Passwords match.");
                          $('#submitLupa').prop('disabled', false);
                        }
                      }

                    </script>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" id="submitLupa" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <script type="text/javascript">
    $(document).ready(function(){
      showalert();
      $("#submit").attr('disabled', false);
    });
      function showalert(){
        $('#alertshow').fadeTo(200, 400).slideUp(800, function(){
          $('alertshow').slideUp(800);
        });
      } 
  </script>
</body>
</html>