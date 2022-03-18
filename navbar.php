<section class="pt-5" id="">
    
    <div class="collapse navbar-collapse" id="toggleNavbar">
    
        <ul class="navbar-nav ms-auto me-3 flex-right uppercase">                        
                                    
            <li class="nav-item">
                <a class="text-blackish-lavander btn-r-square px-3 nav-link" href="<?php base()?>login">Sign In <span class="sr-only">(Home)</span></a>
            </li>
            <li class="nav-item">
                <a class="text-blackish-lavander btn-r-square px-3 nav-link" href="<?php base()?>register">Start A Fund <span class="sr-only">(Start A Fund)</span></a>
            </li>
            <li class="nav-item">
                <a class="text-blackish-lavander btn-r-square px-3 nav-link" href=".<?php base()?>donees">Donate <span class="sr-only">(Donate)</span></a>
            </li>
            <li class="nav-item">
                <a class="text-blackish-lavander btn-r-square px-3 nav-link" href="<?php base()?>contact">Contact <span class="sr-only">(Contact)</span></a>
            </li>
            <li>
                <span><?php echo ucwords($_SESSION['login_firstname']) ?></span><a class="dropdown-item" href="<?php base()?>logout"><i class="fa fa-power-off"></i> Logout</a>
            </li>
        </ul>
    </div>
</section>