(function (){
  var client = algoliasearch('L40JDYRRSA' , '4ebb9b47f17961a229abc460c9bba093');
  var index = client.initIndex('users');
  autocomplete('#search-input', { hint: false }, [
    {
      source: autocomplete.sources.hits(index, { hitsPerPage: 5 }),
      displayKey: 'name',
      templates: {
        suggestion: function(suggestion) {
          return suggestion._highlightResult.name.value;
        }
      }
    }
  ]).on('autocomplete:selected', function(event, suggestion, dataset, context) {
    console.log(event, suggestion, dataset, context);
  });
})
