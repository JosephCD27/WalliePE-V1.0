<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        .elemento {
            margin-bottom: 10px;
            height: 30px;
            border-radius: 10px;
            border: 2px solid #E9D5FF !important;
            background-color: #FAF9FF !important;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transform: scale(0.97);
            transition: transform 0.2s; /* Agregar transición para la propiedad transform */
        }
        .elemento:hover {
            border: 2px solid #EAE8F5 !important;
            background-color: #EAE8F5 !important;
            transform: scale(0.90); /* Reducir ligeramente el tamaño al hacer hover */
            cursor: pointer; /* Cambiar cursor al pasar el mouse */
        }


    </style>
</head>
<body>
        <?php
        if (!empty($dato)) {
            foreach ($dato as $valor) {
                ?>
                  <div class="col s1 elemento">
                      <a href="../Controller/controllerBitacora.php?btn_ambiente=ambiente&codigo=<?php echo $valor['Amb_Cod']?>&campo=Amb_Cod"><?php echo $valor['Amb_Ref'];?></a>
                  </div>
                <?php
            }
        }else{
            ?>
            <p>Ambiente no registrado</p>
            <?php
        }
        ?>  
</body>
</html>
