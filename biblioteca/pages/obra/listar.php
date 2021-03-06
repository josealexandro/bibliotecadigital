<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/actions/obra.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/pages/partials/header.php');

if (isset($_GET['id'])) {
   $obras = obterObrasAutoraDb($_GET["id"]);
   if (sizeof($obras) == 0 ) {
      header("Location: ".$_SERVER['PHP_SELF']);
   }
} else {
   $obras = obterObrasAction();
}
?>
      <div style="height: 50px;"></div>
<?php foreach($obras as $index => $row): ?>
<?php if ($index % 4 == 0): ?>
      <div class="container">
         <div class="row p-8">
<?php endif; ?>
            <div class="col-sm-3 ">
               <div class="card" style="width: 15rem; ">
                  <img src="data:image/jpeg;base64,<?php echo base64_encode($row['capa']); ?>" class="card-img-top" alt="..." />
                  <div class="card-body">
                     <h5 class="card-title text-center"><?=htmlspecialchars($row['titulo'])?></h5>
                     <a href="./descricao.php?id=<?=$row['cod_obra']?>" class="btn btn-dark mx-auto d-block">Ver mais</a>
                  </div>
               </div>
            </div>
<?php if ($index % 4 == 3 || $index == (count($obras) - 1)): ?>
         </div>
      </div>
      <div style="height: 50px;">
      </div>
<?php endif; ?>
<?php endforeach; ?>
<div class="col-md-12 text-center">
      <button style="width: 40%; margin: auto; margin-top: 30px;" type="button" class="btn btn-dark btn-block mb-4 ">Ver mais</button>
</div>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/pages/partials/footer.php'); ?>