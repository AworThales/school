<?php echo $this->view('includes/header'); ?>
<?php echo $this->view('includes/nav'); ?>
    <div class="container-fluid p-4 mx-auto shadow" style="max-width: 1000px;">

    <?php echo $this->view('includes/crumbs',['crumbs'=>$crumbs]); ?>
        <div class="card-group justify-content-center">

            <?php if($row): ?>
                <form method="post">
                    <h4 class="text-warning">Are you sure you want to delete?!</h4>
                    
                    <input disabled autofocus class="form-control" value="<?=get_val('school', $row[0]->school);?>" type="text" name="school" placeholder="School Name"> <br>
                    <input type="hidden" name="id">
                    <input class="btn btn-sm btn-success float-end" type="submit" value="Done">
                    <a href="<?=ROOT?>/schools">
                        <input class="btn btn-danger btn-sm" type="button" value="Exit">
                    </a>  
                </form>
            <?php else: ?>
                <h4 class="text-danger">That class is not found!</h4> &nbsp; &nbsp;
                 <a href="<?=ROOT?>/schools">
                    <input class="btn btn-danger btn-sm" type="button" value="Exit">
                </a>  
            <?php endif;?>
            
        </div>
    </div>


<?php echo $this->view('includes/footer'); ?>