<?php
class HeapSorting
{
 private $data = array();
 
    public function __construct($unsortedData) {
        $this->data = $unsortedData;
    }
    
 public function MaxHeapify($heapSize, $index) {
	$left = ($index + 1) * 2 - 1;
	$right = ($index + 1) * 2;
	$largest = 0;

	if ($left < $heapSize && $this->data[$left] > $this->data[$index])
		$largest = $left;
	else
		$largest = $index;

	if ($right < $heapSize && $this->data[$right] > $this->data[$largest])
		$largest = $right;

	if ($largest != $index)
	{
		$temp = $this->data[$index];
		$this->data[$index] = $this->data[$largest];
		$this->data[$largest] = $temp;

		$this->MaxHeapify($heapSize, $largest);
	}
}

public function HeapSort() {
	$heapSize = count($this->data);
    $count = $heapSize;

	for ($p = ($heapSize - 1) / 2; $p >= 0; $p--)
		$this->MaxHeapify($heapSize, $p);

	for ($i = $count - 1; $i > 0; $i--)
	{
		$temp = $this->data[$i];
		$this->data[$i] = $this->data[0];
		$this->data[0] = $temp;

		$heapSize--;
		$this->MaxHeapify($heapSize, 0);
	}
    return $this->data;
}
}

$data = array(3,5,4,1,2);
$hS = new HeapSorting($data);
$sortedArray = $hS->HeapSort();
var_dump($sortedArray);
  ?>
  