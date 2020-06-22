<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
</head>
<body>
<table border="1" width="100%" cellpadding="5">
    <tr>
        <th>Отзыв</th>
        <th>Дата</th>
        <th>Пользователь</th>
    </tr>
    {% for message in messages %}
    <tr>
        <td>{{ message.review }}</td>
        <td>{{ message.user }}</td>
        <td>{{ message.date }}</td>
    </tr>
    {% endfor %}
</table>
<form method="POST" id="form_review" action="">
    <input name="review" type="text" placeholder="Отзыв"/>
    <input name="user" type="text" placeholder="Имя"/>
    <input type="submit" id="btn" value="Отправить"/>
</form>

<div id="result_form"></div>

</body>
</html>