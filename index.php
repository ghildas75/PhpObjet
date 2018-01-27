<html>
 <head>
     <meta charset="utf-8">
     <title>Create dynmaic class in php</title>
     <meta name="viewport" content="width=device-width" initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		 
    </head>    

 <body>
 
 
  <div class='container'>
        <div class='col-lg-4'></div>
         <div class='col-lg-4'>
               <div class="jumbotron" style='margin-top: 100px'>
					<h4 class='bg-danger'>Make class php!!</h4><br>
                    <form method="post" action="Form.php">
                     <div class="from-group">
                       <input type="text" name="NameClass" class='form-control' placeholder='NameClass' value=''/>
                       <span class='error'></span>
                       
                    </div>
					<br>
<div class="form-group">
  <label >Number of Parameters:</label>
  <select name="numberParam" class="form-control">
    <option value="false">select your parameter</option>
	<option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
	 <option>5</option>
    <option>6</option>
    <option>7</option>
    <option>8</option>
	 <option>9</option>
	  <option>1O</option>
  </select>
   </div>
  <br>
  <div class="form-group">
   <label for="sel1">Include Function:</label>
  <select name="chkFunction"class="form-control" >
   <option value="false"> Create table Sql or XML</option>
   <option value="1">create table Sql </option>
   <option value="2">create xml file</option>
</select>
</div>
<div class="form-group">
   <label>Create Database:</label>
  <select name="chkCreate" class="form-control">
   <option value="false"> Create Database</option>
   <option value="0"> Yes</option>
   <option value="1"> No</option>
</select>
</div>
 <br>
<div class="from-group">
<button type='submit' class='btn btn-primary form-control'>Submit</button>
</div>
  </form>
</div>
</body>


</html>