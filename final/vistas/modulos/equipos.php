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
           <th>Observaciones</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>
          
          <tr>

            <td>1</td>

            <td>Equipo de Mesa</td>

            <td><button class="btn btn-success btn-sm">Activado</button></td>

            <td>5 ARTICULOS</td>

            <td>Golpe en la parte trasera del monitor</td>

            <td>

              <div class="btn-group">
                  
                <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditarEquipo"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

              </div>  

            </td>

          </tr>
          <tr>

            <td>1</td>

            <td>Equipo de Mesa</td>

            <td><button class="btn btn-danger btn-sm">Desactivado</button></td>

            <td>5 ARTICULOS</td>

            <td>Golpe en la parte trasera del monitor</td>

            <td>

              <div class="btn-group">
                  
                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

              </div>  

            </td>

          </tr>
         
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

                <input type="text" class="form-control input-lg" name="nuevaCantidad" placeholder="Ingresar cantidad articulos" required>

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

          <button type="submit" class="btn btn-primary">Guardar cliente</button>

        </div>

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

                  <select class="form-control input-lg" name="idEstado" required>
                  
                    <option id="editarEstado">Selecionar Estado</option>
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

      </form>

    </div>

  </div>

</div>




