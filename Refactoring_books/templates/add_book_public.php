<div class="msg">
    <?= $data['msg']; ?>
</div>
<form method="post" action="add_book.php">
    <label for="book">Име: </label> 
    <input id="book" type="text" name="book_name" />
    <div>
        <label for="authors">Автори: </label>
        <select id="authors" name="authors[]" multiple >
            <?php
            foreach ($data['authors'] as $row) {
                echo '<option value="' . $row['author_id'] . '">
                    ' . $row['author_name'] . '</option>';
            }
            ?>

        </select></div>
    <input type="submit" value="Добави" />    

</form>
