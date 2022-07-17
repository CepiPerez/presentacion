<?php

    include('views/header.php'); 
    require_once('connector.php');

    $connector = new Connector();

    $works = $connector->query('SELECT * from works');

    function getImage($image)
    {
        return file_exists("images/$image") ? $image : "notfound.jpg";
    }

?>

<div class="tm-col-invisible"></div>
    <main class="tm-content-full">
        <section>

            <div class="d-flex" style="flex-wrap: wrap;">
                <?php foreach($works as $work)
                {
                    echo '<div class="card mr-3 mb-3">';
                    echo '    <a href="//' . $work['link'] . '" target="_blank">';
                    echo '        <img class="card-img-top" src="images/' . getImage($work['imagen']) . '" alt="Card image cap">';
                    echo '        <div class="card-body p-0">';
                    echo '            <p class="card-text">' . $work['titulo'] . '</p>';
                    echo '        </div>';
                    echo '    </a>';
                    echo '</div>';
                }
                ?>
            </div>

        </section>
    </main>
</div>


<?php include('views/footer.php'); ?>
