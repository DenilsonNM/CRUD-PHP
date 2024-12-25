<?php
require "conexion.php";

if (isset($_GET['id_registro']) && isset($_GET['documento'])) {
    $id_registro = intval($_GET['id_registro']);
    $documento = $_GET['documento'];

    // Verifica que el campo solicitado sea válido
    $campos_validos = ['car_prese', 'car_acept', 'car_term_ss', 'com_inscr', 'com_vig_dd', 'rep_pre_res', 'sol_proy'];
    if (!in_array($documento, $campos_validos)) {
        die("Documento inválido.");
    }

    // Consulta para obtener el documento desde la tabla fin_docs usando el id_registro de info_alumno
    $query = "
    SELECT id_pdf, $documento 
    FROM fin_docs 
    WHERE id_registro = ?";

    $stmt = $conectar->prepare($query);
    $stmt->bind_param("i", $id_registro); // Vínculo con el id_registro
    $stmt->execute();
    $stmt->bind_result($id_pdf, $archivo);
    $stmt->fetch();

    if ($archivo) {
        // Configura los encabezados para el archivo PDF (puedes ajustarlo si es otro tipo de archivo)
        header("Content-Type: application/pdf");
        header("Content-Disposition: inline; filename=$documento.pdf");
        echo $archivo;
    } else {
        echo "Archivo no encontrado.";
    }

    $stmt->close();
    mysqli_close($conectar);
} else {
    echo "Parámetros no válidos.";
}
