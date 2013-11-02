<form method="post" action="authors.php">
    <label for="author">Име: </label>
    <input id="author"type="text" name="author_name" />
    <input type="submit" value="Добави" />    
</form>

<div class="msg">
    <?= $data['msg']; ?>
</div>

<table>
    <thead>
        <tr>
            <th>
                Автор
            </th>
        </tr>
    </thead>
    <tbody>
          <?php
    foreach ($data['authors'] as $row) {
        echo '<tr>'
               . '<td>'
               . '<a href="index.php?author_id='.$row['author_id'].'">' . $row['author_name'] . '</a>'
               . '</td>'
           . '</tr>';
            }
          ?>
    </tbody>
</table>