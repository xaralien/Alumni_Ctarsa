 <section class="galeryhead-blog">

     <div class="blogtext wrapper-body text-center ">
         <h1>Blog</h1>
         <p class="text-white">Baca Berbagai Tulisan Informatif, Inspiratif, dan Relevan untuk Anda.</p>
         <p class="text-white">Kami Senang dapat Menjadi Sumber Informasi dan Inspirasi </p>
     </div>
 </section>

 <section>
     <div class="wrapper-body">
         <div class="row height d-flex justify-content-center align-items-center">

             <div class="col-md-6">

                 <!-- <div class="form">
                     <i class="bi bi-search"></i>
                     <input type="text" class="form-control form-input" placeholder="Search anything...">
                     <span class="left-pan"><i class="fa fa-microphone"></i></span>
                 </div> -->

                 <form method="post" class="search-form" action="<?= base_url() ?>Blog/search_blog">

                     <button style="display:none;" value='Submit' name="submit" type="submit"><i><iconify-icon class="search" icon="bytesize:search"></iconify-icon></i></button>

                     <input class="form-control form-input" type="search" id="search" value='<?= $search ?>' name="search" placeholder="Search...">

                     <span class="left-pan"><i class="fa fa-microphone"></i></span>
                 </form>
             </div>

         </div>

     </div>
     </div>

 </section>

 <section id="blog" class="blog" >
     <div id="main-content" class="blog-page">
     </div>
     <div class="wrapper-body">
         <div class="row clearfix">
             <div class="col-lg-8 col-md-12 left-box" style="border-right:1px solid rgba(0, 0, 0, 0.10);">
                 <div class="card-blog single_post">
                     <div class="body">
                         <!-- <div class="cat-blogs d-flex justify-content-start"> -->
                         <div class="col-lg-12 d-flex justify-content-start" style="overflow-x:scroll; overflow-y:hidden;" style data-aos="fade-up" data-aos-delay="100">
                             <div id="portfolio-flters" class=" d-flex justify-content-start cat-blog-card">
                                 <button class="cat-blog filter-active  btn" onclick="filterSelection('all')">All</button>

                                 <?php foreach ($category as $cat) { ?>
                                     <button class="cat-blog btn" onclick="filterSelection('<?php echo $cat->category_name ?>')"><?php echo $cat->category_name ?></button>

                                 <?php } ?>


                             </div>
                         </div>

                         <!-- </div> -->

                     </div>

                 </div>


                 <div class="col-lg-12 d-flex justify-content-start">
                     <h4 class="text-center">
                         <?php
                            $hasil = $search;
                            $uri = $this->uri->segment(3);
                            if ($hasil == NULL) {
                                echo "";
                            } else {
                                if ($uri > 1) {
                                    echo 'Hasil Pencarian "' . $hasil . '"';
                                } else {

                                    echo 'Hasil Pencarian "' . $hasil . '"';
                                }
                            }
                            ?>

                     </h4>
                 </div>

                 <?php foreach ($all_blog as $a) { ?>
                     <div class="card-blog single_post filter-blogs <?php echo $a->category_name ?>" style="border-bottom:1px solid rgba(0, 0, 0, 0.10);" onclick="showDetail(<?php echo  $a->id ?>)" data-aos="zoom-in-left">
                         <div class="body">
                             <div class="row">
                                 <div class="col-md-10">
                                     <div class="col-lg-12 d-flex justify-content-between">
                                         <div class="col-lg-10">
                                             <?php if (strlen($a->title) < 100) { ?>
                                                 <h3>
                                                     <a href="<?php echo base_url() ?>Blog/detail/?id=<?php echo $a->id ?>"><?php echo $a->title ?></a>
                                                 </h3>
                                             <?php } else { ?>
                                                 <h3>
                                                     <a href="<?php echo base_url() ?>Blog/detail/?id=<?php echo $a->id ?>"><?php echo substr($a->title, 0, 100) . "..." ?></a>
                                                 </h3>
                                             <?php } ?>

                                         </div>
                                         <div class="col-lg-2 d-flex justify-content-end">
                                             <p><?php echo $a->date ?></p>
                                         </div>

                                     </div>
                                     <?php if (strlen($a->thumbnail_desc) < 120) { ?>
                                         <p>
                                             <?php echo $a->thumbnail_desc ?>
                                         </p>
                                     <?php } else { ?>
                                         <p>
                                             <?php echo substr($a->thumbnail_desc, 0, 120) . "..." ?>
                                         </p>
                                     <?php } ?>

                                 </div>
                                 <div class="col-md-2 d-flex justify-content-between">
                                     <div class="img-post">
                                         <img class="d-block img-fluid image-thumbnail" src="<?php echo $this->ppaatthh . 'blog/main/' . $a->thumbnail_image ?>" alt="First slide" />
                                     </div>
                                 </div>
                             </div>

                         </div>
                         <div class="footer">
                             <div class="col-lg-12 d-flex justify-content-between ">
                                 <div class="actions d-flex align-items-center">
                                     <h6><a href="javascript:void(0);" class="category-pills" style="width:max-content;"><?php echo $a->category_name ?></a></h6>
                                     <p class=" my-0 mx-3"><?php echo $a->count ?> Kali dilihat</p>
                                 </div>
                                 <div class="action d-flex">
                                     <a href="javascript:void(0);" class="btn "><i class="bi bi-share"></i></a>
                                     <a href="javascript:void(0);" class="btn "><i class="bi bi-three-dots"></i></a>
                                 </div>

                             </div>
                         </div>
                     </div>
                 <?php }
                    if (count($all_blog) == 0) { ?>
                     <h4 class="pt-5 pb-4 text-center"> Tidak Ada Data!</h4>
                 <?php    }
                    ?>



                 <div class="col-lg-12 d-flex justify-content-center " data-aos="zoom-out">
                     <?php echo $pagination; ?>

                 </div>
             </div>



             <div class="col-lg-4 col-md-12 right-box">
                 <div class="card-blog" style="border-bottom:1px solid rgba(0, 0, 0, 0.10);" data-aos="zoom-in-right">
                     <div class="header d-flex ml-2">
                         <h4>Sedang Populer 🔥</h4>
                     </div>
                     <div class="body widget popular-post">
                         <div class="row">
                             <div class="col-lg-12">
                                 <?php foreach ($populer as $p) { ?>
                                     <div class="sidepost" onclick="showDetail(<?php echo  $p->id ?>)">
                                         <div class="single_post d-flex justify-content-between">
                                             <?php if (strlen($p->title) < 30) { ?>
                                                 <p class="m-b-0"><?php echo $p->title ?></p>

                                             <?php } else { ?>
                                                 <p class="m-b-0"><?php echo substr($p->title, 0, 30) . "..." ?></p>

                                             <?php } ?>
                                             <p><i class="bi bi-eye"></i><?php echo $p->count ?></p>
                                         </div>
                                         <div class="img-post">
                                             <?php if (strlen($p->thumbnail_desc) < 40) { ?>
                                                 <p><?php echo $p->thumbnail_desc ?></p>

                                             <?php } else { ?>
                                                 <p><?php echo substr($p->thumbnail_desc, 0, 40) . "..." ?></p>

                                             <?php } ?>
                                         </div>
                                     </div>
                                 <?php } ?>



                             </div>
                         </div>
                     </div>
                 </div>




                 <div class="card-blog" style="border-bottom:1px solid rgba(0, 0, 0, 0.10);" data-aos="zoom-in-right">
                     <div class="header d-flex ml-2">
                         <h4>Terbaru ✨</h4>
                     </div>
                     <div class="body widget popular-post">
                         <div class="row">
                             <div class="col-lg-12">

                                 <?php foreach ($terbaru as $t) { ?>
                                     <div class="sidepost" onclick="showDetail(<?php echo  $t->id ?>)">
                                         <div class="single_post d-flex justify-content-between">
                                             <?php if (strlen($t->title) < 30) { ?>
                                                 <p class="m-b-0"><?php echo $t->title ?></p>

                                             <?php } else { ?>
                                                 <p class="m-b-0"><?php echo substr($t->title, 0, 30) . "..." ?></p>

                                             <?php } ?>
                                             <p><i class="bi bi-eye"></i><?php echo $t->count ?></p>
                                         </div>
                                         <div class="img-post">
                                             <?php if (strlen($t->thumbnail_desc) < 40) { ?>
                                                 <p><?php echo $t->thumbnail_desc ?></p>

                                             <?php } else { ?>
                                                 <p><?php echo substr($t->thumbnail_desc, 0, 40) . "..." ?></p>

                                             <?php } ?>
                                         </div>
                                     </div>
                                 <?php } ?>


                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     </div>
 </section>

 <script>
     function showDetail(id) {
         //  alert(id);
         url = "<?php echo base_url(); ?>Blog/detail/?id=" + id,

             window.location = url
     }
 </script>
 <style>
     .filter-blogs {
         display: none;
     }


     .show {
         display: block;
     }
 </style>