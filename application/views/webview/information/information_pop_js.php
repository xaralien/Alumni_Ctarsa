<script type="text/javascript">
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




    });


    $('.slick').slick({
        dots: false,
        infinite: true,
        touchThreshold: 100,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        centerMode: true,
        // autoplay: true,
        // autoplaySpeed: 4000,
        centerPadding: '60px',
        prevArrow: ".prevbutton-information", // Custom previous arrow button
        nextArrow: ".nextbutton-information",
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    }).on('afterChange', function() {
        changeActiveBg();
    });





    function changeActiveBg() {
        const activeElement = document.querySelector('.slick-current  .bg');
        const backgroundImage = document.querySelector('#background-image');
        backgroundImage.animate([{
            opacity: 0
        }, {
            opacity: 1
        }], {
            duration: 300,
        });
        backgroundImage.src = activeElement.src
    }

    window.onload = changeActiveBg();
</script>

<script>
    // sort category
    $('#type0,#type1,#type2,#type3,#type4,#type5').click(function(e) {
        e.preventDefault();
        var value = $(this).val();
        // alert(value);
        var uri = "<?php echo $this->uri->segment(2); ?>";
        var val_st = $('#search').val();

        //condtion if category have search
        if (uri == 'popular_search') {
            if (value == 'All') {
                url = "<?php echo site_url('information/popular_search?st_p=') ?>" + val_st,
                    window.location = url;
            } else {
                url = "<?php echo site_url('information/popular_search?st_p=') ?>" + val_st + '&cat_p=' + value, //accommodate search and sort category
                    window.location = url;
            }
        } else {
            url = "<?php echo site_url('information/popular_type?cat_p=') ?>" + value,
                window.location = url;
        }



    });

    // search
    $(function() {

        $('#st_ps').change(function(e) {
            var value = $(this).find('#search').val();

            //   alert(value);

            var uri = "<?php echo $this->uri->segment(2); ?>";
            var val_tp = "<?php echo $this->input->get('cat_p'); ?>";

            //condtion if search have category
            if (value == '') {
                url = "<?php echo site_url('information/populer_section') ?>",
                    window.location = url;

            } else {

                if (uri == 'popular_type') {
                    if (value == 'All') {
                        url = "<?php echo site_url('information/popular_search?st_p=') ?>" + value,
                            window.location = url;
                    } else {
                        url = "<?php echo site_url('information/popular_search?st_p=') ?>" + value + '&cat_p=' + val_tp, //accommodate search and sort category
                            window.location = url;
                    }
                } else {
                    url = "<?php echo site_url('information/popular_search?st_p=') ?>" + value,
                        window.location = url;
                }
            }

        });
    });

    function short_p() {
        var value = $('#sh').val();
        var val_st = $('#search').val();
        var val_tp = "<?php echo $this->input->get('cat_p'); ?>";
        var uri = "<?php echo $this->uri->segment(2); ?>";

        if (uri == 'populer_section') {
            url = "<?php echo site_url('information/populer_section?sh_p=') ?>" + value,
                window.location = url;
        } else if (uri == 'popular_search') {
            if (val_tp == 'All') {
                url = "<?php echo site_url('information/popular_search?st_p=') ?>" + val_st,
                    window.location = url;
            } else {
                url = "<?php echo site_url('information/popular_search?st_p=') ?>" + val_st + '&cat_p=' + val_tp + '&sh_p=' + value, //accommodate search and sort category
                    window.location = url;
            }
        } else if (uri == 'popular_type') {
            if (val_tp == 'All') {
                url = "<?php echo site_url('information/popular_type?sh_p=') ?>" + value,
                    window.location = url;
            } else {
                url = "<?php echo site_url('information/popular_type?sh_p=') ?>" + value + '&cat_p=' + val_tp, //accommodate search and sort category
                    window.location = url;
            }
        } else {
            if (uri == 'popular_type') {
                url = "<?php echo site_url('information/popular_search?st_p=') ?>" + val_st,
                    window.location = url;
            } else if (uri == 'popular_search') {
                url = "<?php echo site_url('information/popular_type?cat_p=') ?>" + val_tp,
                    window.location = url;
            }

        }

    }
</script>

</script>