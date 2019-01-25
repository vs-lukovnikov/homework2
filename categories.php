<?php

$categories = [
  ['title' => 'some', 'id' => 1, 'parent' => NULL, 'depth' => 0],
  ['title' => 'some', 'id' => 2, 'parent' => 1, 'depth' => 1],
  ['title' => 'some', 'id' => 3, 'parent' => 1, 'depth' => 1],
  ['title' => 'some', 'id' => 4, 'parent' => 3, 'depth' => 2],
  ['title' => 'some', 'id' => 5, 'parent' => 2, 'depth' => 2],
  ['title' => 'some', 'id' => 6, 'parent' => 5, 'depth' => 3],
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

function findDeepestElements(array &$elements, $elem, &$current_depth) {
  foreach ($elements as $key => &$element) {
    if ($elem['parent'] == $element['id']) {
      $element['children'] = $elem;
      }
    if ($element['id'] == $elem['id']) {
      unset($elements[$key]);

    }

  }
  return $elements;
}

function build(array &$array) {
  //  $result = [];
  $depth = maxDepth($array);
  while ($depth ) {
    foreach ($array as $key => $element) {
      if ($element['depth'] == $depth) {
        findDeepestElements($array, $element, $depth);
        $depth--;
      }
    }
  }
  //  findDeepestElements($array, $depth);
  //  while($depth) {
  //    foreach ($array as $key => $element) {
  //      if ($element['depth'] == maxDepth($array)) {
  //        $result[] = $element;
  //      }
  //      else {
  //        elementBuilder($result, $element, $depth);
  //      }
  //    }
  //  }

  return $array;
}

//function elementBuilder (&$arr, $elem, &$cur_depth ) {
//  foreach ($arr as $key => &$parent ) {
//    if ($elem['id'] === $parent['parent']) {
//      $elem['children'] = &$parent;
//      $arr[] = $elem;
//    }
//    else {
//        if(isset($parent['children'])) {
//          elementBuilder($parent['children'], $elem, $cur_depth);
//        }
//    }
//  }
//  return $arr;
//}

?>

<pre>
  <?php var_dump(build($categories)); ?>
</pre>
