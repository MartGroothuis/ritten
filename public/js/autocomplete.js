jQuery(document).ready(function ($) {
    // Set the Options for "Bloodhound" suggestion engine

    var engine = new Bloodhound({
        remote: {
            url: '/find?q=%QUERY%',
            wildcard: '%QUERY%',
            rateLimitWait: 1,

        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    $(".search-input").typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        source: engine.ttAdapter(),

        // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
        name: 'location',

        // the key from the array we want to display (name,id,email,etc...)
        templates: {
            empty: [
                '<div class="list-group search-results-dropdown"><div class="list-group-item">Niks gevonden</div></div>'
            ],
            header: [
                '<div class="list-group search-results-dropdown">'
            ],
            suggestion: function (data) {
                console.log(data);
                return '<a class="list-group-item">' + data + '</a>'
            }
        }
    });

});
