<?php

namespace App\Solution;



// BEGIN (write your solution here)
function shortestRoad($graph, $start) {
  $result = [];
  
  $f = function($vertexes, $graph, $f) use (&$result) {
      $minWeight = null; 
      $edge = null;
      foreach($vertexes as $vertexStart) {
          foreach ($graph[$vertexStart] as $vertexEnd => $weight) {
              if ($minWeight == null || $weight < $minWeight) {
                   $minWeight = $weight;
                   $edge = [$vertexStart, $vertexEnd];
               }
          }
      }
      
      if ($edge != null) {
          array_key_exists($edge[0], $result) 
          ? $result[$edge[1]] = $edge[0]
          : $result[$edge[0]] = $edge[1];
          $vertexes[] = $edge[1];
          
          foreach ($graph as $vertex => $edges) {
            unset($graph[$vertex][$edge[0]]);
            unset($graph[$vertex][$edge[1]]);
            
          } 
          
        //   print_r($result);
          $f($vertexes, $graph, $f);
      } 
      
      
  };
  
  $f([$start], $graph, $f);
  
  print_r($result);
  
  
  
  
  return $result;
}
// END
