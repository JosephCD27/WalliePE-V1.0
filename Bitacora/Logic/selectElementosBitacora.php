<div class="row">
    <div class="col s12">
        <div class="row">
            <div class="col s4 offset-s3">
                <?php
                foreach ($select as $registro) {
                    //var_dump($registro); // Esto te mostrará qué datos se están obteniendo
                ?>
                    <p><?php echo $registro['Elem_Nombre']; ?></p>
                <?php
                    /*echo "numero ambiente: " . $registro['Amb_Ref'] . "<br>";
                    echo "tipo descripcion: " . $registro['tipo_desc']. "<br>";
                    echo "nombre elemento: " . $registro['Elem_Nombre']. "<br>";
                    echo "cantElementos: " . $registro['cantElementos']. "<br>";*/
                    $referenciaAmbiente = $registro['Amb_Ref'];
                
                }
                ?>
            </div>
            <div class="col s2">
                <?php
                foreach ($select as $registro) {
                ?>
                <p> <?php echo $registro['cantElementos']; ?></p>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>