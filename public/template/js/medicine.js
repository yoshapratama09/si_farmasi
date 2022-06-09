let btnTambahObat = document.getElementById('btnTambahObat');
let btnDaftarObat = document.getElementById('btnDaftarObat');
let formTambahObat = document.getElementById('formTambahObat');
let tableObat = document.getElementById('tabelObat');

btnTambahObat.addEventListener('click', () => {
    if (formTambahObat.style.display === 'none') {
        formTambahObat.style.display = 'block';
        tableObat.style.display = 'none';

    } else {
        tableObat.style.display = 'none';
        formTambahObat.style.display = 'block';
    }

});

btnDaftarObat.addEventListener('click', () => {
    if (tableObat.style.display === 'none') {
        formTambahObat.style.display = 'none';
        tableObat.style.display = 'block';
    } else {
        formTambahObat.style.display = 'none';
        tableObat.style.display = 'block';
    }

});