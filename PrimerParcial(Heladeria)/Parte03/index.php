<?php

// 6- (2 pts.) DevolverHelado.php (por POST),
// Guardar en el archivo (devoluciones.json y cupones.json):
// a- Se ingresa el número de pedido y la causa de la devolución. El número de pedido debe existir, se ingresa una
// foto del cliente enojado,esto debe generar un cupón de descuento(id, devolucion_id, porcentajeDescuento,
// estado[usado/no usadol]) con el 10% de descuento para la próxima compra.
// 7- (1 pts.) borrarVenta.php (por DELETE), debe recibir un número de pedido,se borra la venta(soft-delete, no
// físicamente) y la foto relacionada a esa venta debe moverse a la carpeta /ImagenesBackupVentas.
