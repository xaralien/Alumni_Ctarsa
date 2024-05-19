<script>
  $(document).ready(function() {



    $('.eventcard').slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      prevArrow: ".prevbutton-event", // Custom previous arrow button
      nextArrow: ".nextbutton-event",
      speed: 300,
      autoplay: true,
      autoplaySpeed: 5000,
      responsive: [{
          breakpoint: 1200,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
          },
        },
        {
          breakpoint: 1008,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            initialSlide: 2,
          },
        },
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
            initialSlide: 0,
          },
        },
        {
          breakpoint: 400,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
          },
        },
        {
          breakpoint: 450,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
          },
        },
        {
          breakpoint: 768, // For iPad Mini
          settings: {
            slidesToShow: 2, // Adjust the number of slides for iPad Mini
            slidesToScroll: 1,
            infinite: true,
          },
        },
      ],
    });

  });

  // var btnContainer = document.getElementById("portfolio-filters");
  // var btns = btnContainer.getElementsByClassName("filter-event");
  // for (var i = 0; i < btns.length; i++) {
  //     btns[i].addEventListener("click", function() {
  //         var current = document.getElementsByClassName("filter-active");
  //         current[0].className = current[0].className.replace(" filter-active", "");
  //         this.className += " filter-active";
  //     });
  // }
</script>

<script>
  $(document).ready(function() {
    // Define myEvents array
    var myEvents = [];

    // AJAX request to get event data
    $.ajax({
      type: 'GET',
      dataType: "JSON",
      url: "<?php echo site_url('event/getDate') ?>",
      success: function(data) {
        // Populate myEvents array with data from the AJAX response
        $.each(data, function(i, eventData) {
          myEvents.push({
            id: eventData.id,
            name: eventData.title,
            date: eventData.date_event,
            type: "event",
            everyYear: false
          });
        });

        // Initialize evoCalendar with myEvents
        $('#calendar_event').evoCalendar({
          calendarEvents: myEvents,
          theme: 'Royal Navy',
          todayHighlight: true
        });
      }
    });
  });

  // var myEvents = [];
  // $.ajax({
  //   type: 'GET',
  //   dataType: "JSON",
  //   url: "<?php echo site_url('event/getDate') ?>",
  //   success: function(data) {
  //     jQuery.each(data, function(i, data) {
  //       // alert(JSON.stringify(data.date_event));
  //       myEvents = [{
  //         id: "required-id-1",
  //         name: "New Year",
  //         date: JSON.stringify(data.date_event),
  //         type: "event",
  //         everyYear: true
  //       }, ];
  //     });
  //   }
  // });
  // $(document).ready(function() {


  //   $('#calendar_event').evoCalendar({
  //     calendarEvents: myEvents,
  //     theme: 'Royal Navy',
  //     todayHighlight: true
  //   });
  // });
  $('#type0,#type1,#type2').click(function(e) {
    e.preventDefault();
    var value = $(this).val();
    var uri = "<?php echo $this->uri->segment(2); ?>";
    var val_se = $('#search').val();

    //condtion if category have search
    if (uri == 'search') {
      if (value == 'All') {
        url = "<?php echo site_url('event/search?se=') ?>" + val_se,
          window.location = url;

      } else {
        url = "<?php echo site_url('event/search?se=') ?>" + val_se + '&ev=' + value, //accommodate search and sort category
          window.location = url;
      }
    } else {
      url = "<?php echo site_url('event/type?ev=') ?>" + value,
        window.location = url;
    }

  });

  // search
  $(function() {

    $('#sec').change(function(e) {
      var value = $(this).find('#search').val();

      //   alert(value);

      var uri = "<?php echo $this->uri->segment(2); ?>";
      var val_e = "<?php echo $this->input->get('ev'); ?>";

      //condtion if search have category
      if (value == '') {
        url = "<?php echo site_url('event') ?>",
          window.location = url;

      } else {

        if (uri == 'type') {
          if (value == 'All') {
            url = "<?php echo site_url('event/search?se=') ?>" + value,
              window.location = url;

          } else {
            url = "<?php echo site_url('event/search?se=') ?>" + value + '&ev=' + val_e, //accommodate search and sort category
              window.location = url;

          }
        } else {
          url = "<?php echo site_url('event/search?se=') ?>" + value,
            window.location = url;

        }
      }

    });
  });
</script>