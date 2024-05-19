<section class="login d-flex align-items-center">
  <div class="wrapper-body">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-lg-8 col-md-8 col-sm-12 col-12">
        <div class="loginbg">
          <div class="card login-card">
            <div class="d-flex align-items-center">
              <div class="card-body mt-7">
                <div class="">
                  <h3>Masuk Ke Akun</h3>
                  <span class="login-card-description">
                    Lihat contoh penulisan yang tepat serta syarat dan ketentuan
                    <a href="">di sini</a>
                  </span>
                  <form action="<?= site_url('user/Login') ?>" method="post" class="form-horizontal pt-3">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="custom-input">
                          <input style="padding: 15px 45px;" class="form-control" type="text" placeholder="Email / NISN" name="username" />
                          <svg class="lefts-icon" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5l-8-5h16zm0 12H4V8l8 5l8-5v10z" />
                          </svg>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group">
                          <div class="custom-input">
                            <input style="padding: 15px 45px;" class="form-control" type="password" placeholder="Password" name="password" />
                            <svg class="lefts-icon" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                              <g fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M2 12c0-3.771 0-5.657 1.172-6.828C4.343 4 6.229 4 10 4h4c3.771 0 5.657 0 6.828 1.172C22 6.343 22 8.229 22 12c0 3.771 0 5.657-1.172 6.828C19.657 20 17.771 20 14 20h-4c-3.771 0-5.657 0-6.828-1.172C2 17.657 2 15.771 2 12Z" />
                                <path stroke-linecap="round" d="M12 10v4m-1.732-3l3.464 2m0-2l-3.464 2m-3.535-3v4M5 11l3.464 2m0-2L5 13m12.268-3v4m-1.732-3L19 13m0-2l-3.465 2" />
                              </g>
                            </svg>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="remember d-flex justify-content-between mt-9">
                      <div class="ceklis form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="remember_me" name="remember_me" />
                        <label for="remember_me">
                          Remember Me
                        </label>
                      </div>
                      <a href="<?php echo base_url('user/resetpassword') ?>" class="text-resets1">Lupa pasword</a>
                    </div>
                    <div class="masuk d-flex justify-content-center">
                      <button type="submit" class="btn loginbtn2">Masuk</button>
                      <span class="login-card-footer-text">
                        Belum punya akun?
                      </span>
                      <a href="<?= site_url('user/signup') ?>" class="text-resets">Daftar</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
  </form>
</section>