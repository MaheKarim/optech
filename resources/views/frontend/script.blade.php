<!-- Jquery -->
<script src="{{ asset('global/toastr/toastr.min.js') }}"></script>

<script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/select2.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/menu/menu.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/slick.js') }}"></script>
<script src="{{ asset('frontend/assets/js/countdown.js') }}"></script>
<script src="{{ asset('frontend/assets/js/skillbar.js') }}"></script>
<script src="{{ asset('frontend/assets/js/slick-animation.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/faq.js') }}"></script>
<script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/tabs-slider.js') }}"></script>
<script src="{{ asset('frontend/assets/js/product-increment.js') }}"></script>
<script src="{{ asset('frontend/assets/js/top-to-bottom.js') }}"></script>
<script src="{{ asset('frontend/assets/js/aos.js') }}"></script>

<script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyArZVfNvjnLNwJZlLJKuOiWHZ6vtQzzb1Y') }}"></script>

<script src="{{ asset('frontend/assets/js/app.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchForm = document.getElementById('searchForm');
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.getElementById('header-search');
        const closeButton = document.querySelector('.optech-header-search-close');
        const searchSection = document.querySelector('.optech-header-search-section');

        // Handle search button click
        searchButton.addEventListener('click', function() {
            if (searchInput.value.trim()) {
                searchForm.submit();
            }
        });

        // Handle Enter key press
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && searchInput.value.trim()) {
                e.preventDefault();
                searchForm.submit();
            }
        });

        // Handle close button
        closeButton.addEventListener('click', function() {
            searchSection.style.display = 'none';
            searchInput.value = '';
        });
    });
</script>
