<?php

$categories = [
  ['title' => 'some', 'id' => 1, 'parent' => NULL, 'depth' => 0],
  ['title' => 'some', 'id' => 2, 'parent' => 1, 'depth' => 1],
  ['title' => 'some', 'id' => 3, 'parent' => 1, 'depth' => 1],
  ['title' => 'some', 'id' => 4, 'parent' => 3, 'depth' => 2],
  ['title' => 'some', 'id' => 5, 'parent' => 2, 'depth' => 2],
  ['title' => 'some', 'id' => 6, 'parent' => 5, 'depth' => 3],
  ['title' => 'some', 'id' => 7, 'parent' => 6, 'depth' => 4],
];

$res = [
  [
    'title' => 'some',
    'id' => 1,
    'children' => [
      ['title' => 'some', 'id' => 2, 'children' => []],
      ['title' => 'some', 'id' => 3, 'children' => []],
    ],
  ],
];

function maxDepth(array $arr) {
  $res = 0;
  foreach ($arr as $key => $current) {
    if ($current['depth'] > 0) {
      $res = $current['depth'];
    }
  }
  return $res;
}

function findDeepiestElements(array &$elements, $elem) {
  foreach ($elements as $key => &$element) {
    if ($elem['parent'] == $element['id']) {
      $element['children'][] = $elem;
      }
    if ($element['id'] == $elem['id']) {
      unset($elements[$key]);

    }

  }
  return $elements;
}

function build(array &$array) {
  $depth = maxDepth($array);
  while ($depth ) {
    foreach ($array as $key => $element) {
      if ($element['depth'] == $depth) {
        findDeepiestElements($array, $element);
      }
    }
    $depth--;
  }
  return $array;
}


?>

<pre>
  <?php var_dump(build($categories)); ?>
</pre>
