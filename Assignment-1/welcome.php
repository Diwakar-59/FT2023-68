<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Welcome <?php echo $_POST["fname"]; ?><br>

</body>
</html>


<!-- 
     function check($data) 
  {
    $error = '';
    $store = array();
    if (empty($data)) {
      $error = "required field";
    } else {
      $data = test_input($data);
      if (!preg_match("/^[a-zA-Z-' ]*$/", $data)) {
        $error = "Only letters and white space allowed";
      }
    }
    array_push($store, $data);
    array_push($store, $error);
    return $store;
  }

  $out = check($_POST["fname"]);
  foreach($out as $o) {
    echo $o;
  }
    
  $out2 = check($_POST['lname']);
  foreach($out2 as $o2) {
    echo $o2;
  }

-->