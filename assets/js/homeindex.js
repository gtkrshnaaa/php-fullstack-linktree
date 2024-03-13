// Mendapatkan nilai input dari localStorage jika tersedia
var searchInput = document.getElementById('searchInput');
var searchMode = 'ID'; // Default mode pencarian

// Mendapatkan status tombol toggle dari localStorage jika tersedia
var toggleButton = document.getElementById('toggleSearch');
if (localStorage.getItem('searchMode')) {
    searchMode = localStorage.getItem('searchMode');
    toggleButton.textContent = searchMode;
    searchInput.placeholder = 'Search by ' + searchMode;
}

// Mendapatkan nilai pencarian dari localStorage jika tersedia
if (localStorage.getItem('searchValue')) {
    searchInput.value = localStorage.getItem('searchValue');
    search(searchInput.value);
}

// Event listener untuk input pencarian
searchInput.addEventListener('input', function() {
    var value = this.value.trim(); // Menghapus spasi ekstra
    localStorage.setItem('searchValue', value); // Menyimpan nilai input ke localStorage
    search(value);
});

// Fungsi pencarian
function search(value) {
    var afproductCards, id, title, i, txtValue;
    afproductCards = document.querySelectorAll('.afproduct-card');

    for (i = 0; i < afproductCards.length; i++) {
        id = afproductCards[i].querySelector('.product-id');
        title = afproductCards[i].querySelector('p:nth-child(2)');
        if (searchMode === 'ID') {
            txtValue = id.textContent || id.innerText;
        } else {
            txtValue = title.textContent || title.innerText;
        }
        if (txtValue.toUpperCase().indexOf(value.toUpperCase()) > -1) {
            afproductCards[i].style.display = "";
        } else {
            afproductCards[i].style.display = "none";
        }
    }
}

// Fungsi untuk toggle mode pencarian
document.getElementById('toggleSearch').addEventListener('click', function() {
    var toggleButton = document.getElementById('toggleSearch');
    if (toggleButton.textContent === 'ID') {
        toggleButton.textContent = 'Title';
        searchMode = 'Title';
        localStorage.setItem('searchMode', 'Title'); // Menyimpan status mode pencarian ke localStorage
    } else {
        toggleButton.textContent = 'ID';
        searchMode = 'ID';
        localStorage.setItem('searchMode', 'ID'); // Menyimpan status mode pencarian ke localStorage
    }
    searchInput.placeholder = 'Search by ' + searchMode;
    search(searchInput.value);
});

// Panggil fungsi pencarian saat halaman dimuat
window.onload = function() {
    search(searchInput.value);
};