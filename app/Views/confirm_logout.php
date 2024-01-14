<?=$this->extend("layout/main.php")?>
<?=$this->section('content')?>


<div class="container">
    <h3 class="mt-5"> Are you sure you want to logout?</h3>
    <div class="row">
        <div class="col">
            <a href="<?=base_url();?>user/list" class="btn btn-primary w-100">No</a>
        </div>
        <div class="col">   
            <a href="<?=base_url();?>/logout" class="btn btn-danger w-100">Yes</a>
        </div>
    
    </div>
</div>





<?=$this->endSection('content')?>