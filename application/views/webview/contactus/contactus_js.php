<script>
    function kirimpesan() {
        const ttlThumbnailValue = $('#nama').val();
        const ttlTitleValue = $('#email').val();
        const ttlDescValue = $('#message').val();

        if (!ttlThumbnailValue) {
            // alert('Input is empty. Please fill it out.');
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'File Thumbnail Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlTitleValue) {
            // alert('Input is empty. Please fill it out.');
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Title Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlDescValue) {
            // alert('Input is empty. Please fill it out.');
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Deskripsi Tidak Boleh Kosong',
                timer: 1500
            });
        } else {
            var url;
            var formData;
            url = "<?php echo site_url('contactus/save') ?>";
            var formData = new FormData($("#contactForm")[0]);
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
                            title: 'Berhasil Menambahkan Konten',
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