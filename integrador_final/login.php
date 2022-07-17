<?php 

session_start();

$error = false;

if ($_POST)
{
    if ( $_POST['user']=="admin" &&  $_POST['password']=='admin')
    {
        $_SESSION['user']="Admin";
        header("location:admin.php");
        die();
    }
    else
    {
        $error = true;
    }
}

include('views/header.php'); 

?>

<div class="tm-col-left"></div>
    <main class="tm-col-right">
        <section class="tm-content">
            <h2 class="mb-5 tm-content-title">Ingresar</h2>
            
            <form action="/login.php" method="post">

                <div class="form-group mb-4">
                    <input type="text" name="user" class="form-control" placeholder="Usuario" required="" />
                </div>
                <div class="form-group mb-4">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required="" />
                </div>
                <div class="row">
                    <p class="col text-warning" style="font-weight:600;">
                        <?php if($error) { echo "Datos incorrectos!"; } ?>
                    </p>
                    <div class="col text-right">
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </div>
                </div>


            </form>


        </section>
    </main>
</div>


<?php include('views/footer.php'); ?>
