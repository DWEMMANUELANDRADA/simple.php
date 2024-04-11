<?php
include("../../bd.php");
if($_POST){
    $usuario =(isset($_POST["usuario"]))?$_POST["usuario"]:"";
    $password=(isset($_POST["password"]))?$_POST["password"]:"";
    $correo=(isset($_POST["correo"]))?$_POST["correo"]:"";

    $sentecia=$conexion->prepare
    ("INSERT INTO `tbl_usuarios` (`id`, `usuario`, `password`, `correo`) 
    VALUES 
    (NULL ,:usuario,:password, :correo);");
    
    $sentecia->bindParam(":usuario",$usuario);
    $sentecia->bindParam(":password",$password);
    $sentecia->bindParam(":correo",$correo);
    

   $sentecia->execute();
  
    




}


include("../../templates/header.php");?>

<div class="card">
    <div class="card-header">
        usuario
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
              <label for="usuario" class="form-label">nombre del usuario</label>
              <input type="text"
                class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="nombre del usuario">
            </div>
    <div class="mb-3">
      <label for="" class="form-label">Password</label>
      <input type="password"
        class="form-control" name="password" id="pasword" aria-describedby="helpId" placeholder="password">
       </div>
       <div class="mb-3">
         <label for="" class="form-label">correo</label>
         <input type="email"
           class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="email">
          </div>

          <button type="submit" class="btn btn-success">Agregar</button>
          <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
     


        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>

<?php include("../../templates/footer.php");?>