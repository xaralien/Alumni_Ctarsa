<div class="forum">

    <div class="header-forum ">
        <div class="forum-title">
            <h1 class="text-white text-center">Forum</h1>
            <h1 class="text-white text-center">Alumni SMAU CTARSA FONDATION</h1>

        </div>
    </div>



    <div class="body-forum ">
        <div class="wrapper-body">
            <!-- <div class="container-fluid"> -->
            <div class="col-lg-12 d-flex container-forum">
                <div class="col-lg-9 mt-3">

                    <div class="filter-forum">
                        <a class="btn btn-outline-primary btn-filter btnnya-actived me-3" href="<?php echo site_url('forum/all_forum') ?>">Back</a>
                        <!-- <button class="btn btn-outline-primary btn-filter  me-3">Newst</button> -->

                    </div>

                    <div class="card-forum-topic">

                        <!-- detail topic forum  -->
                        <div class="card-topic mb-5 pb-5">
                            <?php if ($threads->avatar == null || $threads->avatar == "") { ?>
                                <div class="card-topic-profile ">
                                    <img class="img-fluid topic-profile" src="<?php echo base_url() ?>assets/avatar_alumni.png">
                                    <div class="info-profile">
                                        <h6><?= $threads->full_name ?></h6>
                                        <p>Alumni <?= $threads->year_graduate ?></p>
                                    </div>



                                </div>
                            <?php } else { ?>
                                <div class="card-topic-profile ">
                                    <img class="img-fluid topic-profile" src="<?php echo $this->ppaatthh . 'user_avatar/' . $threads->avatar ?>">
                                    <div class="info-profile">
                                        <h6><?= $threads->full_name ?></h6>
                                        <p>Alumni <?= $threads->year_graduate ?></p>
                                    </div>



                                </div>
                            <?php } ?>


                            <div class="card-action-topic d-flex justify-content-between">
                                <div class="toggle d-flex">
                                    <div class="topic-views">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9ZM12 17C10.6739 17 9.40215 16.4732 8.46447 15.5355C7.52678 14.5979 7 13.3261 7 12C7 10.6739 7.52678 9.40215 8.46447 8.46447C9.40215 7.52678 10.6739 7 12 7C13.3261 7 14.5979 7.52678 15.5355 8.46447C16.4732 9.40215 17 10.6739 17 12C17 13.3261 16.4732 14.5979 15.5355 15.5355C14.5979 16.4732 13.3261 17 12 17ZM12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5Z" fill="black" fill-opacity="0.3" />
                                        </svg>
                                        <p><?= $threads->count_view ?></p>
                                        <p>views</p>
                                    </div>

                                    <!-- <div class="topic-reply">
                                        <a>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M20 6H19V14C19 14.55 18.55 15 18 15H6V16C6 17.1 6.9 18 8 18H18L22 22V8C22 6.9 21.1 6 20 6ZM17 11V4C17 2.9 16.1 2 15 2H4C2.9 2 2 2.9 2 4V17L6 13H15C16.1 13 17 12.1 17 11Z" fill="black" fill-opacity="0.3" />
                                            </svg>
                                            <p>100</p>
                                            <p>Replies</p>
                                        </a>
                                    </div> -->
                                    <div class="topic-reply">
                                        <a>
                                            <?php
                                            list($date, $time) = explode(" ", $threads->created);

                                            //Changing Date
                                            $timestamp = strtotime($date);
                                            $date = date('d F Y', $timestamp);

                                            //Changing Time
                                            $timestamp = strtotime($time);
                                            $time = date('h:ia', $timestamp);

                                            ?>
                                            <p><?= $date ?> | <?= $time ?> </p>
                                        </a>
                                    </div>
                                </div>
                                <!-- <div class="d-flex justify-content-end mb-3">
                                    <button class="btn btn-primary more-button">show more</button>
                                </div> -->
                            </div>

                            <div class="card-desc-topic">
                                <div class="container cobanii">
                                    <div class="title-topic">
                                        <h5><?= $threads->title ?></h5>
                                    </div>

                                    <div class="desc-topic pb-3" style="border-bottom:1px solid #dadada;">
                                        <?= $threads->thread     ?>
                                    </div>
                                </div>
                            </div>

                            <!-- textfield buat Replies  -->
                            <div class="heading-title-forum mb-5">
                                <!-- <h4>Your Replies</h4> -->

                            </div>

                            <div class="card-topic mb-5">
                                <div class="card-topic-profile ">
                                    <?php
                                    $this->db->select('b.full_name, b.year_graduate, b.avatar');
                                    $this->db->from('_users b');
                                    $this->db->where('b.id', $this->session->userdata('users_id'));
                                    $profileava = $this->db->get()->result();
                                    foreach ($profileava as $pea) { ?>
                                        <?php if ($pea->avatar  == null || $pea->avatar  == "") { ?>
                                            <img class="img-fluid topic-profile" src="<?php echo base_url() ?>assets/avatar_alumni.png">

                                        <?php } else { ?>
                                            <img class="img-fluid topic-profile" src="<?php echo $this->ppaatthh . 'user_avatar/' . $pea->avatar  ?>">

                                        <?php } ?>
                                    <?php } ?>
                                    <div class="info-profile">
                                        <h6><?= $this->session->userdata('users_fullname') ?></h6>
                                        <p>Alumni <?= $this->session->userdata('year_graduate') ?></p>
                                    </div>

                                </div>
                                <form id="reply_form">
                                    <div class="card-desc-topic">
                                        <div class="container">
                                            <input type="hidden" name="id_reply" value="<?= $threads->id ?>">
                                            <div class="desc-topic">
                                                <textarea name="Repliesfield" id="Repliesfield" style="background:#f5f5f5; border:none; border-radius:20px; text-align:left; padding:1rem 2rem; width:100%; "></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                                <div class="card-action-topic d-flex justify-content-end">
                                    <div class="d-flex justify-content-end mb-3">
                                        <button class="btn btn-primary" onclick="add_reply()">Send</button>
                                    </div>

                                </div>



                            </div>
                            <!-- textfield buat Replies  -->


                            <!-- card Replies user lain  -->
                            <div class="heading-title-forum mb-5">
                                <h4 class="text-dark ms-3 mt-2 "><strong><?= $reply_total ?> Replies</strong></h4>

                            </div>


                            <?php foreach ($replys as $r) { ?>
                                <div class="card-topic mb-5" id="what">

                                    <div class="card-topic-profile d-flex justify-content-between">
                                        <?php if ($r->avatar == null || $r->avatar == "") { ?>
                                            <div class="profile-user">
                                                <img class="img-fluid topic-profile" src="<?php echo base_url() ?>assets/avatar_alumni.png">
                                                <div class="info-profile">
                                                    <h6><?= $r->full_name ?></h6>
                                                    <p>Alumni <?= $r->year_graduate ?></p>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="profile-user">
                                                <img class="img-fluid topic-profile" src="<?php echo $this->ppaatthh . 'user_avatar/' . $r->avatar ?>">
                                                <div class="info-profile">
                                                    <h6><?= $r->full_name ?></h6>
                                                    <p>Alumni <?= $r->year_graduate ?></p>
                                                </div>
                                            </div>
                                        <?php } ?>


                                        <div class="card-desc-topic">
                                            <?php
                                            list($datereply, $timereply) = explode(" ", $r->created);

                                            //Changing Date
                                            $timestamp = strtotime($datereply);
                                            $datereply = date('d F Y', $timestamp);

                                            //Changing Time
                                            $timestamp = strtotime($timereply);
                                            $timereply = date('h:ia', $timestamp);

                                            ?>
                                            <p style="color:#c8c8c8;"><?= $datereply ?> | <?= $timereply ?></p>

                                        </div>
                                    </div>


                                    <div class="card-desc-topic">
                                        <div class="container">
                                            <!-- <div class="title-topic">
                                                <h5>Membalas</h5>
                                            </div> -->

                                            <div class="desc-topic" style=" border-bottom:1px solid #dadada">
                                                <?= $r->reply ?>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-action-topic d-flex justify-content-between">
                                        <div class="toggle d-flex">


                                            <div class="topic-reply" style="margin-left:-0.5rem;">
                                                <a>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M20 6H19V14C19 14.55 18.55 15 18 15H6V16C6 17.1 6.9 18 8 18H18L22 22V8C22 6.9 21.1 6 20 6ZM17 11V4C17 2.9 16.1 2 15 2H4C2.9 2 2 2.9 2 4V17L6 13H15C16.1 13 17 12.1 17 11Z" fill="black" fill-opacity="0.3" />
                                                    </svg>
                                                    <!-- COUNTING REPLIES -->
                                                    <?php
                                                    $this->db->select('*');
                                                    $this->db->from('forum_reply_child');
                                                    $this->db->where('active', 1);
                                                    $this->db->where('publish', 1);
                                                    $this->db->where('id_reply',  $r->id);
                                                    $total_child = $this->db->get()->num_rows();                                                    ?>
                                                    <p><?= $total_child ?></p>
                                                    <p>Replies</p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end mb-3 ">
                                            <div class="icon-reply" id="icon-reply" onclick="showReply(<?php echo $r->id ?>)"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
                                                    <path fill="#cb9224" d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822c.984.624 1.99 1.76 2.595 3.876c-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306a7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254a.503.503 0 0 0-.042-.028a.147.147 0 0 1 0-.252a.499.499 0 0 0 .042-.028l3.984-2.933zM7.8 10.386c.068 0 .143.003.223.006c.434.02 1.034.086 1.7.271c1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66c-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z" />
                                                </svg>
                                                Reply</div>


                                            <?php if ($r->created_by == $this->session->userdata('users_id')) { ?>
                                                <div class="icon-delete ms-2" onclick="onDeleteReply(<?php echo $r->id ?>)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                        <path fill="#ffffff" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z" />
                                                    </svg>

                                                </div>
                                            <? } else { ?>
                                            <?php } ?>



                                        </div>

                                    </div>
                                </div>
                                <!-- card Replies user lain  -->
                                <?php if ($total_child != 0) { ?>
                                    <!-- card child reply -->
                                    <!-- GET DATA REPLIES -->
                                    <?php
                                    $this->db->select('a.*, b.full_name, b.year_graduate, b.avatar');
                                    $this->db->from('forum_reply_child a');
                                    $this->db->join('_users b', 'a.created_by=b.id', 'left');
                                    $this->db->where('a.id_reply', $r->id);
                                    $this->db->where('a.active', 1);
                                    $this->db->where('a.publish', 1);
                                    $this->db->order_by('a.created', 'asc');
                                    $child = $this->db->get()->result();

                                    foreach ($child as $c) {
                                    ?>
                                        <div class="card-topic mb-5 ms-5 ">


                                            <div class="card-topic-profile d-flex justify-content-between">

                                                <?php if ($c->avatar == null || $c->avatar == "") { ?>
                                                    <div class="profile-user">
                                                        <img class="img-fluid topic-profile" src="<?php echo base_url() ?>assets/avatar_alumni.png">
                                                        <div class="info-profile">
                                                            <h6><?= $c->full_name ?></h6>
                                                            <p>Alumni <?= $c->year_graduate ?></p>
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="profile-user">
                                                        <img class="img-fluid topic-profile" src="<?php echo $this->ppaatthh . 'user_avatar/' . $c->avatar ?>">
                                                        <div class="info-profile">
                                                            <h6><?= $c->full_name ?></h6>
                                                            <p>Alumni <?= $c->year_graduate ?></p>
                                                        </div>
                                                    </div>
                                                <?php } ?>


                                                <div class="card-desc-topic">

                                                    <?php
                                                    list($datechild, $timechild) = explode(" ", $c->created);

                                                    //Changing Date
                                                    $timestamp = strtotime($datechild);
                                                    $datechild = date('d F Y', $timestamp);

                                                    //Changing Time
                                                    $timestamp = strtotime($timechild);
                                                    $timechild = date('h:ia', $timestamp);

                                                    ?>
                                                    <p style="color:#c8c8c8;"><?= $datechild ?> | <?= $timechild ?></p>

                                                </div>
                                            </div>


                                            <div class="card-desc-topic">
                                                <div class="container">
                                                    <!-- <div class="title-topic">
                                                        <h5>Membalas</h5>
                                                    </div> -->

                                                    <div class="desc-topic" style=" border-bottom:1px solid #dadada">
                                                        <?= $c->reply_child ?>

                                                    </div>

                                                    <div class="d-flex justify-content-end mb-3 ">


                                                        <?php if ($c->created_by == $this->session->userdata('users_id')) { ?>
                                                            <div class="card-action-topic">
                                                                <div class="icon-delete ms-2" onclick="onDeleteChild(<?php echo $c->id ?>)">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                                        <path fill="#ffffff" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z" />
                                                                    </svg>

                                                                </div>
                                                            </div>
                                                        <?php } ?>



                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    <?php } ?>
                                    <!-- card child reply -->
                                <?php } ?>

                                <!-- textfield buat Replies  -->
                                <div class="heading-title-forum mb-5 ">
                                    <!-- <h4>Your Replies</h4> -->

                                </div>
                                <!-- <div class="card-topic mb-5 ms-5">
                                    <div class="card-topic-profile ">
                                        <?php foreach ($data as $d) { ?>
                                            <?php if ($d['avatar'] == null || $d['avatar'] == "") { ?>
                                                <img class="img-fluid topic-profile" src="<?php echo base_url() ?>assets/avatar_alumni.png">

                                            <?php } else { ?>
                                                <img class="img-fluid topic-profile" src="<?php echo $this->ppaatthh . 'user_avatar/' . $d['avatar'] ?>">

                                            <?php } ?>
                                        <?php } ?>
                                        <div class="info-profile">
                                            <h6><?= $this->session->userdata('users_fullname') ?></h6>
                                            <p>Alumni <?= $this->session->userdata('year_graduate') ?></p>
                                        </div>

                                    </div>

                                    <form id="child_forum">
                                        <div class="card-desc-topic">
                                            <div class="container">
                                                <input type="hidden" name="id_reply_child" value="<?php echo $r->id ?>">
                                                <div class="desc-topic">
                                                    <textarea name="Childfield" id="Childfield" style="background:#f5f5f5; border:none; border-radius:20px; text-align:left; padding:1rem 2rem; width:100%; "></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="card-action-topic d-flex justify-content-end">
                                        <div class="d-flex justify-content-end mb-3">
                                            <button class="btn btn-primary" onclick="add_child()">Send</button>
                                        </div>

                                    </div>


                                </div> -->
                                <!-- textfield buat Replies  -->
                            <?php } ?>

                        </div>
                        <!-- detail topic forum  -->






                    </div>

                </div>


                <div class="col-lg-3 mt-3 ms-3 mb-5">
                    <div class="col-lg-6 card-hot-topic">
                        <div class="heading ">
                            <h3>Hot Topics</h3>
                        </div>

                        <?php {
                            $this->db->select('a.*, b.full_name, b.year_graduate, b.avatar,COUNT(DISTINCT c.id) AS countrep, COUNT(DISTINCT d.id) AS countrepchild ');
                            $this->db->from('forum_thread a');
                            $this->db->join('_users b', 'a.created_by=b.id', 'left');
                            $this->db->join('forum_reply c', 'a.id=c.id_thread', 'inner');
                            $this->db->join('forum_reply_child d', 'a.id=d.id_thread', 'inner');
                            $this->db->where('a.active', 1);
                            $this->db->where('a.publish', 1);
                            $this->db->where('c.active', 1);
                            $this->db->where('c.publish', 1);
                            $this->db->where('d.active', 1);
                            $this->db->where('d.publish', 1);
                            $this->db->group_by('a.id, b.full_name, b.year_graduate, b.avatar'); // Include non-aggregated columns in GROUP BY

                            $this->db->limit(4);
                            $hot_topic = $this->db->get()->result();
                        } ?>


                        <?php foreach ($hot_topic  as $ht) { ?>
                            <div class="title-hot-topic" onclick="showDetail(<?php echo $ht->id ?>)">
                                <a href="#">
                                    <h6><?php echo $ht->title ?></h6>
                                    <p><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M20 6H19V14C19 14.55 18.55 15 18 15H6V16C6 17.1 6.9 18 8 18H18L22 22V8C22 6.9 21.1 6 20 6ZM17 11V4C17 2.9 16.1 2 15 2H4C2.9 2 2 2.9 2 4V17L6 13H15C16.1 13 17 12.1 17 11Z" fill="black" fill-opacity="0.3" />
                                            </svg></span> <?php echo $ht->countrep + $ht->countrepchild ?> <span>replies</span></p>
                                </a>
                            </div>
                        <?php } ?>





                    </div>



                    <div class="col-lg-6 mt-4 card-information">
                        <div class="heading ">
                            <h3>Information</h3>
                        </div>

                        <?php foreach ($information as $i) { ?>
                            <div class="title-information" onclick="showInformation(<?php echo $i->id ?>)">
                                <a href="#">
                                    <h6><?php echo $i->title ?></h6>
                                    <p><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9ZM12 17C10.6739 17 9.40215 16.4732 8.46447 15.5355C7.52678 14.5979 7 13.3261 7 12C7 10.6739 7.52678 9.40215 8.46447 8.46447C9.40215 7.52678 10.6739 7 12 7C13.3261 7 14.5979 7.52678 15.5355 8.46447C16.4732 9.40215 17 10.6739 17 12C17 13.3261 16.4732 14.5979 15.5355 15.5355C14.5979 16.4732 13.3261 17 12 17ZM12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5Z" fill="black" fill-opacity="0.3" />
                                            </svg></span> <?php echo $i->count ?> <span>views</span></p>
                                </a>
                            </div>

                        <?Php } ?>


                    </div>
                </div>
            </div>
            <!-- </div> -->


        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" id="modal_reply" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title-rep"> </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <p id="ket_ret"></p>
                <form id="child_forum">
                    <div class="card-desc-topic">
                        <div class="container">
                            <input type="hidden" value="<?= $this->uri->segment(3) ?>" name="id_thread" id="id_thread">
                            <input type="hidden" name="id_reply_child" id="id_reply_child">
                            <div class="desc-topic">
                                <textarea name="Childfield" id="Childfield" style="background:#f5f5f5; border:none; border-radius:20px; text-align:left; padding:1rem 2rem; width:100%; "></textarea>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer d-flex justify-content-end">

                <button type="button" class="btn btn-outline-primary text-start" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" onclick="add_child()">Send</button>

                <!-- <button type="button" onclick="update_media()" class="btn btn-primary text-start pull-right" data-bs-dismiss="modal">Ya</button> -->

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
<style>
    /* .active {
        display: block;
    } */

    /* .icon-Replies path:hover {
            stroke: #cb9224;
            fill: none;
            pointer-events: all;
        } */

    .desc-topic {
        overflow: hidden;
    }

    .container-coba {
        font-family: sans-serif;
        margin: 100px auto 0;
        width: 50vw;
        height: auto;
        border-radius: 10px;
        background: #F9BB44;
        padding: 2rem;
    }

    p {
        margin-top: 0;
    }

    .text {
        overflow: hidden;
    }

    .more-buttons {
        margin-top: 10px;
        display: inline-block;
        background: #0034FF;
        color: #FFF;
        padding: 5px 10px;
        border-radius: 3px;
        text-decoration: none;
        opacity: 1;
        transition: opacity .3s ease;


    }
</style>

<script>
    function showDetail(id) {

        url = "<?php echo site_url(); ?>Forum/detail/" + id,

            window.location = url
    }

    function showInformation(id) {
        url = "<?php echo site_url(); ?>Information/detail/?id=" + id,

            window.location = url
    }
</script>