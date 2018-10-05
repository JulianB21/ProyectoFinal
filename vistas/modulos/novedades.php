<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Novedades
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar novedades</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <a href="crear-novedad">
  
          <button class="btn btn-primary">
            
            Agregar novedad

          </button>

        </a>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">ID</th>
           <th>Nombre Usuario</th>
           <th>Ficha</th>
           <th>Fecha</th>
           <th>Detalles</th>
           <th>Ambiente</th>

         </tr> 

        </thead>

        <tbody>

          <?php 

            $item = null;
            $valor = null;

            $respuesta = ControladorNovedades::ctrMostrarNovedades($item, $valor);


            foreach ($respuesta as $key => $value) {
              echo '<tr>

                      <td>'.$value["IdNovedad"].'</td>

                      <td>'.$value["UsuarioNovedad"].'</td>

                      <td>'.$value["NumeroFicha"].'</td>

                      <td>'.$value["FechaNovedad"].'</td>

                      <td>

                        <div class="btn-group">
                            
                          <button class="btn btn-success"><i class="fa fa-pencil"></i></button>

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
