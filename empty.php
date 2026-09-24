<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>RDM 2.0 - ManGo!</title>
	<link rel="stylesheet" href="css/estilos.css">
	<script src="js/topbar_scroll.js"></script>
    <script src="js/theme_toggle.js"></script>
</head>
<body>

<header class="rdm-topbar--position">
	<div class="rdm-topbar--small-container" id="topbar">
		<div class="rdm-topbar--media">
			<a href="index.php"><div class="rdm-topbar--leading-navigation-icon"><span class="material-symbols-rounded">arrow_back</span></div></a>
		</div>
		<div class="rdm-topbar--body">
			<div class="rdm-sys-typography--title-large"><div class="rdm-topbar--body-headline">Empty State</div></div>
		</div>
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

    <h1 class="rdm-sys-typography--display-medium">Empty State</h1>
    <p class="rdm-sys-typography--body-large">Patrón M3 para búsquedas sin resultados y colecciones vacías. Centrado sobre <code>surface</code>, sin card, con icono, headline, support y acción.</p>

    <!-- Demo 1: Sin resultados de búsqueda -->
    <h2 class="rdm-sys-typography--title-large">Sin resultados (Search Empty)</h2>
    <div class="rdm-empty--container">
        <div class="rdm-empty--icon"><span class="material-symbols-rounded">search_off</span></div>
        <h3 class="rdm-empty--headline rdm-sys-typography--title-large">Sin resultados para "metallica"</h3>
        <p class="rdm-empty--support rdm-sys-typography--body-medium">Revisa la ortografía o intenta con otro nombre, código o marca.</p>
        <div class="rdm-empty--actions">
            <button class="rdm-button--text" type="button"><div class="rdm-button--container"><div class="rdm-button--body"><span class="rdm-sys-typography--label-large">Limpiar búsqueda</span></div></div></button>
        </div>
    </div>

    <!-- Demo 2: Colección vacía (genérico) -->
    <h2 class="rdm-sys-typography--title-large">Colección vacía</h2>
    <div class="rdm-empty--container">
        <div class="rdm-empty--icon"><span class="material-symbols-rounded">inbox</span></div>
        <h3 class="rdm-empty--headline rdm-sys-typography--title-large">No hay registros</h3>
        <p class="rdm-empty--support rdm-sys-typography--body-medium">Aún no hay elementos en esta colección.</p>
        <div class="rdm-empty--actions">
            <button class="rdm-button--filled" type="button"><div class="rdm-button--container"><div class="rdm-button--media"><div class="rdm-button--icon"><span class="material-symbols-rounded">add</span></div></div><div class="rdm-button--body"><span class="rdm-sys-typography--label-large">Crear registro</span></div></div></button>
        </div>
    </div>

    <!-- Demo 3: Sin resultados con contexto de usuarios -->
    <h2 class="rdm-sys-typography--title-large">Sin resultados — Usuarios</h2>
    <div class="rdm-empty--container">
        <div class="rdm-empty--icon"><span class="material-symbols-rounded">person_search</span></div>
        <h3 class="rdm-empty--headline rdm-sys-typography--title-large">Sin resultados para "jose"</h3>
        <p class="rdm-empty--support rdm-sys-typography--body-medium">Prueba con otro nombre, correo o tipo.</p>
        <div class="rdm-empty--actions">
            <button class="rdm-button--text" type="button"><div class="rdm-button--container"><div class="rdm-button--body"><span class="rdm-sys-typography--label-large">Limpiar búsqueda</span></div></div></button>
        </div>
    </div>

</main>

</body>
</html>
