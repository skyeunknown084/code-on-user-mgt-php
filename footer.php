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

