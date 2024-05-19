<section class="galeryhead20">
  <div class="blogtext wrapper-body text-center">
    <h1>Testimoni</h1>
    <p>Lorem ipsum dolor sit amet, syarat dan ketentuan</p>
    <p>Lorem ipsum dolor sit amet consectetur</p>
  </div>
</section>

<section class="testimoni">
  <div class="wrapper-body">
    <?php foreach ($testimoni as $t) { ?>
      <div class="card">
        <div class="quote col-md-12 d-flex justify-content-end">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 20 20">
            <path fill="#cb9224" d="M5.315 3.401c-1.61 0-2.916 1.343-2.916 3c0 1.656 1.306 3 2.916 3c2.915 0 .972 5.799-2.916 5.799v1.4c6.939.001 9.658-13.199 2.916-13.199zm8.4 0c-1.609 0-2.915 1.343-2.915 3c0 1.656 1.306 3 2.915 3c2.916 0 .973 5.799-2.915 5.799v1.4c6.938.001 9.657-13.199 2.915-13.199z" />
          </svg>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="image-container">
              <div class="video">
                <img class="card-img-top" src="<?php echo $this->ppaatthh . 'testimoni/' . $t->file ?>" alt="" />
                <button type="button" class="btn-play" data-bs-toggle="modal" data-video-src="<?php echo $t->link ?>" data-bs-target="#videoModal">
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <div class="testim col-md-8">
            <div class="row">
              <div class="judul col-md-5">
                <h2 class="card-title"><?php echo $t->name ?></h2>
              </div>
              <div class="judul1 col-md-7 d-flex align-items-center ">
                <p class="card-text mt-3 pl-2 text-left"><?php echo $t->school_name ?> | <?php echo $t->years ?> | <?php echo $t->ins ?></p>
              </div>
            </div>
            <p class="card-text testi">
              “<?php echo $t->text; ?>”
            </p>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>


  <!-- Modal testimoni -->
  <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- 16:9 aspect ratio -->
          <div class="ratio ratio-16x9">
            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always" allow="autoplay"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>