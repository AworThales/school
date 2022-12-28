<?php echo $this->view('includes/header'); ?>
<?php echo $this->view('includes/nav'); ?>
    <div class="container-fluid p-4 mx-auto shadow" style="max-width: 1000px;">

    <?php echo $this->view('includes/crumbs',['crumbs'=>$crumbs]); ?>

        <nav class="nabar navbar-light bg-light mt-2 mb-3">
            <form action="" class="form-inline">
                <div class="input-group w-50">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"> Quick Search</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search Here..." aria-label="Search" aria-describedby="basic-addon1">
                </div>
            </form>
        </nav>
    

        <a href="<?=ROOT;?>/signup">
            <button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Add New</button>
        </a>
        <div class="card-group justify-content-center">

        <?php if($rows) :?>
            <?php foreach($rows as $row) :?>

                <?php 
                $image = get_image($row->image, $row->gender);
                ?>

                <div class="card m-2 shadow" style="max-width: 14rem; min-width: 14rem;">
                    <img class="card-img-top" src="<?=$image;?>" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?=ucwords($row->firstname);?> <?=ucwords($row->lastname);?></h5>
                        <p class="card-text"><?=ucwords(str_replace("_", " ", $row->rank));?></p>
                        <a href="<?=ROOT;?>/profile/<?=$row->user_id;?>" class="btn btn-primary">Profile</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>

            <h4 class="text-danger mt-5 mb-5">No staff yet!</h4>
        <?php endif; ?>
    </div>

<?php echo $this->view('includes/footer'); ?>