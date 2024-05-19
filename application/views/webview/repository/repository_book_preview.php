<section class="galeryhead-repository">

    <div class="blogtext wrapper-body text-center ">
        <h1>Repository</h1>
        <p>Lorem ipsum dolor sit amet, syarat dan ketentuan </p>
        <p>Lorem ipsum dolor sit amet consectetur </p>
    </div>
</section>

<section>
    <div class="wrapper-body">


    </div>
    </div>

</section>

<section id="repositorydetails" class="repositorydetails">
    <div class="wrapper-body">
        <div class="container-detail">
            <div class="row">

                <?php foreach ($detail as $d) { ?>
                    <div class="leftside col-lg-12 mb-2 " style="height:max-content;">
                        <h4><b><?php echo $d->title ?></b></h4>
                        <!-- <img class="img-fluid" src=" <?php echo base_url(); ?>./../../../uploadFile_alumni/repository/<?php echo $d->pdf; ?>" alt=" " style="width: 60%;"> -->
                        <embed class="mt-3" type="application/pdf" src=" <?php echo $this->ppaatthh . 'repository/file/' . $d->file ?>" style="width:100%; height:600px;"></embed>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>


</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>