
    </div>  
    <div class="tm-row">
        <div class="tm-col-left text-center">            
            <ul class="tm-bg-controls-wrapper">
                <li class="tm-bg-control active" data-id="0"></li>
                <li class="tm-bg-control" data-id="1"></li>
                <li class="tm-bg-control" data-id="2"></li>
            </ul>            
        </div>        
        <div class="tm-col-right tm-col-footer">
            <footer class="tm-site-footer text-right">
                <p class="mb-0">Copyright 2022 Matias Perez
                | <a rel="nofollow" target="_parent" href="mailto:cepiperez@gmail.com" class="tm-text-link">cepiperez@gmail.com</a></p>
            </footer>
        </div>  
    </div>

    <!-- Diagonal background design -->
    <div class="tm-bg">
        <div class="tm-bg-left"></div>
        <div class="tm-bg-right"></div>
    </div>
</div>

</div>


<form action="/admin.php" method="post" id="formEliminar">
    <input type="hidden" id="eliminar" name="eliminar" value="">
</form>

<script src="views/js/jquery-3.4.1.min.js"></script>
<script src="views/js/bootstrap.min.js"></script>
<script src="views/js/jquery.backstretch.min.js"></script>
<script src="views/js/templatemo-script.js"></script>

<script>

$('#customFileLang').on('change',function() {
    var fileName = $(this).val();
    var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
    $(this).next('.custom-file-label').html(cleanFileName);
})

function salir()
{
    window.location.href = '/cerrar.php';
}

function agregar()
{
    $('#title').text('Agregar trabajo');
    $('#boton').text('Agregar');
    $('#id').val('');
    $('#titulo').val('');
    $('#link').val('');
    $('#agregarTrabajo').modal('toggle');
}

function editar(id, titulo, link)
{
    $('#title').text('Modificar trabajo');
    $('#boton').text('Modificar');
    $('#id').val(id);
    $('#titulo').val(titulo);
    $('#link').val(link);
    $('#agregarTrabajo').modal('toggle');
}

function eliminar(id)
{
    if (confirm("Está seguro que desea eliminar el trabajo?") == true) {
        console.log("Eliminando: " + id);
        $('#eliminar').val(id);
        $('#formEliminar').submit();
    } else {
        console.log("cancelado");
    }
}

</script>

</body>
</html>