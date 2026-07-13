=== Plogins Swift - Buy Now Button for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, buy now, direct checkout, skip cart, quick buy
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.2
Requires Plugins: woocommerce
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Añade un botón Comprar ahora / de compra rápida que lleva a los compradores directamente al pago, saltándose el carrito.

== Description ==

Swift añade un botón de compra rápida «Comprar ahora» a tus productos de WooCommerce. Un clic añade el producto al carrito y envía al comprador directamente al pago, saltándose la página del carrito, de modo que comprar cuesta un clic en lugar de tres.

El botón puede aparecer en páginas de producto individuales, en bucles de tienda y de archivo, o en ambos. Tú eliges la etiqueta, adónde redirige (pago o carrito) y si el carrito se vacía primero para que el comprador pague solo con el producto en el que hizo clic.

Swift no tiene estado: no almacena datos por producto y no crea tablas en la base de datos. Se encarga de los hooks del botón, la verificación de nonce, la gestión del carrito y la redirección, y de nada más.

Swift se desarrolla de forma abierta (código abierto). El código fuente, los informes de errores y las peticiones de funciones están en https://github.com/wppoland/plogins-swift.

= Documentation and links =

* <strong>Documentación</strong> - https://plogins.com/es/plogins-swift/docs/
* <strong>Página del plugin</strong> - https://plogins.com/es/plogins-swift/
* <strong>Código fuente</strong> - https://github.com/wppoland/plogins-swift
* <strong>Informes de errores y peticiones de funciones</strong> - https://github.com/wppoland/plogins-swift/issues


= What it does =

* Añade un botón «Comprar ahora» que añade al carrito y redirige con un solo clic.
* Funciona en páginas de producto individuales y/o en bucles de tienda y de archivo.
* Coloca el botón <strong>antes o después</strong> del botón nativo de añadir al carrito en las páginas de producto individuales.
* Coloca el botón en cualquier lugar con el shortcode `[swift_buy_now]` (opcionalmente, apuntando a un producto por ID).
* Redirige al <strong>pago</strong> (saltándose el carrito) o al <strong>carrito</strong>, lo que prefieras.
* Opcionalmente vacía primero el carrito para que en el pago aparezca solo el producto elegido.
* Opcionalmente <strong>respeta la cantidad</strong> elegida en la página del producto (productos simples).
* Elige un <strong>estilo</strong> de botón —predeterminado del tema, sólido o contorno— con un color de acento opcional.
* Respeta el stock y la posibilidad de compra: el botón se oculta para productos agotados o no comprables y no se muestra para productos variables en los bucles.

= Settings =

Una sencilla página de ajustes de WooCommerce (WooCommerce → Swift Quick Buy) te permite:

* Activar o desactivar el botón Comprar ahora.
* Establecer la etiqueta del botón.
* Elegir dónde aparece el botón (producto individual, bucles de tienda o ambos).
* Elegir si se ubica antes o después del botón Añadir al carrito en los productos individuales.
* Elegir adónde redirige (pago o carrito).
* Elegir si vaciar el carrito antes de añadir.
* Elegir si respetar la cantidad seleccionada en la página del producto.
* Elegir un estilo de botón (tema, sólido, contorno) y un color de acento opcional.

= Shortcode =

Usa `[swift_buy_now]` para mostrar el botón Comprar ahora en cualquier lugar: dentro de una página, entrada o bloque. Por defecto apunta al producto actual; añade un ID para apuntar a un producto simple concreto:

`[swift_buy_now id="123"]`

== Installation ==

1. Sube el plugin a `/wp-content/plugins/plogins-swift` o instálalo desde Plugins → Añadir nuevo.
2. Actívalo. WooCommerce debe estar activo.
3. Entra en <strong>WooCommerce → Swift Quick Buy</strong> para configurar la etiqueta, la ubicación y el destino de redirección del botón.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Sí. Swift requiere una instalación activa de WooCommerce.

= Where does the Buy Now button appear? =

En páginas de producto individuales y/o en bucles de producto de tienda y de archivo; tú eliges cuál en los ajustes. En los bucles se muestra solo para productos simples, en stock y comprables.

= Does it skip the cart? =

Sí, si estableces el destino de redirección en «Pago». El producto se añade al carrito y el comprador va directamente a la página de pago. También puedes optar por redirigir al carrito.

= Can the Buy Now button empty the cart first? =

Sí. Swift puede vaciar el carrito antes de añadir el producto seleccionado, de modo que el pago directo contenga solo el artículo en el que hizo clic el comprador.

= Does it respect the selected quantity? =

Sí, para productos simples en páginas de producto individuales, cuando el ajuste «respetar cantidad» está activado.

= Does it create database tables? =

No. Swift no tiene estado: almacena solo sus ajustes (una opción) y no crea tablas personalizadas ni metadatos de producto.

= Does it work with variable products? =

La versión gratuita está diseñada para productos simples. En los bucles de la tienda, el botón se muestra solo para productos simples, ya que primero hay que elegir una variación. La compatibilidad completa de Comprar ahora para productos variables (con un selector de variaciones en línea) está prevista para Swift Pro.

= Can I place the button with a shortcode? =

Sí. Usa `[swift_buy_now]` para el producto actual o `[swift_buy_now id="123"]` para un producto simple concreto.

== Screenshots ==

1. El botón Comprar ahora en la página de un producto individual.
2. La pantalla de ajustes de Swift Quick Buy.

== External Services ==

Swift no se conecta, ni envía datos, ni carga nada desde ningún servicio externo. No hay SDK, ni cliente de API, ni fuente remota, CDN o endpoint de analítica, ni comprobación de licencia ni conexión phone-home; su CSS y su JavaScript se incluyen con el plugin y se cargan desde tu propio sitio.

Todo el trabajo de Swift ocurre en tu servidor. Lee y escribe una única opción de ajustes (`swift_settings`) y un marcador de versión de esquema (`swift_db_version`), y no crea tablas de base de datos personalizadas ni metadatos de producto. El botón Comprar ahora añade el producto elegido al propio carrito de WooCommerce del visitante y lo redirige dentro de tu sitio a tu página de pago o de carrito; nada sobre el producto, el carrito o el comprador sale de tu instalación.

== Translations ==

Plogins Swift incluye traducciones al polaco, alemán y español para la interfaz del plugin. El dominio de texto es `plogins-swift`, así que los paquetes de idioma de WordPress.org también pueden sustituir o ampliar estas traducciones incluidas.

== Changelog ==

= 1.0.2 =
* Añadidas traducciones al polaco, alemán y español para la interfaz del plugin.

= 1.0.1 =
* Primera versión estable.

= 0.2.1 =
* Renombrado a Plogins Swift para WooCommerce para un nombre de plugin más distintivo.

= 0.2.0 =
* Nuevo: shortcode `[swift_buy_now]` para colocar el botón Comprar ahora en cualquier lugar (opcionalmente, apuntando a un producto por ID).
* Nuevo: elige si el botón se ubica antes o después del botón Añadir al carrito en las páginas de producto individuales.
* Nuevo: opcionalmente respetar la cantidad elegida en la página del producto (productos simples).
* Nuevo: opciones de estilo de botón —predeterminado del tema, sólido o contorno— con un color de acento opcional.
* Nuevo: enlace «Ajustes» en la fila de la lista de plugins.
* Nuevo: la limpieza de desinstalación elimina las opciones del plugin (compatible con multisitio).
* Mejorado: página de ajustes rediseñada con tarjetas agrupadas, una vista previa del botón en directo, un indicador de estado Activo/Apagado y tooltips de ayuda «?» accesibles en cada opción.
* Mejorado: estilos de botón modernos y adaptables al tema en la tienda (propiedades personalizadas de CSS, compatibilidad con modo oscuro, transiciones seguras con movimiento reducido) sin saltos de diseño.
* Mejorado: accesibilidad, tooltips de ayuda operables por teclado, estilos de foco visibles y roles ARIA en toda la administración.
* Mejorado: robustez, el botón nunca se muestra en un estado roto para productos que no se pueden comprar y el color de acento se limita a los propios botones de Swift.

= 0.1.0 =
* Lanzamiento inicial: un botón Comprar ahora para WooCommerce que se añade al carrito y redirige directamente al pago (o al carrito), con una página de ajustes para la etiqueta, la ubicación y el destino de redirección.
