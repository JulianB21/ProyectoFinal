<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Equipos

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Equipos</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEquipo">

          Agregar Equipo

        </button>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas">

        <thead>

         <tr>

           <th style="width:10px">ID</th>
           <th>Nombre</th>
           <th>Estado</th>
           <th>Numero Articulos</th>
           <th>Numero Articulos Agregados</th>
           <th>Observaciones</th>
           <th>Acciones</th>

         </tr>

        </thead>

        <tbody>
           <?php

            $item = null;
            $valor = null;  

            $equipos = ControladorEquipos::ctrMostrarEquipos($item, $valor);

            foreach ($equipos as $key => $value) {


              echo '<tr>

                  <td>'.$value["IdEquipo"].'</td>

                  <td>'.$value["NombreEquipo"].'</td>';

                  if($value["EstadoEquipo"]=="ACTIVADO")
                    {
                      echo '<td><button class="btn btn-success btn-sm">Activado</button></td>';
                    }
                    else if($value["EstadoEquipo"]=="DESACTIVADO")
                    {
                      echo '<td><button class="btn btn-danger btn-sm">Desactivado</button></td>';
                    }

                  echo '

                  <td>'.$value["NumArticulosEquipo"].'</td>
                  <td>'.$value["NumArticulosAgregados"].'</td>


                  <td>'.$value["ObservacionEquipo"].'</td>

                  <td>

                    <div class="btn-group">

                      <button class="btn btn-warning btnEditarEquipo" idEquipo="'.$value["IdEquipo"].'" data-toggle="modal" data-target="#modalEditarEquipo"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarEquipo" idEquipo="'.$value["IdEquipo"].'"><i class="fa fa-times"></i></button>

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

<!--=====================================
MODAL AGREGAR EQUIPO
======================================-->

<div id="modalAgregarEquipo" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Equipo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoEquipo" placeholder="Ingresar nombre del equipo" required>

              </div>

            </div>

            <!-- ENTRADA PARA CANTIDAD ARTICULOS -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="number" class="form-control input-lg" name="nuevaCantidad" placeholder="Ingresar cantidad articulos" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL ESTADO -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                  <select class="form-control input-lg" name="nuevoEstado" required>

                    <option value="">Selecionar Estado</option>
                    <option value="ACTIVADO">Activado</option>
                    <option value="DESACTIVADO">Desactivado</option>

                  </select>

              </div>

            </div>

            <!-- OBSERVACION EQUIPO -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                 <textarea class="form-control rounded-5" name="nuevaObservacion" rows="3" placeholder="INGRESAR OBSERVACIONES DEL EQUIPO"></textarea>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Equipo</button>

        </div>

        <?php

          $crearCategoria = new ControladorEquipos();
          $crearCategoria -> ctrCrearEquipos();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR EQUIPO
======================================-->
<div id="modalEditarEquipo" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Equipo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarEquipo" id="editarEquipo" placeholder="Ingresar nombre del equipo" required>

                <input type="hidden" name="idEquipo" id="idEquipo">

              </div>

            </div>

            <!-- ENTRADA PARA CANTIDAD ARTICULOS -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarCantidad" id="editarCantidad" placeholder="Ingresar cantidad articulos" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL ESTADO -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                  <select class="form-control input-lg" name="editarEstado"id="editarEstado" required>

                    <option value="" >Selecionar Estado</option>
                    <option value="ACTIVADO">Activado</option>
                    <option value="DESACTIVADO">Desactivado</option>

                  </select>

              </div>

            </div>

            <!-- OBSERVACION EQUIPO -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                 <textarea class="form-control rounded-5" name="editarObservacion" id="editarObservacion" rows="3" placeholder="INGRESAR OBSERVACIONES DEL EQUIPO"></textarea>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Actualizar Equipo</button>

        </div>
        <?php

          $editarEquipos = new ControladorEquipos();
          $editarEquipos -> ctrEditarEquipos();

        ?>

      </form>

    </div>

  </div>

</div>

 <?php

  $eliminarEquipo = new ControladorEquipos();
  $eliminarEquipo -> ctrBorrarEquipo();

?>

