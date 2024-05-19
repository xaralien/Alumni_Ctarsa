<script>
    // Add active class to the current button (highlight it)
    // var header = document.getElementById("cont-button");
    // var btns = header.getElementsByClassName("btn-outline-primary");
    // for (var i = 0; i < btns.length; i++) {
    //     btns[i].addEventListener("click", function() {
    //         var current = document.getElementsByClassName("btnnya-active");
    //         if (current.length > 0) {
    //             current[0].className = current[0].className.replace(" btnnya-active", "");
    //         }
    //         this.className += " btnnya-active";
    //     });
    // }
</script>

<script>
    $(document).ready(function() {

        $(".dropdown-toggle").dropdown();

        // let buttons = $('.note-editor button[data-toggle="dropdown"]');

        // buttons.each((key, value) => {
        //     $(value).on('click', function(e) {
        //         $(this).closest('.note-btn-group').toggleClass('open');
        //     })
        // })



        $('#replyfield').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
    });

    var header1 = document.getElementById("filter-forum");
    var btns1 = header1.getElementsByClassName("btn-outline-primary");
    for (var j = 0; j < btns1.length; j++) {
        btns1[j].addEventListener("click", function() {
            var current1 = document.getElementsByClassName("btnnya-actived");
            if (current1.length > 0) {
                current1[0].className = current1[0].className.replace(" btnnya-actived", "");
            }
            this.className += " btnnya-actived";
        });
    }

    function add_child() {
        const ttlTextValue = $('#Childfield').val();

        if (!ttlTextValue) {
            // alert('Input is empty. Please fill it out.');
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Text Tidak Boleh Kosong',
                timer: 1500
            });
        } else {
            var url;
            var formData;
            url = "<?php echo site_url('forum/add_child/') ?>";
            var formData = new FormData($("#child_forum")[0]);
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                beforeSend: function() {
                    swal.fire({
                        icon: 'info',
                        timer: 3000,
                        showConfirmButton: false,
                        title: 'Loading...'

                    });
                },
                success: function(data) {
                    /* if(!data.status)alert("ho"); */
                    if (!data.status) swal.fire('Gagal menyimpan data', 'error');
                    else {
                        // document.getElementById('rumahadat').reset();
                        (JSON.stringify(data));
                        swal.fire({
                            customClass: 'slow-animation',
                            icon: 'success',
                            showConfirmButton: false,
                            title: 'Berhasil Menambahkan Reply',
                            timer: 1500
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal.fire('Operation Failed!', errorThrown, 'error');
                },
                complete: function() {
                    console.log('Editing job done');
                }
            });
        }
    }

    function add_reply() {
        const ttlTextValue = $('#Repliesfield').val();

        if (!ttlTextValue) {
            // alert('Input is empty. Please fill it out.');
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Text Tidak Boleh Kosong',
                timer: 1500
            });
        } else {
            var url;
            var formData;
            url = "<?php echo site_url('forum/add_reply/') ?>";
            var formData = new FormData($("#reply_form")[0]);
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                beforeSend: function() {
                    swal.fire({
                        icon: 'info',
                        timer: 3000,
                        showConfirmButton: false,
                        title: 'Loading...'

                    });
                },
                success: function(data) {
                    /* if(!data.status)alert("ho"); */
                    if (!data.status) swal.fire('Gagal menyimpan data', 'error');
                    else {
                        // document.getElementById('rumahadat').reset();
                        (JSON.stringify(data));
                        swal.fire({
                            customClass: 'slow-animation',
                            icon: 'success',
                            showConfirmButton: false,
                            title: 'Berhasil Menambahkan Reply',
                            timer: 1500
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal.fire('Operation Failed!', errorThrown, 'error');
                },
                complete: function() {
                    console.log('Editing job done');
                }
            });
        }
    }
</script>