<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>RDM 2.0 - ManGo!</title>
	<link rel="stylesheet" href="css/estilos.css">
	<!-- Script que cambia los atributos de la top bar al hacer scroll -->
	<script src="js/topbar_scroll.js"></script>
    <script src="js/theme_toggle.js"></script>
</head>
<body>

<!-- Top bar -->
<header class="rdm-topbar--position">	

	<!-- Top bar container -->
	<div class="rdm-topbar--small-container" id="topbar">

		<!-- Top bar media -->
		<div class="rdm-topbar--media">
			<a href="index.php"><div class="rdm-topbar--leading-navigation-icon"><span class="material-symbols-rounded">arrow_back</span></div></a>
		</div>

		<!-- Top bar body-->
		<div class="rdm-topbar--body">
			<div class="rdm-sys-typography--title-large"><div class="rdm-topbar--body-headline">Buttons</div></div>
		</div>

        <!-- Top bar action-->
        <div class="rdm-topbar--action">
            <div class="rdm-topbar--trailing-icon" id="themeToggle" title="Cambiar tema">
                <span class="material-symbols-rounded" id="themeToggleIcon">dark_mode</span>
            </div>
            <div class="rdm-topbar--avatar" style="background-image: url(img/a1.jpg);">
                <div class="rdm-sys-typography--title-medium"></div>
            </div>
        </div>

	</div>
	
</header>

<main class="rdm--contenedor-toolbar">


    <!-- Elevated buttons -->

    <h1 class="rdm-sys-typography--display-medium">Elevated buttons</h1>

    <p>
        <!-- button -->

        <button class="rdm-button--elevated">

        <div class="rdm-button--container">

            <div class="rdm-button--media">
                <div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div>
            </div>

            <div class="rdm-button--body">
                <span class="rdm-sys-typography--label-large">Button</span>
            </div>

        </div>

        </button>

        <!-- button -->

        <button class="rdm-button--elevated">

        <div class="rdm-button--container">            

            <div class="rdm-button--body">
                <span class="rdm-sys-typography--label-large">Button</span>
            </div>

        </div>

        </button>
     
    </p>

    <!-- Filled buttons -->

    <h1 class="rdm-sys-typography--display-medium">Filled buttons</h1>
    
    <p>
        <!-- button -->

        <button class="rdm-button--filled">

        <div class="rdm-button--container">

            <div class="rdm-button--media">
                <div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div>
            </div>

            <div class="rdm-button--body">
                <span class="rdm-sys-typography--label-large">Button</span>
            </div>

        </div>

        </button>

        <!-- button -->

        <button class="rdm-button--filled">

        <div class="rdm-button--container">            

            <div class="rdm-button--body">
                <span class="rdm-sys-typography--label-large">Button</span>
            </div>

        </div>

        </button>
     
    </p> 

    <!-- Tonal buttons -->

    <h1 class="rdm-sys-typography--display-medium">Tonal buttons</h1>
    
    <p>
        <!-- button -->

        <button class="rdm-button--tonal">

        <div class="rdm-button--container">

            <div class="rdm-button--media">
                <div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div>
            </div>

            <div class="rdm-button--body">
                <span class="rdm-sys-typography--label-large">Button</span>
            </div>

        </div>

        </button>

        <!-- button -->

        <button class="rdm-button--tonal">

        <div class="rdm-button--container">            

            <div class="rdm-button--body">
                <span class="rdm-sys-typography--label-large">Button</span>
            </div>

        </div>

        </button>
     
    </p>

    <!-- Outlined buttons -->

    <h1 class="rdm-sys-typography--display-medium">Outlined buttons</h1>
    
    <p>
        <!-- button -->

        <button class="rdm-button--outlined">

        <div class="rdm-button--container">

            <div class="rdm-button--media">
                <div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div>
            </div>

            <div class="rdm-button--body">
                <span class="rdm-sys-typography--label-large">Button</span>
            </div>

        </div>

        </button>

        <!-- button -->

        <button class="rdm-button--outlined">

        <div class="rdm-button--container">            

            <div class="rdm-button--body">
                <span class="rdm-sys-typography--label-large">Button</span>
            </div>

        </div>

        </button>
     
    </p>

    <!-- Text buttons -->

    <h1 class="rdm-sys-typography--display-medium">Text buttons</h1>
    
    <p>
        <!-- button -->

        <button class="rdm-button--text">

        <div class="rdm-button--container">

            <div class="rdm-button--media">
                <div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div>
            </div>

            <div class="rdm-button--body">
                <span class="rdm-sys-typography--label-large">Button</span>
            </div>

        </div>

        </button>

        <!-- button -->

        <button class="rdm-button--text">

        <div class="rdm-button--container">            

            <div class="rdm-button--body">
                <span class="rdm-sys-typography--label-large">Button</span>
            </div>

        </div>

        </button>
     
    </p>

    <!-- Icon buttons -->

    <h1 class="rdm-sys-typography--display-medium">Icon buttons</h1>
    <p class="rdm-sys-typography--body-large">Modificador de tamano: se combina con cualquier variante para heredar color, state layer y disabled. 40x40 visual, icono 24dp centrado.</p>

    <p>        <button class="rdm-button--elevated rdm-button--icon-only" aria-label="Agregar">
        <div class="rdm-button--container">
            <div class="rdm-button--media">
                <div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div>
            </div>
        </div>
        </button>
        <button class="rdm-button--filled rdm-button--icon-only" aria-label="Agregar">
        <div class="rdm-button--container">
            <div class="rdm-button--media">
                <div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div>
            </div>
        </div>
        </button>
        <button class="rdm-button--tonal rdm-button--icon-only" aria-label="Agregar">
        <div class="rdm-button--container">
            <div class="rdm-button--media">
                <div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div>
            </div>
        </div>
        </button>
        <button class="rdm-button--outlined rdm-button--icon-only" aria-label="Agregar">
        <div class="rdm-button--container">
            <div class="rdm-button--media">
                <div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div>
            </div>
        </div>
        </button>
        <button class="rdm-button--text rdm-button--icon-only" aria-label="Agregar">
        <div class="rdm-button--container">
            <div class="rdm-button--media">
                <div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div>
            </div>
        </div>
        </button>
        <button class="rdm-button--filled rdm-button--icon-only" aria-label="Agregar" disabled>
        <div class="rdm-button--container">
            <div class="rdm-button--media">
                <div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div>
            </div>
        </div>
        </button>
    </p>
    <!-- Disabled buttons -->

    <h1 class="rdm-sys-typography--display-medium">Disabled buttons</h1>
    <p class="rdm-sys-typography--body-large">M3 aplica 38% de opacidad sobre el container y la etiqueta, sin elevacion y sin state layer.</p>

    <p>        <!-- disabled elevated -->
        <button class="rdm-button--elevated" disabled>
        <div class="rdm-button--container">
            <div class="rdm-button--media">
                <div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div>
            </div>
            <div class="rdm-button--body">
                <span class="rdm-sys-typography--label-large">Button</span>
            </div>
        </div>
        </button>
        <!-- disabled filled -->
        <button class="rdm-button--filled" disabled>
        <div class="rdm-button--container">
            <div class="rdm-button--media">
                <div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div>
            </div>
            <div class="rdm-button--body">
                <span class="rdm-sys-typography--label-large">Button</span>
            </div>
        </div>
        </button>
        <!-- disabled tonal -->
        <button class="rdm-button--tonal" disabled>
        <div class="rdm-button--container">
            <div class="rdm-button--media">
                <div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div>
            </div>
            <div class="rdm-button--body">
                <span class="rdm-sys-typography--label-large">Button</span>
            </div>
        </div>
        </button>
        <!-- disabled outlined -->
        <button class="rdm-button--outlined" disabled>
        <div class="rdm-button--container">
            <div class="rdm-button--media">
                <div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div>
            </div>
            <div class="rdm-button--body">
                <span class="rdm-sys-typography--label-large">Button</span>
            </div>
        </div>
        </button>
        <!-- disabled text -->
        <button class="rdm-button--text" disabled>
        <div class="rdm-button--container">
            <div class="rdm-button--media">
                <div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div>
            </div>
            <div class="rdm-button--body">
                <span class="rdm-sys-typography--label-large">Button</span>
            </div>
        </div>
        </button>
    </p>

    <!-- FAB buttons -->

    <h1 class="rdm-sys-typography--display-medium">FAB buttons</h1>
    <p class="rdm-sys-typography--body-large">M3 reserva el FAB para una accion constructiva y dominante (create, add, share, favorite, explore). Prohibe expresamente las acciones menores y destructivas: "Avoid using a FAB for minor or destructive actions, such as: Archive or trash". Por eso el showroom no incluye un FAB de eliminar, y <code>rdm-button--destructive</code> no se combina con esta variante.</p>

    <p>
        <!-- button -->
        <button class="rdm-button--fab">
            <div class="rdm-button--container">
                <div class="rdm-button--media">
                    <div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div>
                </div>

                <div class="rdm-button--body">
                    <span class="rdm-sys-typography--label-large">New task</span>
                </div>
            </div>
        </button>

        <!-- button -->
        <button class="rdm-button--fab">
            <div class="rdm-button--container">
                <div class="rdm-button--fab-media">
                    <div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div>
                </div>
            </div>
        </button>
     
    </p>


    
    

    <!-- FAB buttons -->

    <p>
        <!-- FAB position -->

        <div class="rdm-button--fab-position">

            <button class="rdm-button--fab">

            <div class="rdm-button--container">

                <div class="rdm-button--media">
                    <div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div>
                </div>

                <div class="rdm-button--body">
                    <span class="rdm-sys-typography--label-large">New task</span>
                </div>

            </div>

            </button>

        </div> 
     
    </p>

    <!-- FAB large -->

    <h1 class="rdm-sys-typography--display-medium">FAB large</h1>
    <p class="rdm-sys-typography--body-large">96x96, radio 28dp, icono 36dp y elevacion nivel 3. El large de M3 es cuadrado y solo lleva icono: para un FAB con etiqueta se usa el medium.</p>

    <p>
        <button class="rdm-button--fab-large" aria-label="Favorito">
            <div class="rdm-button--container">
                <div class="rdm-button--media">
                    <div class="rdm-button--icon"><span class="material-symbols-rounded">favorite</span></div>
                </div>
            </div>
        </button>

        <button class="rdm-button--fab-large" aria-label="Agregar">
            <div class="rdm-button--container">
                <div class="rdm-button--media">
                    <div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div>
                </div>
            </div>
        </button>

        <button class="rdm-button--fab-large" aria-label="Compartir" disabled>
            <div class="rdm-button--container">
                <div class="rdm-button--media">
                    <div class="rdm-button--icon"><span class="material-symbols-rounded">share</span></div>
                </div>
            </div>
        </button>
    </p>

    <!-- Destructive buttons -->

    <h1 class="rdm-sys-typography--display-medium">Destructive buttons</h1>
    <p class="rdm-sys-typography--body-large">No es una sexta variante: M3 define cinco (elevated, filled, tonal, outlined, text). Es un modificador de rol de color que reasigna la variante a la paleta Error, por eso se combina con cualquiera de ellas. Se usa una sola vez por pantalla, siempre con dialogo de confirmacion, y la etiqueta nombra la accion porque el color no puede ser el unico indicio (WCAG 1.4.1).</p>

    <p>
        <button class="rdm-button--text rdm-button--destructive">
            <div class="rdm-button--container">
                <div class="rdm-button--media">
                    <div class="rdm-button--icon"><span class="material-symbols-rounded">delete</span></div>
                </div>
                <div class="rdm-button--body">
                    <span class="rdm-sys-typography--label-large">Eliminar</span>
                </div>
            </div>
        </button>

        <button class="rdm-button--outlined rdm-button--destructive">
            <div class="rdm-button--container">
                <div class="rdm-button--media">
                    <div class="rdm-button--icon"><span class="material-symbols-rounded">delete</span></div>
                </div>
                <div class="rdm-button--body">
                    <span class="rdm-sys-typography--label-large">Eliminar</span>
                </div>
            </div>
        </button>

        <button class="rdm-button--tonal rdm-button--destructive">
            <div class="rdm-button--container">
                <div class="rdm-button--media">
                    <div class="rdm-button--icon"><span class="material-symbols-rounded">delete</span></div>
                </div>
                <div class="rdm-button--body">
                    <span class="rdm-sys-typography--label-large">Eliminar</span>
                </div>
            </div>
        </button>

        <button class="rdm-button--filled rdm-button--destructive">
            <div class="rdm-button--container">
                <div class="rdm-button--media">
                    <div class="rdm-button--icon"><span class="material-symbols-rounded">delete</span></div>
                </div>
                <div class="rdm-button--body">
                    <span class="rdm-sys-typography--label-large">Eliminar</span>
                </div>
            </div>
        </button>

        <button class="rdm-button--filled rdm-button--destructive" disabled>
            <div class="rdm-button--container">
                <div class="rdm-button--media">
                    <div class="rdm-button--icon"><span class="material-symbols-rounded">delete</span></div>
                </div>
                <div class="rdm-button--body">
                    <span class="rdm-sys-typography--label-large">Eliminar</span>
                </div>
            </div>
        </button>
    </p>

    <p class="rdm-sys-typography--body-large">No se combina con FAB ni con elevated. La guia oficial de FAB prohibe las acciones destructivas en un floating action button (archive or trash), y M3 no define la variante elevated para roles de error.</p>

    <br>
    <br>
    <br>
    <br>
    <br>

</main>

</body>
</html>