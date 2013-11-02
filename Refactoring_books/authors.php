<?php
include './inc/functions.php';
$data=array();
$data['msg']='';
if ($_POST) {
    $author_name = trim($_POST['author_name']);
    if (mb_strlen($author_name) < 2) {
        $data['msg'] = '<p>Невалидно име</p>';
    } else {
        $author_esc = mysqli_real_escape_string($db, $author_name);
        $q = mysqli_query($db, 'SELECT * FROM authors WHERE
        author_name="' . $author_esc . '"');
        if (mysqli_error($db)) {
            $data['msg'] = 'Грешка';
        }

        if (mysqli_num_rows($q) > 0) {
            $data['msg'] = 'Има такъв автор';
        } else {
            mysqli_query($db, 'INSERT INTO authors (author_name)
            VALUES("' . $author_esc . '")');
            if (mysqli_error($db)) {
                $data['msg'] = 'Грешка';
            } else {
                $data['msg'] = 'Успешен запис';
            }
        }
    }
}
$data['authors'] = getAuthors($db);
if ($data['authors']===false) {
    $data['msg'] = 'Грешка';
}


$data['title'] = 'Автори';
$data['list']=array(
    'index' => 'Начало'
   ,'add_book' => 'Нова книга'
); 
$data['content']='./templates/author_public.php';
render($data, './layouts/normal_layout.php');