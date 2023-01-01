function search_load(text) {
  var searchText = text;

  $.ajax({
    url: "php/search.php",
    type: "POST",
    cache: false,
    data: { searchText: searchText },
    success: function (data) {
      $("#table").html(data);
    },
    error: function (request, error) {
      alert("Request: " + JSON.stringify(request));
    },
  });
}
