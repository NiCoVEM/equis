<?php
include("Conexion.php");

$titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
$topico = isset($_POST['topico']) ? $_POST['topico'] : '';
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';

$sql = "SELECT a.ID_Art, a.Titulo, a.FechaEnvio, a.Resumen
        FROM ArticulosSimple a
        WHERE a.Titulo LIKE ?";

$params = ["%$titulo%"];

// Si hay fecha, agregar filtro adicional
if (!empty($fecha)) {
    $sql .= " AND a.FechaEnvio = ?";
    $params[] = $fecha;
}

$stmt = $conexion->prepare($sql);

if (count($params) == 1) {
    $stmt->bind_param("s", $params[0]);
} else {
    $stmt->bind_param("ss", $params[0], $params[1]);
}

$stmt->execute();
$result = $stmt->get_result();

$numero = $result->num_rows;

echo "<h5 class='mb-4'>Resultados encontrados: <span class='badge badge-primary'>$numero</span></h5>";

if ($numero > 0) {
    echo '<div class="row">';
    while ($row = $result->fetch_assoc()) {
        $id_art = $row['ID_Art'];
        // Obtener todos los tópicos asociados a este artículo
        $sql_topicos = "SELECT t.topico_especialidad 
                        FROM Articulo_Topico atp
                        JOIN TopicoEspecialidad t ON atp.ID_topico_especialidad = t.ID_topico_especialidad
                        WHERE atp.ID_Art = ?";
        $stmt_topicos = $conexion->prepare($sql_topicos);
        $stmt_topicos->bind_param("i", $id_art);
        $stmt_topicos->execute();
        $res_topicos = $stmt_topicos->get_result();
        $topicos_arr = [];
        while ($t = $res_topicos->fetch_assoc()) {
            $topicos_arr[] = htmlspecialchars($t['topico_especialidad']);
        }
        // Si no tiene tópicos, mostrar "Sin tópico"
        if (empty($topicos_arr)) {
            $topicos_arr[] = "Sin tópico";
        }
        // Si hay filtro por tópico, solo mostrar si alguno coincide
        if ($topico !== '') {
            $coincide = false;
            foreach ($topicos_arr as $topico_nombre) {
                if (stripos($topico_nombre, $topico) !== false) {
                    $coincide = true;
                    break;
                }
            }
            if (!$coincide) continue;
        }

        echo '<div class="col-md-6 mb-3">';
        echo '<div class="card shadow-sm">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . htmlspecialchars($row['Titulo']) . '</h5>';
        echo '<h6 class="card-subtitle mb-2 text-muted">Tópico(s): ' . implode(', ', $topicos_arr) . '</h6>';
        echo '<p class="card-text"><small class="text-secondary">Fecha: ' . htmlspecialchars($row['FechaEnvio']) . '</small></p>';
        echo '<p class="card-text">Resumen: ' . htmlspecialchars($row['Resumen']) . '</p>';

        // Obtener y mostrar participantes
        $sql_part = "SELECT contacto FROM Participantes WHERE ID_Art = ?";
        $stmt_part = $conexion->prepare($sql_part);
        $stmt_part->bind_param("i", $id_art);
        $stmt_part->execute();
        $res_part = $stmt_part->get_result();
        $participantes = [];
        while ($p = $res_part->fetch_assoc()) {
            $participantes[] = htmlspecialchars($p['contacto']);
        }
        if (count($participantes) > 0) {
            echo '<p class="card-text mb-0"><small class="text-muted">Participantes: ' . implode(', ', $participantes) . '</small></p>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo '<div class="alert alert-warning">No se encontraron resultados.</div>';
}
?>
