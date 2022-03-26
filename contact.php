<section class="pt-5 mt-4" id="home startafund">
    <div class="overlay overlay-bg bg-aquamarine"></div>
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
            <div class="main-content-header col-lg-12 col-md-6 p-3 mb-1 align-center">
                <div class="col-lg-8 col-md-4 p-3">
                    <h5 class="card-title text-lavander text-center">Contact Us!</h5>
                    <div class="card col-lg-12 col-lg-6 col-lg-6 p-1 m-0" style="height:70vh">
                        <div class="card-body align-items-center justify-content-center">
                        <div class="contactform-background">
                        <form target="_blank" action="https://formsubmit.co/el/lukifa/abuloyph.citychapels@gmail.com" method="POST">
                            <input type="hidden" name="_next" value="https://abuloy.ph/thankyou.php">
                            <div class="form-row justify-content-center align-items-center col-md-18 mt-0" >
                                <div class="col-lg-12">
                                    <label for="validationCustom01" class="form-label hide"><span class="text-lavander">*</span>Full Name</label>
                                    <input type="text" value="<?php if(isset($_POST['fullname'])) echo $_POST['fullname'];  ?>" name="fullname" class="text-center form-control my-3" id="validationCustom01" placeholder="Full Name*" required>
                                    <div class="invalid-feedback">Full Name is required.</div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="validationDefault02" class="form-label hide"><span class="text-lavander">*</span>Email Address</label>
                                    <input type="text" value="<?php if(isset($_POST['middlename'])) echo $_POST['email'];  ?>" name="email" class="text-center form-control my-3" id="validationDefault02" placeholder="Email Address*">
                                </div>
                                <div class="col-lg-12">
                                    <label for="validationDefault03" class="form-label hide"><span class="text-lavander">*</span>Type Message here...</label>
                                    <textarea style="height:30vh" type="text" value="<?php if(isset($_POST['message'])) echo $_POST['lastname'];  ?>" name="message" class="text-center form-control my-3" id="validationDefault03" placeholder="Write Message here*" required></textarea>
                                </div>
                                <div class="col-md-12 align-center ">
                                    <a href="./index.php?page=thankyou" class="btn btn-lavander text-uppercase align-items-center justify-content-center" style="padding:4px; margin:0px;" type="submit" name="submit">SEND <i class="fas fa-paper-plane"></i>
                                </a>                             
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>                             
            </div>
        </div>
    </div>
</section>