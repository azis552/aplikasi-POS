</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('') }}assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('') }}assets/vendors/chart.js/Chart.min.js"></script>
<script src="{{ asset('') }}assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="{{ asset('') }}assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="{{ asset('') }}assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{ asset('') }}assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('') }}assets/js/off-canvas.js"></script>
<script src="{{ asset('') }}assets/js/hoverable-collapse.js"></script>
<script src="{{ asset('') }}assets/js/misc.js"></script>
<script src="{{ asset('') }}assets/js/settings.js"></script>
<script src="{{ asset('') }}assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('') }}assets/js/dashboard.js"></script>
<!-- End custom js for this page -->

</body>

</html>

<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    function filterFunction() {
        const input = document.getElementById("myInput");
        const filter = input.value.toUpperCase();
        const div = document.getElementById("myDropdown");
        const produk = div.getElementsByClassName("produk");
        for (let i = 0; i < produk.length; i++) {
            txtValue = produk[i].textContent || produk[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                produk[i].style.display = "";
            } else {
                produk[i].style.display = "none";
            }
        }
    }
</script>
