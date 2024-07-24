$(document).ready(function() {
    $('#searchButton').click(function() {
        var searchQuery = $('#searchInput').val();
        var encodedQuery = encodeURIComponent(searchQuery);
        var url = "search?query=" + encodedQuery;
        window.location.href = url;
    });
    
    $('#searchInput').on('keypress', function(event) {
        if (event.keyCode === 13 || event.which === 13) {
            event.preventDefault(); 
            var searchQuery = $('#searchInput').val();
            var encodedQuery = encodeURIComponent(searchQuery);
            var url = "search?query=" + encodedQuery;
            window.location.href = url;
        }
    });
});

