<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   <style>
    .glyphicon-remove {
  color: red;
}

.glyphicon-ok {
  color: green;
}
   </style>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<div class="form-group has-feedback">
  <input class="form-control" id="NewPassword" placeholder="New Password" type="password">
  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div id="Length" class="glyphicon glyphicon-remove">Must be at least 7 charcters</div>
<div id="UpperCase" class="glyphicon glyphicon-remove">Must have atleast 1 upper case character</div>
<div id="LowerCase" class="glyphicon glyphicon-remove">Must have atleast 1 lower case character</div>
<div id="Numbers" class="glyphicon glyphicon-remove">Must have atleast 1 numeric character</div>
<div id="Symbols" class="glyphicon glyphicon-remove">Must have atleast 1 special character</div>
    <script>/*Actual validation function*/
function ValidatePassword() {
  /*Array of rules and the information target*/
  var rules = [{
      Pattern: "[A-Z]",
      Target: "UpperCase"
    },
    {
      Pattern: "[a-z]",
      Target: "LowerCase"
    },
    {
      Pattern: "[0-9]",
      Target: "Numbers"
    },
    {
      Pattern: "[!@@#$%^&*]",
      Target: "Symbols"
    }
  ];

  //Just grab the password once
  var password = $(this).val();

  /*Length Check, add and remove class could be chained*/
  /*I've left them seperate here so you can see what is going on */
  /*Note the Ternary operators ? : to select the classes*/
  $("#Length").removeClass(password.length > 6 ? "glyphicon-remove" : "glyphicon-ok");
  $("#Length").addClass(password.length > 6 ? "glyphicon-ok" : "glyphicon-remove");
  
  /*Iterate our remaining rules. The logic is the same as for Length*/
  for (var i = 0; i < rules.length; i++) {

    $("#" + rules[i].Target).removeClass(new RegExp(rules[i].Pattern).test(password) ? "glyphicon-remove" : "glyphicon-ok"); 
    $("#" + rules[i].Target).addClass(new RegExp(rules[i].Pattern).test(password) ? "glyphicon-ok" : "glyphicon-remove");
      }
    }

    /*Bind our event to key up for the field. It doesn't matter if it's delete or not*/
    $(document).ready(function() {
      $("#NewPassword").on('keyup', ValidatePassword)
    });</script>
</body>
</html>