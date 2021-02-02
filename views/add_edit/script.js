

// add phone
let addPhone = document.getElementById('add_phone');

if (addPhone){
    addPhone.onclick = function () {
        let phoneDiv = document.getElementById('phone_numbers');
        let n = phoneDiv.getElementsByTagName('input').length;
        let br = document.createElement('br');
        let newPhone = document.createElement('input');
        newPhone.type = 'text';
        newPhone.name = 'phone' + n;
        newPhone.onblur = function (){
            checkPhone(newPhone.name);
        }
        phoneDiv.append(br);
        phoneDiv.append(newPhone) ;
    }
}


// validation email
function checkMail (id) {
let mail  =  document.getElementById('email');
let mailMess = document.createElement('span');
mailMess.id = 'mail_mess';
mailMess.style.color = 'red';
mailMess.innerText = '  введите корректный email';

if (mail){
        if (mail.value.length == 0 ||
            mail.value.match(/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/)) {
            mail.style.borderColor = '';
            let error = document.getElementById('mail_mess');
            if (error) {
                error.remove();
            }
            return true;
        } else {
            mail.style.borderColor = "red";
            mail.after(mailMess);
            return false;
        }
    }
}

// validation DOB

function checkDob (id) {
    let dob = document.getElementById(id);
    let dobMess = document.createElement('span');
    dobMess.id = 'dob_mess';
    dobMess.style.color = 'red';
    dobMess.innerText = '  добавляемый пользователь должен быть старше 18 лет';

    if (dob) {
        let now = new Date();
        let minDate = now.setFullYear(now.getFullYear() - 18);
        if (dob.value.length == 0 ||
            Date.parse(dob.value) < minDate) {

            dob.style.borderColor = '';
            let error = document.getElementById('dob_mess');
            if (error) {
                error.remove();
            }
            return  true;
        } else {
            dob.style.borderColor = "red";
            dob.after(dobMess);
            return false;
        }
    }
}

// validation phone

function checkPhone(name) {
    let input = document.querySelector("input[name=" + name +  "]");
    let inputMess = document.createElement('span');
    inputMess.id = 'input_mess_' + input.name;
    inputMess.style.color = 'red';
    inputMess.innerText = '  Введите номер телефона в фомате +380123456789, 0123456789';
    if (input){
        if (input.value.length == 0 ||
            input.value.match(/^\+380\d{9}$/) ||
            input.value.match(/^0\d{9}$/) ) {
            input.style.borderColor = '';
            let error = document.getElementById('input_mess_' + input.name);
            if (error) {
                error.remove();
            }
            return true
        } else {
            input.style.borderColor = "red";
            if (!document.getElementById('input_mess_' + input.name)) {
                input.after(inputMess);
                return false
            }
        }
    }
}

// chek name

function checkName(id) {
    let name = document.getElementById(id);
    let nameMess = document.createElement('span');
    nameMess.id = 'name_mess';
    nameMess.style.color = 'red';
    nameMess.innerText = '  поле должно быть заполнено';
    if (name.value.length > 0) {
        name.style.borderColor = '';
        let error = document.getElementById('name_mess');
        if (error) {
            error.remove();
        }
        return true;
    } else {
        name.style.borderColor = "red";
        if (!document.getElementById('name_mess')) {
            name.after(nameMess);
        }
        return false;
    }
}

// check form

let save = document.getElementById('save');
if (save){
    save.onclick = function () {
        let form = document.forms.add_edit;
        let name = checkName('name');
        let mail = checkMail('email');
        let ege = checkDob('dob');
        let phone = false;

        let phoneDiv = document.getElementById('phone_numbers');
        let phones = phoneDiv.getElementsByTagName('input');
        let phonesLength = false;
        let validPhone = true;

        for (let i in phones) {
            if (phones[i].value) {
                phonesLength = true;
                if (!checkPhone(phones[i].name)) {
                    validPhone = false;
                }
            }
        }

        if (validPhone && phonesLength) {
            phone = true;
        } else if(!phonesLength) {
            let Mess = document.createElement('span');
            Mess.id = 'name_mess';
            Mess.style.color = 'red';
            Mess.innerText = '  Введите хотя бы один номер телефона';
            phoneDiv.before(Mess);
        }

        console.log(name);
        console.log(mail);
        console.log(ege);
        console.log(phone);
        if (name && mail && ege && phone) {
            form.submit();
        }
    }
}