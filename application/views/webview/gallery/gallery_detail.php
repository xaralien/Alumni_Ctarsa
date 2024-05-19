 <section id="portfolio" class="detail-gallery">
     <div class="container" data-aos="fade-up">
         <?php foreach ($keterangan as $d) { ?>
             <div class="headergalery">
                 <h3><?php echo ($d->title) ?></h3>
                 <p><?php echo ($d->date) ?></p>
             </div>

         <?php } ?>

         <!-- <div class="gal-skeleton">
             <div class="gallery-skeleton skeleton">

                 <div class="img"></div>
             </div>
         </div> -->


         <div class="gallery-detail" id="all_gallery">
             <div class="popup-gallery">

                 <?php foreach ($detail_gallery as $gf) {
                        if (!empty($gf->type_file)) {
                            if ($gf->type_file == 'jpeg' || $gf->type_file == 'jpg' || $gf->type_file == 'png' || $gf->type_file == 'JPG' || $gf->type_file == 'PNG') { ?>
                             <a href="<?php echo $this->ppaatthh . 'gallery/image/' . $gf->file ?>" class="image">
                                 <div class="gallery-item-detail ">
                                     <figure>
                                         <img src="<?php echo $this->ppaatthh . 'gallery/image/' . $gf->file ?>" class="img-fluid" alt="" />
                                         <figcaption>

                                         </figcaption>
                                         <div class="title-galery">
                                             <!-- <p><?php // echo $gf->title 
                                                        ?></p> -->
                                         </div>
                                     </figure>
                                 </div>
                             </a>
                         <?php } else if ($gf->type_file == 'mp4' || $gf->type_file == 'mkv' || $gf->type_file == '3gp') { ?>
                             <a href="<?php echo $this->ppaatthh . 'gallery/video/' . $gf->file ?>" class="video">
                                 <div class="gallery-item-detail ">
                                     <figure>
                                         <video width="500" height="200" controls>
                                             <source src="<?php echo $this->ppaatthh . 'gallery/video/' . $gf->file ?>" type="video/mp4">
                                             Your browser does not support the video tag.
                                         </video>

                                         <div class="title-galery">
                                             <!-- <p><?php //echo $gf->title 
                                                        ?></p> -->
                                         </div>
                                     </figure>
                                 </div>
                             </a>
                         <?php }
                        } else { ?>
                         <div class="gallery-item-detail ">
                             <figure>
                                 <object width="425" height="350" data="<?php echo $gf->link ?>" type="application/x-shockwave-flash">
                                     <param name="src" value="<?php echo $gf->link ?>" />
                                 </object>
                                 <!-- <iframe src="<?php echo $gf->link ?>" allowfullscreen></iframe> -->

                                 <div class="title-galery">
                                     <!-- <p><?php //echo $gf->title 
                                                ?></p> -->
                                 </div>
                             </figure>
                         </div>

                 <?php }
                    } ?>

             </div>
         </div>


         <div class="d-flex justify-content-center">
             <a class="mt-3 mb-3 btn btn-primary " id="button-smore" onclick="toggleText()">Show More</a>
         </div>

         <?php foreach ($keterangan as $k) { ?>
             <div class="descriptext">
                 <p>
                     <?php echo ($k->description) ?>
                 </p>

             </div>
         <?php } ?>
     </div>
 </section>

 <style>
     #all_gallery {
         max-height: 700px;
         overflow: hidden;
         transition: max-height 0.5s ease;


     }

     .expanded {
         background: rgba(245, 245, 245);
     }


     #all_gallery.before::before {
         content: "";
         position: absolute;

         width: 75rem;
         height: 700px;
         background: linear-gradient(to bottom, transparent, rgb(245, 245, 245));
         z-index: 1;


     }

     #all_gallery.changed::before {
         background-color: transparent;
         /* New background color when clicked */
     }

     #button-smore.hidden-button {
         display: none !important;
     }

     /* 
     #button-smore {
         font-size: 18px;
         color: #CB9224;
         text-decoration: underline;
         cursor: pointer;
         font-weight: 500;
     } */
 </style>

 <script>
     const elements = document.getElementById('all_gallery');
     const buttons = document.getElementById('button-smore');


     //  elements.classList.add('befo re');



     function toggleText(e) {
         var element = document.getElementById('all_gallery');
         var button = document.getElementById('button-smore');

         //  element.classList.toggle('before');

         if (element.style.maxHeight) {
             element.style.maxHeight = null;
             button.innerText = 'Show More';


             element.classList.remove('changed');
             //  element.classList.add('before');
             button.classList.remove('hidden_button');






         } else {
             element.style.maxHeight = '100%';
             button.innerText = 'Show Less';
             element.classList.add('changed');
             //  element.classList.remove('before');
             button.classList.remove('hidden_button');







         }
     }
 </script>