let btnRegis = document.getElementById('regis');
let formLogin = document.getElementById('form-login');
let formRegis = document.getElementById('buatAkun');
let btnLogin = document.getElementById('kembali');
let card = document.getElementById('card-body');

btnRegis.addEventListener('click', () => {
    if (formRegis.style.display === 'none') {
        formRegis.style.display = 'block';
        formLogin.style.display = 'none';
    } else {
        formRegis.style.display = 'none';
        formLogin.style.display = 'block';
    }
});

btnLogin.addEventListener('click', () => {
    if (formLogin.style.display === 'none') {
        formRegis.style.display = 'none';
        formLogin.style.display = 'block';
    } else {
        formRegis.style.display = 'block';
        formLogin.style.display = 'none';
    }
});