<?php
class Graph{

private $totalNodes = 0;
private $graph = array();
private $visited = array();

public function __construct($connectionsArray){
$this->graph = $connectionsArray;
$this->totalNodes = count($this->graph);
$this->assignVisitedAsZeros();
}

function assignVisitedAsZeros(){
for ($i = 0; $i < $this->totalNodes; $i++) {
$this->visited[$i] = 0;
}
}

function depthFirst($vertex){
$this->visited[$vertex] = 1;
for ($i = 0; $i < $this->totalNodes; $i++) {
if ($this->graph[$vertex][$i] == 1 && !$this->visited[$i]) {
$this->depthFirst($i);
}
}
echo "$vertex <br>";
}

function breadthFirst($start){
$queue = array();
array_push($queue, $start);
$this->visited[$start] = 1;
echo "BFS:<br>".$start."<br>";

while (count($queue)) {

$t = array_shift($queue);

foreach ($this->graph[$t] as $key => $vertex) {

if (!$this->visited[$key] && $vertex == 1) {
$this->visited[$key] = 1;
echo $key."<br>";
array_push($queue, $key);
}
}
}
}
}
$g = new Graph(array(
array(0, 1, 1, 0, 0, 0),
array(1, 0, 0, 1, 0, 0),
array(1, 0, 0, 1, 1, 1),
array(0, 1, 1, 0, 1, 0),
array(0, 0, 1, 1, 0, 1),
array(0, 0, 1, 0, 1, 0)
));
echo "DFS:<br>";
$g->depthFirst(2);
$g1 = new Graph(array(
array(0, 1, 1, 0, 0, 0),
array(1, 0, 0, 1, 0, 0),
array(1, 0, 0, 1, 1, 1),
array(0, 1, 1, 0, 1, 0),
array(0, 0, 1, 1, 0, 1),
array(0, 0, 1, 0, 1, 0)
));
$g1->breadthFirst(2);

?>