<nav class="navbar bg-primary navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Project of Code Igniter 4
    <img src="codeigniter4.jpg" class="object-fit-sm-contain border rounded" alt="Fire">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url()?>user/list">List of Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url()?>user/add">Add User</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?=session()->get('myFullName')?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?=base_url();?>/confirm_logout">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>