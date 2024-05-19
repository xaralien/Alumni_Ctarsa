<script>
  $(document).ready(function () {
  $('#uploadButton').on('click', function () {
    $('#fileInput').click(); // Trigger the hidden file input element

    $('#fileInput').on('change', function () {
      var fileInput = document.getElementById('fileInput');
      var file = fileInput.files[0];
      var url;
      url = "<?php echo site_url('UpdateProfile/update_gambar') ?>";

      if (file) {
        var formData = new FormData($("#ganti_gambar")[0]);
        // formData.append('image', file);

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            beforeSend: function() {
                swal.fire("Saving data...");

            },
            success: function(data) {
                /* if(!data.status)alert("ho"); */
                if (!data.status) swal.fire('Gagal menyimpan data', 'error ');
                else {
                    // document.getElementById('PakaianAdat').reset();

                    (JSON.stringify(data));
                    swal.fire({
                        customClass: 'slow-animation',
                        icon: 'success',
                        showConfirmButton: false,
                        title: 'Berhasil Mengganti Avatar',
                        timer: 1500

                    });
                    setTimeout(function() {
                    window.location.reload();
                }, 1500);

                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                swal.fire('Operation Failed!', errorThrown, 'error');
            },
            complete: function() {
                console.log('Editing job done');

            }

        });
      } else {
        $('#status').html('Please select an image to upload.');
      }
    });
  });
});
  function toggleReadonly(inputId) {
  var inputField = document.getElementById(inputId);
  if (inputField.readOnly) {
    // If it's currently readonly, remove the readonly attribute
    inputField.readOnly = false;
  } else {
    // If it's not readonly, add the readonly attribute
    inputField.readOnly = true;
  }
}

  function update_1() {
        id = $('#id_update').val();
        var url;
        url = "<?php echo site_url('updateprofile/update') ?>";

        var formData = new FormData($("#form_update_1")[0]);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            beforeSend: function() {
                swal.fire("Saving data...");

            },
            success: function(data) {
                /* if(!data.status)alert("ho"); */
                if (!data.status) swal.fire('Gagal menyimpan data', 'error ');
                else {
                    // document.getElementById('PakaianAdat').reset();

                    (JSON.stringify(data));
                    swal.fire({
                        customClass: 'slow-animation',
                        icon: 'success',
                        showConfirmButton: false,
                        title: 'Berhasil Mengedit Konten',
                        timer: 1500

                    });
                    setTimeout(function() {
                    window.location.reload();
                }, 1500);

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
    function update_sosmed() {
        // id = $('#id_update').val();
        var url;
        url = "<?php echo site_url('updateprofile/update_sosmed') ?>";

        var formData = new FormData($("#update_sosmed")[0]);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            beforeSend: function() {
                swal.fire("Saving data...");

            },
            success: function(data) {
                /* if(!data.status)alert("ho"); */
                if (!data.status) swal.fire('Gagal menyimpan data', 'error ');
                else {
                    // document.getElementById('PakaianAdat').reset();

                    (JSON.stringify(data));
                    swal.fire({
                        customClass: 'slow-animation',
                        icon: 'success',
                        showConfirmButton: false,
                        title: 'Berhasil Mengedit Konten',
                        timer: 1500

                    });
                    setTimeout(function() {
                    window.location.reload();
                }, 1500);

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
  function setActiveButton(buttonId) {
    // Remove the active-button class from all navigation buttons
    const navigationButtons = document.querySelectorAll(".nav a");
    navigationButtons.forEach((button) => {
      button.classList.remove("active");
    });

    // Add the active-button class to the clicked button
    document.getElementById(buttonId).classList.add("active");
  }

  function changeCard(cardId) {
    // Hide all cards first
    document.getElementById("profile-card").style.display = "none";
    document.getElementById("password-card").style.display = "none";
    document.getElementById("social-card").style.display = "none";

    // Show the card corresponding to the given id
    document.getElementById(cardId).style.display = "block";

    // Store the active card ID in local storage
    localStorage.setItem("activeCard", cardId);
  }

  document.addEventListener("DOMContentLoaded", function() {
    // Retrieve the active card ID from local storage
    const activeCard = localStorage.getItem("activeCard");

    // Set the initially active card or the last active card from local storage
    if (activeCard) {
      changeCard(activeCard);
    } else {
      changeCard("profile-card"); // Default to the profile card
    }

    // Add an event listener to the navigation buttons

    // Click on the "Profile" button
    document
      .getElementById("profile-button")
      .addEventListener("click", function() {
        changeCard("profile-card");
      });

    // Click on the "Password" button
    document
      .getElementById("password-button")
      .addEventListener("click", function() {
        changeCard("password-card");
      });

    // Click on the "Other" button
    document
      .getElementById("social-button")
      .addEventListener("click", function() {
        changeCard("social-card");
      });
  });

  // Function to toggle password visibility
  function togglePasswordVisibility(inputId) {
    const passwordInput = document.getElementById(inputId);
    const togglePasswordButton = document.querySelector(`[data-toggle-password="${inputId}"]`);

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      togglePasswordButton.innerHTML = '<i class="clickeye"><iconify-icon icon="gridicons:not-visible"></iconify-icon></i>';
    } else {
      passwordInput.type = "password";
      togglePasswordButton.innerHTML = '<i class="clickeye"><iconify-icon icon="gridicons:visible"></iconify-icon></i>';
    }
  }

  document.addEventListener("DOMContentLoaded", function () {
    // Add click event listeners to the toggle password buttons
    const togglePasswordButtons = document.querySelectorAll("[data-toggle-password]");
    togglePasswordButtons.forEach(function (button) {
      const targetInputId = button.getAttribute("data-toggle-password");
      button.addEventListener("click", function () {
        togglePasswordVisibility(targetInputId);
      });
    });
  });

</script>