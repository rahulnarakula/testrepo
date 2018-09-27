<?php

$MAX_INT = 0x7FFFFFFF;

function GetMinimumDistance($distance, $shortestPathTreeSet, $verticesCount)
{
	global $MAX_INT;
	$min = $MAX_INT;
	$minIndex = 0;

	for ($v = 0; $v < $verticesCount; ++$v)
	{
		if ($shortestPathTreeSet[$v] == false && $distance[$v] <= $min)
		{
			$min = $distance[$v];
			$minIndex = $v;
		}
	}

	return $minIndex;
}

function PrintResult($distance, $verticesCount)
{
	echo "<pre>" . "Node    Distance from source" . "</pre>";

	for ($i = 0; $i < $verticesCount; ++$i)
		echo "<pre>" . $i . "\t  " . $distance[$i] . "</pre>";
}

function Dijkstra($graph, $source, $verticesCount)
{
	global $MAX_INT;
	$distance = array();
	$shortestPathTreeSet = array();

	for ($i = 0; $i < $verticesCount; ++$i)
	{
		$distance[$i] = $MAX_INT;
		$shortestPathTreeSet[$i] = false;
	}

	$distance[$source] = 0;

	for ($count = 0; $count < $verticesCount - 1; ++$count)
	{
		$u = GetMinimumDistance($distance, $shortestPathTreeSet, $verticesCount);
		$shortestPathTreeSet[$u] = true;

		for ($v = 0; $v < $verticesCount; ++$v)
		{
			$isNewNodeConnected = !$shortestPathTreeSet[$v] && $graph[$u][$v];
			$isFromNodeInfinite = ($distance[$u] == $MAX_INT);
			$isNewDistanceLess  = $distance[$u] + $graph[$u][$v] < $distance[$v];
			if ($isNewNodeConnected && !$isFromNodeInfinite && $isNewDistanceLess)
			{
				$distance[$v] = $distance[$u] + $graph[$u][$v];
			}
		}
	}

	PrintResult($distance, $verticesCount);
}

$graph = array(
	array(0, 4, 0, 0, 0, 0, 0, 8, 0),
	array(4, 0, 8, 0, 0, 0, 0, 11, 0),
	array(0, 8, 0, 7, 0, 4, 0, 0, 2),
	array(0, 0, 7, 0, 9, 14, 0, 0, 0),
	array(0, 0, 0, 9, 0, 10, 0, 0, 0),
	array(0, 0, 4, 0, 10, 0, 2, 0, 0),
	array(0, 0, 0, 14, 0, 2, 0, 1, 6),
	array(8, 11, 0, 0, 0, 0, 1, 0, 7),
	array(0, 0, 2, 0, 0, 0, 6, 7, 0)
);

Dijkstra($graph, 0, 9);
?>
