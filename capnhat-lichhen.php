<?php

include("./config.php");
include("./ham.php");
session_start();

echo '
    <section class="contact-section my-5" id="datlich">

        <div class="card">

            <div class="row">

            <div class="col-lg-12">
                
                <div class="card-body form">
                    <div class="text-right">
                        <a class="btn btn-danger btn-rounded btn-sm close-form">X</a>
                    </div>';

                    include("./formlichhen.php");

                echo '</div>
            </div>
        </div>
    </div>
</section>';


?>