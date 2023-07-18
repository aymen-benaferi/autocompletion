$(document).ready(function() {
    $('#search-input').on('input', function() {
      var searchText = $(this).val();
      
      // Appel AJAX pour récupérer les suggestions basées sur le texte saisi
      $.ajax({
        url: 'get_suggestions.php',
        type: 'GET',
        data: { search: searchText },
        success: function(response) {
          var suggestions = JSON.parse(response);
          var exactMatches = suggestions.exactMatches;
          var partialMatches = suggestions.partialMatches;

          // Générer la liste de suggestions
          var suggestionList = $('#suggestion-list');
          suggestionList.empty();

          if (exactMatches.length > 0) {
            suggestionList.append('<li class="separator">Correspondances exactes :</li>');
            exactMatches.forEach(function(suggestion) {
              suggestionList.append('<li>' + suggestion + '</li>');
            });
          }

          if (partialMatches.length > 0) {
            suggestionList.append('<li class="separator">Correspondances partielles :</li>');
            partialMatches.forEach(function(suggestion) {
              suggestionList.append('<li>' + suggestion + '</li>');
            });
          }
        }
      });
    });
  });