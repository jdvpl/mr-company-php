<?php
require '../../env/conexion.php';
require 'archivo_session.php';

$output = '';
$query="SELECT * from categoria";
$result = mysqli_query($conexion, $query);
$tabla="categoria";
$field_id="id_categoria";
if (mysqli_num_rows($result) > 0) {
    $output .= '
    <h2 class="text-center">Categorias</h2>
    <div class="table-responsive mt-5">
    <table class="table table-hover table-striped ">
    <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descp</th>
                <th scope="col "class="d-block">Aciones</th>
            </tr>
    </thead>
<tbody>
';
$numero = 0;
while ($row = mysqli_fetch_array($result)) {
$numero = $numero + 1;
$output .= '

<tr>
<td>' . $numero . '</td>
<td>' . $row["nombre"] . '</td>
<td>' . $row["descripcion"] . '</td>
<td >
    <a href="../php/borrar?id='.$row["id_categoria"] .'&table='.$tabla.'&field_id='.$field_id.'" class="btn btn-outline-danger p-1" onclick=\'return confirm("Realmente quieres eliminar esta categoria?");\'><i class="fa fa-trash" aria-hidden="true"></i></a>
    <a href="editarCat?cat='.$row['id_categoria'] .'" class="btn btn-outline-success"><i class="fas fa-edit"></i></a>
        </a>
    </a>
</td>
</tr>
';
}
$output .='</tbody>
</table>
</div>';
echo $output;
} 