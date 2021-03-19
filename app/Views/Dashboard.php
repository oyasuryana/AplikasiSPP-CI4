<?=$this->include('Layout/Header');?>

<!-- Awal Konten Aplikasi -->
<main role="main" class="flex-shrink-0">
  <div class="container">
    <?= $this->renderSection('content') ?>
  </div>
</main>

<?=$this->include('Layout/Modal');?>
<?=$this->include('Layout/Footer');?>