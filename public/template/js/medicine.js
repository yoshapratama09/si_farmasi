let btnTambahObat = document.getElementById('btnTambahObat');
let btnDaftarObat = document.getElementById('btnDaftarObat');
let btnKategoriObat = document.getElementById('btnKategoriObat');
let btnTipeObat = document.getElementById('btnTipeObat');

let formTambahObat = document.getElementById('formTambahObat');

let tableObat = document.getElementById('tabelObat');
let tableKategoriObat = document.getElementById('tabelKategoriObat');
let tableTipeObat = document.getElementById('tabelTipeObat');


btnTambahObat.addEventListener('click', () => {
    if (formTambahObat.style.display === 'none') {
        formTambahObat.style.display = 'block';
        tableObat.style.display = 'none';
        tableKategoriObat.style.display = 'none';
        tableTipeObat.style.display = 'none';

    } else {
        tableObat.style.display = 'none';
        formTambahObat.style.display = 'block';
        tableKategoriObat.style.display = 'none';
        tableTipeObat.style.display = 'none';
    }

});

btnDaftarObat.addEventListener('click', () => {
    if (tableObat.style.display === 'none') {
        formTambahObat.style.display = 'none';
        tableObat.style.display = 'block';
        tableKategoriObat.style.display = 'none';
        tableTipeObat.style.display = 'none';
    } else {
        formTambahObat.style.display = 'none';
        tableObat.style.display = 'block';
        tableKategoriObat.style.display = 'none';
        tableTipeObat.style.display = 'none';
    }

});

btnKategoriObat.addEventListener('click', () => {
    if (tableKategoriObat.style.display === 'none') {
        formTambahObat.style.display = 'none';
        tableKategoriObat.style.display = 'block';
        tableObat.style.display = 'none';
        tableTipeObat.style.display = 'none';

    } else {
        formTambahObat.style.display = 'none';
        tableKategoriObat.style.display = 'block';
        tableObat.style.display = 'none';
        tableTipeObat.style.display = 'none';

    }

});

btnTipeObat.addEventListener('click', () => {
    if (tableTipeObat.style.display === 'none') {
        formTambahObat.style.display = 'none';
        tableTipeObat.style.display = 'block';
        tableObat.style.display = 'none';
        tableKategoriObat.style.display = 'none';

    } else {
        formTambahObat.style.display = 'none';
        tableTipeObat.style.display = 'block';
        tableObat.style.display = 'none';
        tableKategoriObat.style.display = 'none';
    }

});

