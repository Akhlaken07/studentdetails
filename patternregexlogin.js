document.getElementById('loginaccess').addEventListener('submit', function(){
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    
    var regexUsername = /^[a-zA-Z][a-zA-Z0-9_-]{2,15}$/;
    var regexPassword = /^[A-Za-z\d]{6,}$/;
   
    if (!regexUsername.test(username)) {
        alert('Username need to follow format');
    }
    if (!regexPassword.test(password)) {
        alert('Password need to follow format');
    }
    }); 