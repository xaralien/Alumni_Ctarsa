<main class="signup d-flex align-items-center min-vh-100 py-3 py-md-0">
  <div class="wrapper-body">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-lg-8 col-md-8 col-sm-12">
        <div class="signupbg">
          <div class="card signup-card">
            <div class="col-md-12 d-flex align-items-center">
              <div class="card-body mt-7">
                <div class="col-md-12 col-sm-12">
                  <h3>Daftar Akun Alumni</h3>
                  <span class="signup-card-description">
                    Lihat contoh penulisan yang tepat serta syarat dan ketentuan
                    <a href="">di sini</a>
                  </span>
                  <div class="row pt-4">
                    <div class="col-md-6 col-sm-12">
                      <form class="form-horizontal" id="formregis">
                        <div class="form-group">
                          <div class="custom-input">
                            <input class="form-control" type="text" placeholder="Email" name="email" />
                            <svg class="lefts-icon" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5l-8-5h16zm0 12H4V8l8 5l8-5v10z" />
                            </svg>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="custom-input">
                            <input class="form-control" type="namalengkap" placeholder="Nama Lengkap" name="namalengkap" />
                            <svg class="lefts-icon" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                              <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0-8 0M6 21v-2a4 4 0 0 1 4-4h3.5m4.92.61a2.1 2.1 0 0 1 2.97 2.97L18 22h-3v-3l3.42-3.39z" />
                            </svg>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="custom-input">
                            <input class="form-control" type="char" placeholder="NISN" name="nisn" />
                            <svg class="lefts-icon" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M4 4c-1.11 0-2 .89-2 2v12c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2H4m0 2h16v4H4V6m0 6h4v2H4v-2m6 0h10v2H10v-2m-6 4h10v2H4v-2m12 0h4v2h-4v-2Z" />
                            </svg>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="custom-input">
                            <input class="form-control" type="password" placeholder="Password" name="password" />
                            <svg class="lefts-icon" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                              <g fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M2 12c0-3.771 0-5.657 1.172-6.828C4.343 4 6.229 4 10 4h4c3.771 0 5.657 0 6.828 1.172C22 6.343 22 8.229 22 12c0 3.771 0 5.657-1.172 6.828C19.657 20 17.771 20 14 20h-4c-3.771 0-5.657 0-6.828-1.172C2 17.657 2 15.771 2 12Z" />
                                <path stroke-linecap="round" d="M12 10v4m-1.732-3l3.464 2m0-2l-3.464 2m-3.535-3v4M5 11l3.464 2m0-2L5 13m12.268-3v4m-1.732-3L19 13m0-2l-3.465 2" />
                              </g>
                            </svg>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group selectgroup">
                        <div class="custom-input">
                          <select class="form-select" id="schoolSelect" name="tahunlulus">
                            <option class="disabled selected" selected disabled hidden>
                              Tahun lulus
                              <script>
                                var startYear = 1990; // Define the start year
                                var currentYear = new Date().getFullYear();
                                for (var i = currentYear; i >= startYear; i--) {
                                  document.write('<option value="' + i + '">' + i + '</option>');
                                }
                              </script>
                          </select>
                          <svg class="lefts-icon" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 48 48">
                            <g fill="none" stroke="currentColor" stroke-width="4">
                              <path d="M13.5 39.37A16.927 16.927 0 0 0 24 43c3.963 0 7.61-1.356 10.5-3.63M19 9.747C12.051 11.882 7 18.351 7 26c0 1.925.32 3.775.91 5.5M29 9.747C35.949 11.882 41 18.351 41 26c0 1.925-.32 3.775-.91 5.5" />
                              <path stroke-linecap="round" stroke-linejoin="round" d="M43 36c0 1.342-.528 2.56-1.388 3.458A5 5 0 1 1 43 36Zm-28 0c0 1.342-.528 2.56-1.388 3.458A5 5 0 1 1 15 36ZM29 9c0 1.342-.528 2.56-1.388 3.458A5 5 0 1 1 29 9Z" />
                            </g>
                          </svg>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="form-group selectgroup">
                          <div class="custom-input">
                            <select class="form-select" id="schoolSelect" name="sekolah">
                              <option class="selected" selected disabled hidden>
                                Sekolah
                              </option>
                              <?php
                              foreach ($sekolah as $s) {
                              ?>
                                <option value="<?= $s->id ?>"><?= $s->school_name ?></option>
                              <?php  } ?>

                            </select>
                            <svg class="lefts-icon" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 32 32">
                              <path fill="currentColor" d="m16 3.875l-.438.219L5.563 9L5 9.281V11h22V9.281L26.437 9l-10-4.906zm0 2.25L21.875 9h-11.75zM7 12v10H6v2h20v-2h-1V12h-2v10h-2V12h-2v10h-2V12h-2v10h-2V12h-2v10H9V12zM4 25v2h24v-2z" />
                            </svg>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="custom-input">
                          <input class="form-control" type="date" name="tanggallahir" placeholder="Tanggal Lahir" />
                          <svg class="lefts-icon" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                            <path fill="currentColor" d="m13.372 11.013l.614.614l-6.04 6.04h-.613v-.614l6.04-6.04M15.771 7a.667.667 0 0 0-.467.193l-1.22 1.22l2.5 2.5l1.22-1.22a.664.664 0 0 0 0-.94l-1.56-1.56A.655.655 0 0 0 15.772 7Zm-2.4 2.127L6 16.5V19h2.5l7.372-7.373Z" />
                            <path fill="currentColor" d="M19 1h-2v2H7V1H5v2H4a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-1V1ZM4 21V5h16v16Z" />
                          </svg>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="custom-input">
                          <input class="form-control" type="number" maxlength="15" min="0" step="1" placeholder="No. HP / WhatsApp" name="nomor" />
                          <svg class="lefts-icon" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19.05 4.91A9.816 9.816 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01zm-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.264 8.264 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.183 8.183 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23zm4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07c0 1.22.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28z" />
                          </svg>
                        </div>
                        </form>
                      </div>
                    </div>
                    <div class="masuk d-flex justify-content-start">
                      <button onclick="regis()" class="btn signupbtn2">Daftar</button>
                      <span class="signup-card-footer-text">
                        Sudah punya akun?
                        <a href="<?= site_url('user/login') ?>" class="text-resets">Login</a>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>
</main>