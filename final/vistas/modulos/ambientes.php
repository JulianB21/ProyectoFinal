<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Ambientes

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Ambientes</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAmbiente">

          Agregar Ambiente

        </button>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>ID Ambiente</th>
           <th>Nombre</th>
           <th>Ubicación</th>
           <th>Programa</th>
           <th>Acciones</th>


         </tr>

        </thead>

        <tbody>
          <?php 
            $item=null;
            $valor= null;

            $mostrarAmbientes= ControladorAmbientes::ctrMostrarAmbientes($item, $valor);

            foreach ($mostrarAmbientes as $key => $value) {

                      echo '<tr>
                      <td>'.($key+1).'</td>
                    <td>'.$value["IdAmbiente"].'</td>
                    <td>'.$value["NombreAmbiente"].'</td>
                    <td>'.$value["UbicacionAmbiente"].'</td>';


          $item="IdPrograma";
          $valor= $value["IdPrograma"];

          $mostrarProgramas= ControladorProgramas::ctrMostrarProgramas($item, $valor);




                   echo '<td>'.$mostrarProgramas["NombrePrograma"].'</td>


                   <td>

                      <div class="btn-group">

                        <button class="btn btn-warning btnEditarAmbiente" data-toggle="modal" data-target="#modalEditarAmbiente" idAmbiente="'.$value["IdAmbiente"].'"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarAmbiente" idAmbiente="'.$value["IdAmbiente"].'"><i class="fa fa-times"></i></button>

                      </div>

                    </td>

                  </tr>';
              
            }

           ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!-- MODAL AGREGAR AMBIENTE -->
<div id="modalAgregarAmbiente" class="modal fade" role="dialog">

  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!-- CABEZA DEL MODAL -->
        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Ambiente</h4>

        </div>


        <div class="modal-body">

          <!-- CUERPO DEL MODAL -->
          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoAmbiente" id="nuevoAmbiente" placeholder="Ingresar Nombre del Ambiente" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA UBICACION -->
             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaUbicacion"  id="nuevaUbicacion" placeholder="Ingresar Ubicacion del Ambiente">

              </div>

            </div>
          
        

        <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <select class="form-control input-lg" name="idPrograma" id="idPrograma" required>
                  <option value="">Seleccionar Programa</option>
                    <?php
                    $item  = null;
                    $valor = null;

                    $programas = ControladorProgramas::ctrMostrarProgramas($item, $valor);

                    foreach ($programas as $key => $value) {
                        echo '<option value="' . $value["IdPrograma"] . '">' . $value["NombrePrograma"] . '</option>';
                    }

                    ?>
                    </select>

              </div>

            </div>
</div>
</div>
        <!-- PIE DEL MODAL -->
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Ambiente</button>

        </div>
        <?php 
              $crearAmbiente= new ControladorAmbientes();
              $crearAmbiente->ctrCrearAmbientes();


         ?>

      </form>

    </div>

  </div>

</div>


<!-- MODAL EDITAR AMBIENTE -->
<div id="modalEditarAmbiente" class="modal fade" role="dialog">

  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">

        <!-- CABEZA DEL MODAL -->
        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Ambiente</h4>

        </div>


        <div class="modal-body">

          <!-- CUERPO DEL MODAL -->
          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarAmbiente" id="editarAmbiente"required>

                <input type="hidden" name="idAmbiente" id="idAmbiente">

              </div>

            </div>

            <!-- ENTRADA PARA LA UBICACION -->
             <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="editarUbicacion"  id="editarUbicacion">

              </div>

            </div>
          
        

        <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <select class="form-control input-lg" name="idPrograma" required>
                  <option id="EditarPrograma"></option>

                    <?php
                    $item  = null;
                    $valor = null;

                    $programas = ControladorProgramas::ctrMostrarProgramas($item, $valor);

                    foreach ($programas as $key => $value) {
                        echo '<option value="' . $value["IdPrograma"] . '">' . $value["NombrePrograma"] . '</option>';
                    }

                    ?>
                    </select>

              </div>

            </div>
</div>
</div>
        <!-- PIE DEL MODAL -->
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Actualizar Ambiente</button>

        </div>
        <?php 
              $editarAmbiente= new ControladorAmbientes();
              $editarAmbiente->ctrEditarAmbientes();

         ?>

      </form>

    </div>

  </div>

</div>

   <!-- </div> -->
        <?php 
              $eliminarAmbiente= new ControladorAmbientes();
              $eliminarAmbiente->ctrEliminarAmbientes();

         ?>
