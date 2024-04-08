<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_record = [
        'name' => $_POST['name'],
        'phone' => $_POST['phone'],
    ];

    $contacts = json_decode(file_get_contents('../data/phonebook.json'), true);
    $contacts[] = $new_record;
    file_put_contents(
        '../data/phonebook.json',
        json_encode($contacts, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)
    );

    header("Location: ../index.php");
}
