<?php
function countPatternsFrom($f, $l){

  $count = 0;

  if ($l == 1) {return 1;}
  if ($l > 9 or $l < 1) {return 0;}

  return possibleMoves([], $f, $l);
  
}

function possibleMoves($letterspassed, $letter, $length){
  //Legal moves for every letter
  $moves = [
    'A' => ['B', 'D', 'E', 'F', 'H'],
    'B' => ['A', 'C', 'D', 'E', 'F', 'G', 'I'],
    'C' => ['B', 'D', 'E', 'F', 'H'],
    'D' => ['A', 'B', 'C', 'E', 'G', 'H', 'I'],
    'E' => ['A', 'B', 'C', 'D', 'F', 'G', 'H', 'I'],
    'F' => ['A', 'B', 'C', 'E', 'G', 'H', 'I'],
    'G' => ['B', 'D', 'E', 'F', 'H'],
    'H' => ['A', 'C', 'D', 'E', 'F', 'G', 'I'],
    'I' => ['B', 'D', 'E', 'F', 'H']
  ];
  $passed = $letterspassed;
  //Adding legal moves depending on what letters have been used/passed.
  //Letter A
  if (in_array('B', $passed)) {array_push($moves['A'], 'C');}
  if (in_array('E', $passed)) {array_push($moves['A'], 'I');}
  if (in_array('D', $passed)) {array_push($moves['A'], 'G');}
  //Letter B
  if (in_array('E', $passed)) {array_push($moves['B'], 'H');}
  //Letter C
  if (in_array('B', $passed)) {array_push($moves['C'], 'A');}
  if (in_array('E', $passed)) {array_push($moves['C'], 'G');}
  if (in_array('F', $passed)) {array_push($moves['C'], 'I');}
  //Letter D
  if (in_array('E', $passed)) {array_push($moves['D'], 'F');}
  //Letter F
  if (in_array('E', $passed)) {array_push($moves['F'], 'D');}
  //Letter G
  if (in_array('D', $passed)) {array_push($moves['G'], 'A');}
  if (in_array('E', $passed)) {array_push($moves['G'], 'C');}
  if (in_array('H', $passed)) {array_push($moves['G'], 'I');}
  //Letter H
  if (in_array('E', $passed)) {array_push($moves['H'], 'B');}
  //Letter I 
  if (in_array('H', $passed)) {array_push($moves['I'], 'G');}
  if (in_array('E', $passed)) {array_push($moves['I'], 'A');}
  if (in_array('F', $passed)) {array_push($moves['I'], 'C');}

  //Pushing in the actual letter to the array of letters passed/used
  array_push($passed, $letter);

  //Check if the length got to its maximum, returning 0 movements
  if (count($passed) == $length) {
    return 0;
  }
  
  //Delete the used letters from the legal moves of the $letter we are on
  for ($i = 0; $i < count($passed); $i++){
    if (in_array($passed[$i], $moves[$letter])){
      unset($moves[$letter][array_search($passed[$i], $moves[$letter])]);
    }
  }
  //Reindexing the whole array, because unset doesnt do it automatically.
  $moves[$letter] = array_values($moves[$letter]); 

  //Number of moves -> what letters can you move to
  $numMoves = 0; // Declaring var
  
  //Since we really are counting the "finals" of "paths", we only want to add/return them when we get to the last letter of the max length
  if (count($passed) == $length - 1){
    $numMoves = count($moves[$letter]);
  };

  //Calling this function to every legal move of the actual letter
  for ($i = 0; $i < count($moves[$letter]); $i++){
    $numMoves = $numMoves + possibleMoves($passed, $moves[$letter][$i], $length);
  }
  return $numMoves;
}

print_r(countPatternsFrom('E', 4));
?>