document.getElementById('stud').addEventListener('submit', function(){
    var name = document.getElementById('name').value;
    var matricno = document.getElementById('matricno').value;
    var cAddress = document.getElementById('cAddress').value;
    var hAddress = document.getElementById('hAddress').value;
    var email = document.getElementById('email').value;
    var hPhone = document.getElementById('hPhone').value;
    var mPhone = document.getElementById('mPhone').value;
    var password = document.getElementById('password').value;
    
    var regexName = /^[A-Za-z].{1,}/;
    var regexMatricno = /^[0-9].{6,}/;
    var regexAddress = /^[[a-zA-Z0-9\s,.'-]{3,}$/;
    var regexEmail = /^[A-Za-z0-9]+@[A-Za-z0-9]+\.[A-Za-z0-9]+$/;
    var regexPhone = /^[0-9].{9,}$/;
    var regexPassword = /^[A-Za-z\d]{6,}$/;
   
    if (!regexName.test(name)) {
        alert('Invalid name. Please use only letters and spaces.');
    }
    if (!regexMatricno.test(matricno)) {
        alert('Invalid matric number. Please use only numbers.');
    }
    if (!regexAddress.test(cAddress)) {
        alert('Invalid current address. Please use address format.'); 
    }
    if (!regexAddress.test(hAddress)) {
        alert('Invalid home address. Please use address format.');
    }
    if (!regexEmail.test(email)) {
        alert('Invalid email. Please use email format.');
    }
    if (!regexPhone.test(hPhone)) {
        alert('Invalid home phone number. Please use only numbers.');
    }
    if (!regexPhone.test(mPhone)) {
        alert('Invalid mobile phone number. Please use only numbers.'); 
    }
    if (!regexPassword.test(password)) {
        alert('Invalid password. Please use password format.');
    }

    });