<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar articulos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar articulos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarArticulo">
          
          Agregar articulo

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">ID</th>
           <th>Tipo Articulo</th>
           <th>Modelo Articulo</th>
           <th>Marca Articulo</th>
           <th>Estado</th>
           <th>Ambiente</th>
           <th>Categorias</th>
           <th>Equipo</th>
           <th>Numero Inventario Sena</th>
           <th>Serial Articulo</th>
           <th>Caracteristicas</th>
           <th>Acciones</th>

         </tr> 

        </thead>

         <tbody>
           <?php

$item      = null;
$valor     = null;
$respuesta = ControladorArticulos::ctrMostrarArticulos($item, $valor);


foreach ($respuesta as $key => $value) {

  $item      = "IdEquipo";
$valor     = $value["IdEquipo"] ;
$equipos = ControladorEquipos::ctrMostrarEquipos($item, $valor);
    echo '<tr>
                            <td>
                                ' . $value["IdArticulo"] . '
                            </td>
                            <td>' . $value["TipoArticulo"] . '.
                            </td>
                            <td>
                                ' . $value["ModeloArticulo"] . '
                            </td>
                            <td>
                                ' . $value["MarcaArticulo"] . '
                            </td>';
                            
                            if($value["EstadoArticulo"]=="ACTIVO")
                            {
                              echo '<td><button class="btn btn-success btn-sm">ACTIVO</button></td>';
                            }
                            else if($value["EstadoArticulo"]=="DAÑADO")
                            {
                              echo '<td><button class="btn btn-warning btn-sm">DAÑADO</button></td>';
                            }
                            else
                            {
                                echo '<td><button class="btn btn-danger btn-sm">PERDIDO</button></td>';
                            }
                            
                            
                      $item="IdAmbiente";
                      $valor= $value["IdAmbiente"];

                      $ambiente = ControladorAmbientes::ctrMostrarAmbientes($item, $valor);
                       echo '<td>'.$ambiente["NombreAmbiente"].'</td>';

                       $item="IdCategoria";
                      $valor= $value["IdCategoria"];

                      $categoria = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                       echo '<td>'.$categoria["NombreCategoria"].'</td>

                            <td>
                                ' .$equipos["NombreEquipo"]. " ".$equipos["IdEquipo"] . '
                            </td>

                            <td>
                                ' . $value["NumInventarioSena"] . '
                            </td>

                             <td>
                                ' . $value["SerialArticulo"] . '
                            </td>

                            <td>'.$value["CaracteristicaArticulo"].'</td>

                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning btnEditarArticulo" idArticulo="' . $value["IdArticulo"] . '"  data-toggle="modal" data-target="#modalEditarArticulo">
                                        <i class="fa fa-pencil">
                                        </i>
                                    </button>
                                    <button class="btn btn-danger btnEliminarArticulo" idArticulo="'.$value["IdArticulo"].'"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>';
                        // var_dump($value["IdArticulo"]);
}
?>
         
        </tbody> 

       </table>

      </div>

    </div>

  </section>

</div>

<!-- MODAL AGREGAR ARTICULO -->
<div id="modalAgregarArticulo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!-- CABEZA DEL MODAL -->
        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar articulo</h4>

        </div>

       
        <div class="modal-body">
          
          <!-- CUERPO DEL MODAL -->
          <div class="box-body">

            <!-- ENTRADA PARA EL TIPO ARTICULO -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTipo" placeholder="Tipo articulo" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL MODELO ARTICULO -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoModelo"placeholder="Modelo Articulo" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA MARCA -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaMarca" placeholder="Ingresar marca" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR AMBIENTE -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoAmbiente" required>
                  
                  <option value="">Selecionar Ambiente</option>
                  <?php

$item  = null;
$valor = null;

$ambiente = ControladorAmbientes::ctrMostrarAmbientes($item, $valor);

foreach ($ambiente as $key => $value) {

    echo '<option value="' . $value["IdAmbiente"] . '">' . $value["NombreAmbiente"] . '</option>';
}

?>
                </select> 

              </div>

            </div>

             <!-- ENTRADA PARA SELECCIONAR EQUIPO -->
            <div class="form-group">
              
              <div class="input-group"> 
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 
                <input type="hidden" name="equipo" id="equipo">

                <select class="form-control input-lg" name="nuevoEquipo" id="nuevoEquipo"onchange="equipoFuncion(this.value)">
                  
                  
                  <option value="">Selecionar Equipo</option>
                  <?php

$item  = null;
$valor = null;

$equipos = ControladorEquipos::ctrMostrarEquipos($item, $valor);

foreach ($equipos as $key => $value) {

    echo '<option value="' . $value["IdEquipo"] . '">' . $value["NombreEquipo"] . '</option>';
}

?>

                </select>

              </div>

            </div>

             <!-- ENTRADA PARA SELECCIONAR CATEGORIAS -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevaCategoria" required>
                  
                  <option value="">Selecionar Categoria</option>
                  <?php

$item  = null;
$valor = null;

$ambiente = ControladorCategorias::ctrMostrarCategorias($item, $valor);

foreach ($ambiente as $key => $value) {

    echo '<option value="' . $value["IdCategoria"] . '">' . $value["NombreCategoria"] . '</option>';
}

?>

                </select>

              </div>


            </div>

            <!-- ENTRADA PARA EL INVENTARIO SENA -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoInventario" min="0" placeholder="Ingrese el numero del inventario sena">

              </div>

            </div>
            

            <!-- ENTRADA PARA EL SERIAL ARTICULO -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoSerial" placeholder="Ingrese el serial del articulo">

              </div>

            </div>
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoEstado" required>
                  
                  <option value="">Selecionar Estado</option>
                  <option value="ACTIVO">Activo</option>
                  <option value="DAÑADO">Dañado</option>
                  <option value="PERDIDO">Perdido</option>

                </select>

              </div>

            </div>
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                 <textarea class="form-control rounded-5" name="nuevaCaracteristica" rows="3" placeholder="INGRESAR CARACTERÍSTICAS DEL ARTICULO"></textarea>
                 <!-- <input type="text" class="form-control input-lg" name="nuevaCaracteristica" min="0" placeholder="Ingrese la característica del artículo"> -->

              </div>

            </div>
          </div>
        </div>  


        <!-- PIE DEL MODAL -->
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Articulo</button>

        </div>

        <?php 
              $crearArticulo = new ControladorArticulos();
              $crearArticulo-> ctrCrearArticulos();
         ?>

      </form>

    </div>

  </div>

</div>


<!-- MODAL EDITAR ARTICULO -->
<div id="modalEditarArticulo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!-- CABEZA DEL MODAL -->
        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar articulo</h4>

        </div>

       
        <div class="modal-body">
          
          <!-- CUERPO DEL MODAL -->
          <div class="box-body">

            <!-- ENTRADA PARA EL TIPO ARTICULO -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarTipo" id="editarTipo" placeholder="Tipo articulo" required>

                <input type="hidden" name="idArticulo" id="idArticulo">

              </div>

            </div>

            <!-- ENTRADA PARA EL MODELO ARTICULO -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="editarModelo" id="editarModelo" min="0" placeholder="Modelo Articulo" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA MARCA -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="text" class="form-control input-lg" name="editarMarca" id="editarMarca" placeholder="Ingresar marca" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR AMBIENTE -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="idAmbiente" >
                  
                  <option id="editarAmbiente"></option>
                  <?php

$item  = null;
$valor = null;

$ambiente = ControladorAmbientes::ctrMostrarAmbientes($item, $valor);

foreach ($ambiente as $key => $value) {

    echo '<option value="' . $value["IdAmbiente"] . '">' . $value["NombreAmbiente"] . '</option>';
}

?>
                </select>

              </div>

            </div>

             <!-- ENTRADA PARA SELECCIONAR EQUIPO -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <input type="hidden" name="equipo" id="equipo">

                <select class="form-control input-lg" name="idEquipo" onchange="equipoFuncion1(this.value)">
                  
                  <option id="editarEquipo"></option>
                  <?php

$item  = null;
$valor = null;

$equipos = ControladorEquipos::ctrMostrarEquipos($item, $valor);

foreach ($equipos as $key => $value) {

    echo '<option value="' . $value["IdEquipo"] . '">' . $value["NombreEquipo"] . '</option>';
}

?>
                </select>



              </div>

            </div>

             <!-- ENTRADA PARA SELECCIONAR CATEGORIAS -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="idCategoria">
                  
                  <option id="editarCategoria"></option>
                  <?php

$item  = null;
$valor = null;

$ambiente = ControladorCategorias::ctrMostrarCategorias($item, $valor);

foreach ($ambiente as $key => $value) {

    echo '<option value="' . $value["IdCategoria"] . '">' . $value["NombreCategoria"] . '</option>';
}

?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL INVENTARIO SENA -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" class="form-control input-lg" name="editarInventario" id="editarInventario" min="0" placeholder="Ingrese el numero del inventario sena">

              </div>

            </div>
            

            <!-- ENTRADA PARA EL SERIAL ARTICULO -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="editarSerial" id="editarSerial" min="0" placeholder="Ingrese el serial del articulo">

              </div>

            </div>
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarEstado">
                  
                  <option id="editarEstado">Selecionar Estado</option>
                  <option value="ACTIVO">Activo</option>
                  <option value="DAÑADO">Dañado</option>
                  <option value="PERDIDO">Perdido</option>

                </select>

              </div>

            </div>
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                 <textarea class="form-control rounded-5" name="editarCaracteristica" id="editarCaracteristica" rows="3" placeholder="INGRESAR CARACTERÍSTICAS DEL ARTICULO"></textarea>
                 <!-- <input type="text" class="form-control input-lg" name="nuevaCaracteristica" min="0" placeholder="Ingrese la característica del artículo"> -->

              </div>

            </div>
          </div>
        </div>  


        <!-- PIE DEL MODAL -->
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Actualizar Articulo</button>

        </div>
        <?php 
              $editarArticulo = new ControladorArticulos();
              $editarArticulo -> ctrEditarArticulos();
         ?>

      </form>

    </div>

  </div>

</div>

<?php 
  $eliminarArticulo = new ControladorArticulos();
  $eliminarArticulo -> ctrBorrarArticulo();   
?> 

