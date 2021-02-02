
<table>
	<thead>
	<tr>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>E-mail</th>
        <th>Дата рождения</th>
        <th>Телефон</th>
        <th>Действия</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<?
        if (count($result) == 1):
        $value = array_shift($result)
        ?>
			<td><?=$value['name']?></td>
            <td><?=$value['surname']?></td>
            <td><?=$value['email']?></td>
            <td><?=$value['dob']?></td>
            <td>
				<? $phones = explode(', ', $value['phone']);
				foreach ($phones as $phone) {
					if ($phone == "") continue;
					echo $phone . "</br>";
				}
				?>
            </td>
            <td>
                <a href="/phone_detail/?delete=<?=$value['id'];?>"><button>удалить</button></a>
                <a href="/add_edit/?edit=<?=$value['id'];?>"><button>редактировать</button></a>
            </td>
		<? endif;	?>
	</tr>

	</tbody>
