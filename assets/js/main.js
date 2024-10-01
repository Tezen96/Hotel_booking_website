const registerBtn = document.querySelector('.register');

const registerForm = document.getElementById('register-layer');

registerBtn.addEventListener("click", function() {
    registerForm.classList.remove("d-none");
    registerForm.classList.add("d-block");
});

const cancelBtn = document.getElementById('cancel-register-btn');

cancelBtn.addEventListener("click", function() {
    registerForm.classList.remove("d-block");
    registerForm.classList.add("d-none");
});

const loginBtn = document.querySelector('.login');

const loginForm = document.getElementById('login-form');

loginBtn.addEventListener("click", function() {
    loginForm.classList.remove("d-none");
    loginForm.classList.add("d-block");
})

const cancelLoginBtn = document.getElementById('cancel-login-btn');

cancelLoginBtn.addEventListener("click", function() {
    loginForm.classList.remove("d-block");
    loginForm.classList.add("d-none");
});


  