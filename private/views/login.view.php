<?php echo $this->view('includes/header'); ?>
        <div class="container-fluid">
            <form action="" method="post">
                <div class="p-3 mx-auto shadow rounded" style="margin-top: 100px; width:100%; max-width: 340px;">
                    <h2 class="text-warning text-center">WebDesk Academy</h2>
                    <img src="<?=ROOT?>/assets/logo.jpg" alt="" class="border border-danger d-block mx-auto rounded-circle" style="width: 120px;">
                    <h3 class="text-warning">Login</h3>
                    <?php if(count($errors) > 0): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong class="text-danger">Errors</strong> 
                    <?php foreach($errors as $error): ?>
                        <li > <small><?=$error;?></small> </li>
                    <?php endforeach;?>

                    <button class="btn btn-danger btn-sm" type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php endif;?>

                    <input class="form-control mb-3" value="<?=get_val('email');?>" type="email" name="email" placeholder="Email" autofocus>
                    <input class="form-control mb-3" value="<?=get_val('password');?>" type="password" name="password" placeholder="Password">
                    <button class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
   
<?php echo $this->view('includes/footer'); ?>