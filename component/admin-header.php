<nav class="navbar navbar-expand topbar mb-4 static-top shadow navbar-manager -bg-header-admin">
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-search" aria-hidden="true"></i>
            </a>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <?php if (!empty($_SESSION['_userSignedIn'])) {
                        echo $_SESSION['_userSignedIn']->getName();
                    } else {
                        echo "Invalid User";
                    } ?></span>
                <img class="img-profile rounded-circle" src="https://i.ibb.co/n7cQs3B/profile.jpg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu bg-menu-dropdown" aria-labelledby="dropdownMenu">
                <a class="dropdown-item" href="staff-user-info.php"><i class="fa fa-user" aria-hidden="true"></i><span>Đổi thông tin</span></a>
                <button class="dropdown-item" type="button" id="btn-reset-password"><i class="fa fa-unlock-alt"
                                                                                       aria-hidden="true"></i><span>Đổi mật khẩu</span>
                </button>
                <div class="dropdown-divider"></div>
                <div class="dropdown-item theme-switch-wrapper" id="switch-dark-mode">
                    <i class="fa fa-star-half-o" aria-hidden="true"></i><span>Chế độ ban đêm</span>
                    <label class="theme-switch" for="checkbox">
                        <input type="checkbox" id="checkbox"/>
                        <div class="slider round"></div>
                    </label>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Đăng xuất</span></a>
            </div>
        </li>
    </ul>
</nav>
<script>
    //DARK THEME
    const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
    const currentTheme = localStorage.getItem('theme');

    function switchTheme(e) {
        if (e.target.checked) {
            document.documentElement.setAttribute('data-theme', '__dark-mode');
            localStorage.setItem('theme', '__dark-mode');
        } else {
            document.documentElement.setAttribute('data-theme', '__light-mode');
            localStorage.setItem('theme', '__light-mode');
        }
    }

    toggleSwitch.addEventListener('change', switchTheme, false);
    document.documentElement.setAttribute('data-theme', currentTheme);
    if (currentTheme === '__light-mode') {
        toggleSwitch.checked = false;
    } else {
        toggleSwitch.checked = true;
    }
</script>