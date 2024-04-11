<?php
include("../../bd.php");
if(isset($_GET["txtid"])){
    //recuperar los datos del  registro
    $txtid=(isset($_GET['txtid']) )?$_GET['txtid']:"";
    $sentecia=$conexion->prepare("SELECT * FROM tal_servicios where id=:id");
   $sentecia->bindParam(":id",$txtid);
   $sentecia->execute();
   $registros=$sentecia->fetch(PDO::FETCH_LAZY);


   $icono=$registros['icono'];
   $titulo=$registros['titulo'];
   $descripcion=$registros['descripción'];

}
if($_POST){
    //print_r($_POST);
    $txtid=(isset($_POST["txtid"]))?$_POST["txtid"]:"";
    $icono=(isset($_POST["icono"]))?$_POST["icono"]:"";
    $titulo=(isset($_POST["titulo"]))?$_POST["titulo"]:"";
    $descripcion=(isset($_POST["descripcion"]))?$_POST["descripcion"]:"";


    $sentecia=$conexion->prepare("UPDATE tal_servicios
    SET
     icono =:icono,
      titulo=:titulo,
       descripción=:descripcion
    WHERE id=:id");
   
    $sentecia->bindParam(":icono",$icono);
    $sentecia->bindParam(":titulo",$titulo);
    $sentecia->bindParam(":descripcion",$descripcion);
    $sentecia->bindParam(":id",$txtid);
    $sentecia->execute();
    $mensaje="registro actualizado con exito.";
    header("Location:index.php?mensaje =".$mensaje);

};





include("../../templates/header.php");?>


<div class="card">

    <div class="card-header">
    Editando la infomacion de servicios
    </div>

    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
    <div class="mb-3">
      <label for="txtid" class="form-label">ID:</label>
      <input readonly value="<?php echo $txtid;?>"type="text"
        class="form-control" name="txtid" id="txtid" aria-describedby="helpId" placeholder="ID">
      
    </div>


        <div class="mb-3">
          <label for="icono" class="form-label">icono</label>
          <input value="<?php echo $icono;?>"type="text"
            class="form-control" name="icono" id="icono" aria-describedby="helpId" placeholder="icono">
           </div>
            <div class="mb-3">
              <label for="titulo" class="form-label">Titulo:</label>
              <input value="<?php echo $titulo;?>"type="text"
                class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo">
            </div>
            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripcion:</label>
              <input value="<?php echo $descripcion;?>"type="text"
                class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
          <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>


      
    </div>
    <div class="card-footer text-muted">
        

    </div>
</div>

<?php include("../../templates/footer.php");?>
