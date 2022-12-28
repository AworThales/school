<?php echo $this->view('includes/header'); ?>
<?php echo $this->view('includes/nav'); ?>

        <div class="container-fluid p-4 mx-auto shadow" style="max-width: 1000px;">

            <?php echo $this->view('includes/crumbs',['crumbs'=>$crumbs]); ?>

            <?php if($row): ?>
                <?php 
                $image = get_image($row->image, $row->gender);
                ?>

                <div class="row">
                    <div class="col-sm-3">
                        <img src="<?=$image;?>" alt="" class="border border-primary d-block mx-auto rounded-circle" style="width: 130px;">
                        <h6 class="text-center"><?=ucwords(esc($row->firstname)); ?>&nbsp;<?=ucwords(esc($row->lastname));?></h6>
                    </div>
                    <div class="col-sm-9 bg-light p-2">
                        <table class="table table-bordered table-hover table-striped ">
                            <tr><th>First Name: </th><td><?=ucwords(esc($row->firstname)); ?></td></tr>
                            <tr><th>Last Name: </th><td><?=ucwords(esc($row->lastname));?></td></tr>
                            <tr><th>Gender: </th><td><?=ucwords(esc($row->gender));?></td></tr>
                            <tr><th>Rank: </th><td><?=ucwords(str_replace("_","", $row->rank));?></td></tr>
                            <tr><th>Email: </th><td><?=esc($row->email);?></td></tr>
                            <tr><th>Date Created: </th><td><?=get_date($row->date);?></td></tr>
                        </table>
                    </div>
                </div>
                <br>
                <div class="container-fluid">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active mb-1" href="#">Basic Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Classes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tests</a>
                        </li>
                    </ul>
                    <nav class="nabar navbar-light bg-light mt-2">
                        <form action="" class="form-inline">
                            <div class="input-group w-50">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"> Quick Search</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search Here..." aria-label="Search" aria-describedby="basic-addon1">
                            </div>
                        </form>
                    </nav>
                </div>
            <?php else:?>
                <center><h4>That class was not found!</h4></center>
            <?php endif;?>
        </div>
   
<?php echo $this->view('includes/footer'); ?>