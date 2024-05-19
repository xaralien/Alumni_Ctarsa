<section class="informationdetail">
    <div class="wrapper-body">
        <div class="informationdetails">

            <?php foreach ($detail_information as $d) { ?>

                <div class="card">
                    <div class="judul d-flex justify-content-start align-items-center">
                        <p class="card-title "><?php echo $d->category_name ?></p>
                        <h4 class="card-judul ms-3 "><?php echo $d->title ?></h4>
                    </div>
                    <p class="card-date mt-2"><?php echo $d->date ?> | <?php echo $d->post_by ?> | <i class="bi bi-eye pe-1"></i> <?php echo $d->count ?> kali dilihat</p>

                    <div class="d-flex justify-content-center">
                        <img class="blogimg" src="<?php echo $this->ppaatthh . 'information/' . $d->image ?>" alt="" />
                    </div>
                    <div class="desctext">
                        <p><?php echo $d->description ?>
                        </p>

                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</section>

<!--Populer Section -->

<!--Populer Section -->

<section id="carouselExampleControls" class="card-information-carosel">
    <div class="wrapper-body">
        <div class="title-section ">
            <div class="col-lg-12 d-flex justify-content-between">
                <div class="col-lg-6 ">
                    <p>Sedang Populer</p>
                </div>
                <div class="col-lg-6 d-flex justify-content-end ">
                    <button type="button" class="btn btn-primary" onclick="showPopuler()">Lihat Semua</button>

                </div>
            </div>
        </div>


        <div class="carousel">
            <div class="slider carousel-inner">
                <?php foreach ($populer as $p) { ?>
                    <div class="carousel-items me-3" onclick="showDetail(<?php echo $p->id ?>)">
                        <div class="card">
                            <img src="<?php echo $this->ppaatthh . 'information/' . $p->image ?>" class="card-img-information" alt="" />
                            <div class="card-body ">
                                <div class="d-flex justify-content-between">
                                    <p class="title-category"><?php echo $p->category_name ?></p>
                                    <p class="card-title"><?php echo $p->date ?></p>
                                </div>

                                <?php if (strlen($p->title) < 50) { ?>
                                    <p class="card-text">
                                        <?php echo $p->title ?>
                                    </p>
                                <?php } else { ?>
                                    <p class="card-text">
                                        <?php echo substr($p->title, 0, 50) . "..." ?>
                                    </p>
                                <?php } ?>
                                <div class="d-flex justify-content-between">
                                    <a class="seemore" href="">
                                        <p>see more</p>
                                    </a>
                                    <p><i class="bi bi-eye pe-1"></i> <?php echo $p->count ?> kali dilihat</p>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>




            </div>
        </div>
    </div>
</section>


<script>
    function showPopuler() {
        url = "<?php echo base_url('Information/populer_section'); ?>"
        window.location = url
    }

    function showDetail(id) {
        // alert(id);
        url = "<?php echo base_url(); ?>Information/detail/?id=" + id,

            window.location = url
    }
</script>