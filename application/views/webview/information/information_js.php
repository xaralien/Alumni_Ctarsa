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
        if (uri == 'newest_search') {
            if (value == 'All') {
                url = "<?php echo site_url('information/newest_search?st_n=') ?>" + val_st,
                    window.location = url;
            } else {
                url = "<?php echo site_url('information/newest_search?st_n=') ?>" + val_st + '&cat_n=' + value, //accommodate search and sort category
                    window.location = url;
            }
        } else {
            url = "<?php echo site_url('information/newest_type?cat_n=') ?>" + value,
                window.location = url;
        }



    });

    // search
    $(function() {

        $('#st_ns').change(function(e) {
            var value = $(this).find('#search').val();

            //   alert(value);

            var uri = "<?php echo $this->uri->segment(2); ?>";
            var val_tp = "<?php echo $this->input->get('cat_n'); ?>";

            //condtion if search have category
            if (value == '') {
                url = "<?php echo site_url('information/newest_section') ?>",
                    window.location = url;

            } else {

                if (uri == 'newest_type') {
                    if (value == 'All') {
                        url = "<?php echo site_url('information/newest_search?st_n=') ?>" + value,
                            window.location = url;
                    } else {
                        url = "<?php echo site_url('information/newest_search?st_n=') ?>" + value + '&cat_n=' + val_tp, //accommodate search and sort category
                            window.location = url;
                    }
                } else {
                    url = "<?php echo site_url('information/newest_search?st_n=') ?>" + value,
                        window.location = url;
                }
            }

        });
    });

    // window.addEventListener('load', () => {
    //     let portfolioContainer = select('.portfolio-container');
    //     if (portfolioContainer) {
    //         let portfolioIsotope = new Isotope(portfolioContainer, {
    //             itemSelector: '.portfolio-item',
    //             layoutMode: 'fitRows'
    //         });

    //         let portfolioFilters = select('#portfolio-filters li', true);

    //         on('click', '#portfolio-filters li', function(e) {
    //             e.preventDefault();
    //             portfolioFilters.forEach(function(el) {
    //                 el.classList.remove('filter-active');
    //             });
    //             this.classList.add('filter-active');

    //             portfolioIsotope.arrange({
    //                 filter: this.getAttribute('data-filter')
    //             });
    //             portfolioIsotope.on('arrangeComplete', function() {
    //                 AOS.refresh()
    //             });
    //         }, true);
    //     }

    // });
</script>