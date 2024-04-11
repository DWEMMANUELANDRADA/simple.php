<?php

include("../../bd.php");
if(isset($_GET["txtid"])){
  $txtid=(isset($_GET['txtid']) )?$_GET['txtid']:"";
  $sentecia=$conexion->prepare("SELECT * FROM tbl_portafolio where id=:id");
  $sentecia->bindParam(":id",$txtid);
  $sentecia->execute();
  $registros=$sentecia->fetch(PDO::FETCH_LAZY);

  $titulo=$registros["titulo"];
  $subtitulo=$registros["subtitulo"];
  $imagen=$registros["imagen"];
  $descripcion=$registros["descripcion"];
  $cliente=$registros["cliente"];
  $categoria=$registros["categoria"];
  $url=$registros["url"];
 


}
if($_POST){
  $txtid=(isset($_post['txtid']) )?$_post['txtid']:"";
  $titulo=(isset($_POST["titulo"]))?$_POST["titulo"]:"";
  $subtitulo=(isset($_POST["subtitulo"]))?$_POST["subtitulo"]:"";
  $imagen=(isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";
  $descripcion=(isset($_POST["descripcion"]))?$_POST["descripcion"]:"";
  $cliente=(isset($_POST["cliente"]))?$_POST["cliente"]:"";
  $categoría=(isset($_POST["categoria"]))?$_POST["categoria"]:"";
  $url=(isset($_POST["url"]))?$_POST["url"]:"";

  $sentecia=$conexion->prepare("UPDATE tbl_portafolio
  SET
   titulo=:titulo,
   subtitulo =:subtitulo,
     descripcion=:descripcion,
     cliente=:cliente,
     categoria=:categoria,
     url=:url
  WHERE id=:id");
   $sentecia->bindParam(":id",$txtid);
  $sentecia->bindParam(":titulo",$titulo);
  $sentecia->bindParam(":subtitulo",$subtitulo);
  $sentecia->bindParam(":descripcion",$descripcion);
  $sentecia->bindParam(":cliente",$cliente);
  $sentecia->bindParam(":categoria",$categoria);
  $sentecia->bindParam(":url",$url);
  
  $sentecia->execute();
  
}
    


include("../../templates/header.php");?>




<div class="card">
    <div class="card-header">
        producto del portafolio 
    </div>      
    <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">
    
    <div class="mb-3">
      <label for="titulo" class="form-label">titulo :</label>
      <input type="text"
        class="form-control" value="<?php echo $titulo;?>"name="titulo" id="titulo" aria-describedby="helpId" placeholder="titulo">
      
    </div>
    <div class="mb-3">
      <label for="subtitulo" class="form-label">Subtitulo : </label>
      <input type="text"
        class="form-control"value="<?php echo $subtitulo;?>" name="subtitulo" id="subtitulo" aria-describedby="helpId" placeholder="Subtitulo">
    </div>
    <div class="mb-3">
      <label for="imagen" class="form-label">Imagen : </label>
      <img width="50" alt="imagen 
                 cargada"src="/../../../assets/img/portfolio/ <?php echo $imagen;?>"/>
     
      <input type="file" class="form-control" name="imagen" id="imagen" placeholder="imagen" aria-describedby="fileHelpId">
    </div>
    <div class="mb-3">
      <label for="descripcion" class="form-label">descripcion :</label>
      <input type="text"
        class="form-control"value="<?php echo $descripcion;?>" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="descripcion">
    </div>
    <div class="mb-3">
      <label for="cliente" class="form-label">Cliente :</label>
      <input type="text"
        class="form-control"value="<?php echo $cliente;?>" name="cliente" id="cliente" aria-describedby="helpId" placeholder="cliente">

    </div>
    <div class="mb-3">
      <label for="categoria" class="form-label">Categoria :</label>
      <input type="text"
        class="form-control"value="<?php echo $categoria;?>" name="categoria" id="categoria" aria-describedby="helpId" placeholder="categoria">
     
    </div>
    <div class="mb-3">
      <label for="url" class="form-label">URL :</label>
      <input type="text"
        class="form-control"value="<?php echo $url;?>" name="url" id="url" aria-describedby="helpId" placeholder="url del proyecto">
  
    </div>
    <button type="submit" class="btn btn-success">actualizar</button>
          <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
       
    </form>
    
        
    </div>
    <div class="card-footer text-muted">
     
    </div>
</div>

<?php include("../../templates/footer.php");?>