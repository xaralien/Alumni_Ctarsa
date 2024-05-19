<script>
  // sort category
  $('#type0,#type1,#type2,#type3').click(function(e) {
    e.preventDefault();
    var value = $(this).val();

    var uri = "<?php echo $this->uri->segment(2); ?>";
    var val_st = $('#search').val();

    //condtion if category have search
    if (uri == 'search') {
      if (value == 'all') {
        url = "<?php echo site_url('gallery/search?st=') ?>" + val_st,
          window.location = url;
      } else {
        url = "<?php echo site_url('gallery/search?st=') ?>" + val_st + '&cat=' + value, //accommodate search and sort category
          window.location = url;
      }
    } else {
      url = "<?php echo site_url('gallery/type?cat=') ?>" + value,
        window.location = url;
    }


  });

  // search
  $(function() {

    $('#st').change(function(e) {
      var value = $(this).find('#search').val();

      var uri = "<?php echo $this->uri->segment(2); ?>";
      var val_tp = "<?php echo $this->input->get('cat'); ?>";

      //condtion if search have category
      if (value == '') {
        url = "<?php echo site_url('gallery') ?>",
          window.location = url;

      } else {

        if (uri == 'type') {
          if (value == 'all') {
            url = "<?php echo site_url('gallery/search?st=') ?>" + value,
              window.location = url;
          } else {
            url = "<?php echo site_url('gallery/search?st=') ?>" + value + '&cat=' + val_tp, //accommodate search and sort category
              window.location = url;
          }
        } else {
          url = "<?php echo site_url('gallery/search?st=') ?>" + value,
            window.location = url;
        }
      }

    });
  });

  //loading skeleton

  const gallerys_skeleton = document.querySelector(".gal-skeleton");
  const gallery_skeleton = document.querySelector(".gallery-skeleton");
  for (let i = 0; i < 6; i++) {
    gallerys_skeleton.append(gallery_skeleton.cloneNode(true));
  }

  document.querySelector(".gallery").style = "visibility: hidden;";


  setTimeout(() => {
    document.querySelector(".gal-skeleton").style = "visibility: hidden;";
    document.querySelector(".gallery").style = "display: block;";


    gallerys_skeleton.style = "display: none;";
  }, 4000);
</script>

<script>
  $('.popup-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
    },
    callbacks: {
      elementParse: function(item) {
        console.log(item.el[0].className);
        if (item.el[0].className == 'video') {
          item.type = 'iframe',
            item.iframe = {
              patterns: {
                youtube: {
                  index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

                  id: 'v=', // String that splits URL in a two parts, second part should be %id%
                  // Or null - full URL will be returned
                  // Or a function that should return %id%, for example:
                  // id: function(url) { return 'parsed id'; } 

                  src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe. 
                },
                vimeo: {
                  index: 'vimeo.com/',
                  id: '/',
                  src: '//player.vimeo.com/video/%id%?autoplay=1'
                },
                gmaps: {
                  index: '//maps.google.',
                  src: '%id%&output=embed'
                }
              }
            }
        } else {
          item.type = 'image',
            item.tLoading = 'Loading image #%curr%...',
            item.mainClass = 'mfp-img-mobile',
            item.image = {
              tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
            }
        }

      }
    }
  });
</script>