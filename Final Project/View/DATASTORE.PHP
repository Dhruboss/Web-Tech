<!DOCTYPE html>  
 <html>  
      <head>  
        <title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
        <div class="container" style="width:500px;">              
                <div class="table-responsive"> 
                     <table class="table table-bordered">  
                          <tr>  
                               <th>Name</th> 
                               <th>Email</th>  
                               <th>Username</th> 
                               <th>Password</th>
                               <th>Date of Birth</th> 
                               <th>Gender</th>
                               <th>Institution</th>  
                               <th>Company</th> 
                               <th>User</th> 
                               <th>blood group</th>  
                          </tr>  
                          <?php   
                          $data = file_get_contents("data.json");  
                          $data = json_decode($data, true);  
                          foreach($data as $row)  
                          {  
                               echo '<tr>
                               <td>'.$row["name"].'</td>
                               <td>'.$row["email"].'</td>
                               <td>'.$row["uname"].'</td>
                               <td>'.$row["pass"].'</td>
                               <td>'.$row["dob"].'</td>
                               <td>'.$row["gender"].'</td>
                               <td>'.$row["institution"].'</td>
                               <td>'.$row["company"].'</td>
                               <td>'.$row["user"].'</td>
                               <td>'.$row["blood"].'</td>


                               </tr>';  
                          }  
                          ?>  
                     </table>  
                   </div>
                 </div>
      </body>  
 </html> 