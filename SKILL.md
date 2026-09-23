# SKILL - Sistema de Componentes RDM2

## Historial de Versiones

- **v1.6** - Componente Snackbar MD3: Notificaciones flotantes breves (neutral, success, error, warning, info), soporte para acción interactiva, auto-dismiss con pausa en hover y API dual (declarativa y RDM.snackbar.show)
- **v1.5** - Componente Dialog MD3: Elemento nativo HTML5 dialog, 4 configuraciones (Basic, Icon, Selection, Full-screen), focus trap, backdrop animado y soporte para temas
- **v1.4.1** - Search Bar refinements: state layers removidos, leading icon cambiado a search
- **v1.4** - Search Bar 6 mejoras MD3: transiciones 160ms, keyboard nav, error states, helper text, cursor selection, active states
- **v1.3** - Search Bar MD3 compliance complete (avatar, multiple trailing icons, leading button)
- **v1.2** - Radio button normalization, z-index hierarchy
- **v1.1** - Componentes iniciales (Checkbox, Radio, Select, TextField)

---

## Search Bar Component

### Overview
Componente de búsqueda siguiendo especificaciones de Material Design 3 (MD3). Soporta 4 configuraciones de iconografía y estados completos (enabled, focused, disabled).

**Archivos**:
- [css/search.css](css/search.css) - Estilos
- [searches.php](searches.php) - Demostración
- [js/search.js](js/search.js) - Lógica interactiva

### Dimensiones (Material Design 3)
- **Alto**: 56dp (3.5em)
- **Padding horizontal**: 16dp (1em) 
- **Padding vertical**: 12dp (0.75em)
- **Leading icon**: 24dp (1.5em)
- **Trailing icons**: 24dp (1.5em) cada uno
- **Avatar**: 30dp (1.875em)
- **Border radius**: 28px
- **Gap entre iconos**: 8dp (0.5em)
- **Gap icono-avatar**: 8dp (0.5em)

### Anatomía

```
┌─────────────────────────────────────────────┐
│ 🔍                    [🎤] [🔍] [👤]      │  Leading lupa + Input + Trailing icons + Avatar
│      Buscar...                              │
│                                              │
└─────────────────────────────────────────────┘
 Search  Text Field             Voice Search + Avatar
```

**Componentes**:
1. **Leading Icon** (siempre visible): Lupa "search", botón interactivo
2. **Input**: Campo de texto nativo HTML5 search
3. **Trailing Icons** (0-2): Botones interactivos (search, voice, clear, etc.)
4. **Avatar** (opcional): Imagen circular 30dp, siempre a la derecha

### Configuraciones MD3

#### Config 1: With Avatar
- Leading icon: search (lupa)
- Input: búsqueda
- Trailing: solo avatar
- **Caso de uso**: Búsqueda con perfil de usuario visible

```html
<button class="rdm-search--leading-icon">search</button>
<input type="search">
<div class="rdm-search--trailing">
  <img class="rdm-search--avatar" src="...">
</div>
```

#### Config 2: With One Trailing Icon
- Leading icon: search (lupa)
- Input: búsqueda
- Trailing: 1 icono (search, voice o clear)
- **Caso de uso**: Búsqueda estándar con acción

```html
<button class="rdm-search--leading-icon">search</button>
<input type="search">
<div class="rdm-search--trailing">
  <button class="rdm-search--trailing-icon">search</button>
</div>
```

#### Config 3: With Two Trailing Icons
- Leading icon: search (lupa)
- Input: búsqueda
- Trailing: 2 iconos (típicamente voice + search)
- **Caso de uso**: Búsqueda avanzada con voz y texto

```html
<button class="rdm-search--leading-icon">search</button>
<input type="search">
<div class="rdm-search--trailing">
  <button class="rdm-search--trailing-icon">mic</button>
  <button class="rdm-search--trailing-icon">search</button>
</div>
```

#### Config 4: Avatar + Trailing Icon
- Leading icon: search (lupa)
- Input: búsqueda
- Trailing: 1 icono + avatar
- **Caso de uso**: Búsqueda con perfil y acciones

```html
<button class="rdm-search--leading-icon">search</button>
<input type="search">
<div class="rdm-search--trailing">
  <button class="rdm-search--trailing-icon">search</button>
  <img class="rdm-search--avatar" src="...">
</div>
```

### Colores (MD3 Tokens)

| Elemento | Light | Dark |
|----------|-------|------|
| **Fondo** | surface-container-high | surface-container-high |
| **Hover bg** | on-surface @ 0.08 | on-surface @ 0.08 |
| **Active bg** | on-surface @ 0.12 | on-surface @ 0.12 |
| **Text** | on-surface | on-surface |
| **Placeholder** | on-surface-variant | on-surface-variant |
| **Icono** | on-surface-variant | on-surface-variant |
| **Elevación** | 1 → 3 on focus | 1 → 3 on focus |

### Estados

#### Default (Enabled, Empty)
- Input vacío
- Leading icon visible e interactivo
- Trailing: solo close (hidden)
- Sin elevación especial

#### Enabled, Populated
- Input con texto
- Leading icon visible e interactivo
- Trailing: close button (shown)
- Otros trailing icons (search, voice) si están presentes

#### Focused
- Input con foco (focus-visible)
- Elevación aumenta de 1 a 3
- Outline de 2px sobre input
- State layer en leading icon si hover

#### Hover
- State layer: on-surface @ 0.08 en icono
- Para leading icon: 40dp circular background
- Para trailing icons: 40dp circular background

#### Active
- State layer: on-surface @ 0.12 en icono
- Típicamente cuando se presiona un botón

#### Disabled
- Opacidad reducida
- Leading e input deshabilitados
- No responden a eventos
- Trailing icons deshabilitados

### JavaScript API

#### Inicialización automática
```javascript
// El script se ejecuta automáticamente al cargar el DOM
// Maneja todos los .rdm-search--control inputs automáticamente
```

#### Comportamientos automáticos

1. **Toggle Clear Icon**: Botón "close" se muestra solo si input tiene contenido
2. **Clear on Click**: Hacer click en "close" limpia el input y refocaliza
3. **Keyboard Navigation**: 
   - `Escape`: Limpia el input si tiene contenido
   - `Enter`: Dispara evento `search-submit` con el query
   - `Tab`: Navegación correcta entre botones
4. **Auto-validation**: Detecta caracteres especiales y muestra error state
5. **Leading Icon**: Ejecuta lógica de menú (evento custom)
6. **Search Icon**: Ejecuta búsqueda con el contenido
7. **Voice Icon**: Inicia reconocimiento de voz

#### Eventos custom disponibles
```javascript
// Escuchar búsqueda
input.addEventListener('search-submit', (e) => {
  console.log('Query:', e.detail.query);
});

// Escuchar inicio de voz
input.addEventListener('voice-search-start', () => {
  console.log('Micrófono activado');
});

// Escuchar menú
input.addEventListener('menu-open', () => {
  console.log('Menú abierto');
});
```

### CSS Custom Properties

```css
--md-sys-color-surface-container-high: /* Color base */
--md-sys-color-on-surface: /* Texto e iconos */
--md-sys-color-on-surface-variant: /* Placeholder e iconos secundarios */

/* Elevaciones */
--md-sys-elevation-level1: /* Sombra default */
--md-sys-elevation-level3: /* Sombra focused */
```

### BEM Structure

```
.rdm-search                      /* Bloque */
├── --wrapper                    /* Contenedor exterior */
├── --container                  /* Contenedor con márgenes */
├── --bar                        /* Barra de búsqueda principal */
├── --control                    /* Control interior (flex)*/
│   ├── --leading-icon           /* Botón menú/inicio */
│   ├── input (input[type="search"])
│   └── --trailing               /* Contenedor de finales */
│       ├── --trailing-icon      /* Botón individual trailing */
│       └── --avatar             /* Imagen de perfil */
└── --support                    /* Texto de soporte */
```

### Accesibilidad

- **aria-label**: Todos los botones tienen aria-label descriptivo
- **type="search"**: Input semántico HTML5
- **:disabled**: Estado visual claro
- **:focus-visible**: Outline perceptible en navegación por teclado
- **button elements**: Semántica correcta para elementos interactivos

### Responsive

- **Min width**: 360dp (100%)
- **Max width**: 720dp (100%)
- **Adaptable**: Funciona en cualquier contenedor

### Elevation (Shadow)

- **Default**: elevation-1 (box-shadow level 1)
- **On Focus**: elevation-3 (box-shadow level 3)
- **Transición**: 160ms ease

### Transiciones

Todas las transiciones: 160ms cubic-bezier(0.2, 0, 0, 1) (MD3 standard)

- **State layer opacity**: Leading + trailing icons (0.08 hover, 0.12 active)
- **Background color**: Bar + error state
- **Elevation shadow**: 1 → 3 on focus (160ms)
- **Outline**: focus-visible en botones (160ms)
- **Color**: Helper text, disabled states (160ms)
- **Input selection**: Primary background, on-primary text
- **Cursor**: text (input), not-allowed (disabled)

### Estados Avanzados

#### Visual Refinements (v1.4.1)
- **State layers removidos**: Los círculos redondos en hover de iconos fueron eliminados para una interfaz más limpia
- **Outline y box-shadow desactivados**: `outline: none !important;` y `box-shadow: none !important;` en leading e trailing icons
- **Leading icon**: Cambio de "menu" a "search" (lupa) para consistencia semántica

#### Error State
Detectado automáticamente por caracteres especiales (!@#$%^&*+=[]{}...etc)
- **Fondo**: `color-mix(error 12%, surface-container-high)`
- **Leading icon**: Error color
- **Support text**: Error color + icono ⚠ (automático)
- **Input**: `aria-invalid="true"`
- **Trigger**: Focus limpia error si input vacío

#### Keyboard Navigation
- **Escape**: Limpia input si tiene contenido
- **Enter**: Busca con el contenido actual
- **Tab**: Navega entre elementos (native)
- **Shift+Tab**: Navega hacia atrás

#### Text Selection
- **Fondo**: `var(--md-sys-color-primary)`
- **Texto**: `var(--md-sys-color-on-primary)`
- **Cursor**: `text`
- **Caret**: Primary color

#### Disabled State
- **Opacidad**: 0.38 (MD3 standard)
- **Cursor**: `not-allowed`
- **pointer-events**: none en todos los botones
- **No responde**: A eventos

### Implementación Full HTML Example

```html
<div class="rdm-search--wrapper">
  <div class="rdm-search--container">
    <div class="rdm-search--bar">
      <div class="rdm-search--control">
        <!-- Config: Avatar + Search Icon -->
        <button class="rdm-search--leading-icon" type="button" aria-label="Menú">
          <span class="material-symbols-rounded">menu</span>
        </button>
        
        <input 
          type="search" 
          placeholder="Buscar..."
          aria-label="Campo de búsqueda"
        >
        
        <div class="rdm-search--trailing">
          <!-- Icon 1: Search -->
          <button class="rdm-search--trailing-icon show" type="button" aria-label="Buscar">
            <span class="material-symbols-rounded">search</span>
          </button>
          
          <!-- Icon 2: Avatar -->
          <img 
            class="rdm-search--avatar" 
            src="user-avatar.jpg" 
            alt="Avatar de usuario"
          >
        </div>
      </div>
    </div>
  </div>
  
  <div class="rdm-search--support">
    <span>Búsqueda con perfil de usuario</span>
  </div>
</div>
```

### Testing Checklist

- ✅ Todos los 4 configuraciones se renderizan correctamente
- ✅ Avatar redondo (border-radius: 50%) con object-fit: cover
- ✅ Leading icon es botón interactivo con state layer
- ✅ Trailing icons con gap 8dp entre ellos
- ✅ Close button se muestra solo con contenido
- ✅ Elevación aumenta en focus
- ✅ Colores match MD3 (surface-container-high)
- ✅ Estados disabled funcionan
- ✅ JavaScript maneja múltiples iconos
- ✅ Responsive 360-720dp

### Notas de Implementación

1. **Material Symbols**: Requiere fuente Material Symbols Rounded
2. **Color Tokens**: Usa tema CSS custom properties del proyecto
3. **Imagen Avatar**: Usa object-fit: cover para circular perfecto
4. **Button States**: Pseudoelementos ::before para state layer
5. **Multiple Icons**: Máximo 2 trailing icons (no incluye avatar)
6. **Clear Icon**: Dinámico based en contenido del input

---

## Dialog Component

### Overview
Componente de diálogo modal basado en las especificaciones de Material Design 3 (MD3) y montado sobre el elemento nativo HTML5 `<dialog>`. Proporciona accesibilidad integrada (focus trap, soporte Escape, ARIA) y manejo de backdrop/scrim con animaciones fluidas.

**Archivos**:
- [css/dialog.css](css/dialog.css) - Estilos y animaciones
- [dialogs.php](dialogs.php) - Demostración de las 4 variantes
- [js/dialog.js](js/dialog.js) - Lógica de interacción

### Dimensiones (Material Design 3)
- **Ancho mínimo**: 280dp (17.5em)
- **Ancho máximo**: 560dp (35em)
- **Border radius**: 28dp (1.75em)
- **Padding interno**: 24dp (1.5em)
- **Hero Icon**: 32dp (2em)
- **Gap de acciones**: 8dp (0.5em)
- **Elevación**: Nivel 3 (box-shadow level 3)

### Anatomía

```
┌─────────────────────────────────────────────┐
│                   [ ⚠️ ]                     │  Hero Icon (opcional)
│                                             │
│            ¿Eliminar producto?              │  Headline (headline-small / title-large)
│                                             │
│ Esta acción no se puede deshacer. ¿Deseas   │  Supporting text (body-medium)
│ continuar de todos modos?                   │
│                                             │
│                      [Cancelar]  [Eliminar] │  Actions (rdm-button)
└─────────────────────────────────────────────┘
```

### Configuraciones MD3

#### 1. Basic Alert Dialog
Diálogo estándar para confirmaciones y alertas sin icono decorativo.
```html
<dialog class="rdm-dialog" id="dialog-basic">
  <div class="rdm-dialog--container">
    <div class="rdm-dialog--headline">
      <h2 class="rdm-sys-typography--headline-small">Título</h2>
    </div>
    <div class="rdm-dialog--content">
      <p class="rdm-sys-typography--body-medium">Mensaje informativo.</p>
    </div>
    <div class="rdm-dialog--actions">
      <button type="button" class="rdm-button--text" data-dialog-close>Cancelar</button>
      <button type="button" class="rdm-button--text" data-dialog-close>Aceptar</button>
    </div>
  </div>
</dialog>
```

#### 2. Dialog con Icono (Hero Icon)
Diálogo centrado para advertencias, acciones críticas o informativas con icono destacado.
```html
<dialog class="rdm-dialog" id="dialog-icon">
  <div class="rdm-dialog--container">
    <div class="rdm-dialog--icon is-error">
      <span class="material-symbols-rounded">delete</span>
    </div>
    <div class="rdm-dialog--headline is-centered">
      <h2 class="rdm-sys-typography--headline-small">Eliminar elemento</h2>
    </div>
    <div class="rdm-dialog--content is-centered">
      <p class="rdm-sys-typography--body-medium">Detalle de la acción destructiva.</p>
    </div>
    <div class="rdm-dialog--actions">
      <button type="button" class="rdm-button--text" data-dialog-close>Cancelar</button>
      <button type="button" class="rdm-button--filled" data-dialog-close>Eliminar</button>
    </div>
  </div>
</dialog>
```

#### 3. Confirmation Dialog con Selección
Diálogo que incluye opciones desplazables (radio buttons o checkboxes).
```html
<dialog class="rdm-dialog" id="dialog-selection">
  <div class="rdm-dialog--container">
    <div class="rdm-dialog--headline">
      <h2 class="rdm-sys-typography--headline-small">Elige una opción</h2>
    </div>
    <div class="rdm-dialog--content rdm-dialog--content-scrollable">
      <!-- Radios / Checkboxes -->
    </div>
    <div class="rdm-dialog--actions">
      <button type="button" class="rdm-button--text" data-dialog-close>Cancelar</button>
      <button type="button" class="rdm-button--text" data-dialog-close>Guardar</button>
    </div>
  </div>
</dialog>
```

#### 4. Full-screen Dialog
Diálogo que ocupa el 100% de la pantalla para edición o formularios complejos.
```html
<dialog class="rdm-dialog rdm-dialog--fullscreen" id="dialog-fullscreen">
  <div class="rdm-dialog--container">
    <div class="rdm-dialog--fullscreen-header">
      <button type="button" class="rdm-button--text" data-dialog-close>
        <span class="material-symbols-rounded">close</span>
      </button>
      <h2 class="rdm-sys-typography--title-large">Título</h2>
      <button type="button" class="rdm-button--filled" data-dialog-close>Guardar</button>
    </div>
    <div class="rdm-dialog--fullscreen-body">
      <!-- Contenido extenso -->
    </div>
  </div>
</dialog>
```

### Colores (MD3 Tokens)

| Elemento | Token MD3 |
|---|---|
| **Fondo Contenedor** | `--md-sys-color-surface-container-high` |
| **Texto Titular** | `--md-sys-color-on-surface` |
| **Texto de Contenido** | `--md-sys-color-on-surface-variant` |
| **Icono Secundario** | `--md-sys-color-secondary` |
| **Icono de Error** | `--md-sys-color-error` |
| **Scrim (Backdrop)** | `--md-sys-color-scrim` (opacidad 0.45) |
| **Divisores** | `--md-sys-color-outline-variant` |

### BEM Structure

```
.rdm-dialog                           /* Elemento nativo <dialog> */
├── --container                       /* Contenedor central (28px border-radius) */
│   ├── --icon                        /* Icono superior (opcional) */
│   ├── --headline                    /* Titular del diálogo */
│   ├── --content                     /* Cuerpo de texto / scrollable */
│   └── --actions                     /* Barra inferior de botones */
└── --fullscreen                      /* Modificador pantalla completa */
    ├── --fullscreen-header           /* Barra superior */
    └── --fullscreen-body             /* Contenido expandido */
```

### JavaScript API

1. **Apertura declarativa:** Añadir `data-dialog-target="#idDelDialog"` a cualquier botón o enlace.
2. **Cierre declarativo:** Añadir `data-dialog-close` a cualquier botón dentro o fuera del diálogo.
3. **Cierre por Scrim:** Hacer clic fuera de `.rdm-dialog--container` cierra el diálogo automáticamente.
4. **Navegación por teclado:** La tecla `Escape` cierra nativamente el diálogo y devuelve el foco.
5. **Eventos custom:**
   - `dialog-open`: Se emite en el elemento `<dialog>` al abrir.
   - `dialog-close`: Se emite en el elemento `<dialog>` al cerrar.

---

## Snackbar Component

### Overview
Componente de notificación breve y flotante basado en las especificaciones de Material Design 3 (MD3). Emplea superficies invertidas (`inverse-surface`) para garantizar el máximo contraste y visibilidad sobre cualquier tema, con soporte para estados (neutral, success, error, warning, info), acciones interactivas y temporizador inteligente con pausa al pasar el cursor.

**Archivos**:
- [css/snackbar.css](css/snackbar.css) - Estilos y variantes de color
- [snackbars.php](snackbars.php) - Demostración interactiva
- [js/snackbar.js](js/snackbar.js) - API y lógica de animación/descarte

### Dimensiones (Material Design 3)
- **Altura mínima**: 48dp (3em)
- **Ancho mínimo**: 320dp (20em)
- **Ancho máximo**: 672dp (o 100% en pantallas móviles con margen 1em)
- **Border radius**: 8dp (0.5em)
- **Padding interno**: 12dp vertical (0.75em), 16dp horizontal (1em)
- **Icono de estado**: 24dp (1.5em)
- **Elevación**: Nivel 3 (box-shadow level 3)

### Anatomía

```
┌─────────────────────────────────────────────────────────────┐
│ [✓]  Producto guardado en el inventario   [DESHACER]  [✕]   │
└─────────────────────────────────────────────────────────────┘
  Icon   Body text                          Action      Close
```

### Configuraciones y Variantes MD3

1. **Neutral / Informativo:**
   - Superficie: `inverse-surface` con acento en color primario.
2. **Éxito (Success):**
   - Icono `check_circle` verde (#81C784) y borde lateral esmeralda (#4CAF50).
3. **Error:**
   - Icono `error` (#F2B8B5) y borde lateral de error (`--md-sys-color-error`).
4. **Advertencia (Warning):**
   - Icono `warning` (#FFB74D) y borde lateral ámbar (#FF9800).
5. **Con Botón de Acción:**
   - Incluye botón de texto interactivo para operaciones reversibles (ej. "Deshacer").

### Colores (MD3 Tokens)

| Elemento | Token MD3 |
|---|---|
| **Fondo Principal** | `--md-sys-color-inverse-surface` (`#313033` claro / `#E6E1E5` oscuro) |
| **Texto Principal** | `--md-sys-color-inverse-on-surface` (`#F4EFF4` claro / `#313033` oscuro) |
| **Botón de Acción** | `--md-sys-color-inverse-primary` (`#D0BCFF` claro / `#6750A4` oscuro) |
| **Elevación** | Nivel 3 (sombra suave multi-capa) |

### BEM Structure

```
.rdm-snackbar--wrapper                 /* Contenedor flotante fijado al pie */
└── .rdm-snackbar                      /* Tarjeta de notificación */
    ├── --media                        /* Contenedor de icono de estado */
    ├── --body                         /* Mensaje de texto principal */
    └── --actions                      /* Contenedor de acciones */
        ├── --action-button            /* Botón de acción interactivo */
        └── --close-button             /* Botón icono de descarte rápido */
```

### Modificadores de Estado
- `.rdm-snackbar--neutral`
- `.rdm-snackbar--success`
- `.rdm-snackbar--error`
- `.rdm-snackbar--warning`
- `.rdm-snackbar--info`

### JavaScript API

#### 1. Uso Declarativo (HTML)
Añadir atributos de datos a cualquier botón o disparador:
```html
<button 
  type="button" 
  data-snackbar-message="Producto guardado correctamente" 
  data-snackbar-type="success"
  data-snackbar-action="Deshacer"
  data-snackbar-duration="5000"
>
  Guardar
</button>
```

#### 2. Uso Programático (JavaScript)
```javascript
// Llamada rápida
RDM.snackbar.show('Operación completada');

// Configuración avanzada
RDM.snackbar.show({
  message: 'Elemento eliminado de la lista',
  type: 'error', // 'neutral' | 'success' | 'error' | 'warning' | 'info'
  duration: 5000, // milisegundos (0 para permanente hasta descarte)
  actionText: 'Deshacer',
  onAction: function() {
    console.log('Acción deshacer ejecutada');
  },
  dismissible: true
});
```

---

## Componentes Relacionados

### Snackbar
- **Estado**: ✅ Implementado según estándar MD3 (v1.6)
- **Ubicación**: [snackbars.php](snackbars.php) / [css/snackbar.css](css/snackbar.css) / [js/snackbar.js](js/snackbar.js)

### Dialog
- **Estado**: ✅ Implementado según estándar MD3 (v1.5)
- **Ubicación**: [dialogs.php](dialogs.php) / [css/dialog.css](css/dialog.css) / [js/dialog.js](js/dialog.js)

### Checkbox
- **Estado**: ✅ Normalizado a estándar BEM
- **Ubicación**: [checkboxes.php](checkboxes.php) / [css/checkbox.css](css/checkbox.css)

### Radio Button
- **Estado**: ✅ Normalizado a estándar Checkbox
- **Ubicación**: [radiobuttons.php](radiobuttons.php) / [css/radiobutton.css](css/radiobutton.css)

### TextField
- **Estado**: ✅ Implementado con validación
- **Ubicación**: [textfields.php](textfields.php) / [css/textfield.css](css/textfield.css)

### Select
- **Estado**: ✅ Implementado con opciones
- **Ubicación**: [selects.php](selects.php) / [css/select.css](css/select.css)

---

## Referencias

- [Material Design 3 - Search](https://m3.material.io/components/search/specs)
- [Material Design 3 - Input](https://m3.material.io/components/text-fields/specs)
- [Material Symbols Icon Set](https://fonts.google.com/icons)
