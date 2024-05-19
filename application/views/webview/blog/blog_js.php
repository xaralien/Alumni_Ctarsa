      <!-- <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script> -->
      <script>
          filterSelection("all")
          //   url = "<?php echo site_url('Blog') ?>"

          function filterSelection(c) {

              var x, i;
              x = document.getElementsByClassName("filter-blogs");
              if (c == "all") c = "";
              for (i = 0; i < x.length; i++) {
                  w3RemoveClass(x[i], "show");
                  if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
              }

          }

          //   window.location = url;


          function w3AddClass(element, name) {
              var i, arr1, arr2;
              arr1 = element.className.split(" ");
              arr2 = name.split(" ");
              for (i = 0; i < arr2.length; i++) {
                  if (arr1.indexOf(arr2[i]) == -1) {
                      element.className += " " + arr2[i];
                  }
              }
          }

          function w3RemoveClass(element, name) {
              var i, arr1, arr2;
              arr1 = element.className.split(" ");
              arr2 = name.split(" ");
              for (i = 0; i < arr2.length; i++) {
                  while (arr1.indexOf(arr2[i]) > -1) {
                      arr1.splice(arr1.indexOf(arr2[i]), 1);
                  }
              }
              element.className = arr1.join(" ");
          }
          //   var $grids = $(".left-box").isotope({
          //       itemSelector: '.card-blog',
          //       //   layoutMode: 'fitRows'
          //   });

          //   $(".cat-blog").on("click", function() {
          //       var filterValue = $(this).attr('data-filter');

          //       //   $grids.isotope({
          //       //       filter: filterValue
          //       //   });
          //   })
          //   // Add active class to the current button (highlight it)
          var btnContainer = document.getElementById("portfolio-flters");
          var btns = btnContainer.getElementsByClassName("cat-blog");
          for (var i = 0; i < btns.length; i++) {
              btns[i].addEventListener("click", function() {
                  var current = document.getElementsByClassName("filter-active");
                  current[0].className = current[0].className.replace(" filter-active", "");
                  this.className += " filter-active";
              });
          }
      </script>