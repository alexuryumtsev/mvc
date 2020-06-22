<?php
const error_insert = 'Ошибка записи отызва!';
const error_list   = 'Ошибка получения данных!';
const successful   = 'Отзыв успешно записан!';

function insertReviews($conn, $review, $user)
{
    $date = date('Y-m-d');
    try {
        $dbh = $conn->query("INSERT INTO reviews (review, date, user) VALUES ('{$review}', '{$date}', '{$user}')");
        $dbh->execute();
        return successful;
    } catch (PDOException $e) {
        return error_insert;
    }
}

function getReviews($conn)
{
    try {
        $dbh = $conn->query("SELECT review, date, user FROM reviews");
        $result = $dbh->fetchAll();
        return $result;
    } catch (PDOException $e) {
        return error_list;
    }
}



