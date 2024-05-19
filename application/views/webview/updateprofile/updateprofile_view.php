<section class="galeryhead2">
  <div class="blogtext wrapper-body text-center">
    <h1>Update Profile</h1>
    <p>Lorem ipsum dolor sit amet, syarat dan ketentuan</p>
    <p>Lorem ipsum dolor sit amet consectetur</p>
  </div>
</section>

<section class="profile">
  <div class="wrapper-body">
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div class="card">
          <div class="row">
            <div class="col-lg-4 col-md-4 profileimg">
              <img src="<?= $avatar ?>" alt="" />
              <button class="btn" id="uploadButton">
                <span style="top: 4px;position: absolute;left: 8px;">
                  <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                    <path fill="white" d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15q.4 0 .775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.138.763t-.437.662L7.25 21H3ZM17.6 7.8L19 6.4L17.6 5l-1.4 1.4l1.4 1.4Z" />
                  </svg></span>
              </button>
              <form id="ganti_gambar">
                <input type="file" id="fileInput" name="image_edit" style="display: none;">
              </form>
            </div>

            <div class="col-lg-8 col-md-8 profiledetails">
              <h3 class="nama"><?= $namalengkap ?></h3>
              <div class="desc d-flex align-content-center ml-3">
                <p><?= $nisn ?> | </p>
                <p><?= $cekula ?> | </p>
                <p><?= $tahunlulus ?></p>
              </div>
              <p class="univ">Universitas Sebelas Maret</p>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="nav navigations">
            <ul>
              <li>
                <a id="profile-button">
                  <svg class=" btn profile-button" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                    <path fill="currentColor" fill-rule="evenodd" d="M8 7a4 4 0 1 1 8 0a4 4 0 0 1-8 0Zm0 6a5 5 0 0 0-5 5a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3a5 5 0 0 0-5-5H8Z" clip-rule="evenodd" />
                  </svg>
                  Profile
                </a>
              </li>
              <li>
                <a id="password-button">
                  <svg class="btn password-button" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                    <path fill="currentColor" fill-rule="evenodd" d="M5.25 10.055V8a6.75 6.75 0 0 1 13.5 0v2.055c1.115.083 1.84.293 2.371.824C22 11.757 22 13.172 22 16c0 2.828 0 4.243-.879 5.121C20.243 22 18.828 22 16 22H8c-2.828 0-4.243 0-5.121-.879C2 20.243 2 18.828 2 16c0-2.828 0-4.243.879-5.121c.53-.531 1.256-.741 2.371-.824ZM6.75 8a5.25 5.25 0 0 1 10.5 0v2.004C16.867 10 16.451 10 16 10H8c-.452 0-.867 0-1.25.004V8ZM8 17a1 1 0 1 0 0-2a1 1 0 0 0 0 2Zm4 0a1 1 0 1 0 0-2a1 1 0 0 0 0 2Zm5-1a1 1 0 1 1-2 0a1 1 0 0 1 2 0Z" clip-rule="evenodd" />
                  </svg>
                  Password
                </a>
              </li>
              <li>
                <a id="social-button">
                  <svg class="btn social-button" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                    <g fill="none">
                      <path d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z" />
                      <path fill="currentColor" d="M5.5 16.5a2 2 0 1 1 0 4a2 2 0 0 1 0-4Zm6.5 0a2 2 0 1 1 0 4a2 2 0 0 1 0-4Zm6.5 0a2 2 0 1 1 0 4a2 2 0 0 1 0-4ZM5.5 10a2 2 0 1 1 0 4a2 2 0 0 1 0-4Zm6.5 0a2 2 0 1 1 0 4a2 2 0 0 1 0-4Zm6.5 0a2 2 0 1 1 0 4a2 2 0 0 1 0-4Zm-13-6.5a2 2 0 1 1 0 4a2 2 0 0 1 0-4Zm6.5 0a2 2 0 1 1 0 4a2 2 0 0 1 0-4Zm6.5 0a2 2 0 1 1 0 4a2 2 0 0 1 0-4Z" />
                    </g>
                  </svg>
                  Other
                </a>

              </li>
            </ul>
          </div>
        </div>
        <div class="card">
          <div class="col-md-6">
            <p>Lengkapi Profil kamu</p>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: <?= $persen ?>%;, color: #9a8743;" aria-valuenow="<?= $persen ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="mt-2">Profile Completion: <?= $persen ?>%</p>
          </div>
        </div>
      </div>

      <div class="identity col-md-6 col-sm-12">
        <div class="profileform">
          <div class="card" id="profile-card">
            <h3 class="text-center">Lihat / Edit Profile</h3>
            <form id="form_update_1" class="form-horizontal">
              <input type="hidden" name="id_update" value="<?= $id ?>">
              <label for="nama">Nama Lengkap </label>
              <div class="form-group">
                <div class="custom-input">
                  <input readonly class="form-control" type="text" placeholder="Nama Lengkap" name="fullname" id="namalengkap" value="<?= $namalengkap ?>" />
                  <svg class="left-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0-8 0M6 21v-2a4 4 0 0 1 4-4h3.5m4.92.61a2.1 2.1 0 0 1 2.97 2.97L18 22h-3v-3l3.42-3.39z" />
                  </svg>
                  <svg onclick="toggleReadonly('namalengkap')" class="right-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                    <path fill="#cb9224" d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15q.4 0 .775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.138.763t-.437.662L7.25 21H3ZM17.6 7.8L19 6.4L17.6 5l-1.4 1.4l1.4 1.4Z" />
                  </svg>
                </div>
              </div>
              <label for="Tanggal lahir">Tanggal lahir</label>
              <div class="form-group">
                <div class="custom-input">
                  <input class="form-control" id="tanggallahir" name="tanggal_lahir" value="<?= $tanggallahir ?>" readonly style="background:#F5F5F5 " />
                  <svg class="left-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                    <path fill="currentColor" d="m13.372 11.013l.614.614l-6.04 6.04h-.613v-.614l6.04-6.04M15.771 7a.667.667 0 0 0-.467.193l-1.22 1.22l2.5 2.5l1.22-1.22a.664.664 0 0 0 0-.94l-1.56-1.56A.655.655 0 0 0 15.772 7Zm-2.4 2.127L6 16.5V19h2.5l7.372-7.373Z" />
                    <path fill="currentColor" d="M19 1h-2v2H7V1H5v2H4a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-1V1ZM4 21V5h16v16Z" />
                  </svg>
                  <svg onclick="toggleReadonly('tanggallahir')" class="right-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                    <path fill="#cb9224" d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15q.4 0 .775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.138.763t-.437.662L7.25 21H3ZM17.6 7.8L19 6.4L17.6 5l-1.4 1.4l1.4 1.4Z" />
                  </svg>
                </div>
              </div>
              <label for="NISN">NISN</label>
              <div class="form-group">
                <div class="custom-input">
                  <input style="background:#F5F5F5 " class="form-control" type="text" placeholder="NISN" value="<?= $nisn ?>" readonly />
                  <svg class="left-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M4 4c-1.11 0-2 .89-2 2v12c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2H4m0 2h16v4H4V6m0 6h4v2H4v-2m6 0h10v2H10v-2m-6 4h10v2H4v-2m12 0h4v2h-4v-2Z" />
                  </svg>
                </div>
              </div>
              <div class="social d-flex justify-content-center ml-5">
                <div class="col-md-6">
                  <label for="Tahunlulus">Tahun Lulus</label>
                  <div class="form-group selectgroup">
                    <div class="custom-input">
                      <select class="form-select" id="schoolSelect" name="tahun_lulus">
                        <option class="disabled selected" selected disabled hidden>
                          <?php for ($i = 1990; $i < 2500; $i++) {
                            $aktif = null;
                            if ($i == $tahunlulus) {
                              $aktif = "selected";
                          ?>

                            <?php } ?>
                        <option <?= $aktif ?> class="disabled" value="<?= $i ?>"><?= $i ?></option>

                      <?php } ?>
                      <!-- <script>
                            var startYear = 1990; // Define the start year
                            var currentYear = new Date().getFullYear();
                            for (var i = currentYear; i >= startYear; i--) {
                              document.write('<option value="' + i + '">' + i + '</option>');
                            }
                          </script> -->
                      </select>
                      <svg class="left-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 48 48">
                        <g fill="none" stroke="currentColor" stroke-width="4">
                          <path d="M13.5 39.37A16.927 16.927 0 0 0 24 43c3.963 0 7.61-1.356 10.5-3.63M19 9.747C12.051 11.882 7 18.351 7 26c0 1.925.32 3.775.91 5.5M29 9.747C35.949 11.882 41 18.351 41 26c0 1.925-.32 3.775-.91 5.5" />
                          <path stroke-linecap="round" stroke-linejoin="round" d="M43 36c0 1.342-.528 2.56-1.388 3.458A5 5 0 1 1 43 36Zm-28 0c0 1.342-.528 2.56-1.388 3.458A5 5 0 1 1 15 36ZM29 9c0 1.342-.528 2.56-1.388 3.458A5 5 0 1 1 29 9Z" />
                        </g>
                      </svg>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="Sekolah">Sekolah</label>
                  <div class="form-group selectgroup">
                    <div class="custom-input">
                      <select class="form-select" id="schoolSelect" name="school">
                        <option class="disabled selected" selected disabled hidden>
                          <?php foreach ($school as $s) {
                            $aktif = null;
                            if ($s->id == $sekolah) {
                              $aktif = "selected";
                          ?>

                            <?php } ?>
                        <option <?= $aktif ?> class="disabled" value="<?= $s->id ?>"><?= $s->school_name ?></option>

                      <?php } ?>
                      </select>
                      <svg class="left-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 48 48">
                        <g fill="none" stroke="currentColor" stroke-width="4">
                          <path d="M13.5 39.37A16.927 16.927 0 0 0 24 43c3.963 0 7.61-1.356 10.5-3.63M19 9.747C12.051 11.882 7 18.351 7 26c0 1.925.32 3.775.91 5.5M29 9.747C35.949 11.882 41 18.351 41 26c0 1.925-.32 3.775-.91 5.5" />
                          <path stroke-linecap="round" stroke-linejoin="round" d="M43 36c0 1.342-.528 2.56-1.388 3.458A5 5 0 1 1 43 36Zm-28 0c0 1.342-.528 2.56-1.388 3.458A5 5 0 1 1 15 36ZM29 9c0 1.342-.528 2.56-1.388 3.458A5 5 0 1 1 29 9Z" />
                        </g>
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
              <label for="schoolSelect">Nama Angkatan</label>
              <div class="form-group selectgroup">
                <div class="custom-input">
                  <input class="form-control" type="tel" placeholder="Nama Angkatan" name="angkatan" id="angkatan" readonly value="" />
                  <!-- <i onclick="toggleReadonly('angkatan')"><iconify-icon class="right-icon" icon="material-symbols:edit"></iconify-icon></i> -->
                  <svg onclick="toggleReadonly('angkatan')" class="right-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                    <path fill="#cb9224" d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15q.4 0 .775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.138.763t-.437.662L7.25 21H3ZM17.6 7.8L19 6.4L17.6 5l-1.4 1.4l1.4 1.4Z" />
                  </svg>
                  <svg class="left-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 16 16">
                    <path fill="currentColor" d="M3 3a2 2 0 1 1 4 0a2 2 0 0 1-4 0Zm2-1a1 1 0 1 0 0 2a1 1 0 0 0 0-2Zm4.779 2.584a2 2 0 1 1 2.442-3.168A2 2 0 0 1 9.78 4.584ZM11 2a1 1 0 1 0 0 2a1 1 0 0 0 0-2ZM2.5 6h2.67c-.11.313-.17.65-.17 1H2.5a.5.5 0 0 0-.5.5c0 .817.325 1.423.838 1.835c.236.19.519.343.839.455a2.5 2.5 0 0 0-.532.868a3.733 3.733 0 0 1-.933-.543C1.46 9.51 1 8.616 1 7.5A1.5 1.5 0 0 1 2.5 6Zm3.768 0a2 2 0 1 0 3.466 2a2 2 0 0 0-3.466-2Zm1.508.025A1.003 1.003 0 0 1 9 7a1 1 0 1 1-1.224-.975Zm5.386 3.31c-.236.19-.519.343-.839.455a2.5 2.5 0 0 1 .531.868c.34-.139.655-.32.934-.543C14.54 9.51 15 8.616 15 7.5A1.5 1.5 0 0 0 13.5 6h-2.67c.11.313.17.65.17 1h2.5a.5.5 0 0 1 .5.5c0 .817-.325 1.423-.838 1.835ZM10.5 10a1.5 1.5 0 0 1 1.5 1.5c0 1.116-.459 2.01-1.212 2.615C10.047 14.71 9.053 15 8 15c-1.053 0-2.047-.29-2.788-.885C4.46 13.51 4 12.616 4 11.5A1.496 1.496 0 0 1 5.5 10h5Zm0 1h-5a.5.5 0 0 0-.5.5c0 .817.325 1.423.838 1.835C6.364 13.757 7.12 14 8 14c.88 0 1.636-.243 2.162-.665c.513-.412.838-1.018.838-1.835a.5.5 0 0 0-.5-.5Z" />
                  </svg>

                </div>
              </div>
              <label for="nama">Email</label>
              <div class="form-group">
                <div class="custom-input">
                  <input readonly class="form-control" type="email" placeholder="Email" name="email" id="email" value="<?= $email ?>" />
                  <svg class="left-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5l-8-5h16zm0 12H4V8l8 5l8-5v10z" />
                  </svg>
                  <svg onclick="toggleReadonly('email')" class="right-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                    <path fill="#cb9224" d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15q.4 0 .775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.138.763t-.437.662L7.25 21H3ZM17.6 7.8L19 6.4L17.6 5l-1.4 1.4l1.4 1.4Z" />
                  </svg>
                </div>
              </div>
              <label for="nama">Nomor HP / WhatsApp</label>
              <div class="form-group">
                <div class="custom-input">
                  <input readonly class="form-control" type="tel" placeholder="No. HP / WhatsApp" name="notelp" id="nomor" value="<?= $nomor ?>" />
                  <svg class="left-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M19.05 4.91A9.816 9.816 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01zm-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.264 8.264 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.183 8.183 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23zm4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07c0 1.22.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28z" />
                  </svg>
                  <svg onclick="toggleReadonly('nomor')" class="right-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                    <path fill="#cb9224" d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15q.4 0 .775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.138.763t-.437.662L7.25 21H3ZM17.6 7.8L19 6.4L17.6 5l-1.4 1.4l1.4 1.4Z" />
                  </svg>
                </div>
            </form>
          </div>
          <div class="update d-flex justify-content-center">
            <button onclick="update_1()" class="btn btnupdatedata">Update data</button>
          </div>
        </div>
      </div>
      <div class="passwordform">
        <div class="card" id="password-card">
          <h3 class="text-center">Lihat / Edit Password</h3>
          <form action="<?= site_url('updateprofile/ganti_password') ?>" method="post" class="form-horizontal">
            <label for="password">Password</label>
            <div class="form-group">
              <div class="custom-input">
                <input id="password1" class="form-control" type="password" placeholder="Password" name="password1" />
                <svg class="left-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                  <g fill="currentColor">
                    <path d="M12.75 10a.75.75 0 0 0-1.5 0v.701l-.607-.35a.75.75 0 0 0-.75 1.298l.607.35l-.607.351a.75.75 0 1 0 .75 1.3l.607-.351V14a.75.75 0 0 0 1.5 0v-.7l.607.35a.75.75 0 0 0 .75-1.3L13.5 12l.607-.35a.75.75 0 0 0-.75-1.3l-.607.35V10Zm-6.017-.75a.75.75 0 0 1 .75.75v.7l.606-.35a.75.75 0 0 1 .75 1.3l-.607.35l.607.35a.75.75 0 1 1-.75 1.3l-.606-.35v.7a.75.75 0 0 1-1.5 0v-.701l-.608.35a.75.75 0 0 1-.75-1.298L5.232 12l-.607-.35a.75.75 0 1 1 .75-1.3l.608.351V10a.75.75 0 0 1 .75-.75Zm11.285.75a.75.75 0 0 0-1.5 0v.701l-.607-.35a.75.75 0 0 0-.75 1.298l.607.35l-.608.351a.75.75 0 0 0 .75 1.3l.608-.351V14a.75.75 0 0 0 1.5 0v-.7l.607.35a.75.75 0 0 0 .75-1.3l-.607-.35l.607-.35a.75.75 0 0 0-.75-1.3l-.607.35V10Z" />
                    <path fill-rule="evenodd" d="M9.944 3.25c-1.838 0-3.294 0-4.433.153c-1.172.158-2.121.49-2.87 1.238c-.748.749-1.08 1.698-1.238 2.87c-.153 1.14-.153 2.595-.153 4.433v.112c0 1.838 0 3.294.153 4.433c.158 1.172.49 2.121 1.238 2.87c.749.748 1.698 1.08 2.87 1.238c1.14.153 2.595.153 4.433.153h4.112c1.838 0 3.294 0 4.433-.153c1.172-.158 2.121-.49 2.87-1.238c.748-.749 1.08-1.698 1.238-2.87c.153-1.14.153-2.595.153-4.433v-.112c0-1.838 0-3.294-.153-4.433c-.158-1.172-.49-2.121-1.238-2.87c-.749-.748-1.698-1.08-2.87-1.238c-1.14-.153-2.595-.153-4.433-.153H9.944ZM3.702 5.702c.423-.423 1.003-.677 2.009-.812c1.028-.138 2.382-.14 4.289-.14h4c1.907 0 3.262.002 4.29.14c1.005.135 1.585.389 2.008.812c.423.423.677 1.003.812 2.009c.138 1.028.14 2.382.14 4.289c0 1.907-.002 3.261-.14 4.29c-.135 1.005-.389 1.585-.812 2.008c-.423.423-1.003.677-2.009.812c-1.027.138-2.382.14-4.289.14h-4c-1.907 0-3.261-.002-4.29-.14c-1.005-.135-1.585-.389-2.008-.812c-.423-.423-.677-1.003-.812-2.009c-.138-1.028-.14-2.382-.14-4.289c0-1.907.002-3.261.14-4.29c.135-1.005.389-1.585.812-2.008Z" clip-rule="evenodd" />
                  </g>
                </svg>
                <i data-toggle-password="password1" class=" right-icon clickable-eye"><iconify-icon icon="gridicons:visible"></iconify-icon></i>
              </div>
            </div>
            <label for="password">Password Baru</label>
            <div class="form-group">
              <div class="custom-input">
                <input id="password2" class="form-control" type="password" placeholder="Password Baru" name="password2" />
                <svg class="left-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                  <g fill="currentColor">
                    <path d="M12.75 10a.75.75 0 0 0-1.5 0v.701l-.607-.35a.75.75 0 0 0-.75 1.298l.607.35l-.607.351a.75.75 0 1 0 .75 1.3l.607-.351V14a.75.75 0 0 0 1.5 0v-.7l.607.35a.75.75 0 0 0 .75-1.3L13.5 12l.607-.35a.75.75 0 0 0-.75-1.3l-.607.35V10Zm-6.017-.75a.75.75 0 0 1 .75.75v.7l.606-.35a.75.75 0 0 1 .75 1.3l-.607.35l.607.35a.75.75 0 1 1-.75 1.3l-.606-.35v.7a.75.75 0 0 1-1.5 0v-.701l-.608.35a.75.75 0 0 1-.75-1.298L5.232 12l-.607-.35a.75.75 0 1 1 .75-1.3l.608.351V10a.75.75 0 0 1 .75-.75Zm11.285.75a.75.75 0 0 0-1.5 0v.701l-.607-.35a.75.75 0 0 0-.75 1.298l.607.35l-.608.351a.75.75 0 0 0 .75 1.3l.608-.351V14a.75.75 0 0 0 1.5 0v-.7l.607.35a.75.75 0 0 0 .75-1.3l-.607-.35l.607-.35a.75.75 0 0 0-.75-1.3l-.607.35V10Z" />
                    <path fill-rule="evenodd" d="M9.944 3.25c-1.838 0-3.294 0-4.433.153c-1.172.158-2.121.49-2.87 1.238c-.748.749-1.08 1.698-1.238 2.87c-.153 1.14-.153 2.595-.153 4.433v.112c0 1.838 0 3.294.153 4.433c.158 1.172.49 2.121 1.238 2.87c.749.748 1.698 1.08 2.87 1.238c1.14.153 2.595.153 4.433.153h4.112c1.838 0 3.294 0 4.433-.153c1.172-.158 2.121-.49 2.87-1.238c.748-.749 1.08-1.698 1.238-2.87c.153-1.14.153-2.595.153-4.433v-.112c0-1.838 0-3.294-.153-4.433c-.158-1.172-.49-2.121-1.238-2.87c-.749-.748-1.698-1.08-2.87-1.238c-1.14-.153-2.595-.153-4.433-.153H9.944ZM3.702 5.702c.423-.423 1.003-.677 2.009-.812c1.028-.138 2.382-.14 4.289-.14h4c1.907 0 3.262.002 4.29.14c1.005.135 1.585.389 2.008.812c.423.423.677 1.003.812 2.009c.138 1.028.14 2.382.14 4.289c0 1.907-.002 3.261-.14 4.29c-.135 1.005-.389 1.585-.812 2.008c-.423.423-1.003.677-2.009.812c-1.027.138-2.382.14-4.289.14h-4c-1.907 0-3.261-.002-4.29-.14c-1.005-.135-1.585-.389-2.008-.812c-.423-.423-.677-1.003-.812-2.009c-.138-1.028-.14-2.382-.14-4.289c0-1.907.002-3.261.14-4.29c.135-1.005.389-1.585.812-2.008Z" clip-rule="evenodd" />
                  </g>
                </svg>
                <i data-toggle-password="password2" class=" right-icon clickable-eye"><iconify-icon icon="gridicons:visible"></iconify-icon></i>
              </div>
            </div>
            <label for="password">Konfirmasi Password Baru</label>
            <div class="form-group">
              <div class="custom-input">
                <input id="password3" class="form-control" type="password" placeholder="Konfirmasi Password" name="password3" />
                <svg class="left-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                  <g fill="currentColor">
                    <path d="M12.75 10a.75.75 0 0 0-1.5 0v.701l-.607-.35a.75.75 0 0 0-.75 1.298l.607.35l-.607.351a.75.75 0 1 0 .75 1.3l.607-.351V14a.75.75 0 0 0 1.5 0v-.7l.607.35a.75.75 0 0 0 .75-1.3L13.5 12l.607-.35a.75.75 0 0 0-.75-1.3l-.607.35V10Zm-6.017-.75a.75.75 0 0 1 .75.75v.7l.606-.35a.75.75 0 0 1 .75 1.3l-.607.35l.607.35a.75.75 0 1 1-.75 1.3l-.606-.35v.7a.75.75 0 0 1-1.5 0v-.701l-.608.35a.75.75 0 0 1-.75-1.298L5.232 12l-.607-.35a.75.75 0 1 1 .75-1.3l.608.351V10a.75.75 0 0 1 .75-.75Zm11.285.75a.75.75 0 0 0-1.5 0v.701l-.607-.35a.75.75 0 0 0-.75 1.298l.607.35l-.608.351a.75.75 0 0 0 .75 1.3l.608-.351V14a.75.75 0 0 0 1.5 0v-.7l.607.35a.75.75 0 0 0 .75-1.3l-.607-.35l.607-.35a.75.75 0 0 0-.75-1.3l-.607.35V10Z" />
                    <path fill-rule="evenodd" d="M9.944 3.25c-1.838 0-3.294 0-4.433.153c-1.172.158-2.121.49-2.87 1.238c-.748.749-1.08 1.698-1.238 2.87c-.153 1.14-.153 2.595-.153 4.433v.112c0 1.838 0 3.294.153 4.433c.158 1.172.49 2.121 1.238 2.87c.749.748 1.698 1.08 2.87 1.238c1.14.153 2.595.153 4.433.153h4.112c1.838 0 3.294 0 4.433-.153c1.172-.158 2.121-.49 2.87-1.238c.748-.749 1.08-1.698 1.238-2.87c.153-1.14.153-2.595.153-4.433v-.112c0-1.838 0-3.294-.153-4.433c-.158-1.172-.49-2.121-1.238-2.87c-.749-.748-1.698-1.08-2.87-1.238c-1.14-.153-2.595-.153-4.433-.153H9.944ZM3.702 5.702c.423-.423 1.003-.677 2.009-.812c1.028-.138 2.382-.14 4.289-.14h4c1.907 0 3.262.002 4.29.14c1.005.135 1.585.389 2.008.812c.423.423.677 1.003.812 2.009c.138 1.028.14 2.382.14 4.289c0 1.907-.002 3.261-.14 4.29c-.135 1.005-.389 1.585-.812 2.008c-.423.423-1.003.677-2.009.812c-1.027.138-2.382.14-4.289.14h-4c-1.907 0-3.261-.002-4.29-.14c-1.005-.135-1.585-.389-2.008-.812c-.423-.423-.677-1.003-.812-2.009c-.138-1.028-.14-2.382-.14-4.289c0-1.907.002-3.261.14-4.29c.135-1.005.389-1.585.812-2.008Z" clip-rule="evenodd" />
                  </g>
                </svg>
                <i data-toggle-password="password3" class=" right-icon clickable-eye"><iconify-icon icon="gridicons:visible"></iconify-icon></i>
              </div>
            </div>
            <div class="update d-flex justify-content-center">
              <button type="submit" class="btn btnupdatedata">Update</button>
            </div>
        </div>
        </form>
      </div>
      <div class="socialform">
        <div class="card" id="social-card">
          <h3 class="text-center">Lihat / Edit Social</h3>
          <form id="update_sosmed" class="form-horizontal">
            <label for="Alamat">Alamat / Domisili</label>
            <div class="form-group">
              <div class="custom-input">
                <input readonly value="<?= $alamat ?>" class="form-control" type="text" placeholder="Alamat" name="alamat" id="alamat" />
                <svg class="left-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 512 512">
                  <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M256 48c-79.5 0-144 61.39-144 137c0 87 96 224.87 131.25 272.49a15.77 15.77 0 0 0 25.5 0C304 409.89 400 272.07 400 185c0-75.61-64.5-137-144-137Z" />
                  <circle cx="256" cy="192" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                </svg>
                <svg onclick="toggleReadonly('alamat')" class="right-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                  <path fill="#cb9224" d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15q.4 0 .775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.138.763t-.437.662L7.25 21H3ZM17.6 7.8L19 6.4L17.6 5l-1.4 1.4l1.4 1.4Z" />
                </svg>
              </div>
            </div>
            <label for="Alamat">Linkedin</label>
            <div class="form-group">
              <div class="custom-input">
                <input readonly value="<?= $linkedin ?>" class="form-control" type="text" placeholder="Linkedin" name="linkedin" id="linkedin" />
                <svg class="left-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                  <path fill="currentColor" d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77Z" />
                </svg>
                <svg onclick="toggleReadonly('linkedin')" class="right-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                  <path fill="#cb9224" d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15q.4 0 .775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.138.763t-.437.662L7.25 21H3ZM17.6 7.8L19 6.4L17.6 5l-1.4 1.4l1.4 1.4Z" />
                </svg>
              </div>
            </div>
            <label for="Alamat">Instagram</label>
            <div class="form-group">
              <div class="custom-input">
                <input readonly value="<?= $instagram ?>" class="form-control" type="text" placeholder="Instagram" name="instagram" id="instagram" />
                <svg class="left-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                  <path fill="currentColor" d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3Z" />
                </svg>
                <svg onclick="toggleReadonly('instagram')" class="right-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                  <path fill="#cb9224" d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15q.4 0 .775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.138.763t-.437.662L7.25 21H3ZM17.6 7.8L19 6.4L17.6 5l-1.4 1.4l1.4 1.4Z" />
                </svg>
              </div>
            </div>
            <label for="Alamat">Facebook</label>
            <div class="form-group">
              <div class="custom-input">
                <input readonly value="<?= $facebook ?>" class="form-control" type="text" placeholder="Facebook" name="facebook" id="facebook" />
                <svg class="left-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                  <path fill="currentColor" d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z" />
                </svg>
                <svg onclick="toggleReadonly('facebook')" class="right-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                  <path fill="#cb9224" d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15q.4 0 .775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.138.763t-.437.662L7.25 21H3ZM17.6 7.8L19 6.4L17.6 5l-1.4 1.4l1.4 1.4Z" />
                </svg>
              </div>
            </div>
            <label for="Alamat">Tiktok</label>
            <div class="form-group">
              <div class="custom-input">
                <input readonly value="<?= $tiktok ?>" class="form-control" type="text" placeholder="Tiktok" name="tiktok" id="tiktok" />
                <svg class="left-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                  <path fill="currentColor" d="M16.6 5.82s.51.5 0 0A4.278 4.278 0 0 1 15.54 3h-3.09v12.4a2.592 2.592 0 0 1-2.59 2.5c-1.42 0-2.6-1.16-2.6-2.6c0-1.72 1.66-3.01 3.37-2.48V9.66c-3.45-.46-6.47 2.22-6.47 5.64c0 3.33 2.76 5.7 5.69 5.7c3.14 0 5.69-2.55 5.69-5.7V9.01a7.35 7.35 0 0 0 4.3 1.38V7.3s-1.88.09-3.24-1.48z" />
                </svg>
                <svg onclick="toggleReadonly('tiktok')" class="right-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                  <path fill="#cb9224" d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15q.4 0 .775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.138.763t-.437.662L7.25 21H3ZM17.6 7.8L19 6.4L17.6 5l-1.4 1.4l1.4 1.4Z" />
                </svg>
              </div>
            </div>

            <label for="Alamat">Instansi Saat ini</label>
            <div class="form-group">
              <div class="custom-input">
                <input readonly value="<?= $instansi ?>" class="form-control" type="text" placeholder="Instansi Saat ini" name="instansi" id="instansi" />
                <svg class="left-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 32 32">
                  <path fill="currentColor" d="m16 3.875l-.438.219L5.563 9L5 9.281V11h22V9.281L26.437 9l-10-4.906zm0 2.25L21.875 9h-11.75zM7 12v10H6v2h20v-2h-1V12h-2v10h-2V12h-2v10h-2V12h-2v10h-2V12h-2v10H9V12zM4 25v2h24v-2z" />
                </svg>
                <svg onclick="toggleReadonly('instansi')" class="right-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                  <path fill="#cb9224" d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15q.4 0 .775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.138.763t-.437.662L7.25 21H3ZM17.6 7.8L19 6.4L17.6 5l-1.4 1.4l1.4 1.4Z" />
                </svg>
              </div>
            </div>
          </form>
          <div class="update d-flex justify-content-center">
            <button onclick="update_sosmed()" class="btn btnupdatedata">Update Data</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>