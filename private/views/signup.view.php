<?php echo $this->view('includes/header'); ?>

        <div class="container-fluid">
            <form action="" method="post">
            <div class="p-3 mx-auto shadow rounded" style="margin-top: 100px; width:100%; max-width: 340px;">
                <h2 class="text-warning text-center">WebDesk Academy</h2>
                <img src="<?=ROOT?>/assets/logo.jpg" alt="" class="border border-danger d-block mx-auto rounded-circle" style="width: 120px;">
                <h3 class="text-warning">Add User</h3>

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


                <input class="form-control mb-3" value="<?=get_val('firstname');?>" type="text" name="firstname" placeholder="First Name" autofocus>
                <input class="form-control mb-3" value="<?=get_val('lastname');?>" type="text" name="lastname" placeholder="Last Name" autofocus>
                <input class="form-control mb-3" value="<?=get_val('email');?>" type="email" name="email" placeholder="Email" autofocus>

                <select class="form-control form-select mb-3" name = "gender">
                    <option <?=get_select('gender','');?> value ="">--Select A Gender--</option>
                    <option <?=get_select('gender','male');?> value ="male">Male</option>
                    <option <?=get_select('gender','female');?> value ="female">Female</option>
                </select>

                <?php if($mode == 'students'): ?>
                    <input class="form-control mb-3" value="student" type="hidden" name="rank" >
                <?php else: ?>
                    <select class="form-control form-select mb-3" name="rank">
                        <option <?=get_select('rank','');?> value="">--Select A Rank--</option>
                        <option <?=get_select('rank','student');?> value="student">Student</option>
                        <option <?=get_select('rank','receptionist');?> value="receptionist">Receptionist</option>
                        <option <?=get_select('rank','lecturer');?> value="lecturer">Lecturer</option>
                        <option <?=get_select('rank','admin');?> value="admin">Admin</option>

                        <?php if(Auth::getRank() == 'super_admin') :?>
                        <option <?=get_select('rank','super_admin');?> value="super_admin">Super Admin</option>
                        <?php endif ;?>
                    </select>
                <?php endif ;?>



                <input class="form-control mb-3" value="<?=get_val('password');?>" type="text" name="password" placeholder="Password">
                <input class="form-control mb-3" value="<?=get_val('password2');?>" type="text" name="password2" placeholder="Retype Password">
                <button class="btn btn-primary float-end">Add User</button>

                <?php if($mode == 'students'): ?>
                <a href="<?=ROOT;?>/students">
                <button type="button" class="btn btn-danger">Cancel</button>
                </a>
                <?php else: ?>

                <a href="<?=ROOT;?>/users">
                <button type="button" class="btn btn-danger">Cancel</button>
                </a>

                <?php endif; ?>
            </div>
            </form>

        </div>
   
<?php echo $this->view('includes/footer'); ?>