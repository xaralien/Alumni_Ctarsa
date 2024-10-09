    <div class="hero-information" style="  background-color:transparent;">

        <div class="background-image">
            <img id="background-image" src="" alt="">
        </div>

        <div class="wrapper-body">
            <div class="hero-slider pt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="slick">
                            <?php foreach ($banner as $b) { ?>
                                <div class="item">
                                    <img id="myImg<?php echo $b->id ?>" class="bg" src="<?php echo $this->ppaatthh . 'information/banner/' . $b->thumbnail_image ?>">
                                </div>
                            <?php } ?>



                        </div>
                    </div>
                </div>
            </div>


            <div class="card-arrow-info">
                <button class="prevbutton-information"><i class="bi bi-chevron-left"></i></button>
                <button class="nextbutton-information"><i class="bi bi-chevron-right"></i></button>
            </div>

        </div>


    </div>



    <section id="portfolio" class="portfolio">
        <div class="wrapper-body" data-aos="fade-up">

            <div class="container-search d-flex justify-content-center mb-5">

                <div class="col-lg-10  search-filter d-flex justify-content-center align-items-center">



                    <div class="col-lg-10">

                        <div class="search-bar form" id="st_ns">

                            <svg id="iconnya-search" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32" fill="none">
                                <path d="M24.3333 24.3333L31 31M1 14.3333C1 17.8696 2.40476 21.2609 4.90524 23.7614C7.40573 26.2619 10.7971 27.6667 14.3333 27.6667C17.8696 27.6667 21.2609 26.2619 23.7614 23.7614C26.2619 21.2609 27.6667 17.8696 27.6667 14.3333C27.6667 10.7971 26.2619 7.40573 23.7614 4.90524C21.2609 2.40476 17.8696 1 14.3333 1C10.7971 1 7.40573 2.40476 4.90524 4.90524C2.40476 7.40573 1 10.7971 1 14.3333Z" stroke="black" stroke-opacity="0.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <?php if ($this->uri->segment(2) == 'newest_search') { ?>
                                <input type="text" class="form-control form-input" id="search" value="<?php echo $this->input->get('st_n') ?>">
                            <?php } else { ?>
                                <input class="form-control form-input" type="text" id="search" placeholder="Search...">
                            <?php } ?>

                            <select class="select2 js-example-basic-single custom-select" id="sh" onchange="short_n()">
                                <?php if ($this->input->get('sh_n') == 'popular') { ?>
                                    <option value="new">Terbaru</option>
                                    <option selected="selected" value="popular">Terpopuler</option>
                                <?php } else if ($this->input->get('sh_n') == 'new') { ?>
                                    <option selected="selected" value="new">Terbaru</option>
                                    <option value="popular">Terpopuler</option>
                                <?php } else { ?>
                                    <option value="new">Terbaru</option>
                                    <option value="popular">Terpopuler</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>





                </div>

            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-filters">
                        <!-- <li data-filter="*" class="filter-active"><a class="text-dark" href="<?php // echo base_url('information') 
                                                                                                    ?>">All</a></li> -->
                        <?php
                        if ($this->input->get('cat_n') == 'All' || empty($this->input->get('cat_n'))) { ?>
                            <input type="button" value="All" class="btn filter-information filter-active" id="type0" />
                        <?php } else { ?>
                            <input type="button" value="All" class="btn filter-information" id="type0" />
                        <?php } ?>
                        <?php $i = 1;
                        foreach ($category as $row) {
                            if ($this->input->get('cat_n') == $row->category_name) { ?>
                                <input type="button" class="btn filter-information filter-active" value="<?php echo $row->category_name ?>" id="type<?php echo $i; ?>" />
                            <?php } else { ?>
                                <input type="button" class="btn filter-information" value="<?php echo $row->category_name ?>" id="type<?php echo $i; ?>" />
                            <?php }
                            ?>



                        <?php } ?>


                    </ul>


                </div>
            </div>

            <div class="section-title">
                <h2 class="text-center">Terbaru</h2>
                <p class="text-center">Temukan berbagai Informasi yang penting mengenai hal-hal yang </p>
                <p class="text-center">berkaitan dengan alumni SMAU CTARSA</p>
            </div>

            <div class="informationcard justify-content-center">
                <?php foreach ($all_terbaru as $row) { ?>

                    <div class="card mb-5">
                        <div class="row justify-content-center " onclick="showDetail( <?php echo ($row->id) ?>)" style="cursor:pointer">

                            <div class="col-md-4 justify-content-center">
                                <div class="card-title">
                                    <?php echo ($row->category_name) ?>

                                </div>

                                <?php if (strlen($row->title) < 70) { ?>
                                    <h4> <?php echo ($row->title) ?>
                                    </h4>
                                <?php } else { ?>
                                    <h4> <?php echo substr($row->title, 0, 70) . "..." ?>
                                    </h4>
                                <?php } ?>


                                <p class="card-date"> <?php echo ($row->date) ?> | <i class="bi bi-eye pe-1"></i> <?php echo $row->count ?> kali dilihat</p>

                                <?php if (strlen($row->description) < 350) { ?>
                                    <div> <?php echo preg_replace('/\<[\/]{0,1}div[^\>]*\>/i', '', $row->description) ?></div>

                                <?php } else { ?>
                                    <div> <?php echo substr(preg_replace('/\<[\/]{0,1}div[^\>]*\>/i', '', $row->description), 0, 350) . "..." ?></div>

                                <?php } ?>
                            </div>

                            <div class="col-md-8 d-flex justify-content-end">
                                <a href="<?php echo base_url(); ?>Information/detail/?id=<?php echo $row->id ?>">
                                    <img class="img-fluid image-alumni" src="<?php echo $this->ppaatthh . 'information/' . $row->image ?>" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
    </section>
    <div class="row ">
        <div class="col d-flex justify-content-center">

            <?php echo $pagination; ?>
        </div>
    </div>


    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
    </div>


    <style>
        #iconnya-search {
            position: absolute;
            z-index: 2;
            left: 0;

            margin-left: 2rem;
            margin-top: 1.2rem;
        }

        #search {
            text-align: left;
            padding: 1rem 3rem;
        }

        #sh {
            position: absolute;
            z-index: 2;
            right: 0;
            margin-right: 2rem;
            margin-top: -3rem;
        }

        .hero-information {
            margin-top: 5rem;
            /* margin-bottom: 5rem; */
        }

        .slick .item .bg {
            width: 700px;
            height: 405px;
            object-fit: cover;
            border-radius: 30px;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.80) 32.15%, rgba(78, 102, 113, 0.00) 100%);
            background-position: center;
            background-size: cover;
            transition: .3s;
            margin: 0 -150px;
            opacity: .2;
            -webkit-transform: scale3d(0.8, 0.8, 1);
            transform: scale3d(0.8, 0.8, 1);
            transition: all 0.3s ease-in-out;

        }

        .slick .slick-list {
            padding: 20px 0 !important;
            /* padding-top:20px!important;
	padding-bottom:20px!important; */
        }

        .slick .slick-center .bg {
            opacity: 1;
            -webkit-transform: scale3d(1.0, 1.0, 1);
            transform: scale3d(1.0, 1.0, 1);
        }

        .slick-slide {
            outline: none
        }

        .slick-slide .slick-active .bg {
            margin: 0 30px !important;
        }

        .slick-prev,
        .slick-next {
            position: absolute;
            top: 50%;
            z-index: 1;
        }

        .slick-prev {
            left: 100px;
        }

        .slick-next {
            right: 100px;
        }

        .background-image {
            position: absolute;
            display: flex;
            width: 100vw;
            height: 678.42px;

            /* width: 100%;
            height: 60%; */
            object-fit: cover;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .background-image:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            /* width: 100vw;
            height: 60vh; */
            width: 100vw;
            height: 678.42px;
            object-fit: cover;
            background-color: rgba(255, 255, 255, .6);
            /* height: 100vh; */
            backdrop-filter: blur(10px);
            z-index: 11;
        }

        .background-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all .3s;

        }


        .hero-wrapper {
            width: 100%;
            height: 100vh;
            display: block;
            margin: auto;
            overflow: hidden;
        }

        #myImg {
            /* border-radius: 5px; */
            cursor: pointer;
            /* transition: 0.3s; */
        }


        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1000;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
    </style>


    <script>
        function showDetail(id) {
            url = "<?php echo base_url(); ?>Information/detail/?id=" + id
            window.location = url
        }

        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        <?php foreach ($banner as $b) { ?>
            var img<?php echo $b->id; ?> = document.getElementById("myImg<?php echo $b->id; ?>");
        <?php } ?>

        var modalImg = document.getElementById("img01");

        <?php foreach ($banner as $b) { ?>
            img<?php echo $b->id; ?>.onclick = function() {
                modal.style.display = "block";
                modalImg.src = this.src;
                // captionText.innerHTML = this.alt;
            }
        <?php } ?>

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>