<?php
  $id = $_GET["id"];
  $Game = new Game($Conn);
  $game = $Game->getGame($id);
?>

<div class="container">
  <h1><?php echo $game["title"]?></h1>
  <div class="row">
    <div class="col-md-4">
      <img class="game-image" src="images/genre-images/fps_image.jpeg"/>
    </div>
    <div class="col-md-8">
      <p><?php echo $game["description"] ?></p>
      <h4> Raiting </h4>
      <p> 5 </p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <h2> Reviews </h2>
      <div class="d-flex flex-wrap">
        <div>
          <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
          </p>
        </div>
        <div>
          <p>
          Vel eros donec ac odio. Volutpat sed cras ornare arcu dui vivamus arcu felis bibendum. Lacus laoreet non curabitur gravida. Quis ipsum suspendisse ultrices gravida dictum fusce ut. Phasellus vestibulum lorem sed risus ultricies tristique.
          </p>
        </div>
        <div>
          <p>
          Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices. Etiam tempor orci eu lobortis elementum. Amet mauris commodo quis imperdiet massa tincidunt nunc. Adipiscing diam donec adipiscing tristique risus. Velit euismod in pellentesque massa placerat duis ultricies lacus sed. Turpis massa sed elementum tempus egestas sed sed.
          </p>
        </div>
        <div>
          <p>
          Mauris pharetra et ultrices neque ornare aenean euismod elementum. Nisi porta lorem mollis aliquam ut porttitor leo a diam. Vel facilisis volutpat est velit egestas dui id ornare arcu. Pharetra diam sit amet nisl suscipit adipiscing bibendum est ultricies. Ultrices gravida dictum fusce ut.
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <h2> News </h2>
      <p>
      Ipsum dolor sit amet consectetur adipiscing elit. Turpis massa tincidunt dui ut ornare lectus sit. Quis ipsum suspendisse ultrices gravida dictum fusce. Scelerisque in dictum non consectetur a erat nam. Arcu bibendum at varius vel. Nulla pharetra diam sit amet nisl suscipit adipiscing. Sit amet consectetur adipiscing elit duis tristique sollicitudin nibh sit. Ut pharetra sit amet aliquam. Ut pharetra sit amet aliquam. Et malesuada fames ac turpis egestas integer eget aliquet nibh. Imperdiet massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada. Et molestie ac feugiat sed. Enim sed faucibus turpis in eu mi bibendum neque. Eget sit amet tellus cras adipiscing enim. Non pulvinar neque laoreet suspendisse. Enim facilisis gravida neque convallis a cras semper auctor. Semper auctor neque vitae tempus quam pellentesque nec. Imperdiet proin fermentum leo vel orci porta. Purus in mollis nunc sed id semper risus in.
      </p>
    </div>
  </div>

</div>