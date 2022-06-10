let masterData = document.getElementById('masterData');
let daftarObat = document.getElementById('daftarObat');

daftarObat.addEventListener('click', () => {
    console.log('1');
    masterData.classList.add('menu-open');
    daftarObat.classList.add('active');
})