<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrar Programas
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="inicio">
                    <i class="fa fa-dashboard">
                    </i>
                    Inicio
                </a>
            </li>
            <li class="active">
                Administrar Programas
            </li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-target="#modalAgregarPrograma" data-toggle="modal">
                    Agregar Programa
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas">
                    <thead>
                        <tr>
                            <th style="width:10px">
                                #
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Tipo de Programa
                            </th>
                            <th>
                                Duración
                            </th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

$item      = null;
$valor     = null;
$respuesta = ControladorProgramas::ctrMostrarProgramas($item, $valor);

foreach ($respuesta as $key => $value) {
    echo '<tr>
                            <td>
                                ' . $key . '
                            </td>
                            <td>' . $value["NombrePrograma"] . '.
                            </td>
                            <td>
                                ' . $value["TipoPrograma"] . '
                            </td>
                            <td>
                                ' . $value["DuracionPrograma"] . '
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning btnEditarPrograma" idPrograma="' . $value["IdPrograma"] . '"  data-toggle="modal" data-target="#modalEditarPrograma">
                                        <i class="fa fa-pencil">
                                        </i>
                                    </button>
                                    <button class="btn btn-danger btnEliminarPrograma" idPrograma="' . $value["IdPrograma"] . '">
                                        <i class="fa fa-times">
                                        </i>
                                    </button>
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
<!-- MODAL AGREGAR PROGRAMA -->
<div class="modal fade" id="modalAgregarPrograma" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form enctype="multipart/form-data" method="post" role="form">
                <!-- CABEZA DEL MODAL -->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                    <h4 class="modal-title">
                        Agregar Programa
                    </h4>
                </div>
                <div class="modal-body">
                    <!-- CUERPO DEL MODAL -->
                    <div class="box-body">
                        <!-- ENTRADA PARA EL PROGRAMA -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user">
                                    </i>
                                </span>
                                <input class="form-control input-lg" name="NuevoPrograma" placeholder="Nombre del Programa" required="" type="text">
                                </input>
                            </div>
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR TIPO DE PROGRAMAL -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-users">
                                    </i>
                                </span>
                                <select class="form-control input-lg" name="TipoPrograma" id="TipoPrograma" onchange="duracion(this.value)">
                                    <option value="">
                                        Seleccione el Programa
                                    </option>
                                    <option value="Tecnico">
                                        Técnico
                                    </option>
                                    <option value="Tecnologo">
                                        Tecnólogo
                                    </option>
                                    <option value="Complementario">
                                        Complementario
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user">
                                    </i>
                                </span>
                                <input class="form-control input-lg" name="nuevaDuracion"  id="nuevaDuracion" placeholder="Duracion del Programa" required="" type="text">
                                </input>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PIE DEL MODAL -->
                <div class="modal-footer">
                    <button class="btn btn-default pull-left" data-dismiss="modal" type="button">
                        Salir
                    </button>
                    <button class="btn btn-primary" type="submit">
                        Guardar Programa
                    </button>
                </div>
<?php
$crearPrograma = new ControladorProgramas();
$crearPrograma->ctrCrearProgramas();

?>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalEditarPrograma" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form enctype="multipart/form-data" method="post" role="form">
                <!-- CABEZA DEL MODAL -->
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                    <h4 class="modal-title">
                        Editar Programa
                    </h4>
                </div>
                <div class="modal-body">
                    <!-- CUERPO DEL MODAL -->
                    <div class="box-body">
                        <!-- ENTRADA PARA EL PROGRAMA -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user">
                                    </i>
                                </span>
                                <input class="form-control input-lg" name="EditarPrograma" id="EditarPrograma" required="" type="text">
                                </input>
                                <input class="form-control input-lg" name="idPrograma" id="idPrograma" type="hidden">
                                </input>
                            </div>
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR TIPO DE PROGRAMAL -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-users">
                                    </i>
                                </span>
                                <select class="form-control input-lg" name="EditarTipoPrograma" id="EditarTipoPrograma" onchange="duracion(this.value)">
                                    <option value="">
                                        Selecionar Tipo de Programa
                                    </option>
                                    <option value="TENICO">
                                        Técnico
                                    </option>
                                    <option value="TECNOLOGO">
                                        Tecnólogo
                                    </option>
                                    <option value="COMPLEMENTARIO">
                                        Complementario
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-user">
                                    </i>
                                </span>
                                <input class="form-control input-lg" name="EditarDuracion" id="EditarDuracion" required="" type="text">
                                </input>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PIE DEL MODAL -->
                <div class="modal-footer">
                    <button class="btn btn-default pull-left" data-dismiss="modal" type="button">
                        Salir
                    </button>
                    <button class="btn btn-primary" type="submit">
                        Actualizar Programa
                    </button>
                </div>
<?php
$editarPrograma = new ControladorProgramas();
$editarPrograma->ctrEditarPrograma();

?>
            </form>
        </div>
    </div>
</div>

<?php
$borrarPrograma = new ControladorProgramas();
$borrarPrograma->ctrBorrarPrograma();

?>


