<section class="emailnotif">
  <div class="notifhead">
    <div class="col-md-12 d-flex justify-content-center">
      <div class="card d-flex align-items-center mt-3">
        <h2>Halo</h2>
        <img class="img-fluid" src="<?php echo base_url(); ?>assets/image/6310507.jpg" width="200" height="200" />
        <p class="mt-3">Silahkan Masukkan Email anda</p>
        <form action="<?= site_url('autentic/resetpassword') ?>" method="post">
          <div class="form-group">
            <div class="custom-input">
              <input class="form-control" type="text" placeholder="Email" name="email" />
              <svg class="left-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                <path fill="currentColor" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5l-8-5h16zm0 12H4V8l8 5l8-5v10z" />
              </svg>
            </div>
          </div>

          <button type="submit" class="btn btnemailnotif">Reset Password</button>
      </div>
    </div>
    <div class="col-md-12 d-flex justify-content-center mt-3">
      <div class="card brader2 d-flex align-items-center">
        <p>Butuh bantuan lebih lanjut?</p>
        <a href="">Hubungi admin</a>
      </div>
    </div>
  </div>
  </form>
</section>