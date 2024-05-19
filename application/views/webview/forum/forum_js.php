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
    var prev = '<?php echo parse_url($_SERVER['HTTP_REFERER'],PHP_URL_PATH); ?>';
  
        if(prev=='/alumni_ctarsa/forum'){
        $(document).ready(function () {
            // Handler for .ready() called.
            $('html, body').animate({
                scrollTop: $('#what').offset().top
            }, 'slow');
            
        });
    }

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
                        location.reload();
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
                        location.reload();
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


    function showReply(id) {
        // alert(id);
        $('#child_forum')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        // $('.modal-title').text('Edit Poster');

        $.ajax({
            url: "<?php echo site_url('forum/get_reply_ajax') ?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {

                JSON.stringify(data.id);
                // alert(JSON.stringify(data));
                $('#modal-title-rep').text('Reply to ' + data.full_name);

                $('#ket_ret').text(data.reply);
                $('#id_reply_child').val(data.id);



                $('#modal_reply').modal('show');

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    };


    function onDeleteChild(id) {

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary ms-3',
                cancelButton: 'btn btn-outline-primary'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Apakah anda yakin ingin menghapus ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus ',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({
                    url: "<?php echo site_url('forum/delete_child') ?>",
                    type: "POST",
                    data: {
                        id_delete_child: id
                    },
                    dataType: "JSON",
                    beforeSend: function() {
                        // showLoading("Saving data...", "Mohon tunggu");
                    },
                    success: function(data) {
                        if (!data.status) showAlert('Gagal!', data.message.toString().replace(/<[^>]*>/g, ''), 'error');
                        else {
                            swal.fire({
                                customClass: 'slow-animation',
                                icon: 'success',
                                showConfirmButton: false,
                                title: 'Berhasil Menghapus Reply',
                                timer: 1500
                            });
                            location.reload();

                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        swal.fire('Operation Failed!', errorThrown, 'error');

                    },
                    complete: function() {
                        console.log('published job done');
                    }
                });


            }

        })



    }


    function onDeleteReply(id) {

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary ms-3',
                cancelButton: 'btn btn-outline-primary'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Apakah anda yakin ingin menghapus?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus ',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({
                    url: "<?php echo site_url('forum/delete_reply') ?>",
                    type: "POST",
                    data: {
                        id_delete_reply: id
                    },
                    dataType: "JSON",
                    beforeSend: function() {
                        // showLoading("Saving data...", "Mohon tunggu");
                    },
                    success: function(data) {
                        if (!data.status) showAlert('Gagal!', data.message.toString().replace(/<[^>]*>/g, ''), 'error');
                        else {
                            swal.fire({
                                customClass: 'slow-animation',
                                icon: 'success',
                                showConfirmButton: false,
                                title: 'Berhasil Menghapus Reply',
                                timer: 1500
                            });
                            location.reload();
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        swal.fire('Operation Failed!', errorThrown, 'error');

                    },
                    complete: function() {
                        console.log('published job done');
                    }
                });


            }

        })



    }


    function onDeleteThread(id) {

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary ms-3',
                cancelButton: 'btn btn-outline-primary'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Apakah anda yakin ingin menghapus ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus forum',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({
                    url: "<?php echo site_url('forum/delete_thread') ?>",
                    type: "POST",
                    data: {
                        id_delete_thread: id
                    },
                    dataType: "JSON",
                    beforeSend: function() {
                        // showLoading("Saving data...", "Mohon tunggu");
                    },
                    success: function(data) {
                        if (!data.status) showAlert('Gagal!', data.message.toString().replace(/<[^>]*>/g, ''), 'error');
                        else {
                            swal.fire({
                                customClass: 'slow-animation',
                                icon: 'success',
                                showConfirmButton: false,
                                title: 'Berhasil Menghapus Topic',
                                timer: 1500
                            });
                            location.reload();
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        swal.fire('Operation Failed!', errorThrown, 'error');

                    },
                    complete: function() {
                        console.log('published job done');
                    }
                });


            }

        })



    }


    // function showModalThread() {
    //     // alert(id);
    //     $('#add_thread_forum')[0].reset(); // reset form on modals
    //     $('.form-group').removeClass('has-error'); // clear error class
    //     $('.help-block').empty(); // clear error string
    //     // $('.modal-title').text('Edit Poster');

    //     $.ajax({
    //         type: "POST",
    //         dataType: "JSON",
    //         success: function(data) {

    //             JSON.stringify(data.id);
    //             alert(JSON.stringify(data));


    //             $('#id_add_thread').val(data.id);



    //             $('#modal_thread').modal('show');

    //         },
    //         error: function(jqXHR, textStatus, errorThrown) {
    //             alert('Error get data from ajax');
    //         }
    //     });
    // };


    $('#add_topic').on('click', function() {

        $('#modal_thread').modal('show');
    });


    function add_thread() {
        const ttlTextValue = $('#thread_title').val();

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
            url = "<?php echo site_url('forum/save_thread/') ?>";
            var formData = new FormData($("#add_thread_forum")[0]);
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
                            title: 'Berhasil Menambahkan Forum',
                            timer: 1500
                        });
                        location.reload();
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