<div class="sidebar col l-2">
    <div class="sidebar-wrap">
        <div class="sidebar__logo">
            <div class="siderbar__logo-toto">
                <a href="/shopG8" class="sidebar__logo-img">
                    <img src="/shopg8/img/logo.jpg">
                </a>
            </div>
        </div>
        <div class="sidebar__extra">
            <div class="sidebar__extra-header">
            <?php if(empty($user)){ ?>
                <a href="http://localhost/shopG8/login.php">
                    <i class="fa-solid fa-user"></i>                            
                </a>
            <?php } else{ ?>
                <a href="http://localhost/shopG8/profile.php">
                    <i class="fa-solid fa-user"></i>                            
                </a>
            <?php } ?>
                <a href="http://localhost/shopG8/user/cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="http://localhost/shopG8/user/history.php"><i class="fa-solid fa-clipboard-list"></i></a>
            </div>
        </div>
        <div class="sidebar__menu">
            <nav>
                <ul class="sidebar__menu-list">
                    <li class="sidebar__menu-item">
                        <a href="/shopg8" class="side__menu-item-link">NEW ARIVALS</a>
                    </li>
                    <li class="sidebar__menu-item">
                        <a href="/shopg8" class="side__menu-item-link">ĐỒ NAM</a>
                    </li>
                    <li class="sidebar__menu-item">
                        <a href="/shopg8" class="side__menu-item-link">ĐỒ NỮ</a>
                    </li>
                    <li class="sidebar__menu-item">
                        <a href="/shopg8" class="side__menu-item-link">ÁO KHOÁC</a>
                    </li>
                    <li class="sidebar__menu-item">
                        <a href="/shopg8" class="side__menu-item-link">PHỤ KIỆN</a>
                    </li>
                    <li class="sidebar__menu-item">
                        <a href="/shopg8" class="side__menu-item-link">CHÍNH SÁCH</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="sidebar__hotline">
            <a href="" class="sidebar__hotline-icon"><i class="fa-solid fa-phone-volume"></i></a>
            <span>0868186485</span>
        </div>
        <div class="sidebar__social">
            <ul class="sidebar__socail-list">
                <li class="sidebar__socail-item">
                    <a href="/shopg8"><i class="fa-brands fa-facebook"></i></a>
                </li>
                    <li class="sidebar__socail-item">
                    <a href="/shopg8"><i class="fa-brands fa-instagram"></i></a>
                </li>
                <li class="sidebar__socail-item">
                    <a href="/shopg8"><i class="fa-brands fa-youtube"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>