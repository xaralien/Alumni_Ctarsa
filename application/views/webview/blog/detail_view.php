 <!-- <div class="wrapper-blog " style="margin-top:10rem;">
     <div class=" col-lg-12">
         <p class="headerblog">Kategori</p>
         <h1 class="headerblog1">Judul Blog yang Keren Lorem ipsum dolor sit amet consectetur adipiscing</h1>
         <p class="headerblog2">Minggu, 29 Agustus 2023 | Adib Dwi Kusuma</p>
     </div>
 </div> -->
<style>
    .judul img {

    }
</style>

 <section id="blogdetails" class="blog-detail" style="margin-top:10rem;">


     <div class="wrapper-blog">
         <?php foreach ($detail_blog as $d) { ?>
             <div class=" col-lg-12">
                 <p class="headerblog"><?php echo $d->category_name ?></p>
                 <h1 class="headerblog1"><?php echo $d->title ?></h1>
                 <p class="headerblog2"><?php echo $d->date ?> | <?php echo $d->post_by ?> | <i class="bi bi-eye"></i> <?php echo $d->count ?> dilihat</p>
             </div>
             <div class="container-blog" id="desc-blogs">
                 <div class="judul col-lg-12">
                     <?php echo $d->description ?>
                 </div>

             </div>
         <?php } ?>

     </div>

     <div class="wrapper-blog">
         <p class="readmorep">Baca juga </p>
         <div class="bacajuga">
             <?php foreach ($lainnya as $l) { ?>
                 <div class="card-blog single_post" onclick="showDetail(<?php echo $l->id ?>)">
                     <div class="body">
                         <div class="row">
                             <div class="col-md-10">
                                 <div class="col-lg-12 d-flex justify-content-between">
                                     <div class="col-lg-10">
                                         <?php if (strlen($l->title) < 100) { ?>
                                             <h3>
                                                 <a href=""><?php echo $l->title ?></a>
                                             </h3>
                                         <?php } else { ?>
                                             <h3>
                                                 <a href=""><?php echo substr($l->title, 0, 100) . "..." ?></a>
                                             </h3>
                                         <?php } ?>

                                     </div>
                                     <div class="col-lg-2 d-flex justify-content-end">
                                         <p><?php echo $l->date ?></p>
                                     </div>

                                 </div>

                                 <?php if (strlen($l->thumbnail_desc) < 120) { ?>
                                     <p>
                                         <?php echo $l->thumbnail_desc ?>

                                     </p>
                                 <?php } else { ?>
                                     <p>
                                         <?php echo substr($l->thumbnail_desc, 0, 120) . "..." ?>

                                     </p>
                                 <?php } ?>

                             </div>
                             <div class="col-md-2 d-flex justify-content-between">
                                 <div class="img-post">
                                     <img class="d-block img-fluid image-thumbnail" src="<?php echo $this->ppaatthh . 'blog/main/' . $l->thumbnail_image ?>" alt="First slide" />
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
             <?php } ?>
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
     #desc-blogs .judul img {

         border-radius: 20px;
       

     }
 </style>