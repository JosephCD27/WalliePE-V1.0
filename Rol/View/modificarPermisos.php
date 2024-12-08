<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../CSS_N/generalModales.css">
    <style>
        p {
            transition: background-color 0.5s ease-in-out; /* Transición suave del color de fondo */
        }
        #opcionesPermisos{
            padding: 10px;
            margin: 0;
        }
        span{
            color: black;
        }
        #opcionesPermisos:hover{
            padding: 10px;
            background-color: #fff;   
        }
    </style>
</head>
<body>
    <p class="tituloModal">Editar Permisos</p>
    <form method="post" action="../Controller/controllerRol.php" class="tarjetaModal" id="formPermisos">
        <p>Selecciona los permisos que deseas asignar a el rol <?php echo $rol_cod; ?></p>
        <?php 
        foreach ($modulos as $posicion => $mol) {
            $permisosArray = $mol['permisos'];
            $permisos_modulo = explode(',', $permisosArray);
            ?>
            <input readonly name="modulos[<?php echo $mol['mod_cod']; ?>][nombre]" value="<?php echo htmlspecialchars($mol['mod_nombre']); ?>">
            <input type="hidden" name="modulos[<?php echo $mol['mod_cod']; ?>][permisos]" value="<?php echo htmlspecialchars($mol['permisos']); ?>">

            <?php   
            foreach ($permisos as $permiso) {
                // Verificar si el nombre del permiso contiene el nombre del módulo
                if (strpos($permiso['per_nombre'], $mol['mod_nombre']) !== false) {
                    $checkboxName = "modulos[" . $mol['mod_cod'] . "][permisos_seleccionados][]";
                    ?>
                    <div>
                        <p id="opcionesPermisos">
                            <label>
                                <input type="checkbox" name="<?php echo $checkboxName; ?>" value="<?php echo htmlspecialchars($permiso['id_permiso']); ?>" 
                                <?php if (in_array($permiso['id_permiso'], $permisos_modulo)) echo 'checked'; ?>>
                                <span><?php echo htmlspecialchars($permiso['per_nombre']); ?></span>
                            </label>
                        <p>
                    </div>
        <?php
                }
            } 
        }
        ?>
        <div class="centrarBoton">
            <input type="hidden" name="rol_cod" value="<?php echo $rol_cod; ?>">
            <button type="submit" name="guardar_permisos" class="botonModal">Guardar Permisos</button>
        </div>
    </form>
</body>
</html>
