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
        });


    })
</script>

<script>
    $(document).ready(function() {

        $('#calendar_event').evoCalendar({
            // settingName: myEvents,
            calendarEvents: myEvents,

            theme: 'Royal Navy',
        })

        myEvents = [
            <?php
            $now = date("Y-m-d");
            foreach ($events as $r) {
            ?> {
                    id: "required-id-1",
                    name: "<?php echo $r->title; ?>",
                    date: "<?php echo $r->date_event; ?>",
                    <?php if ($now > $r->date_event) { ?>
                        type: "holiday",
                    <?php } else if ($now <= $r->date_event) { ?>
                        type: "event",
                    <?php } ?>
                    description: "<?php echo substr($r->description, 0, 30) . '...'; ?>"

                },
            <?php } ?>

        ];

        $('#calendar_event').evoCalendar({
            calendarEvents: myEvents,
            theme: 'Royal Navy',
            // todayHighlight: true,


        });
    })
</script>