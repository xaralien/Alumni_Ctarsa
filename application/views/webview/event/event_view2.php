 <section class="galeryhead-event">

     <div class="blogtext-event wrapper-body text-center ">
         <h1>Event</h1>
         <p class="text-white">Lorem ipsum dolor sit amet, syarat dan ketentuan </p>
         <p class="text-white">Lorem ipsum dolor sit amet consectetur </p>
     </div>
 </section>

 <section>
     <div class="wrapper-body">
         <div class="row height d-flex justify-content-center align-items-center">

             <div class="col-md-6">

                 <div class="form" id="sec">
                     <i class="bi bi-search"></i>


                     <input class="form-control form-input" type="text" id="search" placeholder="Search...">
                     <span class="left-pan"><i class="fa fa-microphone"></i></span>


                 </div>

             </div>

         </div>

     </div>
     </div>
 </section>

 <section>

     <div class="wrapper-body">
         <div id="calendar_event"></div>


     </div>

     <div class="wrapper-body">
         <div class="row" data-aos="fade-up" data-aos-delay="100">
             <div class="filters col-lg-12 d-flex justify-content-center">
                 <ul id="portfolio-filters">
                     <input type="button" value="All" class="btn filter-event filter-active" id="type0" />
                     <input type="button" value="Coming" class="btn filter-event" id="type1" />
                     <input type="button" value="Done" class="btn filter-event" id="type2" />
                 </ul>
             </div>
         </div>
         <div class="card-arrow">
             <button class="prevbutton-event"><i class="bi bi-chevron-left"></i></button>
             <button class="nextbutton-event"><i class="bi bi-chevron-right"></i></button>
         </div>

         <div class="eventcard">
             <?php foreach ($events as $row) { ?>
                 <div class="card-event" onclick="showDetail(<?php echo ($row->id) ?>)">
                     <div class="row">
                         <div class="col-md-8">
                             <?php
                                $now = date("Y-m-d");
                                if ($now > $row->date_event) { ?>
                                 <p class="headerblog">Done</p>
                             <?php  } else if ($now <= $row->date_event) { ?>
                                 <p class="headerblog">Coming</p>
                             <?php }  ?>

                             <h3 class="headerblog1"><?php echo $row->title; ?> </h3>
                             <h3 class="headerblog3 "><?php echo $row->date_event; ?></h3>
                             <p class="headerblog2"><?php echo substr($row->description, 0, 150) . '...'; ?></p>
                         </div>
                         <div class="col-md-4">
                             <img class="img-fluid" src="<?php echo $this->ppaatthh . 'event/' . $row->thumbnail_image ?>" alt="">
                         </div>
                     </div>
                 </div>
             <?php } ?>





         </div>
     </div>
 </section>


 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 <style>
     .royal-navy .calendar-events {

         background-color: #cb9224 !important;

     }

     .royal-navy .calendar-sidebar {
         background-color: #cb9224 !important;
         -webkit-box-shadow: 5px 0 18px -3px #cb9224;
         box-shadow: 5px 0 18px -3px #cb9224;
     }

     .calendar-inner {
         margin-bottom: 1rem;
         box-shadow: none;
         -webkit-box-shadow: none;
     }

     .evo-calendar {
         background-color: #ffffff;
         border-radius: 25px;
     }

     .royal-navy .calendar-sidebar>span#sidebarToggler {
         padding: 1px 4px;
     }

     .royal-navy th[colspan="7"] {
         color: #cb9224;
     }

     .royal-navy tr.calendar-body .calendar-day .day.calendar-active,
     .royal-navy tr.calendar-body .calendar-day .day.calendar-active:hover {
         border-color: #cb9224;
     }

     .royal-navy tr.calendar-body .calendar-day .day:hover {
         background-color: rgba(203, 146, 36, 0.25);
         color: #cb9224;
     }
 </style>

 <script>
     function showDetail(id) {
         alert(id);
         url = "<?php echo base_url(); ?>Event/detail/?id=" + id,

             window.location = url
     }
 </script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>