<body class="background-primary">
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center" style="display:flex;
    align-items:center;">

  <div class="col-xl-10 col-lg-12 col-md-12">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block "> 
              <img src="<?=base_url('Assets/image/logo.png')?>" width='300' height='300' class="image-logo">
          </div>
          <div class="col-lg-6 ">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-black mb-4">Masuk SIM BPTP Jawa Timur</h1>
              </div>
              <?= $this->session->flashdata('message')?>
              <form class="user needs-validation" method="post" action="<?=base_url('Auth/login')?>" novalidate>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleInputUsername" aria-describedby="emailHelp" placeholder="Nama Pengguna"
                  name="username" required>
                  <div class="invalid-feedback">
                    <p class="pl-2">Nama pengguna tidak boleh kosong</p>
                  </div>                  
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Kata Sandi"
                  name="password" required>
                  <div class="invalid-feedback">
                    <p class="pl-2">Kata sandi tidak boleh kosong</p>
                  </div>                  
                </div>                
                <button type="submit" href="<?=base_url('Auth/login')?>" class="btn button-primary btn-user btn-block text-white">
                  Masuk
                </button>      
              </form>
              <br>
              <div class="text-center">
                 <a class="small text-primary text-bold" href="<?=base_url('Auth/resetKataSandi')?>">Reset Kata Sandi?</a>
              </div>              
              <br>              
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>


