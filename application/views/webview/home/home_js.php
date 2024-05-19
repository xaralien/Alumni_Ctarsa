<script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js"></script>
<script>
    // Add a click event listener to the button
    var playButtons = document.querySelectorAll('.btn-play');
    playButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Get the video URL from the data-video-src attribute
            var videoSrc = this.getAttribute('data-video-src');

            // Update the src attribute of the iframe with the video URL
            document.getElementById('video').src = videoSrc;
        });
    });

    // Add an event listener for when the modal is hidden to stop the video
    $('#videoModal').on('hidden.bs.modal', function() {
        document.getElementById('video').src = '';
    });
</script>
<script>
    $(document).ready(function() {


        $('.slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            dots: false,
            infinite: true,
            arrows: false,
            centerMode: true,
            variableWidth: true,
        });

        $(".timeline-content").mouseenter(function() {
            $("#detail-2004").show();
        });

        $('.timeline-content').mouseleave(function() {
            $('#detail-2004').hide();
        });

    });

    (function($) {
        "use strict";

        // Initialize carousel
        function initCarousel() {
            $(".owl-carousel1").owlCarousel({
                loop: true,
                center: true,
                margin: 0,
                responsiveClass: true,
                nav: false,
                dots: true, // Add this line to enable dots navigation
                responsive: {
                    0: {
                        items: 1,
                        nav: false,
                    },
                    680: {
                        items: 2,
                        nav: false,
                        loop: false,
                    },
                    1000: {
                        items: 3,
                        nav: true,
                    },
                },
            });
        }

        // Call initialization function when the document is ready
        $(document).ready(function() {
            initCarousel();
        });
    })(jQuery);
</script>

<script>
 $(".donations").slick({
  slidesToShow: 3.2,
  slidesToScroll: 1,
  speed: 300,
  slidesToShow: 1,
  variableWidth: true,
  initialSlide: 0,
  infinite: false,
  prevArrow: ".prevbutton",
  nextArrow: ".nextbutton",
  responsive: [
    {
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
      breakpoint: 768, // For iPad Mini
      settings: {
        slidesToShow: 2, // Adjust the number of slides for iPad Mini
        slidesToScroll: 1,
        infinite: true,
      },
    },
  ],
});
</script>

<script>
  var text = $(".texts").text(),
  textArr = text.split("");

$(".texts").html("");

$.each(textArr, function (i, v) {
  if (v == " ") {
    $(".texts").append('<span class="space"></span>');
  }
  $(".texts").append("<span>" + v + "</span>");
});
</script>