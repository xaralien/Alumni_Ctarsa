<div class="forum">

    <div class="header-forum ">
        <div class="forum-title">
            <h1 class="text-white text-center">Forum</h1>
            <h1 class="text-white text-center">Alumni SMAU CTARSA FONDATION</h1>

        </div>
    </div>

    <div class="subheader-forum ">
        <div class="wrapper-body">
            <div class="col-lg-12 d-flex justify-content-start subheader-container">
                <div class="col-lg-4 profile-forum">
                    <div class="profile-picture d-flex justify-content-center">
                        <img class="img-fluid profile-image" src="https://d2v5dzhdg4zhx3.cloudfront.net/web-assets/images/storypages/short/linkedin-profile-picture-maker/dummy_image/thumb/004.webp">
                    </div>

                    <div class="profile-info d-flex justify-content-center">
                        <h6 class="text-center">Angelina Christine</h6>
                        <p class="text-center">Alumi 2015</p>

                    </div>
                </div>

                <div class="col-lg-8 mt-5 d-flex nav-button-forum" id="cont-button">
                    <div class="me-3">
                        <a class="btn btn-outline-primary  <?php if ($this->uri->segment(1) == "forum" && $this->uri->segment(2) != "all_forum") {
                                                                echo 'btnnya-active';
                                                            } ?> " href="<?php echo base_url('forum') ?>"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                                <path class="path" d="M21.6673 20.5833V11.375C21.6673 11.2068 21.6282 11.0409 21.5529 10.8905C21.4777 10.7401 21.3685 10.6092 21.234 10.5083L13.6507 4.82082C13.4631 4.68018 13.2351 4.60416 13.0007 4.60416C12.7663 4.60416 12.5382 4.68018 12.3507 4.82082L4.76732 10.5083C4.63277 10.6092 4.52357 10.7401 4.44835 10.8905C4.37314 11.0409 4.33398 11.2068 4.33398 11.375V20.5833C4.33398 20.8706 4.44812 21.1462 4.65129 21.3494C4.85445 21.5525 5.13 21.6667 5.41732 21.6667H9.75065C10.038 21.6667 10.3135 21.5525 10.5167 21.3494C10.7198 21.1462 10.834 20.8706 10.834 20.5833V17.3333C10.834 17.046 10.9481 16.7705 11.1513 16.5673C11.3545 16.3641 11.63 16.25 11.9173 16.25H14.084C14.3713 16.25 14.6469 16.3641 14.85 16.5673C15.0532 16.7705 15.1673 17.046 15.1673 17.3333V20.5833C15.1673 20.8706 15.2815 21.1462 15.4846 21.3494C15.6878 21.5525 15.9633 21.6667 16.2507 21.6667H20.584C20.8713 21.6667 21.1469 21.5525 21.35 21.3494C21.5532 21.1462 21.6673 20.8706 21.6673 20.5833Z" stroke="#CB9224" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>Home
                        </a>
                    </div>

                    <div class="me-3">
                        <a class="btn btn-outline-primary <?php if ($this->uri->segment(2) == "all_forum") {
                                                                echo 'btnnya-active';
                                                            } ?> " href="<?php echo base_url('forum/all_forum') ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="#cb9224" d="M2 16.59L5.59 13H15a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v10.59M2 18H1V6a3 3 0 0 1 3-3h11a3 3 0 0 1 3 3v5a3 3 0 0 1-3 3H6l-4 4m19 2.59V10a2 2 0 0 0-2-2V7a3 3 0 0 1 3 3v12h-1l-4-4H8c-1.24 0-2.3-.75-2.76-1.82l.8-.8C6.21 16.3 7 17 8 17h9.41L21 20.59Z" />
                            </svg>Forum</a>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="body-forum">
        <div class="wrapper-body">
            <div class="col-lg-12 d-flex container-forum">

                <div class="col-lg-9 mt-3">

                    <div class="forum-input mb-5">

                        <div class="col-lg-12  d-flex justify-content-around wrappper-form-input">
                            <div class="col-lg-2 d-flex justify-content-center align-items-center">
                                <div class="card-profile">
                                    <img class="img-fluid profile-image" src="https://d2v5dzhdg4zhx3.cloudfront.net/web-assets/images/storypages/short/linkedin-profile-picture-maker/dummy_image/thumb/004.webp">
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="card-forum">
                                    <div class="container-fluid">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Add Topic for forum..">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-2  d-flex justify-content-center align-items-center">
                                <div class="card-forum ">
                                    <div class="d-flex justify-content-center align-items-center btn-topic">
                                        <button class="btn btn-primary">Add Topic</button>
                                    </div>
                                </div>
                            </div>


                        </div>



                    </div>

                    <!-- filter forum -->
                    <!-- <div class="filter-forum" id="filter-forum">
                        <button class="btn btn-outline-primary btn-filter btnnya-actived me-3">All</button>
                        <button class="btn btn-outline-primary btn-filter  me-3">Newst</button>

                    </div> -->
                    <!-- filter forum -->

                    <div class="card-forum-topic">

                        <!-- card forum user -->
                        <div class="card-topic mb-5">
                            <div class="card-topic-profile d-flex justify-content-between">
                                <div class="profile-user">
                                    <img class="img-fluid topic-profile" src="https://d2v5dzhdg4zhx3.cloudfront.net/web-assets/images/storypages/short/linkedin-profile-picture-maker/dummy_image/thumb/004.webp">
                                    <div class="info-profile">
                                        <h6>Angelina Christine</h6>
                                        <p>Alumni 2015</p>
                                    </div>
                                </div>

                                <div class="card-desc-topic">

                                    <p style="color:#c8c8c8;">11 Oktober 2023 | 10:35pm</p>

                                </div>
                            </div>



                            <div class="card-desc-topic">
                                <div class="container">
                                    <div class="title-topic">
                                        <h5>Kemajuan Teknologi Mendukung Pendidikan Indonesia</h5>
                                    </div>

                                    <div class="desc-topic" style=" border-bottom:1px solid #dadada">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen...</p>


                                    </div>
                                </div>
                            </div>

                            <div class="card-action-topic">
                                <div class="topic-views">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9ZM12 17C10.6739 17 9.40215 16.4732 8.46447 15.5355C7.52678 14.5979 7 13.3261 7 12C7 10.6739 7.52678 9.40215 8.46447 8.46447C9.40215 7.52678 10.6739 7 12 7C13.3261 7 14.5979 7.52678 15.5355 8.46447C16.4732 9.40215 17 10.6739 17 12C17 13.3261 16.4732 14.5979 15.5355 15.5355C14.5979 16.4732 13.3261 17 12 17ZM12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5Z" fill="black" fill-opacity="0.3" />
                                    </svg>
                                    <p>100</p>
                                    <p>views</p>
                                </div>

                                <div class="topic-reply">
                                    <a>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M20 6H19V14C19 14.55 18.55 15 18 15H6V16C6 17.1 6.9 18 8 18H18L22 22V8C22 6.9 21.1 6 20 6ZM17 11V4C17 2.9 16.1 2 15 2H4C2.9 2 2 2.9 2 4V17L6 13H15C16.1 13 17 12.1 17 11Z" fill="black" fill-opacity="0.3" />
                                        </svg>
                                        <p>100</p>
                                        <p>Replies</p>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-topic mb-5">
                            <div class="card-topic-profile d-flex justify-content-between">
                                <div class="profile-user">
                                    <img class="img-fluid topic-profile" src="https://d2v5dzhdg4zhx3.cloudfront.net/web-assets/images/storypages/short/linkedin-profile-picture-maker/dummy_image/thumb/004.webp">
                                    <div class="info-profile">
                                        <h6>Angelina Christine</h6>
                                        <p>Alumni 2015</p>
                                    </div>
                                </div>

                                <div class="card-desc-topic">

                                    <p style="color:#c8c8c8;">11 Oktober 2023 | 10:35pm</p>

                                </div>
                            </div>



                            <div class="card-desc-topic">
                                <div class="container">
                                    <div class="title-topic">
                                        <h5>Kemajuan Teknologi Mendukung Pendidikan Indonesia</h5>
                                    </div>

                                    <div class="desc-topic" style=" border-bottom:1px solid #dadada">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen...</p>


                                    </div>
                                </div>
                            </div>

                            <div class="card-action-topic">
                                <div class="topic-views">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9ZM12 17C10.6739 17 9.40215 16.4732 8.46447 15.5355C7.52678 14.5979 7 13.3261 7 12C7 10.6739 7.52678 9.40215 8.46447 8.46447C9.40215 7.52678 10.6739 7 12 7C13.3261 7 14.5979 7.52678 15.5355 8.46447C16.4732 9.40215 17 10.6739 17 12C17 13.3261 16.4732 14.5979 15.5355 15.5355C14.5979 16.4732 13.3261 17 12 17ZM12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5Z" fill="black" fill-opacity="0.3" />
                                    </svg>
                                    <p>100</p>
                                    <p>views</p>
                                </div>

                                <div class="topic-reply">
                                    <a>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M20 6H19V14C19 14.55 18.55 15 18 15H6V16C6 17.1 6.9 18 8 18H18L22 22V8C22 6.9 21.1 6 20 6ZM17 11V4C17 2.9 16.1 2 15 2H4C2.9 2 2 2.9 2 4V17L6 13H15C16.1 13 17 12.1 17 11Z" fill="black" fill-opacity="0.3" />
                                        </svg>
                                        <p>100</p>
                                        <p>Replies</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- card forum user -->



                        <!-- card log activation user -->
                        <div class="card-topic mb-5 pb-3">
                            <div class="card-topic-profile d-flex justify-content-between">
                                <div class="profile-user">
                                    <img class="img-fluid topic-profile" src="https://d2v5dzhdg4zhx3.cloudfront.net/web-assets/images/storypages/short/linkedin-profile-picture-maker/dummy_image/thumb/004.webp">
                                    <div class="info-profile">
                                        <h6>Angelina Christine</h6>
                                        <p>Alumni 2015</p>
                                    </div>
                                </div>

                                <div class="card-desc-topic">

                                    <p style="color:#c8c8c8;">11 Oktober 2023 | 10:35pm</p>

                                </div>
                            </div>


                            <div class="card-desc-topic">
                                <div class="container">

                                    <div class="desc-topic d-flex ">
                                        <p>Replies for forum</p>
                                        <h6 class="text-dark"><b>"Lowongan Kerja di Singapura"</b></h6>

                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="card-topic mb-5 pb-3">
                            <div class="card-topic-profile d-flex justify-content-between">
                                <div class="profile-user">
                                    <img class="img-fluid topic-profile" src="https://d2v5dzhdg4zhx3.cloudfront.net/web-assets/images/storypages/short/linkedin-profile-picture-maker/dummy_image/thumb/004.webp">
                                    <div class="info-profile">
                                        <h6>Angelina Christine</h6>
                                        <p>Alumni 2015</p>
                                    </div>
                                </div>

                                <div class="card-desc-topic">

                                    <p style="color:#c8c8c8;">11 Oktober 2023 | 10:35pm</p>

                                </div>
                            </div>


                            <div class="card-desc-topic">
                                <div class="container">

                                    <div class="desc-topic d-flex ">
                                        <p>Replies for forum</p>
                                        <h6 class="text-dark"><b>"Lowongan Kerja di Singapura"</b></h6>

                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- card log activation user -->



                    </div>


                </div>


                <div class="col-lg-3 mt-3 ms-3 mb-5">
                    <div class="col-lg-6 card-hot-topic">
                        <div class="heading ">
                            <h3>Hot Topics</h3>
                        </div>

                        <div class="title-hot-topic">
                            <a href="">
                                <h6>SMAU CTARSA Foundation Mengadakan Webinar Mengenai Kemajuan Teknologi</h6>
                                <p><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9ZM12 17C10.6739 17 9.40215 16.4732 8.46447 15.5355C7.52678 14.5979 7 13.3261 7 12C7 10.6739 7.52678 9.40215 8.46447 8.46447C9.40215 7.52678 10.6739 7 12 7C13.3261 7 14.5979 7.52678 15.5355 8.46447C16.4732 9.40215 17 10.6739 17 12C17 13.3261 16.4732 14.5979 15.5355 15.5355C14.5979 16.4732 13.3261 17 12 17ZM12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5Z" fill="black" fill-opacity="0.3" />
                                        </svg></span> 100 <span>views</span></p>
                            </a>
                        </div>

                        <div class="title-hot-topic">
                            <a href="">
                                <h6>SMAU CTARSA Foundation Mengadakan Webinar Mengenai Kemajuan Teknologi</h6>
                                <p><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9ZM12 17C10.6739 17 9.40215 16.4732 8.46447 15.5355C7.52678 14.5979 7 13.3261 7 12C7 10.6739 7.52678 9.40215 8.46447 8.46447C9.40215 7.52678 10.6739 7 12 7C13.3261 7 14.5979 7.52678 15.5355 8.46447C16.4732 9.40215 17 10.6739 17 12C17 13.3261 16.4732 14.5979 15.5355 15.5355C14.5979 16.4732 13.3261 17 12 17ZM12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5Z" fill="black" fill-opacity="0.3" />
                                        </svg></span> 100 <span>views</span></p>
                            </a>
                        </div>

                        <div class="title-hot-topic">
                            <a href="">
                                <h6>SMAU CTARSA Foundation Mengadakan Webinar Mengenai Kemajuan Teknologi</h6>
                                <p><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9ZM12 17C10.6739 17 9.40215 16.4732 8.46447 15.5355C7.52678 14.5979 7 13.3261 7 12C7 10.6739 7.52678 9.40215 8.46447 8.46447C9.40215 7.52678 10.6739 7 12 7C13.3261 7 14.5979 7.52678 15.5355 8.46447C16.4732 9.40215 17 10.6739 17 12C17 13.3261 16.4732 14.5979 15.5355 15.5355C14.5979 16.4732 13.3261 17 12 17ZM12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5Z" fill="black" fill-opacity="0.3" />
                                        </svg></span> 100 <span>views</span></p>
                            </a>
                        </div>

                    </div>

                    <div class="col-lg-6 mt-4 card-information">
                        <div class="heading ">
                            <h3>Information</h3>
                        </div>

                        <div class="title-information">
                            <a href="">
                                <h6>SMAU CTARSA Foundation Mengadakan Webinar Mengenai Kemajuan Teknologi</h6>
                                <p><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9ZM12 17C10.6739 17 9.40215 16.4732 8.46447 15.5355C7.52678 14.5979 7 13.3261 7 12C7 10.6739 7.52678 9.40215 8.46447 8.46447C9.40215 7.52678 10.6739 7 12 7C13.3261 7 14.5979 7.52678 15.5355 8.46447C16.4732 9.40215 17 10.6739 17 12C17 13.3261 16.4732 14.5979 15.5355 15.5355C14.5979 16.4732 13.3261 17 12 17ZM12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5Z" fill="black" fill-opacity="0.3" />
                                        </svg></span> 100 <span>views</span></p>
                            </a>
                        </div>


                        <div class="title-information">
                            <a href="">
                                <h6>SMAU CTARSA Foundation Mengadakan Webinar Mengenai Kemajuan Teknologi</h6>
                                <p><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9ZM12 17C10.6739 17 9.40215 16.4732 8.46447 15.5355C7.52678 14.5979 7 13.3261 7 12C7 10.6739 7.52678 9.40215 8.46447 8.46447C9.40215 7.52678 10.6739 7 12 7C13.3261 7 14.5979 7.52678 15.5355 8.46447C16.4732 9.40215 17 10.6739 17 12C17 13.3261 16.4732 14.5979 15.5355 15.5355C14.5979 16.4732 13.3261 17 12 17ZM12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5Z" fill="black" fill-opacity="0.3" />
                                        </svg></span> 100 <span>views</span></p>
                            </a>
                        </div>


                        <div class="title-information">
                            <a href="">
                                <h6>SMAU CTARSA Foundation Mengadakan Webinar Mengenai Kemajuan Teknologi</h6>
                                <p><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9ZM12 17C10.6739 17 9.40215 16.4732 8.46447 15.5355C7.52678 14.5979 7 13.3261 7 12C7 10.6739 7.52678 9.40215 8.46447 8.46447C9.40215 7.52678 10.6739 7 12 7C13.3261 7 14.5979 7.52678 15.5355 8.46447C16.4732 9.40215 17 10.6739 17 12C17 13.3261 16.4732 14.5979 15.5355 15.5355C14.5979 16.4732 13.3261 17 12 17ZM12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5Z" fill="black" fill-opacity="0.3" />
                                        </svg></span> 100 <span>views</span></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<script>

</script>