<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Телефонный справочник</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1>Телефонный справочник</h1>
        <hr>
        <br>
        <div class="phonebook">
            <div class="left-side">
                <form action="/php/addContact.php" method="POST">
                    <input type="text" name="name" placeholder="Имя" maxlength="40">
                    <input type="tel" name="phone" placeholder="Номер телефона" maxlength="20">
                    <button type="submit">Добавить</button>
                </form>
            </div>
            <div class="line"></div>
            <div class="right-side">
                <table border="1" cellspacing=0>
                    <tr>
                        <th>Имя</th>
                        <th>Номер телефона</th>
                        <th></th>
                    </tr>

                    <?php
                    $contacts = json_decode(file_get_contents('data/phonebook.json'), true);

                    foreach ($contacts as $key => $contact) : ?>
                        <tr>
                            <td><?= $contact["name"] ?></td>
                            <td><?= $contact["phone"] ?></td>
                            <!-- <td><button >Удалить</button></td> -->
                            <td>
                                <form method="POST" action="/php/deleteContact.php?id=<?= $key ?>">
                                    <button type="submit">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>