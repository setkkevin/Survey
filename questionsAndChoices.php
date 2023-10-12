<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="printer.js"></script>
<script  src="js/main.js" type="text/javascript"></script>
<title>staffs-list-UR</title>

<head>
<?php
include 'menu.html';
?>
<meta charset="utf-8">
	<title>JQuery Datatable Example</title>

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='css/button.css'>

    <script type="text/javascript" src="//code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/2.2.3/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

    
</head>
<div id="pages">
  

</div>

<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>NO</th>
                <th>Question Name</th>
                <th>Title</th>
                <th>Type</th>
                <th>Question Name</th>
                <th>Choices</th>
                <th>Action</th>
               
            </tr>
        </thead>
       
    </table>
    <script type="text/javascript">
        
            $(document).ready(function () {
            $('#example').DataTable({
                ajax: 'questionsAndChoicesAPI.php',

                dom: 'Bfrtip',
                buttons: [
                     'copy', 'csv', 'excel', 'pdf', 'print'
                      ]
   
            });
           
           });

    
    </script>
    <script type="text/javascript">
        

    function showData(data){
        alert(data);
    }
</script>

<div id="footer">

</div>
<html>
<head>
    <title> </title>
    
</head>
<div id="body-container">

           

</div>

</html>
</body> 
</html>

