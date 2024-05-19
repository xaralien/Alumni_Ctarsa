 <section class="event-detail">
     <div class="wrapper-body">
         <?php foreach ($detail_event as $d) { ?>
             <div class="row">
                 <div class="eventimg col-md-6">
                     <img src="<?php echo $this->ppaatthh . 'event/' . $d->thumbnail_image ?>" alt="">
                 </div>
                 <div class="col-md-6">
                     <?php $now = date("Y-m-d");
                        if ($now > $d->date_event) { ?>
                         <p class="headerblog">Done</p>
                     <?php  } else if ($now <= $d->date_event) { ?>
                         <p class="headerblog">Coming</p>
                     <?php }  ?></p>
                     <h3 class="headerblog1"><?php echo $d->title; ?></h3>
                     <h3 class="headerblog3 "><?php echo $d->date_event; ?></h3>
                     <p class="headerblog2"><?php echo $d->description; ?></p>
                 </div>
             </div>
         <?php } ?>
     </div>
 </section>