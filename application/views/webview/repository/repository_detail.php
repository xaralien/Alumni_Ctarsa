<section class="galeryhead-repository">

    <div class="blogtext wrapper-body text-center ">
        <h1>Repository</h1>
        <p>Temukan berbagai jurnal penelitian yang menarik dan dapatkan</p>
        <p>informasi terbaru tentang bidang ilmu yang diminati</p>
    </div>
</section>

<!-- <section>
    <div class="wrapper-body">
        <div class="row height d-flex justify-content-center align-items-center">

            <div class="col-md-6">

                <div class="form">
                    <i class="bi bi-search"></i>
                    <input type="text" class="form-control form-input" placeholder="Search anything...">
                    <span class="left-pan"><i class="fa fa-microphone"></i></span>
                </div>

            </div>

        </div>

    </div>
    </div>

</section> -->

<section id="repositorydetails" class="repositorydetails">
    <div class="wrapper-body">
        <div class="container-detail">
            <?php foreach ($detail as $d) { ?>
                <div class="row">
                    <div class="leftside my-4 col-lg-4">
                        <img class="img-fluid img-detail" src="<?php echo $this->ppaatthh . 'repository/image/' . $d->thumbnail_image ?>" alt=" " style="width: 80%;">
                    </div>
                    <div class="leftside my-5 ms-3  col-lg-8">
                        <h3 style=" font-weight:700"><?php echo $d->title ?></h3>
                        <p><?php echo $d->author ?></p>
                        <div class="deskripsi d-lg-flex align-items-center ">
                            <div class="rujuk d-flex align-items-center">
                                <p class="me-1 keterangan" style="color:#cb9224; font-weight:700">Dibaca: </p>
                                <p class="me-1 keterangan1"><?php echo $d->count ?> kali</p>
                            </div>
                            <div class="Pagecount d-flex align-items-center">
                                <p class="me-1 keterangan" style="color:#cb9224; font-weight:700">Jumlah Halaman: </p>
                                <p class="me-1 keterangan1"><?php echo $d->page_count ?> halaman</p>
                            </div>
                            <div class="tahun d-flex align-items-center">
                                <p class="me-1 keterangan" style="color:#cb9224; font-weight:700">Tanggal: </p>
                                <p class="me-1 keterangan1"><?php echo $d->date ?></p>
                            </div>
                        </div>
                        <div id="text-element" class="text-element">
                            <p><?php echo $d->description ?></p>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a class="mt-3 mb-3" id="button-smore" onclick="toggleText()">Show More</a>
                        </div>
                        <div class="ineteraksi d-flex">
                            <a type="button" class="btns btn btn-primary me-2" href="<?php echo base_url(); ?>repository/preview/?id=<?php echo $d->id ?>"><i class=" bi bi-book-half"></i>Baca</a>
                            <button class="btns btn btn-primary" id="download-button" data-fileid="<?php echo ($d->id) ?>"><i class="bi bi-download"></i>Unduh</button>
                            <!-- <button type="button" class="btn btn-primary"><i class="bi bi-printer"></i>Cetak</button>
                        <button type="button" class="btn btn-primary"><i class="bi bi-quote"></i>Kutip</button> -->
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>

    <div class="wrapper-body" style="margin-bottom:10rem;">
        <div class="bacajuga col-lg-12">
            <div class="d-flex justify-content-between align-items-center">
                <h5 style="color:#cb9224; font-weight:700">Baca Juga</h5>
                <a type="button" class=" btn btn-primary align-items-center" href="<?php echo base_url('repository') ?>">lihat semua</a>
            </div>
        </div>
        <div class="readmore mt-3 mb-5">
            <div class="d-flex justify-content-center slider-repo">
                <?php foreach ($lainnya as $l) { ?>
                    <div class="card-details " onclick="showDetail(<?php echo $l->id ?>)">
                        <img src=" <?php echo $this->ppaatthh . 'repository/image/' . $l->thumbnail_image ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <?php if (strlen($l->title) < 50) { ?>
                                <h5 class="card-title-book"><?php echo $l->title; ?> </h5>
                            <?php } else { ?>
                                <h5 class="card-title-book"><?php echo substr($l->title, 0, 50) . "..."; ?> </h5>

                            <?php } ?>
                            <?php if (strlen($l->author) < 25) { ?>
                                <p class="card-text"><?php echo $l->author ?></p>
                            <?php } else { ?>
                                <p class="card-text"><?php echo substr($l->author, 0, 25) . "..." ?></p>

                            <?php } ?>
                            <p class="cardview">dibaca <?php echo $l->count; ?> kali</p>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    function showDetail(id) {
        // alert(id);
        url = "<?php echo base_url(); ?>repository/detail/?id=" + id,

            window.location = url
    }

    const elements = document.getElementById('text-element');
    elements.classList.add('before');


    function toggleText(e) {
        var element = document.getElementById('text-element');
        var button = document.getElementById('button-smore');

        element.classList.toggle('before');

        if (element.style.maxHeight) {
            element.style.maxHeight = null;
            button.innerText = 'Show More';


            element.classList.remove('changed');
            element.classList.add('before');





        } else {
            element.style.maxHeight = '100%';
            button.innerText = 'Show Less';
            element.classList.add('changed');
            element.classList.remove('before');






        }
    }
</script>
<style>
    #text-element {
        max-height: 100px;
        overflow: hidden;
        transition: max-height 0.5s ease;


    }

    .expanded {
        background: rgba(255, 255, 255);
    }


    #text-element.before::before {
        content: "";
        position: absolute;

        width: 50rem;
        height: 100px;
        background: linear-gradient(to bottom, transparent, rgb(255, 255, 255));


    }

    #text-element.changed::before {
        background-color: transparent;
        /* New background color when clicked */
    }


    #button-smore {
        font-size: 18px;
        color: #CB9224;
        text-decoration: underline;
        cursor: pointer;
        font-weight: 500;
    }
</style>