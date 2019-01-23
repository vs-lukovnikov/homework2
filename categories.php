<?php

$categories = [
  ['title' => 'some', 'id' => 1, 'parent' => null, 'depth' => 0],
  ['title' => 'some', 'id' => 2, 'parent' => 1, 'depth' => 1],
  ['title' => 'some', 'id' => 3, 'parent' => 1, 'depth' => 1],
  ['title' => 'some', 'id' => 4, 'parent' => 3, 'depth' => 2],
  ['title' => 'some', 'id' => 5, 'parent' => 2, 'depth' => 2],
  ['title' => 'some', 'id' => 6, 'parent' => 5, 'depth' => 3],
];

$res = [
  ['title' => 'some', 'id' => 1, 'children' => [
    ['title' => 'some', 'id' => 2, 'children' => []],
    ['title' => 'some', 'id' => 3, 'children' => []],
  ]],
];

function maxDepth (array $arr) {
  $res = 0;
  foreach ($arr as $key => $current) {
    if ($current['depth'] > 0) {
      $res = $current['depth'];
    }
  }
  return $res;
}

function build (array $array) {
  $result = [];

  foreach ($array as $key => $element) {
    if($element['depth'] > maxDepth($array)) {
      return $result;
    }
    if ($element['parent'] === null) {
      $result[] = $element;
    }
    else {
      elementBuilder($result, $element);
    }

  }

  return $result;
}

function elementBuilder (&$arr, $elem ) {
  foreach ($arr as $key => &$parent ) {
    if ($elem['parent'] == $parent['id']) {
      $elem['children'] = [];
      $parent['children'][] = $elem;
    }
    else {
        if(isset($parent['children'])) {
          elementBuilder($parent['children'], $elem);
        }
    }
  }
  return $arr;
}

?>

<pre>
  <?php var_dump(build($categories)); ?>
</pre>
