<!-- DateTimePicker -->
<script src="assets/dist/js/jquery.datetimepicker.full.min.js"></script>

<!-- JS Customs -->
<script>
    // Add active class to the current button (highlight it)
    var header = document.getElementById("toggleNavbar");
        var btns = header.getElementsByClassName("nav-link");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                // links style
                var current = document.getElementsByClassName("active text-lavander fw-bold");        
                if (current.length > 0) { 
                    current[0].className = current[0].className.replace(" active text-lavander fw-bold", "");
                }
                this.className += " active text-lavander fw-bold";
            });
        }

        $(".hellobtn").click(function(){
            alert("Hello, JQuery Work.");
        });
</script>


<!-- Boostrap JS -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- WorkON JS App -->
<script src="assets/dist/js/workon.js"></script>