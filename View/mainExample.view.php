<!--Example-->
<?php
include("header.view.php");
?>
<div id="main">
    <h1 class="col-xs-offset-1 col-xs-9">Hello <?php if (isset($data['name'])) {
            echo $data['name'];
        } else {
            echo 'world';
        } ?>!</h1>
    <form method="POST" action="Controler/sayHelloTo.ctrl.php">
        <label class="label">Name:</label>
        <input type="text" name="name" required>
        <input type="submit">
    </form>
</div>


<?php
include("footer.view.php");
?>
