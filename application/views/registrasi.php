<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
      <div class="col-lg-7">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
          </div>
          <form class="user" method="post" action="<?=base_url('Auth/registrasi')?>">
              <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nama Lengkap"
                  name="username">                  
                </div>                
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="exampleInputEmail" placeholder="Kata Sandi"
                  name ="password">                  
                </div>                
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Pendaftaran Akun
                </button>
                <hr>                
              </form>
        </div>
      </div>
    </div>
  </div>
</div>

</div>