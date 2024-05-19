<div class="navigation">
    <!-- <div class="wrapper-body">
        <div class="container-fluid"> -->
    <nav class="navbar navbar-expand-lg ">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url('assets/image/logos.png') ?>" class="logo" width="60%"></a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav  ms-auto mb-2 mb-lg-0 " style="margin-right:8rem;">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?php echo base_url('home') ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?php echo base_url('information') ?>">Information</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('event') ?>">Event</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('forum') ?>">Forum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('repository') ?>">Repository</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="<?php echo base_url('gallery') ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gallery
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo base_url('gallery/type?cat=All') ?>">All</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?php echo base_url('gallery/type?cat=Photo') ?>">Foto</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('gallery/type?cat=Video') ?>">Video</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('blog') ?>">Blogs</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('home/#donation') ?>">Donation</a>
                    </li>

                    <!--
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo base_url('home/#donation') ?>" tabindex="-1" aria-disabled="true">Donation</a>
                    </li>
                    -->

                </ul>

                <div class="d-flex align-items-center">
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                    <a href="<?php echo base_url('contactus') ?>" class="btn btn-outline-primary me-3" type="submit" style="width:max-content;">Contact Us</a>
                    <?php if ($this->session->userdata('users_logged_in') == true) { ?>
                        <li class="nav-item dropdown" style="list-style-type: none;">
                            <a class="nav-link dropdown-toggle btn btn-primary" href="<?php echo base_url('gallery') ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4Z" />
                                </svg>
                                <?php
                                if ($this->session->userdata('users_fullname') == null) {
                                    $nama = 'GUEST';
                                } else {
                                    $nama = $this->session->userdata('users_fullname');
                                }

                                $maxCharacters = 5; // Set the maximum number of characters you want to display
                                if (strlen($nama) > $maxCharacters) {
                                    $nama = substr($nama, 0, $maxCharacters);
                                }
                                ?>
                                <!-- <p style="font-size: 12px;margin: 0px;padding: 0px;">Hai, <?= $nama ?></p> -->
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?php echo site_url('UpdateProfile') ?>">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('User/logout') ?>">Logout</a></li>
                            </ul>
                        </li>

                    <?php } else { ?>
                        <li class="nav-item dropdown" style="list-style-type: none;">
                            <a class="nav-link dropdown-toggle btn btn-primary" href="<?php echo base_url('gallery') ?>" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4Z" />
                                </svg>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?php echo site_url('user/login') ?>">Login</a></li>
                                <li><a class="dropdown-item" href="<?php echo site_url('user/signup') ?>">Registrasi</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </div>
            </div>


        </div>
    </nav>
    <!-- </div>
    </div> -->
</div>

<body style="background:#f5f5f5;">


    <script>
        const navbar = document.querySelector(".navbar");
        window.onscroll = () => {
            this.scrollY > 3 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
        }
    </script>