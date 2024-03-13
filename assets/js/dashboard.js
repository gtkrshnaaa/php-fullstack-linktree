var searchInput = document.getElementById('searchInput');
        var searchMode = 'ID'; // Default mode pencarian

        var toggleButton = document.getElementById('toggleSearch');
        if (localStorage.getItem('searchMode')) {
            searchMode = localStorage.getItem('searchMode');
            toggleButton.textContent = searchMode;
            searchInput.placeholder = 'Search by ' + searchMode;
        }

        if (localStorage.getItem('searchValue')) {
            searchInput.value = localStorage.getItem('searchValue');
            search(searchInput.value);
        }

        searchInput.addEventListener('input', function() {
            var value = this.value.trim(); // Menghapus spasi ekstra
            localStorage.setItem('searchValue', value); // Menyimpan nilai input ke localStorage
            search(value);
        });

        function search(value) {
            var afproductCards, id, title, i, txtValue;
            afproductCards = document.querySelectorAll('.afproduct-card');

            for (i = 0; i < afproductCards.length; i++) {
                id = afproductCards[i].querySelector('p:nth-child(1)');
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

        document.getElementById('toggleSearch').addEventListener('click', function() {
            var toggleButton = document.getElementById('toggleSearch');
            if (toggleButton.textContent === 'ID') {
                toggleButton.textContent = 'Title';
                searchMode = 'Title';
                localStorage.setItem('searchMode', 'Title');
            } else {
                toggleButton.textContent = 'ID';
                searchMode = 'ID';
                localStorage.setItem('searchMode', 'ID');
            }
            searchInput.placeholder = 'Search by ' + searchMode;
            search(searchInput.value);
        });

        window.onload = function() {
            search(searchInput.value);
        };