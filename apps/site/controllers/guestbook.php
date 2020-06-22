<?php
$DROOT = $_SERVER['DOCUMENT_ROOT'];
include $DROOT.'/apps/site/models/guestbook.php';

if ($_POST['review'] and $_POST['user']) {
    $review = $_POST['review'];
    $user = $_POST['user'];
    $result = insertReviews($conn, $review, $user);
    echo $twig->render('guestbook_result.php', array('message' => $result));
} else {
    $result = getReviews($conn);
    echo $twig->render('guestbook_list.php', array('messages' => $result));
}

