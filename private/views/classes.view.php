<?php echo $this->view('includes/header'); ?>
<?php echo $this->view('includes/nav'); ?>
    <div class="container-fluid p-4 mx-auto shadow" style="max-width: 1000px;">

        <?php echo $this->view('includes/crumbs',['crumbs'=>$crumbs]); ?>

        <div class="card-group justify-content-center">

                <h5>Classes</h5>
                <table class=" table table-striped table-hover">
                        <tr><th></th><th>Class Name:</th><th>Created by</th><th>Date</th>
                            <th>
                                <a href="<?=ROOT;?>/classes/add">
                                    <button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Add New</button>
                                </a>
                            </th>
                        </tr>

                    <?php if($rows) :?>
                        <?php foreach($rows as $row) :?>
                    
                            <tr> 
                                <td>
                                    <a href="<?=ROOT;?>/single_class/<?=$row->class_id;?>">                           
                                        <button class="btn btn-sm btn-primary">View Deatils &nbsp;<i class="fa fa-chevron-right"></i></button></td>
                                     </a>
                                <td><?=$row->class;?></td><td> </td><td><?=get_date($row->date);?></td> 
                                <td>
                                    <a href="<?=ROOT;?>/classes/edit/<?=$row->id;?>">
                                    <button class="btn-sm btn btn-info text-light" > <i class="fa fa-edit"></i> </button>
                                    </a>
                                    <a href="<?=ROOT;?>/classes/delete/<?=$row->id;?>">
                                    <button class="btn-sm btn btn-danger" ><i class="fa fa-trash-alt"></i> </button>
                                    </a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    <?php else: ?>

                        <h4 class="text-danger mt-5 mb-5">No classes yet!</h4>
                    <?php endif; ?>

                </table>
        </div>
    </div>

<?php echo $this->view('includes/footer'); ?>