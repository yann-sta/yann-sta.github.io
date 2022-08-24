<?php

include("db.php");

if(isset($_GET['load']))
{
  $sqlgruppe = "select * from lobbies";
  $playercount = 0;
  $resultgruppe = mysqli_query($conn,$sqlgruppe);
  $output = "<table class='table'><th>Lobby Nummer</th><th>Lobby Name</th><th>Spieleranzahl</th>";
  while($rowgruppe = mysqli_fetch_array($resultgruppe, MYSQLI_ASSOC))
  {
    $lobbyid = $rowgruppe['lobbyid'];
    $sqlplayers = "select * from players where lobbyid=". $lobbyid;
    $resultplayers = mysqli_query($conn,$sqlplayers);
    $playercount = mysqli_num_rows($resultplayers);
    $output .= "<tr><td>" . $lobbyid . "</td><td>" . $rowgruppe['lobbyname'] . "</td><td>" . $playercount . "</td><td><a href='game.php?lobbyid=".urlencode($lobbyid)."'><button>Join</button></a></td></tr>";
  }
  $output .= "</table>";
  echo $output;


}

?>