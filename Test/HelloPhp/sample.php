<?php

class Point { }
class Dimension { }
class Rectangle { }

$items = array(true, false, null, 23, 0, -26, 4.21, 0.0, -3.76,
    'hello', '', array(1, 2, 3), array('', '', ''), array(),
    new stdClass(), new Point(), new Dimension(), new Rectangle());

echo '<table cellpadding="4" border="1">
  <tr>
    <th>syntax</th>
    <th>value</th>
    <th>type</th>
    <th>empty</th>
    <th>boolean</th>
  </tr>' . "\n";

foreach($items AS $item)
{
    $booleanValue = (boolean)$item;
    $empty = (empty($item) ? 'EMPTY' : '&nbsp;');
    $type = gettype($item);
    $syntax = 'if((boolean)';

    $val;

    if($type == boolean)
    {
        $val = ($booleanValue ? 'true' : 'false');
        $syntax .= ($val . ')');
    }
    else if($type == 'NULL')
    {
        $val = 'null';
        $syntax .= 'null)';
    }
    else if($type == double && !$booleanValue)
    {
        $val = '0.0';
        $syntax .= '0.0)';
    }
    else if($type == string)
    {
        $val = '\'' . $item . '\'';
        $syntax .= ($val . ')');
    }
    else if($type == 'array')
    {
        $val = $item;
        $syntax .= '$array)';
    }
    else if($type == 'object')
    {
        $val = get_class($item);
        $syntax .= ('$' . strtolower($val) . ')');
    }
    else
    {
        $val = $item;
        $syntax .= ($val . ')');
    }

    echo '  <tr style="color: ' . ($booleanValue ? '#006600' : '#880000') . ';">
    <td><code>' . $syntax . '</code></td>
    <td>' . $val . '</td>
    <td>' . $type . '</td>
    <td>' . $empty . '</td>
    <td>' . ($booleanValue ? 'TRUE' : 'FALSE') . '</td>
  </tr>' . "\n";
}

echo '</table>' . "\n";

?>