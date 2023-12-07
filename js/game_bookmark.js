$(function() {
  $('body').on('click', '#addBookmark', function(e) {
    console.log("Add!")
    var game_id = $(this).data('game_id');
    $.ajax({
      method: "POST",
      url: "./ajax/toggleBookmark.php",
      dataType: 'json',
      data: { game_id: game_id }
      })
      .done(function( data ) {
        location.reload();
      });
  });

  $('body').on('click', '#removeBookmark', function(e) {
    var game_id = $(this).data('game_id');
    $.ajax({
    method: "POST",
    url: "./ajax/toggleBookmark.php",
    dataType: 'json',
    data: { game_id: game_id }
    })      
    .done(function( data ) {
      location.reload();
    });
  });
});
