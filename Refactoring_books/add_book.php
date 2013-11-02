<?php

include './inc/functions.php';
$data['msg']='';
if ($_POST) {

    $book_name = trim($_POST['book_name']);
    if (!isset($_POST['authors'])) {
        $_POST['authors'] = '';
    }
    $authors = $_POST['authors'];
    $er = [];
    if (mb_strlen($book_name) < 2) {
        $er[] = 'Невалидно име';
    }
    if (!is_array($authors) || count($authors) == 0) {
        $er[] = 'Грешка';
    }
    if (!isAuthorIdExists($db, $authors)) {
        $er[] = 'невалиден автор';
    }

    if (count($er) > 0) {
        $data['msg'] = implode(' , ', $er);
    } 
    else {
        mysqli_query($db, 'INSERT INTO books (book_title) VALUES("' .
                mysqli_real_escape_string($db, $book_name) . '")');
        if (mysqli_error($db)) {
            $data['msg'] = 'Error';
            exit;
        }
        $id = mysqli_insert_id($db);
        foreach ($authors as $authorId) {
            mysqli_query($db, 'INSERT INTO books_authors (book_id,author_id)
                VALUES (' . $id . ',' . $authorId . ')');
            if (mysqli_error($db)) {
                 $data['msg'] = 'Error';
                
                exit;
            }
        }
         $data['msg'] = 'Книгата е добавена';
        
    }
}

$data['authors'] = getAuthors($db);
    if ($data['authors'] === false) {
        echo 'грешка';
        ///TODO        
    }

$data['title'] = 'Нова книга';
$data['list']=array(
    'index' => 'Начало'
    ,'authors' => 'Автори'
    );
$data['content']='./templates/add_book_public.php';
render($data, './layouts/normal_layout.php');