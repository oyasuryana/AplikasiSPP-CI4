<?=$this->include('Home/Header');?>

<!-- Awal Konten Aplikasi -->
<main role="main" class="flex-shrink-0">
  <div class="container">

    <?php 
    if(empty($intro)){
        $this->renderSection('content');
    } else {
        echo $intro;
    }
    ?>
  </div>
</main>

<?=$this->include('Home/Footer');?>