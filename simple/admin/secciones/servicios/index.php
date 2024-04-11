<?php

include("../../bd.php");
if(isset($_GET["txtid"])){
    //borrar registro
    $txtid=(isset($_GET['txtid']) )?$_GET['txtid']:"";
    $sentecia=$conexion->prepare("DELETE FROM tal_servicios where id=:id");
   $sentecia->bindParam(":id",$txtid);
   
   $sentecia->execute();


}

//SELECCIONAMOS LA TABLA QUE SE VA CREANDO EN SERVICIOS 
$sentecia=$conexion->prepare("SELECT * FROM `tal_servicios` ");
$sentecia->execute();
$lista_servicios=$sentecia->fetchAll(PDO::FETCH_ASSOC);



include("../../templates/header.php");?>



<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">agregar registros</a>
      
    </div>
    <div class="card-body">
   <div class="table-responsive-sm">
    <table class="table table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Icono</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($lista_servicios as $registros) {?>
            <tr class="">
                <td><?php echo $registros['id'];?></td>
                <td><?php echo $registros['icono'];?></td>
                <td><?php echo $registros['titulo'];?></td>
                <td><?php echo $registros['descripción'];?></td>
                <td>
                    <a name="" id="" class="btn btn-info" href="editar.php?txtid=<?php echo $registros['id'];?>" role="button">Editar</a> |


                    <a name="" id="" class="btn btn-danger" href="index.php?txtid=<?php echo $registros['id'];?>" role="button">Eliminar</a>
                
            </td>
            </tr>
            <?php 
            } ?>
           
        </tbody>
    </table>
   </div>
   
    </div>
   
</div>

<?php include("../../templates/footer.php");?>


