<?=$this->extend("layout/main.php")?>
<?=$this->section('content')?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a  class="navbar-brand text-primary" href="https://www.facebook.com/kickerb0y/">Facebook</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-warning" aria-current="page" href="https://www.instagram.com/kentoyloco/">Instagram</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" href="https://www.youtube.com/channel/UC3gzlLzi2dqnte7I20_24NQ">Youtube</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://steamcommunity.com/profiles/76561198306978815/">Steam</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="container">
    <h3 class="text-black">User Login <img src="public/favicon.ico" span class="border border-danger"></span></h3>
 <form action="<?=base_url();?>login" method="post">
        <?php if(session()-> get('invalid')):?>
            <div class="alert alert-danger" role="alert">
                <?php echo session()->get('invalid') ?>
            </div>
        <?php endif;?> 
        <?php if(isset($validation)):?>
            <div class="alert alert-danger" role="alert">
             <?=$validation->listerrors();?>
            </div>          
        <?php endif; ?>
    <div class="mb-3">
                <label for="email" class="form-label">Email</label><br>
                <input type="text" class="form-control" id="email" name="email" value="<?=set_value('email')?>"><br>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?=set_value('password')?>">
            </div>
            <button class="btn bg-success p-2 text-white" type="submit" class="btn btn-primary">Login</button>

 </form>
</div>

<?=$this->endSection('content')?>