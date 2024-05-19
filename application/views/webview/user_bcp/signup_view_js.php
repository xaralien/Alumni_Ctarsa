<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		// document.getElementById('confirm_password').disabled = true;
		// document.getElementById("regis").disabled = true;
	});



	function regis() {
		var url;
		var formData;
		var redirect;
		url = "<?php echo site_url('Autentic/signup') ?>";
		redirect = "<?php echo base_url('user/login') ?>";
		var formData = new FormData($("#formregis")[0]);
		$.ajax({
			url: url,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "JSON",
			beforeSend: function() {
				let timerInterval
				Swal.fire({
					title: 'Processing...',
					html: 'I will close in <b></b> milliseconds.',
					timer: 2000,
					timerProgressBar: true,
					didOpen: () => {
						Swal.showLoading()
						const b = Swal.getHtmlContainer().querySelector('b')
						timerInterval = setInterval(() => {
							b.textContent = Swal.getTimerLeft()
						}, 100)
					},
					willClose: () => {
						clearInterval(timerInterval)
					}
				}).then((result) => {
					/* Read more about handling dismissals below */
					if (result.dismiss === Swal.DismissReason.timer) {
						console.log('I was closed by the timer')
					}
				})
			},
			success: function(data) {
				JSON.stringify(data);
				if (data.status = 'berhasil') {
					swal.fire({
						customClass: 'slow-animation',
						icon: 'success',
						showConfirmButton: false,
						title: 'Berhasil Membuat Akun',
						timer: 3000

					});
					location.href = redirect;
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Operation Failed!', errorThrown, 'error');
			},
			complete: function() {
				console.log('Editing job done');
			}
		});
	}
</script>