<?php 
    print_r("<form action='CrearTitulo.php' method='post'>
        <div class='mb-3'>
            <label for='exampleFormControlInput1' class='form-label'>Titulo</label>
            <input type='text' name='titulo' class='form-control' placeholder='Insertar Nombre de la obra'>
        </div>
        <div class='mb-3'>
            <label for='exampleFormControlInput1' class='form-label'>ID titulo</label>
            <input type='text' name='id' class='form-control' placeholder='Insertar el ID de la obra'>
        </div>
        <div class='mb-3'>
            <label for='exampleFormControlInput1' class='form-label'>Tipo</label>
            <input type='text' name='tipo' class='form-control' placeholder='Insertar el ID de la obra'>
        </div>
        <div class='mb-3'>
            <label class='form-label'>Precio</label>
            <input type='number' name='precio' min='0' class='form-control' placeholder='Insertar Nombre de autor'>
        </div>
        <div class='mb-3'>
            <label for='exampleFormControlInput1' class='form-label'>Notas</label>
            <textarea type='text' name='notas' class='form-control mb-5' style='height: 800px;'
                placeholder='Insertar una reseña de la obra'></textarea>
        </div>
        <button type='submit' class='btn btn-info'>Actualizar</button>
    </form>");


?>