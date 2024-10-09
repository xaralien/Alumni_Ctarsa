  <section class="galeryhead-gallery text-center">
      <div class="wrapper-body">
          <div class="col-lg-12">
              <div class="card-live " data-aos="flip-down">
                  <div class="row col-md-12">
                      <div class="col-md-8 col-sm-12 d-flex justify-content-center align-items-center">
                          <iframe class=" d-flex justify-content-center align-items-center" width="700" height="450" src="https://www.youtube.com/embed/vOADJ_AQY_E?si=SrnLExlV-KhC1MzS" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" style="border-radius: 30px;" allowfullscreen></iframe>
                      </div>
                      <div class="col-md-4 col-sm-12  wrapper-title">
                          <h2 class="judulacara text-md-start text-center">Acara hari ini</h2>
                          <p class=" deksripsiacara  text-md-start text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi
                              rerum ut vero! Nemo culpa, vel eum
                              eveniet ratione, voluptas ullam itaque possimus neque asperiores quisquam in laboriosam?
                              Deserunt,
                              facere natus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio,
                              necessitatibus. Quam repellendus molestias fugiat recusandae qui, quibusdam voluptatibus aliquam
                              maiores, odio minus architecto ipsam vel, deleniti deserunt illum veniam in.</p>


                          <div class="d-flex align-items-center justify-content-center">
                              <div class="col-lg-12 d-grid">
                                  <a href="#about" class="btn btn-primary">Watch now</a>
                              </div>


                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="container-fluid">
      <div class="wrapper-body">
          <div class="row height d-flex justify-content-center align-items-center">

              <div class="col-md-12">

                  <div class="form" id="st">
                      <i class="bi bi-search"></i>
                      <?php if ($this->uri->segment(2) == 'search') { ?>
                          <input type="text" class="form-control form-input" id="search" value="<?php echo $this->input->get('st') ?>">
                      <?php } else { ?>
                          <input type="text" class="form-control form-input" id="search" placeholder="Search anything...">
                      <?php } ?>
                      <span class="left-pan"><i class="fa fa-microphone"></i></span>
                  </div>

              </div>

          </div>
      </div>
      </div>

  </section>

  <section id="portfolio" class="portfolio">
      <div class="wrapper-body" data-aos="fade-up">

          <div class="row" data-aos="fade-up" data-aos-delay="100">
              <div class="col-lg-12 d-flex justify-content-center">
                  <ul id="portfolio-filters">
                      <?php
                        if ($this->input->get('cat') == 'all' || empty($this->input->get('cat'))) { ?>
                          <input type="button" value="All" class="btn filter-information filter-active" id="type0" />
                      <?php } else { ?>
                          <input type="button" value="All" class="btn filter-information" id="type0" />
                      <?php } ?>
                      <?php $i = 1;
                        foreach ($type_gallery as $row) {
                            if ($this->input->get('cat') == $row->name) { ?>
                              <input type="button" class="btn filter-information filter-active" value="<?php echo $row->name ?>" id="type<?php echo $i; ?>" />
                          <?php } else { ?>
                              <input type="button" class="btn filter-information" value="<?php echo $row->name ?>" id="type<?php echo $i; ?>" />
                          <?php }
                            ?>



                      <?php } ?>
                  </ul>
              </div>
          </div>



          <div class="section-title">
              <h2 class="text-center">Gallery</h2>
              <p class="text-center">Check our Photo!</p>
              <p class="text-center">Kenangan Manis Perlu Diabadikan!</p>
          </div>



          <div class="gal-skeleton">
              <div class="gallery-skeleton skeleton">

                  <div class="img"></div>
              </div>
          </div>

          <div class="gallery">


              <?php foreach ($getFile as $gf) { ?>

                  <?php if ($gf->type_file == 'jpeg' || $gf->type_file == 'jpg' || $gf->type_file == 'png' || $gf->type_file == 'JPG' || $gf->type_file == 'PNG') { ?>
                      <div class="gallery-item " onclick="showDetail(<?php echo $gf->id_header ?>)">
                          <figure>
                              <img src="<?php echo $this->ppaatthh . 'gallery/image/' . $gf->file ?>" class="img-fluid" alt="" />
                              <figcaption>

                              </figcaption>
                              <div class="title-galery">
                                  <p><?php echo $gf->title ?></p>
                              </div>
                          </figure>
                      </div>
                  <?php } else if ($gf->type_file == 'mp4' || $gf->type_file == 'mkv' || $gf->type_file == '3gp') { ?>
                      <div class="gallery-item " onclick="showDetail(<?php echo $gf->id_header ?>)">
                          <figure>
                              <video controls>
                                  <source src="<?php echo $this->ppaatthh . 'gallery/video/' . $gf->file ?>" type="video/mp4">
                                  Your browser does not support the video tag.
                              </video>
                              <figcaption>

                              </figcaption>
                              <div class="title-galery">
                                  <p><?php echo $gf->title ?></p>
                              </div>
                          </figure>
                      </div>
                  <?php } else { ?>
                      <div class="gallery-item " onclick="showDetail(<?php echo $gf->id_header ?>)">
                          <figure>
                              <object data="<?php echo $gf->link ?>" type="application/x-shockwave-flash">
                                  <param name="src" value="<?php echo $gf->link ?>" />
                              </object>
                              <!-- <iframe src="<?php echo $gf->link ?>" allowfullscreen></iframe> -->
                              <figcaption>

                              </figcaption>
                              <div class="title-galery">
                                  <p><?php echo $gf->title ?></p>
                              </div>
                          </figure>
                      </div>


              <?php }
                } ?>

          </div>


      </div>
      <div class="wrapper-body d-flex justify-content-center">
          <div class="d-flex justify-content-center">

              <?php echo $pagination; ?>
          </div>
      </div>
  </section>

  <script>
      function showDetail(id) {
          alert(id);
          url = "<?php echo base_url(); ?>gallery/detail/?id=" + id,

              window.location = url
      }
  </script>