<form name="search" method="get" >
    <input type="search" name="query" placeholder="Поиск">
    <button type="submit">Найти</button>
</form>
<table>
    <thead>
    <tr>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>E-mail</th>
        <th>Дата рождения</th>
        <th>Телефон</th>
    </tr>
    </thead>
    <tbody>
<?php
foreach ($result as $user) {
    ?> <tr>
        <td><a href="/phone_detail/<?=$user['id'];?>"> <?=$user['name']?></a></td>
        <td><?=$user['surname']?></td>
        <td><?=$user['email']?></td>
        <td><?=$user['dob']?></td>
        <td>
        <? $phones = explode(', ', $user['phone']);
             foreach ($phones as $phone) {
				 if ($phone == "") continue;
				 echo $phone . "</br>";
			 }
		?>

        </td>
    </tr>
    <?
}
?>
	</tbody>
</table>