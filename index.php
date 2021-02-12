<?php
$sideA = $sideB = $sideC = $oneSide = $apotema = $area = $type = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST["type"];
    switch ($type) {
        case 1:
            $sideA = $_POST["sideA"];
            $sideB = $_POST["sideB"];
            $sideC = round(sqrt(($sideA * $sideA) + ($sideB * $sideB)), 2);
            break;
        case 2:
            $oneSide = $_POST["oneSide"];
            $apotema = $_POST["apotema"];
            $area = round((((8 * $oneSide) * $apotema) / 2), 2);
            break;
        case 3:
            $datos = $_POST["datos"];
            break;
        default:

            echo '<script language="javascript">alert("Ha ocurrido un error!");</script>';
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Exercises - Gabriel Marquez</title>
    <link rel="stylesheet" href="./main.css">
</head>

<body>
    <div class="container">
        <div class="card-item shadow-primary">
            <h1>Calculo de Hipotenusa</h1>
            <div class="card-form">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <input type="hidden" name="type" value="1">
                    <div class="form-input">
                        <label for="sideA">Lado A : </label>
                        <input class="input-field primary" step="0.01" type="number" placeholder=". . ." name="sideA" required />
                    </div>
                    <div class="form-input">
                        <label for="sideA">Lado B : </label>
                        <input class="input-field primary" type="number" step="0.01" placeholder=". . ." name="sideB" required />
                    </div>
                    <input class="submit-btn bg-primary" type="submit" value="Calcular">

                </form>
            </div>
            <?php if ($sideC > 0) { ?>
                <div class='result'>
                    <span>En fin la hipotenusa, es: <?php echo ($sideC) ?></span>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="card-item shadow-secondary">
            <h1>Area de Octagono</h1>
            <div class="card-form">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <input type="hidden" name="type" value="2">
                    <div class="form-input">
                        <label for="OneSide">Un Lado : </label>
                        <input class="input-field secondary" type="number" step="0.01" placeholder=". . ." name="oneSide" required />
                    </div>
                    <div class="form-input">
                        <label for="apotema">Apotema : </label>
                        <input class="input-field secondary" type="number" step="0.01" placeholder=". . ." name="apotema" required />
                    </div>
                    <input class="submit-btn bg-secondary" type="submit" value="Calcular">
                </form>
            </div>
            <?php if ($area > 0) { ?>
                <div class='result'>
                    <span>El resultado es: <?php echo ($area) ?> cm<sup>2</sup></span>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="card-item shadow-thirty">
            <h1 class="employes-title">Empleados</h1>
            <div class="card-form card-large">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <input type="hidden" name="type" value="3">

                    <?php
                    $fields = [
                        "id" => ["name", "lastName", "iden", "salary", "departament", "workplace"],
                        "type" => ["text", "text", "text", "number", "text", "text"],
                        "placeholder" => ["Nombre", "Apellido", "Identificacion", "Salario", "Departamento", "Lugar de Trabajo"]
                    ];

                    for ($i = 0; $i < count($fields); $i++) {
                        echo ("
                        <label for=''>
                        <h3>Empleado numero " . ($i + 1) . "</h3>
                        </label>
                        <div class='flex-inputs'>
                        ");

                        for ($j = 0; $j < count($fields["id"]); $j++) {
                            echo ('<input class="input-field-text input-' . $fields["id"][$j] . ' thirty" type="' . $fields["type"][$j] . '" placeholder="' . $fields["placeholder"][$j] . '" name="datos[' . $i . '][' . $fields["id"][$j] . ']" required />');
                        }
                        echo ('</div>');
                    }

                    ?>
                    <input class="submit-btn bg-thirty btn-employes" type="submit" value="Enviar">
                </form>
                <?php if (isset($datos)) { ?>
                <div class='result datos'>
                    <?php
                    for ($i = 0; $i < count($datos); $i++) {
                        echo ("<div class='result-item' id='result" . $i . "'>
                            <h3>Empleado " . $datos[$i]["name"] . " " . $datos[$i]["lastName"] . "</h3><br>
                            <span>Identificacion: " . $datos[$i]["iden"] . "</span><br>
                            <span>Salario: " . $datos[$i]["salary"] . "</span><br>
                            <span>Departamento: " . $datos[$i]["departament"] . "</span><br>
                            <span>Lugar de Trabajo: " . $datos[$i]["workplace"] . "</span><br>
                        </div>");
                    }
                    ?>
                </div>

            <?php
            }
            ?>
            </div>
        </div>
    </div>
</body>

</html>
