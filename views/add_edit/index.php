<?php
$edit = false;
if ($value) {
	$value = array_shift($result);
	$phones = explode(", ", $value['phone']);
	$edit = true;
}
?>
<form name="add_edit">
    <p style="display: none">
        <input type="text" name="id" value="<?=($edit ? $value['id'] : '')?>"/>
    </p>
        <p>
            <label>Имя</label>
            <br/>
            <input type="text" name="name" id="name" value="<?=($edit ? $value['name'] : '')?>"/>
        </p>
        <p>
            <label>Фамилия</label>
            <br/>
            <input type="text" name="surname" value="<?=($edit ? $value['surname'] : '')?>"/>
        </p>
        <p>
            <label>E-mail</label>
            <br/>
            <input type="text" name="email" id="email" onblur="checkMail('email')" value="<?=($edit ? $value['email'] : '')?>"/>
        </p>
        <p>
            <label>Дата рождения</label>
            <br/>
            <input type="date" name="dob" id="dob" onblur="checkDob('dob')" value="<?=($edit ? $value['dob'] : '')?>"/>
        </p>
        <p>
            <label>Телефон</label>
            <br/>
            <div id="phone_numbers">
        <?
        if($edit){
        $count = 0;
        foreach ($phones as $phone){
            if($phone == "") continue;
		?>
                <input type="text" name="phone<?=$count?>" onblur="checkPhone('phone<?=$count?>')" value="<?=$phone?>"/>
                </br>
        <?
        $count ++;
        }
        } else {
        ?>
            <input type="text" name="phone0" onblur="checkPhone('phone')" />

        <?}?>
            </div>
            <button type="button" id="add_phone">добавить номер</button>
        </p>
        <p>
            <button type="button" id="save" >
	Сохранить
</button>
        </p>
    </form>

<script type="text/javascript" src="/views/add_edit/script.js"></script>