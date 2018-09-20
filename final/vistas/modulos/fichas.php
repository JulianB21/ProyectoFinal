<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Fichas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Fichas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarFicha">
          
          Agregar Ficha

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Numero Ficha</th>
           <th>Programa</th>
           <th>Ambiente</th>
           <th>Fecha Inicio</th>
           <th>Fecha Fin</th>
           <th>Jornada</th> 
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>
          
          <tr>

           <td>1</td>
           <td>1493990</td>
           <td>ADSI</td>
           <td>AMBIENTE L</td>
           <td>2017-06-15</td>
           <td>2018-06-15</td>
           <td>TARDE</td> 

            <td>

              <div class="btn-group">
                  
                <button class="btn btn-warning" data-toggle="modal" data-target="#modalEditarFicha"><i class="fa fa-pencil"></i></button>

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
MODAL AGREGAR FICHA
======================================-->

<div id="modalAgregarFicha" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Ficha</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NUMERO DE FICHA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaFicha" placeholder="Ingresar Numero De Ficha" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR PROGRAMA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" name="nuevoPrograma">
                  
                  <option value="">Selecionar programa</option>

                  <?php

$item  = null;
$valor = null;

$programa = ControladorProgramas::ctrMostrarProgramas($item, $valor);

foreach ($programa as $key => $value) {

    echo '<option value="' . $value["IdPrograma"] . '">' . $value["NombrePrograma"] . '</option>';
}

?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR AMBIENTE -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" name="nuevoAmbiente">
                  
                  <option value="">Selecionar ambiente</option>

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

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                    <select class="form-control input-lg" name="nuevaJornada">
                  
                  <option value="">Selecionar Jornada</option>
                  <option value="Mañana">Mañana</option>
                  <option value="Tarde">Tarde</option>
                  <option value="Noche">Noche</option>

                    </select>

              </div>

            </div>



            <!-- ENTRADA PARA LA FECHA DE INICIO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaFechaInicio" placeholder="Ingresar fecha inicio" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA DE FIN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaFechaFin" placeholder="Ingresar fecha fin" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Ficha</button>

        </div>
        <?php 
              $crearFicha= new ControladorFichas();
              $crearFicha->ctrAgregarFichas();


         ?>

      </form>

    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR FICHA
======================================-->

<div id="modalEditarFicha" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Ficha</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NUMERO DE FICHA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="number" class="form-control input-lg" name="editarFicha" placeholder="Ingresar Numero De Ficha" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR PROGRAMA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" name="editarPrograma">
                  
                  <option value="">Selecionar programa</option>

                  <option value="ADSI">ADSI</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR AMBIENTE -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" name="editarAmbiente">
                  
                  <option value="">Selecionar ambiente</option>

                  <option value="TBT">TBT</option>

                </select>

              </div>

            </div>


            <!-- ENTRADA PARA LA FECHA DE INICIO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="editarFechaInicio" placeholder="Ingresar fecha inicio" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA DE FIN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="editarFechaFin" placeholder="Ingresar fecha fin" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Cambios</button>

        </div>

      </form>

    </div>

  </div>

</div>


