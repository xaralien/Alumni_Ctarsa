<script>
    // $(document).ready(function() {
    //     $("#sort-select").change(function() {
    //         loadPage(1); // Load the first page when sorting changes
    //     });
    //     alert('cobaaa');

    //     function loadPage() {
    //         const selectedOption = $("#sort-select").val();

    //         $.ajax({
    //             type: "POST",
    //             url: "<?php echo base_url(); ?>repository/index", // Update with the actual controller and method
    //             data: {
    //                 sort_option: selectedOption
    //             },
    //             dataType: "html",
    //             success: function(data) {

    //                 if (selectedOption === 'asc-title' || selectedOption === 'desc-title') {
    //                     data.sort((a, b) => {
    //                         if (selectedOption === 'asc-title') {
    //                             return a.title.localeCompare(b.title);
    //                         } else {
    //                             return b.title.localeCompare(a.title);
    //                         }
    //                     });
    //                 } else if (selectedOption === 'asc-newest' || selectedOption === 'desc-newest') {
    //                     data.sort((a, b) => {
    //                         const dateA = new Date(a.date);
    //                         const dateB = new Date(b.date);

    //                         if (selectedOption === 'asc-newest') {
    //                             return dateA - dateB;
    //                         } else {
    //                             return dateB - dateA;
    //                         }
    //                     });
    //                 }
    //                 $("#sorted-data").html(data);
    //             }
    //         });
    //     }

    //     // Initial load
    //     loadPage(1);


    // });

    //download feature
        
    $(document).ready(function () {
    $('#download-button').click(function () {
        
        const fileId = $(this).data('fileid');
        downloadFile(fileId)

        //counting click
        var buttonName = $(this).data('fileid');
                $.post('<?php echo base_url()?>Repository/getCounter', { file: buttonName }, function(response) {
                    // alert(response);
                });

    });

    

  
    function downloadFile(fileId) {
        // Send an AJAX request to fetch the file data
        $.ajax({
            url: '<?php echo base_url()?>Repository/getFileData/' + fileId, // Replace with your controller and method
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // Create a link to download the file
                const link = document.createElement('a');
                link.href = '/temp_alumni/repository/file/' + data.file;
                link.download = data.title;
                link.style.display = 'none';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            },
            error: function (xhr, status, error) {
                console.log('Error:', error);
            }
        });
    }

       
});
//download feature

    $(document).ready(function() {
        $("#sort-select").change(function() {
            const selectedOption = $(this).val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>repository/get_sorted_data", // Update with the actual controller and method
                data: {
                    sort_option: selectedOption
                },
                dataType: "json",
                success: function(data) {
                    // Assuming data is an array of objects with properties like "title" and "date"
                    let sortedData = '';

                    if (selectedOption === 'asc-title' || selectedOption === 'desc-title') {
                        data.sort((a, b) => {
                            if (selectedOption === 'asc-title') {
                                return a.title.localeCompare(b.title);
                            } else {
                                return b.title.localeCompare(a.title);
                            }
                        });
                    } else if (selectedOption === 'asc-newest' || selectedOption === 'desc-newest') {
                        data.sort((a, b) => {
                            const dateA = new Date(a.date);
                            const dateB = new Date(b.date);

                            if (selectedOption === 'asc-newest') {
                                return dateA - dateB;
                            } else {
                                return dateB - dateA;
                            }
                        });
                    }

                    data.forEach(item => {
                        sortedData += '<div>';
                        sortedData += 'Title: ' + item.title + '<br>';
                        sortedData += 'Date: ' + item.date;
                        sortedData += '</div>';
                    });

                    $("#sorted-data").html(sortedData);
                }
            });
        });
    });


    $('.slider-repos').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        dots: false,
        infinite: false,
        arrows: false,
        centerMode: true,
        variableWidth: true,
    });


    const c = document.querySelector('.containers');
    const indexs = Array.from(document.querySelectorAll('.index'));
    let cur = -1;

    const moveContainer = (i) => {
        // Clear classes
        c.className = 'containers';
        void c.offsetWidth; // Reflow
        c.classList.add('open');
        c.classList.add(`i${i + 1}`);
        if (cur > i) {
            c.classList.add('flip');
        }
        cur = i;
    };

    indexs.forEach((index, i) => {
        index.addEventListener('click', (e) => {
            moveContainer(i);
        });
    });

    // Button click event
    const moveButton = document.getElementById('moveButton');
    moveButton.addEventListener('click', () => {
        // Get the next index to move to (cyclically)
        const nextIndex = (cur + 1) % indexs.length;
        moveContainer(nextIndex);
    });

  
</script>