<?php
session_start();
require "connect.php";
include "header.php";
?>
<!DOCTYPE html>
<html>
<style>
    #page-container {
    position: relative;
    min-height: 100vh;
    }

    #content-wrap {
    padding-bottom: 2.5rem;
    }

</style>
<body>

<script>
        $(document).ready(function() {
        start('longsleeves');
    });
</script>

    
<br><br><br><br>
<div id="page-container">
    <div id="content-wrap">
        <div class="bg-light bg-opacity-75 p-5 rounded m-3">
        <b><a href='http://localhost/proyek/proyek/' style='color: black; text-decoration:none;'>Home</a></b> / Longsleeves
        <?php include "sort_option.php"; ?>
        <br><br>
            <section class="section contact-section" id="next">
                <div class="row row-cols-2 row-cols-md-6 g-4" id="result">
                    
                </div>        
            </section>
        </div>
    </div>
    <div><?php include "footer.php";?></footer>
 </div>
</body>
</html>