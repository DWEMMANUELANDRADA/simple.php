<?php
include("../../bd.php");
if(isset($_GET["txtid"])){
 
    $txtid=(isset($_GET['txtid']) )?$_GET['txtid']:"";
    
    $sentecia=$conexion->prepare("SELECT imagen  FROM tbl_portafolio where id=:id");
   $sentecia->bindParam(":id",$txtid);
   $sentecia->execute();

   $registros_imagen=$sentecia->fetch(PDO::FETCH_LAZY);
   if(isset($registros_imagen["imagen"])){
    if(file_exists("/../../../assets/img/portfolio/". $registros_imagen["imagen"])){
                        
unlink("/../../../assets/img/portfolio/".$registros_imagen["imagen"]);

    }
   }

    //borrado de registro
  
    $sentecia=$conexion->prepare("DELETE FROM tbl_portafolio where id=:id");
   $sentecia->bindParam(":id",$txtid);
   
   $sentecia->execute();
   
}

//SELECCIONAMOS LA TABLA QUE SE VA CREANDO EN SERVICIOS 
$sentecia=$conexion->prepare("SELECT * FROM `tbl_portafolio` ");
$sentecia->execute();
$lista_portafolio=$sentecia->fetchAll(PDO::FETCH_ASSOC);
include("../../templates/header.php");?>


<div class="card">
    <div class="card-header">
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">agregar registros en portafilo</a>
   
    </div>
    <div class="card-body">
       
    </div>
  <div class="table-responsive-sm">
    <table class="table ">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
         
                <th scope="col">Imagen</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Cliente y Categoria</th>
                <th style="text-align:right"scope="col">Acciones</th>
                
                
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($lista_portafolio as $registros) {?>
            <tr class="">
               <td scope="col"><?php echo $registros ['id'];?></td> 
               <td scope="col">
                <h6>-<?php echo $registros ['titulo'];?>-</h6>
                <?php echo $registros ['subtitulo'];?></br>
                <?php echo $registros ['url'];?>
            </td> 
              
               <td scope="col">
                <img width="50" alt="imagen no
                 cargada"src="../../assets/img/porfolio/<?php echo $registros ['imagen'];?>"/>
              </td>  
               <td scope="col"><?php echo $registros ['descripcion'];?></td>  
               <td scope="col">
                <h6>-<?php echo $registros ['cliente'];?>-</h6>
                <?php echo $registros ['categoria'];?>
            </td> 
               <td scope="col"></td>  
               <td scope="col">
                <a name="" id="" class="btn btn-info" href="editar.php?txtid=<?php echo $registros['id'];?>" role="button">  Editar</a> |


                <a name="" id="" class="btn btn-danger" href="index.php?txtid=<?php echo $registros['id'];?>" role="button">  Eliminar</a>
                </td>    
            
            </tr>
            <?php 
            } ?>
           
        </tbody>
    </table>
  </div>
  
</div>

<?php include("../../templates/footer.php");?>