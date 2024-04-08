<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contacts = json_decode(file_get_contents('../data/phonebook.json'), true);
    $delete_contact_id = $_GET["id"];
    if (isset($contacts[$delete_contact_id])) {
        unset($contacts[$delete_contact_id]);
    }
    file_put_contents(
        '../data/phonebook.json',
        json_encode($contacts, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)
    );

    header("Location: ../index.php");
}
