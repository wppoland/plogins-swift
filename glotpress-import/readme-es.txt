=== Plogins Swift - Buy Now Button for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, buy now, direct checkout, skip cart, quick buy
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Stable tag: 1.0.1
Requiere complementos: woocommerce
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Añade un botón Comprar ahora/compra rápida que lleve a los compradores directamente al proceso de pago, omitiendo el carrito.

== Description ==

Swift añade un botón de compra rápida "Comprar ahora" a sus productos WooCommerce. Un clic añade el producto al carrito y envía al comprador directamente al proceso de pago, omitiendo la página del carrito, por lo que la compra requiere un clic en lugar de tres.

El botón puede aparecer en páginas de un solo producto, en bucles de tienda y archivo, o en ambos. Usted elige la etiqueta, adónde redirige (pagar o carrito) y si el carrito se vacía primero para que el comprador pague solo con el producto en el que hizo clic.

Swift no tiene estado: no almacena datos por producto y no crea tablas de bases de datos. Maneja los ganchos de botón, la verificación nonce, el manejo y redireccionamiento del carrito, y nada más.

Swift se desarrolla al aire libre. El código fuente, los informes de errores y las solicitudes de funciones se encuentran disponibles en https://github.com/wppoland/plogins-swift.

= Documentation and links =

* <strong>Documentación</strong> - https://plogins.com/es/plogins-swift/docs/
* <strong>Página de complementos</strong> - https://plogins.com/es/plogins-swift/
* <strong>Código fuente</strong> - https://github.com/wppoland/plogins-swift
* <strong>Informes de errores y solicitudes de funciones</strong> - https://github.com/wppoland/plogins-swift/issues


= What it does =

* Añade un botón "Comprar ahora" que añade al carrito y redirige con un solo clic.
* Funciona en páginas de productos individuales y/o bucles de compras y archivos.
* Coloque el botón <strong>antes o después</strong> del botón nativo de añadir al carrito en páginas de un solo producto.
* Suelte el botón en cualquier lugar con el código abreviado `[swift_buy_now]` (opcionalmente, apuntando a un producto por identificación).
* Redirige al <strong>checkout</strong> (saltar el carrito) o al <strong>carrito</strong>, como prefieras.
* Opcionalmente, primero vacía el carrito para que el proceso de pago muestre solo el producto elegido.
* Opcionalmente <strong>respeta la cantidad</strong> elegida en la ficha del producto (productos simples).
* Elija un <strong>estilo</strong> de botón, tema predeterminado, sólido o contorno, con un color de acento opcional.
* Respeta el stock y la capacidad de compra, el botón está oculto para productos agotados o no adquiribles, y no se muestra para productos variables en bucles.

= Settings =

Una página de configuración simple de WooCommerce (WooCommerce → Swift Quick Buy) le permite:

* Activa o desactiva el botón Comprar Ahora.
* Establecer la etiqueta del botón.
* Elija dónde aparece el botón (producto único, bucles de compras o ambos).
* Elija si se ubica antes o después del botón Añadir al carrito en productos individuales.
* Elija a dónde redirige (pagar o carrito).
* Elija si desea vaciar el carrito antes de añadir.
* Elija si desea respetar la cantidad seleccionada en la página del producto.
* Elija un estilo de botón (tema, sólido, contorno) y un color de acento opcional.

= Shortcode =

Utilice `[swift_buy_now]` para representar el botón Comprar ahora en cualquier lugar, dentro de una página, publicación o bloque. Se dirige al producto actual de forma predeterminada; añade una identificación para apuntar a un producto simple específico:

`[swift_buy_now id="123"]`

== Installation ==

1. Cargue el complemento en `/wp-content/plugins/plogins-swift`, o instálelo a través de Complementos → Añadir nuevo.
2. Actívalo. WooCommerce debe estar activo.
3. Visita <strong>WooCommerce → Swift Quick Buy</strong> para configurar la etiqueta del botón, la ubicación y el destino de redireccionamiento.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Sí. Swift requiere una instalación activa de WooCommerce.

= Where does the Buy Now button appear? =

En páginas de productos individuales y/o en bucles de productos de compra y archivo; Tú eliges cuál en la configuración. En los bucles se muestra solo para productos simples, en stock y adquiribles.

= Does it skip the cart? =

Sí, si configura el objetivo de redireccionamiento en "Pagar". El producto se añade al carrito y el comprador es llevado directamente a la página de pago. También puedes optar por redirigir al carrito.

= Can the Buy Now button empty the cart first? =

Sí. Swift puede borrar el carrito antes de añadir el producto seleccionado, por lo que el pago directo contiene solo el artículo en el que hizo clic el comprador.

= Does it respect the selected quantity? =

Sí, para productos simples en páginas de un solo producto, cuando la configuración "respetar cantidad" está habilitada.

= Does it create database tables? =

No. Swift no tiene estado, almacena solo tu configuración (una opción) y no crea tablas personalizadas ni metadatos de productos.

= Does it work with variable products? =

La versión gratuita está diseñada para productos sencillos. En los bucles de la tienda, el botón se muestra solo para productos simples, ya que primero se debe elegir una variación. Está previsto que Swift Pro admita completamente Comprar ahora para productos variables (con un selector de variaciones en línea).

= Can I place the button with a shortcode? =

Sí. Utilice `[swift_buy_now]` para el producto actual o `[swift_buy_now id="123"]` para un producto simple específico.

== Screenshots ==

1. El botón Comprar ahora en la página de un solo producto.
2. La pantalla de configuración de Swift Quick Buy.

== External Services ==

Swift no se conecta, envía datos ni carga nada desde ningún servicio externo. No hay SDK, ni cliente API, ni fuente remota, CDN o punto final de análisis, ni verificación de licencia ni llamada telefónica a casa; su CSS y JavaScript están incluidos con el complemento y se ponen en cola desde tu propio sitio.

Todo el trabajo de Swift ocurre en su servidor. Lee y escribe una única opción de configuración (`swift_settings`) y un marcador de versión de esquema (`swift_db_version`), y no crea tablas de bases de datos personalizadas ni metadatos de productos. El botón Comprar ahora añade el producto elegido al carrito de WooCommerce del visitante y lo redirige dentro de tu sitio a su página de pago o carrito; nada sobre el producto, el carrito o el comprador sale de su instalación.

== Changelog ==

= 1.0.1 =
* Primera versión estable.

= 0.2.1 =
* Renombrado a Plogins Swift para WooCommerce para obtener un nombre de complemento más distintivo.

= 0.2.0 =
* Nuevo: código abreviado `[swift_buy_now]` para colocar el botón Comprar ahora en cualquier lugar (opcionalmente, apuntando a un producto por identificación).
* Nuevo: elija si el botón se ubica antes o después del botón Añadir al carrito en páginas de un solo producto.
* Nuevo: opcionalmente respetar la cantidad elegida en la página del producto (productos simples).
* Nuevo: opciones de estilo de botón, tema predeterminado, sólido o contorno, con un color de acento opcional.
* Nuevo: enlace "Configuración" en la fila de la lista de complementos.
* Nuevo: la limpieza de desinstalación elimina las opciones del complemento (con reconocimiento de múltiples sitios).
* Mejorado: página de configuración rediseñada con tarjetas agrupadas, una vista previa del botón en vivo, un indicador de estado En vivo/Apagado y "?" Información sobre herramientas de ayuda sobre cada opción.
* Mejorado: estilos de botones de escaparate modernos y temáticos (propiedades personalizadas de CSS, compatibilidad con modo oscuro, transiciones seguras con movimiento reducido) sin cambios de diseño.
* Mejorado: accesibilidad, información sobre herramientas de ayuda operable por teclado, estilos de enfoque visibles y roles ARIA en todo el administrador.
* Mejorado: robustez, el botón nunca se muestra en un estado roto para productos que no se pueden comprar y el color de acento se limita a los propios botones de Swift.

= 0.1.0 =
* Lanzamiento inicial: un botón Comprar ahora para WooCommerce que se añade al carrito y redirige directamente al pago (o al carrito), con una página de configuración para la etiqueta, la ubicación y el destino de redireccionamiento.
