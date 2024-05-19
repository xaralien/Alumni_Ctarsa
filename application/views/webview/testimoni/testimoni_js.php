<script>
  // Add a click event listener to the button
  var playButtons = document.querySelectorAll('.btn-play');
  playButtons.forEach(function(button) {
    button.addEventListener('click', function() {
      // Get the video URL from the data-video-src attribute
      var videoSrc = this.getAttribute('data-video-src');

      // Update the src attribute of the iframe with the video URL
      document.getElementById('video').src = videoSrc;
    });
  });

  // Add an event listener for when the modal is hidden to stop the video
  $('#videoModal').on('hidden.bs.modal', function () {
    document.getElementById('video').src = '';
  });
</script>

<script>
        // JavaScript to show and hide the modal
        const popup = document.querySelector('.popup');
        const modal = document.getElementById('popupModal');
        const closeBtn = document.getElementById('closePopup');

        popup.addEventListener('click', function() {
            modal.style.display = 'block';
        });

        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });
    </script>