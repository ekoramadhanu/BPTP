<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block"> 
              <img src="<?=base_url('Assets/image/logo.png')?>" width='300' height='300' class="image-logo">
          </div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Login SIM BPTP Jawa Timur</h1>
              </div>
              <form class="user">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                </div>                
                <a href="<?=base_url('Auth/login')?>" class="btn btn-primary btn-user btn-block">
                  Login
                </a>      
                <div class="text-center">
                  <a class="small text-primary" href="forgot-password.html">Forgot Password?</a>
                </div>              
              </form>
              <br>              
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>
