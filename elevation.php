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
			<div class="rdm-sys-typography--title-large"><div class="rdm-topbar--body-headline">Elevation</div></div>
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

    <h1 class="rdm-sys-typography--display-medium">Elevation</h1>
    <p class="rdm-sys-typography--body-large">M3 tiene dos formas de expresar jerarquia de profundidad. La <strong>elevacion por sombra</strong> se usa en elementos que flotan sobre la pagina (FAB, menus, dialogs). La <strong>elevacion tonal</strong> se usa en contenedores y se logra con los pasos de superficie, sin sombra. Esta pagina demuestra las dos.</p>

    <!-- ============ ELEVACION POR SOMBRA ============ -->

    <h1 class="rdm-sys-typography--display-medium">Elevacion por sombra</h1>
    <p class="rdm-sys-typography--body-large">Los seis niveles de Material Design 3, definidos en <code>css/md/tokens.css</code> como <code>--md-sys-elevation-level0..5</code>. El nivel 0 no lleva sombra.</p>

    <div class="rdm-elevation--wrapper">

        <div class="rdm-elevation--demo rdm-elevation--level0">
            <h2 class="rdm-elevation--title rdm-sys-typography--title-large">Level 0</h2>
            <p class="rdm-elevation--token rdm-sys-typography--body-medium">--md-sys-elevation-level0: none</p>
        </div>

        <div class="rdm-elevation--demo rdm-elevation--level1">
            <h2 class="rdm-elevation--title rdm-sys-typography--title-large">Level 1</h2>
            <p class="rdm-elevation--token rdm-sys-typography--body-medium">0 1px 2px 0 rgba(0,0,0,.3), 0 1px 3px 1px rgba(0,0,0,.15)</p>
        </div>

        <div class="rdm-elevation--demo rdm-elevation--level2">
            <h2 class="rdm-elevation--title rdm-sys-typography--title-large">Level 2</h2>
            <p class="rdm-elevation--token rdm-sys-typography--body-medium">0 1px 2px 0 rgba(0,0,0,.3), 0 2px 6px 2px rgba(0,0,0,.15)</p>
        </div>

        <div class="rdm-elevation--demo rdm-elevation--level3">
            <h2 class="rdm-elevation--title rdm-sys-typography--title-large">Level 3</h2>
            <p class="rdm-elevation--token rdm-sys-typography--body-medium">0 1px 3px 0 rgba(0,0,0,.3), 0 4px 8px 3px rgba(0,0,0,.15)</p>
        </div>

        <div class="rdm-elevation--demo rdm-elevation--level4">
            <h2 class="rdm-elevation--title rdm-sys-typography--title-large">Level 4</h2>
            <p class="rdm-elevation--token rdm-sys-typography--body-medium">0 2px 4px 0 rgba(0,0,0,.3), 0 6px 10px 4px rgba(0,0,0,.15)</p>
        </div>

        <div class="rdm-elevation--demo rdm-elevation--level5">
            <h2 class="rdm-elevation--title rdm-sys-typography--title-large">Level 5</h2>
            <p class="rdm-elevation--token rdm-sys-typography--body-medium">0 4px 8px 3px rgba(0,0,0,.15), 0 8px 12px 6px rgba(0,0,0,.15)</p>
        </div>

    </div>

    <!-- ============ ELEVACION TONAL ============ -->

    <h1 class="rdm-sys-typography--display-medium">Elevacion tonal</h1>
    <p class="rdm-sys-typography--body-large">En M3 los contenedores se separan por color de superficie, no por sombra. Cada nivel usa un <code>surface-container</code> distinto. Esta es la via recomendada para cards, menus y superficies en general.</p>

    <div class="rdm-elevation--wrapper">

        <div class="rdm-elevation--demo rdm-elevation--surface-lowest">
            <h2 class="rdm-elevation--title rdm-sys-typography--title-large">Surface container lowest</h2>
            <p class="rdm-elevation--token rdm-sys-typography--body-medium">--md-sys-color-surface-container-lowest</p>
        </div>

        <div class="rdm-elevation--demo rdm-elevation--surface-low">
            <h2 class="rdm-elevation--title rdm-sys-typography--title-large">Surface container low</h2>
            <p class="rdm-elevation--token rdm-sys-typography--body-medium">--md-sys-color-surface-container-low</p>
        </div>

        <div class="rdm-elevation--demo rdm-elevation--surface">
            <h2 class="rdm-elevation--title rdm-sys-typography--title-large">Surface container</h2>
            <p class="rdm-elevation--token rdm-sys-typography--body-medium">--md-sys-color-surface-container</p>
        </div>

        <div class="rdm-elevation--demo rdm-elevation--surface-high">
            <h2 class="rdm-elevation--title rdm-sys-typography--title-large">Surface container high</h2>
            <p class="rdm-elevation--token rdm-sys-typography--body-medium">--md-sys-color-surface-container-high</p>
        </div>

        <div class="rdm-elevation--demo rdm-elevation--surface-highest">
            <h2 class="rdm-elevation--title rdm-sys-typography--title-large">Surface container highest</h2>
            <p class="rdm-elevation--token rdm-sys-typography--body-medium">--md-sys-color-surface-container-highest</p>
        </div>

    </div>

    <!-- ============ QUIEN USA QUE ============ -->

    <h1 class="rdm-sys-typography--display-medium">Que componente usa que nivel</h1>
    <p class="rdm-sys-typography--body-large">Referencia rapida de la elevacion asignada a cada componente de la libreria.</p>

    <div class="rdm-elevation--wrapper">
        <div class="rdm-elevation--demo">
            <h2 class="rdm-elevation--title rdm-sys-typography--title-large">Elevacion por sombra</h2>
            <p class="rdm-elevation--token rdm-sys-typography--body-medium">rdm-button--elevated: level1 &nbsp;|&nbsp; rdm-button--fab: level3 &nbsp;|&nbsp; rdm-button--fab-large: level3 &nbsp;|&nbsp; rdm-button--fab-small: level3 &nbsp;|&nbsp; rdm-card--elevated: level1 &nbsp;|&nbsp; rdm-form--elevated: level1</p>
        </div>
        <div class="rdm-elevation--demo">
            <h2 class="rdm-elevation--title rdm-sys-typography--title-large">Elevacion tonal</h2>
            <p class="rdm-elevation--token rdm-sys-typography--body-medium">rdm-button--elevated: surface-container-low &nbsp;|&nbsp; rdm-list--container dentro de card: hereda el fondo de la card</p>
        </div>
    </div>

    <br>
    <br>
    <br>
</main>

</body>
</html>
