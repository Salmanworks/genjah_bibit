// Live Search with AJAX
let searchTimeout;
const searchInput = document.getElementById('search-input');
const searchResults = document.getElementById('search-results');
const searchLoading = document.getElementById('search-loading');
const searchEmpty = document.getElementById('search-empty');
const popularSearches = document.getElementById('popular-searches');
const resultsContainer = document.getElementById('results-container');
const resultCount = document.getElementById('result-count');

if (searchInput) {
    searchInput.addEventListener('input', function(e) {
        const query = e.target.value.trim();
        
        // Clear previous timeout
        clearTimeout(searchTimeout);
        
        // Hide all states
        searchResults.classList.add('hidden');
        searchLoading.classList.add('hidden');
        searchEmpty.classList.add('hidden');
        popularSearches.classList.remove('hidden');
        
        // If query is empty or too short, show popular searches
        if (query.length < 2) {
            return;
        }
        
        // Show loading
        searchLoading.classList.remove('hidden');
        popularSearches.classList.add('hidden');
        
        // Debounce search
        searchTimeout = setTimeout(() => {
            performSearch(query);
        }, 300);
    });
    
    // Prevent Enter key from submitting or navigating
    searchInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const query = e.target.value.trim();
            if (query.length >= 2) {
                performSearch(query);
            }
        }
    });
}

function performSearch(query) {
    fetch(`/api/search?q=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
            searchLoading.classList.add('hidden');
            
            if (data.success && data.products.length > 0) {
                displayResults(data.products, data.count);
            } else {
                searchEmpty.classList.remove('hidden');
            }
        })
        .catch(error => {
            console.error('Search error:', error);
            searchLoading.classList.add('hidden');
            searchEmpty.classList.add('hidden');
        });
}

function displayResults(products, count) {
    searchResults.classList.remove('hidden');
    resultCount.textContent = `${count} produk ditemukan`;
    
    resultsContainer.innerHTML = products.map(product => `
        <a href="${product.url}" class="flex items-center gap-4 p-3 rounded-xl hover:bg-emerald-50 transition-all group">
            <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0 bg-emerald-50">
                <img src="${product.image}" alt="${product.name}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
            </div>
            <div class="flex-1 min-w-0">
                <h4 class="font-bold text-sm text-emerald-950 truncate group-hover:text-lime-600 transition-colors">${product.name}</h4>
                <p class="text-xs text-emerald-950/50 truncate">${product.category}</p>
                <div class="flex items-center gap-2 mt-1">
                    <span class="text-sm font-bold text-emerald-900">${product.formatted_price}</span>
                    ${product.in_stock 
                        ? '<span class="text-[10px] px-2 py-0.5 bg-green-100 text-green-700 rounded-full font-bold">Tersedia</span>' 
                        : '<span class="text-[10px] px-2 py-0.5 bg-red-100 text-red-700 rounded-full font-bold">Habis</span>'
                    }
                </div>
            </div>
            <svg class="w-5 h-5 text-emerald-950/20 group-hover:text-lime-500 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    `).join('');
}

// Quick search function
function quickSearch(term) {
    searchInput.value = term;
    searchInput.dispatchEvent(new Event('input'));
    searchInput.focus();
}

// Search toggle
function toggleSearch() {
    const modal = document.getElementById('search-modal');
    modal.classList.toggle('hidden');
    if (!modal.classList.contains('hidden')) {
        searchInput.focus();
        // Reset search state
        searchInput.value = '';
        searchResults.classList.add('hidden');
        searchLoading.classList.add('hidden');
        searchEmpty.classList.add('hidden');
        popularSearches.classList.remove('hidden');
    }
}
