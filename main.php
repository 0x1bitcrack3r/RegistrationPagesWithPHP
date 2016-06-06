<h1>Comments</h1>
<?php
$result = mysql_query("SELECT * FROM comment WHERE id=0");
//0 should be the current post's id
while($row = mysql_fetch_object($result))
{
    ?>
    <div class="comment">
        By: <?php echo $row->author; //Or similar in your table ?>
        <p>
            <?php echo $row->body; ?>
        </p>
    </div>
<?php
}
?>
<h1>Leave a comment:</h1>
<form action="insertcomment.php" method="post">
    <!-- Here the shit they must fill out -->
    <input type="hidden" name="name" value="<?php $_POST['name'] ?>" />
    <input type="hidden" name="comment" value="<?php $_POST['comment'] ?>" />
    <input type="submit" name="submit" />
</form>