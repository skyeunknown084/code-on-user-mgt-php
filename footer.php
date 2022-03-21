<footer class="page-footer font-small text-blackish bg-aquamarine">
    <div class="container">
        <div class="row pb-3 pt-4">
            <div class="col-md-12">
                <div class="mb-3 flex-center align-center text-lavander">
                    <a class="fb-ic" href="https://www.facebook.com/Abuloy-101224709138256">
                        <i class="fab fa-facebook-f fa-lg text-lavander me-4"> </i>
                    </a>
                    <a class="tw-ic">
                        <i class="fab fa-twitter fa-lg text-lavander me-4"> </i>
                    </a>
                    <a class="gplus-ic">
                        <i class="fab fa-google-plus-g fa-lg text-lavander me-4"> </i>
                    </a>
                    <a class="li-ic">
                        <i class="fab fa-linkedin-in fa-lg text-lavander me-4"> </i>
                    </a>
                    <a class="ins-ic">
                        <i class="fab fa-instagram fa-lg text-lavander me-4"> </i>
                    </a>
                    <a class="pin-ic">
                        <i class="fab fa-pinterest fa-lg text-lavander"> </i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row text-center d-flex justify-content-center pt-3 mb-3 hide">
            <!-- Grid column -->
            <div class="col-md-2 mb-1">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="#!">About us</a>
                </h6>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="#!">Start A Fund</a>
                </h6>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="#!">Donate</a>
                </h6>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="#!">Contact</a>
                </h6>
            </div>
            <!-- Grid column -->
        </div>
        <hr class="rgba-white-light bg-lavender text-white" style="margin: 0 1%;padding:0.5px 0;" />
        <div class="row d-flex text-center justify-content-center mb-md-0 pt-2 pb-4">
            <div class="col-md-10 col-lg-8 col-xl-8 mx-auto mt-4">
                <p>
                <i class="fas fa-map-signs me-3"></i> 
                <a class="text-b-lavander no-style" href="https://www.google.com/maps/place/City+Chapels+-+Sto.+Tomas/@14.1015144,121.1434893,17z/data=!3m1!4b1!4m5!3m4!1s0x33bd658d7dc507ed:0xb487e56f1d1e6831!8m2!3d14.1015092!4d121.145678" target="_blank">City Chapels Inc., General Malvar Avenue, <br>Barangay San Roque, Santo Tomas City, Batangas, Philippines, 4234 </a></p>                   
                <p>
                <i class="fas fa-phone me-3"></i>Phone: +63 (43) 406 4065</p>
                <p>
                <i aria-hidden="true" class="fas fa-mobile me-3"></i>Mobile: +63 (977) 811 3377</p>
                <p>
                <i aria-hidden="true" class="fab fa-viber me-3"></i>Viber: +63 (977) 811 3377</p>
                <p>
                <i aria-hidden="true" class="fab fa-whatsapp me-3"></i>WhatsApp: +63 (977) 811 3377</p>
                <p>
                <i class="fas fa-envelope me-3"></i><a href="mailto:abuloyph.citychapels@gmail.com" class="text-b-lavander no-style"> citychapels@gmail.com</a></p>

            </div>
        </div>
        <hr class="clearfix d-md-none rgba-white-light hide" style="margin: 10% 15% 5%;" />            
    </div>
    <div class="footer-copyright text-center text-white bg-lavander py-3">© 2021 Copyright
        <a href="https://abuloy.ph/" class="text-aquamarine" > <i class="fa fa-heart" aria-hidden="true"></i> Abuloy.ph</a>
    </div>
</footer>

<!-- SweetAlert2 -->
<script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="assets/plugins/toastr/toastr.min.js"></script>
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

    window.start_load = function(){
	    $('body').prepend('<div id="preloader2"></div>')
	}
	window.end_load = function(){
	    $('#preloader2').fadeOut('fast', function() {
	        $(this).remove();
		})
	}
	window.viewer_modal = function($src = ''){
	    start_load()
	    var t = $src.split('.')
	    t = t[1]
	    if(t =='mp4'){
	      var view = $("<video src='"+$src+"' controls autoplay></video>")
	    }else{
	      var view = $("<img src='"+$src+"' />")
	    }
	    $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
	    $('#viewer_modal .modal-content').append(view)
	    $('#viewer_modal').modal({
			show:true,
			backdrop:'static',
			keyboard:false,
			focus:true
		})
		end_load()
	}
	window.uni_modal = function($title = '' , $url='',$size=""){
		start_load()
		$.ajax({
			url:$url,
			error:err=>{
				console.log()
				alert("An error occured")
			},
			success:function(resp){
				if(resp){
					$('#uni_modal .modal-title').html($title)
					$('#uni_modal .modal-body').html(resp)
					if($size != ''){
						$('#uni_modal .modal-dialog').addClass($size)
					}else{
						$('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
					}
					$('#uni_modal').modal({
						show:true,
						backdrop:'static',
						keyboard:false,
						focus:true
					})
					end_load()
				}
			}
		})
	}
	window._conf = function($msg='',$func='',$params = []){
		$('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
		$('#confirm_modal .modal-body').html($msg)
		$('#confirm_modal').modal('show')
	}
	window.alert_toast= function($msg = 'TEST',$bg = 'success' ,$pos=''){
		var Toast = Swal.mixin({
	      	toast: true,
	      	position: $pos || 'top-end',
	      	showConfirmButton: false,
	      	timer: 5000
	    });
		Toast.fire({
	        icon: $bg,
	        title: $msg
		})
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
<!-- <script src="assets/dist/js/demo.js"></script> -->
<script src="assets/dist/js/workon.js"></script>

