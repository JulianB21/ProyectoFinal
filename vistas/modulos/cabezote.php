 <header class="main-header">

	<!-- LOGOTIPO -->
	<a href="inicio" class="logo">

		<!-- LOGO MINI -->
		<span class="logo-mini">

			<img src="vistas/img/plantilla/logo1.png" class="img-responsive" style="padding:10px 0px 10px 0px">

		</span>

		<!-- LOGO NORMAL -->
		<span class="logo-lg">

			<img src="vistas/img/plantilla/logo.png" class="img-responsive" style="padding:0px 10px 10px 10px">

		</span>

	</a>

	<!-- BARRA DE NAVEGACION -->
	<nav class="navbar navbar-static-top" role="navigation">

		<!-- BOTON DE NAVEGACION -->
	 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

        	<span class="sr-only">Toggle navigation</span>

      	</a>

		<!-- PERFIL DE USUARIO -->
		<div class="navbar-custom-menu">

			<ul class="nav navbar-nav">

				<li class="dropdown user user-menu">

					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<?php

					if($_SESSION["FotoUsuario"] != ""){

						echo '<img src="'.$_SESSION["FotoUsuario"].'" class="user-image">';

					}else{


						echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

					}


					?>
						
						<span class="hidden-xs"><?php  echo $_SESSION["NombreUsuario"]; ?></span>

					</a>

					<!-- DROPDOWN-TOGGLE -->
					<ul class="dropdown-menu">

						<li class="user-body">

							<div class="pull-right">

								<a href="salir" class="btn btn-default btn-flat">Salir</a>

							</div>

						</li>

					</ul>

				</li>

			</ul>

		</div>

	</nav>

 </header>
