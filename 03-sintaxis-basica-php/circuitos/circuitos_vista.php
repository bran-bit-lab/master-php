<!DOCTYPE html>
	<html>
	<head>
		<meta charset= "UTF-8">
	 	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Calculadora de Circuitos Electricos</title>
		<link rel="stylesheet" href="./index.css">
		<!-- Materialize -->
    	<link rel="stylesheet" href="./materialize.min.css">
  		<!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
    	<script src="./materialize.min.js"></script>
	</head>
	<body>
		
		<!-- Navbar  -->
		<div class="navbar-fixed">
			<nav>
				<div class="nav-wrapper">
					<div class="d-flex-c-c">
						<a href="#!" class="logo d-flex-r-s">Bran-Bit-Lab</a>
					</div>
				</div>
			</nav>
		</div>

		<header>
			<div class="d-flex-c-c">
				<h3 class="text-center" style="margin: 0">Bienvenido a la Calculadora de circuitos</h3>
				<h4 class="text-center">Leyes de OHM</h4>
			</div>
		</header>

		<div class="mt-2">
			<div class="container">
				<div class="row mt-2">
					<h4 class="subtitle">Leyes de OHM</h4>
					<div class="col s12 m4">
						<div class="text-center cont-img">
							<img src="https://via.placeholder.com/150" class="responsive-img" alt="">
						</div>
						<p class="text-justify">
							descripcion de formula + img <br> <br>

							Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero modi nobis reprehenderit excepturi laboriosam dignissimos odit sint tempore laborum sed.
						</p>
					</div>
					<div class="col s12 m4">
						<div class="text-center cont-img">
							<img src="https://via.placeholder.com/150" class="responsive-img" alt="">
						</div>
						<p class="text-justify">
							descripcion de formula + img <br> <br>

							Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero modi nobis reprehenderit excepturi laboriosam dignissimos odit sint tempore laborum sed.
						</p>
					</div>
					<div class="col s12 m4">
						<div class="text-center cont-img">
							<img src="https://via.placeholder.com/150" class="responsive-img" alt="">
						</div>
						<p class="text-justify">
							descripcion de formula + img <br> <br>

							Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero modi nobis reprehenderit excepturi laboriosam dignissimos odit sint tempore laborum sed.
						</p>
					</div>
				</div>
				<h4 class="subtitle">Circuito en Serie</h4>
				<article class="text-justify">

					descripcion de circuitos en serie <br> <br>

					Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi laboriosam, repudiandae magni quasi, et dignissimos voluptatibus doloremque eligendi repellat odit, deleniti itaque, corporis? Consequuntur aspernatur harum, at veniam, accusamus aliquid excepturi quasi culpa, natus laboriosam officiis nemo animi repellat, earum laudantium fugiat minus expedita. Dolores repellendus nisi aliquam tempora totam!

				</article>

				<div class="center mt-2">
					<img src="./imagenes-sintaxis-basica/circuito_serie1.jpeg" class="responsive-img" alt="circuito"/>
				</div>

				<p>
					Colocar instrucciones de uso del formulario			
				</p>

				<?php if ( $error ): ?>
					<div class="text-center">
						<strong style="color: red"><?= $mensaje ?></strong>
					</div>
				<?php endif; ?>

				<!-- form- resistencia -->
				<form action="circuitos_controlador.php" method="GET">


					<div class="row">
						<div class="col s12 m6 p-2">
							<h5>Calcular resistencia:</h5>

							<p>
							<label for="resistenciaR1">Resistencia de R1 en ohms: </label>
							<input type="text" name="resistenciaR1" />
							<p/>

							<p>
							<label for="resistenciaR2">Resistencia de R2 en ohms: </label>
							<input type="text" name="resistenciaR2" />
							<p/>

							<p>
							<label for="resistenciaR3">Resistencia de R3 en ohms: </label>
							<input type="text" name="resistenciaR3" />
							<p/>

							<p>
							
							<p/>	

							<p>
							<label for="resistenciaTotal"> Resistencia total en ohms: </label>
							<input type="text" readonly name="resistenciaTotal" value="<?= $rT ?>" />
							<p/>

						</div>
						<div class="col s12 m6 p-2">
							<h5>Calcular voltios:</h5>
							<p>
							<label for="voltageR1">Voltage en R1 en voltios: </label>
							<input type="text" name="voltageR1" />
							<p/>

							<p>
							<label for="voltageR2">Voltage en R2 en voltios: </label>
							<input type="text" name="voltageR2" />
							<p/>

							<p>
							<label for="voltageR3">Voltage en R3 en voltios: </label>
							<input type="text" name="voltageR3" />
							<p/>

							<p>
							<p/>	

							<p>
							<label for="voltageTotal"> Voltage en total en voltios: </label>
							<input type="text" readonly name="voltageTotal" value="<?= $vT ?>" />'
							<p/>
						</div>

						<div class="col s12 m6 p-2">
							<p>
								<label for="intensidadTotal">Intensidad en Amperios: </label>
								<input type="text" name="intensidadTotal" value="<?= $iT ?>" />
							<p/>
						</div>
						<div class="col s12 m6 p-2 h-100">
							<div class="d-flex-r-sa">
								<input type="submit" class="btn" value="Procesar"/>
								<input type="reset" class="btn" value="limpiar">
							</div>
						</div>
					</div>

				</form>	

			</div>
		</div>

		<footer class="page-footer page-footer-gray">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Créditos a:</h5>
            <ul>
              <li>
              	<a class="grey-text text-lighten-3" href="https://github.com/bran-bit-lab">
              		Brandon Silva ( bran-bit-lab ) Programador
              	</a></li>
              <li>
              	<a class="grey-text text-lighten-3" href="https://gabmart1995.github.io/">
              		Gabriel Martínez ( gabmart1995 ) Diseñador
              	</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        © 2020 Bran-Bit-Lab & Gabriel Martínez
        </div>
      </div>
    </footer>

	</body>
	</html>

