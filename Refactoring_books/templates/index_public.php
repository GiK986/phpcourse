
<table>
    <thead>
        <tr>
            <th>
            Книги
            </th>
            <th>
            Автори
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
                foreach ($data['result'] as $row){
                    echo '<tr><td>'.$row['book_title'].'</td>';
                    $list=array();
                    foreach ($row['authors'] as $key=>$author){
                        $list[]= '<a href="index.php?author_id='.$key.'">'.$author.'</a>';
                    }
                    echo '<td>'.  implode(' , ', $list).'</td></tr>';
                }
        ?>
    </tbody>
</table>