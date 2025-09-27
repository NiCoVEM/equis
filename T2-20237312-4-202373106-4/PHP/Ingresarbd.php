<?php
include("Conexion.php");

// Validar que el formulario se envió con todos los campos requeridos
if (
    !empty($_POST['nombrearticulo']) && !empty($_POST['resumen']) &&
    !empty($_POST['topico']) && !empty($_POST['fecha_envio']) && !empty($_POST['participante1'])
) {
    $titulo = $conexion->real_escape_string($_POST['nombrearticulo']);
    $resumen = $conexion->real_escape_string($_POST['resumen']);
    $fecha_envio = $conexion->real_escape_string($_POST['fecha_envio']);
    $participante1 = $conexion->real_escape_string($_POST['participante1']);
    $participante2 = !empty($_POST['participante2']) ? $conexion->real_escape_string($_POST['participante2']) : null;
    $topicos = $_POST['topico']; // array de tópicos seleccionados

    $resultado = $conexion->query("SELECT MAX(ID_Art) AS max_id FROM ArticulosSimple");
    $row = $resultado->fetch_assoc();
    $nuevo_id = $row ? $row['max_id'] + 1 : 1;

    // Guardar el primer tópico en ArticulosSimple (por compatibilidad)
    $primer_topico = (int)$topicos[0];
    $sqlArticulo = "INSERT INTO ArticulosSimple (ID_Art, Titulo, FechaEnvio, Resumen, ID_Topico_Especialidad) 
                    VALUES ($nuevo_id, '$titulo', '$fecha_envio', '$resumen', $primer_topico)";
    if ($conexion->query($sqlArticulo) === TRUE) {
        // Insertar todos los tópicos seleccionados en la tabla intermedia
        foreach ($topicos as $topico_id) {
            $topico_id = (int)$topico_id;
            $conexion->query("INSERT INTO Articulo_Topico (ID_Art, ID_topico_especialidad) VALUES ($nuevo_id, $topico_id)");
        }
        // Insertar Participantes
        $sqlParticipante1 = "INSERT INTO Participantes (ID_Art, contacto) VALUES ($nuevo_id, '$participante1')";
        $conexion->query($sqlParticipante1);

        // Insertar en AutorContacto (si no existe ya)
        $sqlAutorContacto = "INSERT IGNORE INTO AutorContacto (Rut, contacto) VALUES ($nuevo_id, '$participante1')";
        $conexion->query($sqlAutorContacto);

        if ($participante2) {
            $sqlParticipante2 = "INSERT INTO Participantes (ID_Art, contacto) VALUES ($nuevo_id, '$participante2')";
            $conexion->query($sqlParticipante2);
        }
        // Redirigir con mensaje de éxito
        header("Location: IngresarArticulo.php?success=articulo_enviado");
        exit();
    } else {
        echo "Error al insertar el artículo: " . $conexion->error;
    }
} else {
    echo "Formulario no enviado correctamente: faltan campos obligatorios";
}
?>
