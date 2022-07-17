<?php 

    session_start();

    if (!isset($_SESSION['user']))
    {
        header("location:login.php");
        die();
    }

    if ($_POST)
    {
        //var_dump($_FILES);exit();

        if ( isset($_POST['titulo']) && isset($_POST['link']) && $_POST['link']=="")
        {
            $nuevaimagen = '';

            if ($_FILES['archivo']['tmp_name']!="")
            {
                $image = $_FILES['archivo']['tmp_name'];
                $fecha = new DateTime();
                $nuevaimagen = $fecha->getTimestamp() . '_' .  $_FILES['archivo']['name'];
                move_uploaded_file($image, "images/$nuevaimagen");
            }

            $query = 'INSERT INTO works (titulo, link, imagen) 
                VALUES ("'. $_POST['titulo'] .'", "'. $_POST['link']
                .'", "'. $nuevaimagen . '")';

            require_once('connector.php');
            $connector = new Connector();
            $id = $connector->exec($query);

            header("Location:admin.php");
        }
        elseif ( isset($_POST['titulo']) && isset($_POST['link']) && $_POST['link']!="")
        {
            $nuevaimagen = '';

            if ($_FILES['archivo']['tmp_name']!="")
            {
                $image = $_FILES['archivo']['tmp_name'];
                $fecha = new DateTime();
                $nuevaimagen = $fecha->getTimestamp() . '_' .  $_FILES['archivo']['name'];
                move_uploaded_file($image, "images/$nuevaimagen");
            }

            $query = 'UPDATE works set titulo="' . $_POST['titulo'] . '", 
                link="' . $_POST['link'] . '"';

            if ($_FILES['archivo']['tmp_name']!="")
            {
                $query .= ', imagen="' . $nuevaimagen .'" ';
            }
            $query .= ' WHERE id="'. $_POST['id'] . '"';
            
            require_once('connector.php');
            $connector = new Connector();
            $id = $connector->exec($query);

            header("Location:admin.php");
        }


        elseif ( isset($_POST['eliminar']) )
        {
            $query = 'DELETE FROM works WHERE id=' . $_POST['eliminar'];

            require_once('connector.php');
            $connector = new Connector();
            $id = $connector->exec($query);

            header("Location:admin.php");
        }
    }


    include('views/header.php'); 

    require_once('connector.php');
    $connector = new Connector();

    $works = $connector->query('SELECT * from works');

    function getImage($image)
    {
        return file_exists("images/$image") && $image!='' ? $image : "notfound.jpg";
    }

?>

<div class="tm-col-invisible"></div>
    <main class="tm-content-full mt-3">
        <section>

            <div class="row mb-3">
                <div class="col">
                    <span class="btn btn-primary mb-3" id="btn_agregar" onclick="agregar()">
                        Agregar nuevo trabajo
                    </span>
                </div>
                <div class="col text-right">
                    <span class="btn btn-primary mb-3" id="btn_salir" onclick="salir()">
                        Cerrar sesión
                    </span>
                </div>
            </div>

            <div class="d-flex mb-5" style="flex-wrap: wrap;">
                <?php foreach($works as $work)
                {
                    echo '<div class="card mr-3 mb-3">';
                    echo '    <img class="card-img-top" src="images/' . getImage($work['imagen']) . '" alt="Card image cap">';
                    echo '    <div class="card-body p-0">';
                    echo '        <p class="card-text">' . $work['titulo'] . '</p>';
                    echo '        <div class="row ml-0 mr-0">';
                    echo '            <button onclick="editar(\''. $work['id']."','".$work['titulo']."','".$work['link'] . '\')" class="col-6 btn btn-sm btn-success p-1">Editar</button>';
                    echo '            <button onclick="eliminar(\'' . $work['id'] . '\')" class="col-6 btn btn-sm btn-danger p-1">Eliminar</button>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '</div>';
                }
                ?>
            </div>

        </section>
    </main>
</div>

<!-- Modal Agregar trabajo -->
<div class="modal fade" id="agregarTrabajo" tabindex="-1" role="dialog" aria-labelledby="titleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-white" id="title">Agregar trabajo</h5>
        </div>
        <div class="editor" style="margin:15px;">
            <form action="" method="post" enctype="multipart/form-data">
                
                <input type="hidden" id="id" name="id"/>
                <div class="form-group mb-4">
                    <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Titulo" required="" />
                </div>
                <div class="form-group mb-4">
                    <input type="text" id="link" name="link" class="form-control" placeholder="Link" required="" />
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFileLang" name="archivo" accept="image/*">
                        <label class="custom-file-label" data-browse="Seleccionar" for="customFileLang">Seleccionar imagen</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-2" id="boton">Agregar</button>
            </form>
        </div>
    </div>
    </div>
</div>



<?php include('views/footer.php'); ?>
