<style>
    nav ul li a{
        width: 120px;
        text-align: center;
        border-left: solid thin #eee;
        border-right: solid thin #fff;
    }
    nav ul li a:hover{
        background-color: rgb(154, 152, 152);
        color: white !important;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light p-2">
  <div class="container-fluid">
    <a class="navbar-brand text-warning" href="#">
        <img src="<?=ROOT?>/assets/logo.jpg" alt="" class="" style="width: 50px;">
        
        <?=Auth::getSchool_name();?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=ROOT?>">DASHBOARD</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=ROOT?>/schools">SCHOOLS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=ROOT?>/users">STAFF</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=ROOT?>/students">STUDENTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=ROOT?>/classes">CLASSES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=ROOT?>/tests">TESTS</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto ml-5">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?=Auth::getFirstname();?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="<?=ROOT?>/profile">Profile</a></li>
            <li><a class="dropdown-item" href="<?=ROOT?>">Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?=ROOT?>/logout">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

