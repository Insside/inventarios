<?php
    $message = "<p>No es posible eliminar el número de serie correspondiente a un artículo entregado, en una fecha posterior a la realización de dicha entrega. Registrado el número de serie del articulo entregado usted disponía máximo de 24 horas para realizar cualquier modificación sobre el número de serie del articulo entregado. En este caso el tiempo específico ha trascurrido, para mayor información consulte con su jefe de área.</p>";
    $f->fila["info"] = $f->getNotification(array("image" => "lock", "message" => $message));
    $f->filas($f->fila['info']);
    $f->windowTitle("Advertencia / Eliminar / Serial","1.3");
    $f->windowResize(array("autoresize" => false, "width" => "450", "height" => "185"));
    $f->setAudio(array("src" => "modulos/inventarios/multimedia/audios/inventarios-solicitud-denegado-eliminar-detalle.mp3", "autoplay" => true));
    ?>