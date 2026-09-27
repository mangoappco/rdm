# SKILL - Sistema de Componentes RDM2

## Historial de Versiones

- **v1.11** - Fases 2 y 3 de la auditoria de **Buttons**: altura fija de 40dp en `.rdm-button--container` (antes 42.4px por padding, y fragil ante cambios de tipografia) con padding solo horizontal y `align-items: center`; estado `disabled` al 38% de opacidad sin elevacion ni state layer, demostrado en `buttons.php`; eliminadas las reglas globales `button:hover` / `button:active` que anadian `box-shadow` a todo `<button>` (en M3 la elevacion es estatica y solo la tienen elevated y FAB); anadidos los tokens `--md-sys-elevation-level0..5` a `tokens.css` y reemplazo de las 5 sombras de Material 2 por tokens: elevated nivel 1, FAB nivel 3, card elevated nivel 1, form elevated nivel 1
- **v1.10** - Auditoria de **Buttons** contra M3 (Fase 1): `tonal` corregido de `primary-container` + `primary` a `secondary-container` + `on-secondary-container` (el morado sobre morado palido daba contraste pobre); `elevated` corregido de `surface` (identico al fondo del body, invisible sin la sombra) a `surface-container-low`; `fab` y `fab-small` de `tertiary-container` a `primary-container`. State layers unificados a **8% hover / 12% pressed** en las 6 variantes y migrados de 24 reglas `rgba` duplicadas por tema a 12 reglas con `color-mix` sobre el token, que siguen al tema automaticamente
- **v1.9** - Corrección de la capa de tokens: 60 referencias rotas (`-height` → `-line-height`, `-tracking` → `-letter-spacing`) que impedían aplicar line-height y letter-spacing en las 30 clases de tipografía; `font-weight` sin unidad px, `font-style` normalizado, `text-transform`/`text-decoration` añadidos y token `surface-dim` creado. **Alineación vertical de Lists alineada a M3** (one/two-line centrados, three-line+ top con 16dp de aire) y alturas 56/72dp exactas. Nuevo **tercer rol `rdm-list--body-value`** (label 14/20 weight 500 + `tabular-nums`) para precios/SKU/stock, y eliminación de los wrappers `rdm-sys-typography--*` redundantes en el body de listas
- **v1.8** - Empty State (patrón M3: icono + headline + support + action, con a11y), Card con lista interna (`.rdm-card--list` ortogonal a los 3 tipos de card + variante `--divided`), y **alineación M3 de Lists**: alturas one-line 56dp / two-line 72dp / three-line 88dp, leading icon 24dp y state layers hover 8% / pressed 12%. File Input se simplifica a variante minimalista (label fijo sin transición) y la demo queda en 2 variantes
- **v1.7** - Componente File Input MD3: Input de archivo/imagen sin componente nativo MD3, 3 variantes (TextField File, DropZone, Button File), single/multiple, preview con chips e imagen, drag & drop, validación `accept`/`data-max-size`, estados error/disabled y API `file-selected`/`file-cleared`
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
```

> **Nota (v1.8)**: las elevaciones de M3 **no están tokenizadas** en `css/md/tokens.css`. Cada CSS define su `box-shadow` literal. Los tokens `--md-sys-elevation-level1..5` quedan pendientes de añadirse a `tokens.css` para eliminar la duplicación.

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

## File Input Component

### Overview
MD3 no define un componente nativo `input[type=file]`. RDM 2.0 lo compone con el patrón oficial de Google (TextField readonly + `<input type="file" hidden>`). Soporta subida de imágenes y documentos desde formularios, con validación, vista previa y limpieza. Pensado para casos ManGo!: foto de producto y ficha PDF.

> **v1.8 — Alcance reducido a minimalista.** La demo expone solo 2 variantes (imagen y documento). El label es **fijo sobre el notch** (sin transición placeholder→etiqueta) porque en un campo `readonly` esa animación no aporta información. El CSS conserva internamente el soporte de `multiple`, `dropzone` y chips para uso futuro, pero no se demuestra.

**Archivos**:
- [css/fileinput.css](css/fileinput.css) - Estilos (TextField + chips/preview)
- [fileinputs.php](fileinputs.php) - Demostración (2 variantes: imagen, documento)
- [js/fileinput.js](js/fileinput.js) - Lógica de interacción y validación

### Dimensiones (Material Design 3)

- **TextField File**: 56dp alto (3.5em), padding 12dp (0.75em), iconos 24dp (1.5em), gap 16dp (1em), border-radius 4dp (0.25em), border 1dp outline
- **Label**: fijo en `top -0.8em`, `scale 0.85`, `left 1em`, padding 0.25em (notch sobre `surface`)
- **Imagen preview**: max-height 224dp (14em), border-radius 12dp (0.75em)
- **Transición**: 160ms ease (MD3 standard)

### Anatomía

```
┌────────────────────────────────────────────────────────┐
│ Imagen del producto    [imagen.jpg 2.4 MB]      [✕]   │  Label fijo (notch) + readonly field + clear
│ PNG, JPG o WEBP — máx. 5MB                            │  Helper (support-text)
│ [━━━━━━━ Imagen preview ━━━━━━━]                       │  Vista previa (solo single image/*)
└────────────────────────────────────────────────────────┘
```

### Configuraciones

#### Variante 1: Single imagen
Filtra `image/*` y genera vista previa con `FileReader` al seleccionar.

```html
<div class="rdm-fileinput--wrapper" data-fileinput>
  <div class="rdm-fileinput--container rdm-fileinput--outlined">
    <div class="rdm-fileinput--control">
      <div class="rdm-fileinput--leading-icon"><span class="material-symbols-rounded">image</span></div>
      <input class="rdm-fileinput--field" type="text" readonly placeholder=" " id="fi_img">
      <label class="rdm-fileinput--label" for="fi_img">Imagen del producto</label>
      <button type="button" class="rdm-fileinput--trailing-icon" data-file-trigger aria-label="Subir"><span class="material-symbols-rounded">cloud_upload</span></button>
      <button type="button" class="rdm-fileinput--trailing-icon" data-file-clear aria-label="Quitar"><span class="material-symbols-rounded">close</span></button>
    </div>
  </div>
  <div class="rdm-fileinput--support"><span class="rdm-fileinput--support-text">PNG, JPG o WEBP — máx. 5MB</span><span class="rdm-fileinput--support-counter"></span></div>
  <input type="file" class="rdm-fileinput--hidden" name="imagen" accept="image/*" data-max-size="5242880">
  <div class="rdm-fileinput--preview"></div>
  <img class="rdm-fileinput--image-preview" alt="Vista previa">
</div>
```

#### Variante 2: Single documento
Misma estructura, `accept` restringido y sin vista previa de imagen.

```html
<div class="rdm-fileinput--wrapper" data-fileinput>
  <div class="rdm-fileinput--container rdm-fileinput--outlined">
    <div class="rdm-fileinput--control">
      <div class="rdm-fileinput--leading-icon"><span class="material-symbols-rounded">description</span></div>
      <input class="rdm-fileinput--field" type="text" readonly placeholder=" " id="fi_doc" aria-describedby="fi_doc_help">
      <label class="rdm-fileinput--label" for="fi_doc">Ficha técnica (PDF)</label>
      <button type="button" class="rdm-fileinput--trailing-icon" data-file-trigger aria-label="Subir archivo"><span class="material-symbols-rounded">attach_file</span></button>
      <button type="button" class="rdm-fileinput--trailing-icon" data-file-clear aria-label="Quitar archivo"><span class="material-symbols-rounded">close</span></button>
    </div>
  </div>
  <div class="rdm-fileinput--support"><span class="rdm-fileinput--support-text" id="fi_doc_help">Solo PDF — máx. 10MB</span><span class="rdm-fileinput--support-counter"></span></div>
  <input type="file" class="rdm-fileinput--hidden" name="ficha_pdf" accept=".pdf,application/pdf" data-max-size="10485760">
  <div class="rdm-fileinput--preview"></div>
</div>
```

### Colores (MD3 Tokens)

| Elemento | Token MD3 |
|---|---|
| **Borde Outlined** | `--md-sys-color-outline` → `on-surface` en hover → `primary` en focus + `inset 0 0 0 1px primary` |
| **Label / Helper** | `--md-sys-color-on-surface-variant` → `primary` en focus → `error` en is-error |
| **Notch del label** | `background-color: var(--md-sys-color-surface)` |
| **Texto archivo** | `--md-sys-color-on-surface` |
| **Chip** | `surface-variant` bg + `on-surface-variant` text + `primary-container` icon |
| **Imagen preview border** | `--md-sys-color-outline-variant` |
| **Disabled** | opacidad 0.65 + `pointer-events: none` |

### Estados

#### Default (Enabled, Empty)
- Campo vacío, label fijo sobre el notch, trailing muestra `cloud_upload`, `close` oculto, helper visible, sin vista previa.

#### Has File (Populated)
- Wrapper con `.has-file`, campo con el nombre del archivo, counter con el tamaño, `close` visible (`.show`), `cloud_upload` oculto, vista previa generada si es `image/*` single.

#### Focused
- `:focus-within` en outlined → `border primary + inset shadow`. El label cambia a `primary` **sin moverse** (no hay transición de posición).

#### Hover
- Outlined: `border on-surface`.

#### Error
- Wrapper `.is-error`: `border error`, `label/support error`, `helper` con mensaje "Archivo muy grande (X > Y)" o "Tipo no permitido". Focus mantiene `inset error`.

#### Disabled
- Wrapper `.is-disabled`: `opacity 0.65`, `pointer-events none`, input `disabled`.

### BEM Structure

```
.rdm-fileinput--wrapper[data-fileinput]   /* Bloque: has-file / is-error / is-disabled */
├── --container --outlined                 /* Contenedor bordeado (TextField) */
│   └── --control                         /* Flex 56dp alto */
│       ├── --leading-icon                /* Icono contextual (image/description) */
│       ├── --field (input[readonly])     /* Nombre + tamaño */
│       ├── --label                       /* Fijo sobre notch, scale 0.85 */
│       ├── --trailing-icon[data-file-trigger] /* Upload (cloud_upload/attach_file) */
│       └── --trailing-icon[data-file-clear]   /* Clear (close) .show con archivo */
├── --support                             /* Helper + counter */
│   ├── --support-text
│   └── --support-counter
├── --hidden (input[type=file])           /* Nativo oculto: accept / data-max-size */
├── --preview                             /* Contenedor chips (soporte interno) */
│   └── --chip → --chip-icon / --chip-text / --chip-remove
└── --image-preview (img)                 /* Vista previa .show */
```

### JavaScript API

#### Inicialización automática
```javascript
// fileinput.js en DOMContentLoaded maneja todos los [data-fileinput]
```

#### Comportamientos automáticos
1. **Trigger**: Click en el campo o en `[data-file-trigger]` → `hidden.click()`
2. **Sincronización**: `change` → actualiza campo, counter (`formatSize`), vista previa (`FileReader`), añade `.has-file`
3. **Clear**: Click en `[data-file-clear]` → limpia `value`, quita `.has-file`, refocaliza
4. **Validación**: `accept` (extensiones y `image/*`) y `data-max-size` (bytes, default 5242880) → `.is-error` + mensaje, limpia la selección
5. **Form reset**: Limpia archivo, vista previa y errores automáticamente

#### Eventos custom
```javascript
// Escuchar selección
wrapper.addEventListener('file-selected', (e) => {
  console.log('Archivos:', e.detail.files); // File[]
});
hidden.addEventListener('file-selected', (e) => { ... });

// Escuchar limpieza
wrapper.addEventListener('file-cleared', () => {
  console.log('Archivos eliminados');
});

// Variante Button con display externo
// <input data-file-display="idDelSpan">
```

#### Atributos HTML
| Atributo | Ubicación | Descripción |
|---|---|---|
| `accept` | `input[type=file]` | Filtro: `image/*`, `.pdf`, `application/pdf` |
| `data-max-size` | `input[type=file]` | Límite en bytes (ej. `5242880` = 5MB) |
| `data-fileinput` | `.rdm-fileinput--wrapper` | Marca el wrapper para JS |
| `data-file-trigger` | `button` | Dispara el picker |
| `data-file-clear` | `button` | Limpia la selección |

### Accesibilidad

- **Hidden input nativo**: conserva semántica `type=file` y funciona con `enctype=multipart/form-data"`
- **Label + `aria-describedby`**: conectado a `support-text` para leer el helper o el error
- **Botones con `aria-label`**: "Subir archivo" / "Quitar archivo"
- **Focus visible**: outline 2px `primary` heredado de `estilos.css`
- **Teclado**: el campo es `readonly` pero enfocable; Tab recorre campo → trigger → clear

### Responsive

- **Ancho**: 100% del contenedor (max 600dp en toolbar, 1400dp en landing)
- **Vista previa**: `width 100%`, `max-height 14em`, `object-fit cover`

### Transiciones

Todas `160ms ease`: `border-color`, `box-shadow` y `color` (label, iconos).
**El label no transiciona posición** — decisión de diseño v1.8.

### Estados Avanzados

#### Validación automática
- Tipo: compara `accept` contra `file.type` y extensión
- Tamaño: `file.size > data-max-size` → error

#### Formato de tamaño
- `formatSize`: B → KB → MB con 1 decimal (ej. `2.4 MB`)

#### Integración con Reset
- `form.addEventListener('reset')` limpia `files`, preview, chips y errores con `setTimeout 0`

### Implementación Full HTML Example (Single imagen)

```html
<form class="rdm-form--container" enctype="multipart/form-data">
  <div class="rdm-form--outlined">
    <div class="rdm-form--body">
      <div class="rdm-fileinput--wrapper" data-fileinput>
        <div class="rdm-fileinput--container rdm-fileinput--outlined">
          <div class="rdm-fileinput--control">
            <div class="rdm-fileinput--leading-icon"><span class="material-symbols-rounded">image</span></div>
            <input class="rdm-fileinput--field" type="text" readonly placeholder=" " id="fi_demo">
            <label class="rdm-fileinput--label" for="fi_demo">Imagen del producto</label>
            <button type="button" class="rdm-fileinput--trailing-icon" data-file-trigger><span class="material-symbols-rounded">cloud_upload</span></button>
            <button type="button" class="rdm-fileinput--trailing-icon" data-file-clear><span class="material-symbols-rounded">close</span></button>
          </div>
        </div>
        <div class="rdm-fileinput--support"><span class="rdm-fileinput--support-text">PNG, JPG o WEBP — máx. 5MB</span><span class="rdm-fileinput--support-counter"></span></div>
        <input type="file" class="rdm-fileinput--hidden" name="imagen" accept="image/*" data-max-size="5242880">
        <div class="rdm-fileinput--preview"></div>
        <img class="rdm-fileinput--image-preview" alt="Vista previa">
      </div>
    </div>
  </div>
</form>
```

### Testing Checklist

- ✅ El campo muestra nombre y tamaño, y el counter refleja el peso
- ✅ `cloud_upload` visible en vacío, `close` visible con archivo
- ✅ La vista previa aparece solo en single `image/*`
- ✅ Validación `accept` rechaza tipo no permitido con `.is-error`
- ✅ Validación `data-max-size` rechaza >5MB con mensaje "X > Y"
- ✅ El label queda fijo sobre el notch sin transición
- ✅ El `close` no tiene borde ni sombra (igual que textfield)
- ✅ El `reset` del form limpia todo
- ✅ Disabled `opacity 0.65` y `pointer-events none`

### Notas de Implementación

1. **No estilizar el nativo**: siempre `hidden + label/botón` (patrón Material Web)
2. **Requiere `enctype="multipart/form-data"`** y `method="post"` para envío real
3. **El label fijo es intencionado**: en un campo `readonly` la transición placeholder→notch no aporta información
4. **Los botones no heredan estilos de `button.css`**: se fuerzan `border-radius 0`, `box-shadow none`, `background transparent`

---

## Empty State Component

### Overview
Patrón M3 para búsquedas sin resultados y colecciones vacías. **MD3 no lo define como component spec oficial** (`m3.material.io/components`): es un patrón de guía compuesto por ilustración o icono + headline + supporting text + acción opcional. RDM lo implementa sin card, centrado sobre `surface`.

**Archivos**:
- [css/empty.css](css/empty.css) - Estilos
- [empty.php](empty.php) - Demostración (3 contextos)

### Dimensiones
- **Ancho máximo**: 512px (32em) — dentro del rango legible de M3
- **Icono**: 64px (4em) con `line-height: 1`
- **Padding vertical**: 48px (3em)
- **Gap entre bloques**: 12px (0.75em)

### Anatomía

```
┌────────────────────────────────────────┐
│              [🖼️]                      │  --icon (on-surface-variant)
│   Sin resultados para "metallica"      │  --headline (title-large, on-surface)
│   Revisa la ortografía o intenta...   │  --support (body-medium, on-surface-variant)
│         [ Limpiar búsqueda ]           │  --actions (rdm-button)
└────────────────────────────────────────┘
```

### Colores (MD3 Tokens)

| Elemento | Token MD3 |
|---|---|
| **Icono** | `--md-sys-color-on-surface-variant` con `opacity 0.6` |
| **Headline** | `--md-sys-color-on-surface` |
| **Supporting text** | `--md-sys-color-on-surface-variant` |
| **Contenedor** | Sin fondo (transparent sobre `surface` del body) |

### BEM Structure

```
.rdm-empty--container      /* Flex column, centrado, max-width 32em */
├── --icon                 /* 4em circular flex, on-surface-variant */
├── --headline             /* title-large, on-surface */
├── --support              /* body-medium, on-surface-variant, max 28em */
└── --actions              /* Flex row centered, gap 0.5em, wrap */
```

### Accesibilidad

- **Pendiente (v1.9)**: falta `role="status"` + `aria-live="polite"` para empty states dinámicos (carga AJAX), y `aria-labelledby` enlazando el headline
- **Pendiente (v1.9)**: el icono decorativo no tiene `aria-hidden="true"`

### Limitaciones conocidas

- No hay variante de ilustración (solo icono)
- No hay estado de error (permiso denegado / red caída)
- `margin-top: 2em` del icono más `padding: 3em` del contenedor produce bastante aire vertical
- `opacity: 0.6` es un valor de diseño, no un token M3

### Notas de Implementación

1. Combinar con `rdm-button--filled` para la acción principal y `rdm-button--text` para secundarias
2. Mantener el supporting text en `body-medium`; el headline nunca debe superar `title-large` en este patrón

---

## Card List (cardlist.php)

### Overview
Extensión del componente Card que permite anidar un `rdm-list--container` dentro de `rdm-card--body` con los items alineados a los bordes de la card (bleed-to-edge) mientras el texto conserva la alineación interna. Ideal para vistas de detalle (datos clave-valor, equipo, sedes).

**No es un component spec de M3.** M3 no define "list inside card"; es un patrón propio de RDM derivado de las Settings de Android. Debe documentarse como decisión de diseño, no como cumplimiento de spec.

**Archivos**:
- [css/cardlist.css](css/cardlist.css) - Estilos del modificador
- [cardlist.php](cardlist.php) - Demostración (11 variantes)

### Dimensiones
- **Padding de items**: 16px (1em) — coincide con el padding de `rdm-card--body`
- **Separación entre items**: 12px (0.75em) o divisor de 1px `outline-variant`
- **Bleed**: márgenes negativos de -16px (`-1em`) compensando el padding de la card

### Ortogonalidad con tipos de Card

El modificador `.rdm-card--list` es ortogonal y funciona con cualquier tipo:
- `rdm-card--elevated rdm-card--list`
- `rdm-card--filled rdm-card--list`
- `rdm-card--outlined rdm-card--list`

### Variante con divisores

`rdm-card--list--divided` reemplaza el `margin-top` por `padding-top` + `border-top: 1px solid outline-variant` (spec Divider de M3).

### Colores (MD3 Tokens)

| Elemento | Token MD3 |
|---|---|
| **Divisor** | `--md-sys-color-outline-variant` 1px (0.0625em) |
| **Fondo** | Hereda del tipo de card (elevated/filled/outlined) |

### BEM Structure

```
.rdm-card--list                    /* Modificador ortogonal sobre rdm-card--* */
├── .rdm-card--body                /* Body normal, padding 1em */
│   └── .rdm-list--container       /* Items con margin -1em y padding 1em */
└── .rdm-card--list--divided       /* Variante con divisores */
```

### Notas de Implementación

1. El bleed-to-edge usa márgenes negativos; si cambia el padding de `rdm-card--body`, actualizar `-1em` en `cardlist.css`
2. `.rdm-card--list .rdm-list--body { margin-right: 0 }` neutraliza el margen del body de lista para conservar el padding de la card
3. El orden de import importa: `list.css` debe cargarse **antes** que `cardlist.css` en `estilos.css` por especificidad
4. **Pendiente (v1.9)**: los pares clave-valor usan `body-headline` para la etiqueta y `body-suporting-text` para el valor, lo que invierte la jerarquía semántica de M3 (el valor debería ser el primario). Considerar un patrón dedicado

### Testing Checklist

- ✅ Funciona con elevated, filled y outlined
- ✅ Los items llegan al borde de la card sin perder alineación de texto
- ✅ `--divided` dibuja divisores `outline-variant` de 1px
- ✅ El último item no tiene separación inferior extra
- ✅ Reusa las alturas M3 de `rdm-list--container` (56/72/88dp)

---

## Lists Component (base)

### Alturas según M3

Detectadas automáticamente con `:has()` sobre la cantidad de hijos en `.rdm-list--body`, sin clases modificadoras. El **padding vertical varía por variante** para cerrar la cuenta exacta:

| Variante | Selector | Padding | Contenido | Total |
|---|---|---|---|---|
| **one-line** | (default) | 16+16 | 24 | **56dp** |
| **two-line** | `:has(.rdm-list--body > :nth-child(2))` | 14+14 | 24+20 | **72dp** |
| **three-line+** | `:has(.rdm-list--body > :nth-child(3))` | 16+16 | 68 (mín.) | **100dp** |

`:nth-child(3)` también matchea 4+ hijos, así que "three-line o superior" queda cubierta.

**Requisito crítico:** `.rdm-list--container` requiere `box-sizing: border-box`. Sin él, `min-height` se aplica al content box y las alturas quedan infladas por el padding.

**Ojo con el three-line:** los 88dp de M3 asumen 3 líneas cortas y sin wrap. En la práctica el supporting suele envolver a varias líneas, el body crece y el ítem crece con él. Por eso su `min-height` es `5.5em` pero su padding es cómodo (16dp), **no exprimido para cuadrar 88dp**. Intentar cerrar la cuenta exacta con padding asimétrico (16/4) dejaba el leading pegado al borde y se veía mal en los ítems largos.

### Alineación vertical (M3 v1.9)

El contenedor de 1 y 2 líneas centra sus elementos; en 3 o más líneas el leading **y** el trailing se anclan arriba, alineados con el inicio de la primera línea de texto.

| Variante | `--media` / `--action` | `--body` |
|---|---|---|
| one-line | `align-items: center` | `align-self: center` |
| two-line | `align-items: center` | `align-self: center` |
| three-line+ | `align-self: flex-start` | `align-self: flex-start` |

**No se usa ninguna transformación vertical.** Se intentó `translateY(calc(0.75em - 50%))` para centrar el elemento de 40dp sobre la primera línea, pero obligaba a reducir el padding superior y dejaba el leading a 2-8px del borde. `align-self: flex-start` con padding cómodo de 16dp da el mismo resultado visual sin números frágiles:

```
 ┌────────────────────────── three-line ───────────────────────────┐
 │  16dp ↑ padding-top                                             │
 │      ┌──────────┐   Headline           ← 1ª línea (y=16..40)    │
 │      │  avatar  │   Lorem ipsum… (4 líneas)                      │
 │  16dp│   40dp   │   $10.500                                      │
 │      └──────────┘                                                │
 │  16dp ↓ padding-bottom                                           │
 └──────────────────────────────────────────────────────────────────┘
```

El avatar queda a 16dp del borde y con su borde superior alineado al inicio de la 1ª línea. El ítem crece si el supporting envuelve: `min-height: 5.5em` es un mínimo, no un alto fijo.

```css
.rdm-list--container:has(.rdm-list--body > :nth-child(3)) .rdm-list--body,
.rdm-list--container:has(.rdm-list--body > :nth-child(3)) .rdm-list--media,
.rdm-list--container:has(.rdm-list--body > :nth-child(3)) .rdm-list--action {
  align-self: flex-start;
}
```

### Leading image de 56dp

Un `.rdm-list--leading-image` (56dp) implica un ítem de **88dp** según M3, independientemente del número de líneas:

```css
.rdm-list--container:has(> .rdm-list--media .rdm-list--leading-image) {
  min-height: 5.5em;  /* 88dp */
}
```

Va al final del bloque para ganar por orden de fuente (misma especificidad).

### Tipografía de los items (determinista)

Las alturas solo son exactas si el texto tiene line-height fijo, así que los tres roles del body declaran su propia tipografía y **no dependen** de que el autor los envuelva en `rdm-sys-typography--*`:

| Rol | Clase | Token M3 | Tamaño / line-height | Peso | Color |
|---|---|---|---|---|---|
| Nombre | `.rdm-list--body-headline` | `body-large` | 16px / 24px | 400 | `on-surface` |
| Descripción | `.rdm-list--body-suporting-text` | `body-medium` | 14px / 20px | 400 | `on-surface-variant` |
| **Valor** | `.rdm-list--body-value` | **`label-large`** | **14px / 20px** | **500** | `on-surface` |

Los tres con `margin: 0` (los márgenes ad-hoc `0.09em` / `0.04em` de v1.7 sumaban ~6px y rompían la cuenta).

### El rol `body-value`

Tercer rol del body para un dato destacado: **precio, SKU, stock, cantidad**. Es el **único bloque con peso 500**, de modo que destaca del nombre y de la descripción sin competir con ninguno, y mantiene la escala de grises del componente en vez de introducir color.

`tabular-nums` hace que los precios se alineen verticalmente entre ítems, lo que permite compararlos de un vistazo en un catálogo.

**Por qué no usar `body-headline` para el precio:** el precio no es un título, es un dato. Usar `body-large` weight 400 lo hacía competir con el nombre del producto porque compartían rol y token. Como efecto secundario, al pasar a `label-large` el three-line baja de `24+20+24 = 68px` a `24+20+20 = 64px`, que es **exactamente la definición de M3** de three-line.

### Markup canónico del body

Los tres roles van **sin wrapper de typography**, en forma plana:

```html
<div class="rdm-list--body">
  <div class="rdm-list--body-headline">Bandeja de la casa</div>
  <div class="rdm-list--body-suporting-text">Salmón, arroz, vegetales y acompañamiento.</div>
  <div class="rdm-list--body-value">$ 32.500</div>
</div>
```

> **Evitar** el patrón `<div class="rdm-sys-typography--body-large"><div class="rdm-list--body-headline">…</div></div>`. Desde v1.9 las clases internas son deterministas, así que el wrapper es redundante. Se eliminó de `cardlist.php` y `lists.php` en v1.9 (20 headlines + 14 supporting).

### State layers (v1.8)

Hover 8% y pressed 12% en ambos temas, según el estándar M3:

```css
html[data-theme="light"] .rdm-list--container:hover::after { background-color: rgba(0,0,0,0.08); }
html[data-theme="light"] .rdm-list--container:active::after { background-color: rgba(0,0,0,0.12); }
html[data-theme="dark"]  .rdm-list--container:hover::after { background-color: rgba(255,255,255,0.08); }
html[data-theme="dark"]  .rdm-list--container:active::after { background-color: rgba(255,255,255,0.12); }
```

### Dimensiones de media (alineadas a M3 v1.8)

| Elemento | Valor | Spec M3 |
|---|---|---|
| **Leading avatar** | 40px (2.5em) | 40dp ✅ |
| **Leading image** | 56px (3.5em) | 56dp ✅ |
| **Leading icon** | 24px (1.5em) | 24dp ✅ (era 18px antes de v1.8) |
| **Trailing icon** | 24px (1.5em) | 24dp ✅ |
| **Gap body → action** | 16px (1em) | 16dp ✅ (era 24px antes de v1.8) |

### Desviación consciente

`font-variation-settings: 'FILL' 1` en hover de los iconos **no es M3**. Es una decisión estética propia de RDM (los iconos Material Symbols se rellenan al hover). Si se requiere cumplimiento estricto, eliminar las reglas de `list.css` que aplican `FILL`.

---

## Índice de componentes (`index.php`)

El catálogo es una lista de destinos de navegación. Reglas semánticas aplicadas en v1.9:

| Regla | Motivo |
|---|---|
| `<nav aria-label="Component index">` en vez de `<section>` | Es navegación: un lector de pantalla en modo "por landmarks" debe poder saltar directo al índice |
| Cada categoría es un `<h2 class="rdm-sys-typography--title-small">` real | Antes eran `<!-- COMENTARIOS -->`, invisibles para tecnología asistiva. Ahora aparecen en la lista de encabezados |
| Títulos de categoría **en inglés** | Coherencia con los nombres de archivo (`textfields.php` → "Text Field") y con el `h1` "Components" |
| `aria-hidden="true"` en `.rdm-list--leading-icon` | El ligature de Material Symbols es texto real; sin esto el nombre accesible del enlace era "rectangle Container" |
| Sin wrapper `rdm-sys-typography--*` en el body | Las clases internas son deterministas desde v1.9, el wrapper es ruido |
| **Sin `<ul>` / `<li>`** | Convención del proyecto: `lists.php` y `cardlist.php` marcan sus items como `<article class="rdm-list--container">` planos. Introducir markup de lista sería inconsistente y además rompería el `:first-child` / `:last-child` de las esquinas en `list.css` |

**Categorías:** Foundations (4) · Basic Components (2) · Input Components (7) · Content Components (7) · Navigation (6) = 26 items.

`Foundations` no es una traducción inventada: es el nombre que usa el propio M3 para el grupo de color, tipografía, shape y elevación.

**Espaciado de los `<h2>`:** solo aportan `padding: 1em 1em 0.5em` y `color: on-surface-variant` con una regla escalonada al tipo de card. No llevan `border-radius` (las esquinas son de los items de lista).

```css
.rdm-card--outlined > h2.rdm-sys-typography--title-small { margin: 0; padding: 1em 1em 0.5em; }
```

---

## Design Tokens (capa `css/md/`)

### Correcciones de v1.9

La capa de tokens tenía **referencias rotas** que impedían que la tipografía funcionara:

| Slot | Antes (referenciado) | Ahora (correcto) | Problema |
|---|---|---|---|
| line-height | `...-X-**height**` | `...-X-**line-height**` | Token inexistente → `line-height` caía a `normal` |
| letter-spacing | `...-X-**tracking**` | `...-X-**letter-spacing**` | Token inexistente → sin tracking |
| font-weight | `400px` / `500px` | `400` / `500` | CSS no admite unidades en `font-weight` |
| font-style | `Regular` / `Medium` | `normal` | No son valores válidos de `font-style` |
| text-transform | (no existía) | `none` × 15 | 30 referencias sin resolver |
| text-decoration | (no existía) | `none` × 15 | 30 referencias sin resolver |
| surface-dim | (no existía) | `#DED8E1` light / `#141218` dark | `landing.css` lo usaba en pricing y footer |

**Alcance:** 60 referencias corregidas (2 slots × 15 estilos × 2 archivos) en `typography.css` (clases `rdm-sys-typography--*`) y `typography.module.css` (clases `display-*`/`headline-*`/etc.).

**Efecto visual:** al aplicarse por fin `line-height` y `letter-spacing`, **el ritmo vertical y el tracking del texto cambian en todo el catálogo**. Es el comportamiento correcto de M3, pero es visible en todas las páginas.

### Nomenclatura de tokens

`tokens.css` define los valores con sufijo de tema y `theme.light.css` / `theme.dark.css` los remapean al nombre sin sufijo:

```css
/* tokens.css */
--md-sys-color-surface-dim-light: #DED8E1;
--md-sys-color-surface-dim-dark: #141218;

/* theme.light.css */
--md-sys-color-surface-dim: var(--md-sys-color-surface-dim-light);
```

**Regla:** un token de color nuevo hay que tocarlo en 3 archivos. Un token de typescale, solo en `tokens.css` (no varían por tema).

### Verificación

Para comprobar que no queden referencias rotas en todo el proyecto:

```powershell
$def = (Select-String -Path css\md\tokens.css,css\md\theme.light.css,css\md\theme.dark.css,css\estilos.css -Pattern "^\s*(--[\w-]+):" | ForEach-Object { ($_.Line -replace '^\s*','') -replace ':.*$','' } | Sort-Object -Unique)
$used = (Select-String -Path css\*.css,css\md\*.css -Pattern "var\(\s*(--[\w-]+)" -AllMatches | ForEach-Object { $_.Matches } | ForEach-Object { $_.Groups[1].Value } | Sort-Object -Unique)
($used | Where-Object { $def -notcontains $_ })
```

### Pendiente conocido

- **Tokens de elevación:** `--md-sys-elevation-level1..5` se mencionan en la doc pero **no existen** en `tokens.css`. Todos los `box-shadow` siguen hardcodeados en cada CSS. Pendiente de tokenizar.
- **`surface-bright`:** tampoco definido (aún no referenciado, así que no rompe nada).

---

## Buttons

### Tokens por variante (M3)

| Variante | Container | Label | Estado |
|---|---|---|---|
| `.rdm-button--elevated` | `surface-container-low` | `primary` | corregido v1.10 |
| `.rdm-button--filled` | `primary` | `on-primary` | correcto |
| `.rdm-button--tonal` | `secondary-container` | `on-secondary-container` | corregido v1.10 |
| `.rdm-button--outlined` | `transparent` | `primary` | correcto |
| `.rdm-button--text` | `transparent` | `primary` | correcto |
| `.rdm-button--fab` | `primary-container` | `on-primary-container` | corregido v1.10 |
| `.rdm-button--fab-small` | `primary-container` | `on-primary-container` | corregido v1.10 |

**Correcciones de la auditoria (Fase 1):**
- `tonal` usaba `primary-container` + `primary` (morado sobre morado palido, contraste pobre) -> ahora `secondary-container` + `on-secondary-container`
- `elevated` usaba `surface` (`#FFFBFE`), identico al fondo del body, asi que era invisible salvo por la sombra -> ahora `surface-container-low` (`#F7F2FA`)
- `fab` / `fab-small` usaban `tertiary-container` -> ahora `primary-container`

### State layers (M3)

Hover **8%** y pressed **12%**, uniformes en las 6 variantes. El color de la capa es el mismo *on* que usa la etiqueta, resuelto con `color-mix` sobre el token:

```css
.rdm-button--filled:hover::after {
  background-color: color-mix(in srgb, var(--md-sys-color-on-primary) 8%, transparent);
}
```

**Por que `color-mix` y no `rgba` hardcodeado:** antes habia 24 reglas duplicadas `html[data-theme="light"]` / `[data-theme="dark"]` con valores que iban de 0.05 a 0.24. Como `js/theme_toggle.js` reescribe los tokens en runtime, un `color-mix` sobre el token sigue al tema automaticamente y no necesita duplicacion. Las 24 reglas quedaron en 12, sin variantes de tema.

| Variante | Token de la capa |
|---|---|
| filled | `on-primary` |
| tonal | `on-secondary-container` |
| elevated | `on-surface` |
| outlined / text | `primary` |
| fab / fab-small | `on-primary-container` |

### Geometria verificada

| Elemento | Valor | Spec M3 |
|---|---|---|
| Shape comun | `border-radius: 20em` (pildora) | fully rounded OK |
| Icono leading | `1.125em` = 18px | 18dp OK |
| Gap icono-label | 8px via `margin-left: -0.5em` | 8dp OK |
| Padding leading | 16px (`1.5em - 0.5em`) | 16dp OK |
| FAB medium | `3.5em` + `1em` | 56dp + 16dp OK |
| FAB small | `2.5em` + `0.75em` | 40dp + 12dp OK |

El margen negativo en `.rdm-button--media` existe para que el padding de 24px del container se convierta en 16dp reales cuando hay icono.

### Altura y estado disabled (M3)

**Altura:** `.rdm-button--container` usa `height: 2.5em` (40dp) con `align-items: center` y **padding solo horizontal**. Antes era `padding: 0.7em 1.5em` sin alto fijo, lo que daba 42.4px con `label-large` y cambiaba si el label usaba otra tipografía. Con alto fijo + centrado el contenido queda centrado sea cual sea su line-height.

```css
.rdm-button--container {
  height: 2.5em;      /* 40dp */
  padding: 0 1.5em;   /* solo horizontal */
  align-items: center;
}
.rdm-button--fab .rdm-button--container,
.rdm-button--fab-small .rdm-button--container { height: 100%; }
```

El `height: 100%` es para que el container llene el botón cuando este tiene alto propio (los FAB de 56dp y 40dp).

**Estado disabled:** 38% de opacidad, sin elevación y sin state layer. El `pointer-events: none` evita el hover y el ripple a la vez.

```css
.rdm-button--filled:disabled { opacity: 0.38; box-shadow: none; pointer-events: none; cursor: not-allowed; }
.rdm-button--filled:disabled::after { opacity: 0; }  /* anula el state layer */
```

Demostrado en `buttons.php` con las 5 variantes.

### Elevación tokenizada (M3)

Se añadieron `--md-sys-elevation-level0..5` a `tokens.css`. No varían por tema, así que viven fuera de los bloques light/dark.

| Nivel | Valor |
|---|---|
| level1 | `0 1px 2px 0 rgba(0,0,0,.3), 0 1px 3px 1px rgba(0,0,0,.15)` |
| level2 | `0 1px 2px 0 rgba(0,0,0,.3), 0 2px 6px 2px rgba(0,0,0,.15)` |
| level3 | `0 1px 3px 0 rgba(0,0,0,.3), 0 4px 8px 3px rgba(0,0,0,.15)` |
| level4 | `0 2px 4px 0 rgba(0,0,0,.3), 0 6px 10px 4px rgba(0,0,0,.15)` |
| level5 | `0 4px 8px 3px rgba(0,0,0,.15), 0 8px 12px 6px rgba(0,0,0,.15)` |

**Asignación en el proyecto:**

| Componente | Token |
|---|---|
| `.rdm-button--elevated` | `level1` |
| `.rdm-button--fab` / `--fab-small` | `level3` |
| `.rdm-card--elevated` | `level1` |
| `.rdm-form--elevated` | `level1` |

Las 5 sombras de Material 2 (`0 3px 1px -2px rgba(0,0,0,.2)…`) fueron reemplazadas. `elevation.css` y `tarjetas.css` también las tenían pero están **muertos** (no se importan en `estilos.css`).

### Eliminada la elevación dinámica

Las reglas globales `button:hover` y `button:active` se borraron. Aplicaban `box-shadow` a **todo** `<button>` del proyecto, incluidos tonal, filled, outlined y text, que en M3 deben permanecer planos.

En M3 la elevación es **estática**: solo elevated y FAB la tienen y no cambia con hover ni pressed. El feedback de interacción lo da exclusivamente el state layer.

### Desviaciones pendientes

| # | Desviacion | Nota |
|---|---|---|
| 1 | Falta boton de solo icono | M3: 40x40, fully rounded, variantes estandar, filled, tonal y outlined |
| 2 | Falta Large FAB | M3: 96x96 con radio 28dp |
| 3 | `transition: 0.2s ease` | M3 no tiene 200ms; sus duraciones son 50/100/250/300/400/450/600ms con easing `cubic-bezier(0.2, 0, 0, 1)` |
| 4 | Padding trailing 24px | M3 pide 16dp al final. Pendiente de confirmar en la spec |
| 5 | Dimensiones en `em` escalan en movil | `estilos.css:264` pone `body { font-size: 15px }` bajo 530px, asi que los 40dp se vuelven ~39px. Decision del proyecto, afecta a toda la libreria |

---

## Componentes Relacionados

### Empty State
- **Estado**: ✅ Patrón M3 implementado (v1.8) — a11ydynamics pendiente
- **Ubicación**: [empty.php](empty.php) / [css/empty.css](css/empty.css)

### Card List
- **Estado**: ✅ Extensión propia (v1.8) — ortogonal a los 3 tipos de card
- **Ubicación**: [cardlist.php](cardlist.php) / [css/cardlist.css](css/cardlist.css)

### Lists
- **Estado**: ✅ Alturas y state layers alineados a M3 (v1.8)
- **Ubicación**: [lists.php](lists.php) / [css/list.css](css/list.css)

### File Input
- **Estado**: ✅ Implementado (v1.8) — minimalista, 2 variantes (imagen, documento)
- **Ubicación**: [fileinputs.php](fileinputs.php) / [css/fileinput.css](css/fileinput.css) / [js/fileinput.js](js/fileinput.js)

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
- [Material Design 3 - Lists](https://m3.material.io/components/lists/specs) (alturas 56/72/88dp, state layers)
- [Material Design 3 - Cards](https://m3.material.io/components/cards/specs) (elevated/filled/outlined)
- [Material Design 3 - Buttons](https://m3.material.io/components/buttons/specs) (patrón File Input: hidden + button)
- [Material Web - File Upload](https://github.com/material-components/material-web) (md-filled-button + input hidden)
- [MUI - File Upload Button](https://mui.com/material-ui/react-button/#file-upload)
- [Material Symbols Icon Set](https://fonts.google.com/icons)
