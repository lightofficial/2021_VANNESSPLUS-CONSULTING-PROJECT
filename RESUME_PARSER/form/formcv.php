<?php include('./server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form CV_Resume</title>
    <link rel="stylesheet" href="../assets/css/formcvstyle.css">
</head>
<body>
    <div style="text-align:center; margin: 50px auto 0px; padding: 20px;">
        <h2>Form CV-parser</h2>
    </div>

    <form>
        <div class="input-group">
            <label for="position" class="control-label col-md-4 requiredField"">Position</label>
            <input type="text" name="position" id="MyInput_Position">
        </div>
        <div class="input-group">
            <label for="position" class="control-label col-md-4 requiredField"">Position</label>
            <input type="text" name="position" id="MyInput_Position">
        </div>
        <div class="input-group">
            <label for="test" class="control-label col-md-4 requiredField" >test</label>
            <textarea id="w3review" name="w3review" class="input-md  textinput textInput form-control rows=5" style="margin-bottom: 10px;"></textarea>
        </div>
    </form>
</body>
</html>