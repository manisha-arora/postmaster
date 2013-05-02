<?php
function print_table(&$params){
  $output = '<table border="1">';
  $output .= "<tr>";
  foreach($params[0] as $attribute_name=>$attribute_value){
    if($attribute_name != 'created_on'){
      $output .= "<th>$attribute_name</th>";
    }
  }
    $output .= "<th>Action</th>";
    $output .= "<th>Insert</th>";
   $output .= "</tr>";
  foreach($params as $row=>$object){
   $output .= '<tr>';
  foreach($object as $attribute => $attribute_value){
      if($attribute != 'created_on'){ 
        $output .= '<td>' .$attribute_value .'</td>' ;
      }
   }
    $output .= '<td>'.output_link('Delete', array('c' => $_REQUEST['controller'], 'a'=>'delete', 'id' => $object->id)).'</td>'; 
    $output .= '<td>'.output_link('Edit', array('c' => $_REQUEST['controller'], 'a'=>'edit', 'id' => $object->id)).'</td>'; 
	$output.= "</tr>";
  }
  $output .= '</table>'; 
  return $output;
}

function print_formatted_array($array = array()){
  echo "<pre>";
  print_r($array);
  echo "</pre>";
}
// it will out put a link having appropriate controller, action and id
function output_link($title, $params = array()){
  return '<a href="index.php?controller='.$params['c'].'&action='.$params['a'].'&id='.$params['id'].'">'.$title.'</a>';
}

function get_input($attribute, $default = null){
  return isset($_REQUEST[$attribute])?$_REQUEST[$attribute]:$default;
}


function output_open_form($controller = false){
  //$return = '<form action="index.php?controller='.$controller.'" method="POST">';
  $return =  '<form method="POST">';
  $return .= '<input type="hidden" value="'.get_input('id').'" name="id" />';
  return $return;
}

function output_submit_button(){
 $action = get_input('action');
 $button_value = ($action == 'edit')?'Update':'Add';
 return '<input type="submit" value="'.$button_value.'" name="action"/>';
}

 function output_close_form(){
  return '</form>';
}
