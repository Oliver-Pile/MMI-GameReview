$(function() {
  // Event listener for adding bookmark button
  $('body').on('click', '#addBookmark', function(e) {
    var game_id = $(this).data('game_id');
    $.ajax({
      method: "POST",
      url: "./ajax/toggleBookmark.php",
      dataType: 'json',
      data: { game_id: game_id }
      })
      .done(function( data ) {
        // Reload the current page to update the bookmark icon
        location.reload();
      });
  });

  // Event listener for removing bookmark button
  $('body').on('click', '#removeBookmark', function(e) {
    var game_id = $(this).data('game_id');
    $.ajax({
    method: "POST",
    url: "./ajax/toggleBookmark.php",
    dataType: 'json',
    data: { game_id: game_id }
    }) 
    .done(function( data ) {
      // Reload the current page to update the bookmark icon
      location.reload();
    });
  });
});
