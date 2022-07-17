<?php 

    session_start();

    $error = null;

    if ($_POST)
    {
        $msg = 'De: ' . $_POST['name'] . '<br>';
        $msg .= 'Email: ' . $_POST['email'] . '<br><br>';
        $msg .= $_POST['message'];
        $msg = wordwrap($msg,70);
        
        $error = mail("cepiperez@gmail.com", "Mensaje enviado desde el sitio web", $msg);
    }

    include('views/header.php'); 

?>

<div class="tm-col-left"></div>
    <main class="tm-col-right">
        <section class="tm-content">
            <h2 class="mb-5 tm-content-title">Contacto</h2>
            
            <form action="/contact.php" method="post">

                <div class="form-group mb-4">
                    <input type="text" name="name" class="form-control" placeholder="Nombre" required="" />
                </div>
                <div class="form-group mb-4">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="" />
                </div>
                <div class="form-group mb-5">
                    <textarea rows="6" name="message" class="form-control" placeholder="Mensaje..." required=""></textarea>
                </div>

                <div class="row">
                    <p class="col text-warning" style="font-weight:600;">
                        <?php echo (isset($error)? ($error? "Error al enviar el mensaje!" : "Mensaje enviado!") : ''); ?>
                    </p>
                    <div class="col text-right">
                        <button type="submit" class="btn btn-big btn-primary">Enviar</button>
                    </div>
                </div>

            </form>

        </section>
    </main>
</div>


<?php include('views/footer.php'); ?>
