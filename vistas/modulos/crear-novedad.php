<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Crear Novedad
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Crear Novedad</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="row">

      <!--=====================================
      el formulario
      ======================================-->
      
      <div class="col-lg-5 col-xs-12">
        
        <div class="box box-success">
          
          <div class="box-header with-border"></div>

          <form role="form" method="post" class="formularioNovedad">

            <div class="box-body">
  
              <div class="box">

                <!--=====================================
                entrada usuario
                ======================================-->
            
                <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control" name="usuarioNovedad" value="<?php echo$_SESSION["NombreUsuario"]; ?>" readonly>

                    <input type="hidden" name="numUsuario" value="<?php echo $_SESSION["NumDocumentoUsuario"]; ?>">

                  </div>

                </div> 

                <!-- ENTRADA PARA LA FICHA  -->
                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      
                    <input type="number" class="form-control input-lg" id="nuevaFicha1" name="nuevaFicha1" placeholder="Ingrese numero de ficha"  required>

                     <span class="input-group-addon btnBuscar btnBuscar1"><button type="button" class="btn btn-primary btn-sm" onclick="ficha(nuevaFicha1.value)"><i class="fa fa-search"></i></button></span>

                  </div>

                </div>

                <!-- ENTRADA PARA EL AMBIENTE -->
                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      
                      <input type="text" class="form-control input-lg" id="nuevoAmbiente1" value name="nuevoAmbiente1" readonly placeholder="Ambiente">

                  </div>

                </div>

                <!-- AGREGAR ARTICULO A LA NOVEDADA -->
                <div class="form-group row nuevoArticulo">

                </div>

                <!-- LISTA ARTICULOS -->
                <input type="hidden" name="listaArticulos" id="listaArticulos">

              </div>

          </div>

          <div class="box-footer">

            <button type="submit" class="btn btn-primary pull-right">Crear Novedad</button>

          </div>

          <?php 

            $crearNovedad = new ControladorNovedades();
            $crearNovedad -> ctrCrearNovedad();

          ?>

        </form>

        </div>
            
      </div>

      <!--=====================================
      tabla de articulos
      ======================================-->

      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
        
        <div class="box box-warning">

          <div class="box-header with-border"></div>

          <div class="box-body">
            
            <table class="table table-bordered table-striped dt-responsive  tablaArticulos" id="tablaArticulos">
              
               <thead>

                 <tr>
                  <th style="width: 10px">ID</th>
                  <th>Tipo Articulo</th>
                  <th>Numero Inventario Sena</th>
                  <th>Modelo</th>
                  <th>Serial</th>
                  <th>Equipo</th>
                  <th>Ambiente</th>
                  <th>acciones</th>
                </tr>

              </thead>

              
            </table>

          </div>

        </div>


      </div>

    </div>
   
  </section>

</div>

