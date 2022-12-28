<?php echo $this->view('includes/header'); ?>
<?php echo $this->view('includes/nav'); ?>
    <div class="container-fluid p-4 mx-auto shadow" style="max-width: 1000px;">

    <?php echo $this->view('includes/crumbs',['crumbs'=>$crumbs]); ?>
        <div class="card-group justify-content-center">

            <?php if($row): ?>
                <form method="post">
                    <h4 class="text-warning">Edit School</h4>
                    <?php if(count($errors) > 0): ?>
                    <div class="alert alert-warning alert-dismissible fade show pt-0 px-1 pb-1" role="alert">
                        <strong class="text-danger">Errors</strong> 
                        <br>
                        <?php foreach($errors as $error): ?>
                        <?=$error;?>
                        <?php endforeach;?>

                        <button class="btn btn-danger btn-sm" type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        
                    </div>

                    <?php endif;?>
                    <input autofocus class="form-control" value="<?=get_val('class', $row[0]->class);?>" type="text" name="class" placeholder="class Name"> <br>
                    <input class="btn btn-sm btn-primary float-end" type="submit" value="Save">
                    <a href="<?=ROOT?>/schools">
                        <input class="btn btn-danger btn-sm" type="button" value="Quit">
                    </a>  
                </form>
            <?php else: ?>
                <h4 class="text-danger">That school is not found!</h4> &nbsp; &nbsp;
                 <a href="<?=ROOT?>/schools">
                    <input class="btn btn-danger btn-sm" type="button" value="Cancel">
                </a>  
            <?php endif;?>
            
        </div>
    </div>


<?php echo $this->view('includes/footer'); ?>