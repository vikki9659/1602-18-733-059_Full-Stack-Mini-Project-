<?php

    $error="";
    if(isset($_POST['search'])) {

        $n = $_POST['HallTicket'];
        
        if(preg_match("/^1602?[\(\- ]*\d{2}[\)-\. ]*\d{3}[-\. ]*\d{3}$/",$n))
        {
            $error = "VALID HALL TICKET";

        }
        
        if(preg_match("/^[a-zA-Z.-]+$/",$n))
        {
            $error = "CHARACTERS ARE NOT ALLOWED";
        }

        elseif(preg_match("/1402?[\(\- ]*\d{2}[\)-\. ]*\d{3}[-\. ]*\d{3}$/",$n))
        {
            $error = "YOU DON'T BELONG TO VASAVI";
        }
        //checks the year format 
        elseif(preg_match("/1602?[\(\- ]*\d{1}[\)-\. ]*\d{3}[-\. ]*\d{3}$/",$n))
        {
            $error = "PLEASE CHECK THE CURRENT YEAR"; 
        }
        //checks the branch format
        elseif(preg_match("/1602?[\(\- ]*\d{2}[\)-\. ]*\d{2}[-\. ]*\d{3}$/",$n))
        {
            $error = "WRONG BRANCH FORMAT";
        }
        //checks the institution-id
        elseif(preg_match("/160?[\(\- ]*\d{2}[\)-\. ]*\d{3}[-\. ]*\d{3}$/",$n))
        {
            $error = "WRONG INSTITUTION-ID";
        }
        elseif(preg_match("/160?[\(\- ]*\d{1}[\)-\. ]*\d{2}[-\. ]*\d{3}$/",$n))
        {
            $error = "INCORRET INSTITUTION-ID AND INCORRECT YEAR FORMAT AND INCORRECT BRANCH ";
        }
        

     





    }





?>




<!DOCTYPE html>
<html>
    <head>
        <title>
            Emergency Online Podium
        </title>

        <style type="text/css">
            body{
                background-color : peachpuff;
            }
          
            table{
                border : 2px solid black;
                width : 800px;
        

                text-align  : center;
            }
            tr,td{
                background-color : white;
            }
            .btn{
                width : 10%;
                height : 5%;
                font-size : 30px;
                padding : 0px;
            }
            p{
                text-align : left;
                font-size  : 25px;

            }
            h1{
                text-align : center;
            }

        </style>

        
</head>
         <body bgcolor="#FAF0D8" bgcolor="#FAF0D8" topmargin="25px" leftmargin="0" >

            
                <h1>Emergency Online Podium</h1>
                <p><strong>Vasavi College of Engineering (Autonomous)<strong><br>
<em>Ibrahimbagh, Hyderabad - 500031, Telangana State, India</em><br>
<em>Affiliated to Osmania University, Hyderabad</em><br>
                </p>
                <p><span style="font-size:16px; font-weight:bold;">Hall Ticket for BE V Semester(CBCS) (Main), December 2020</span></p>
        <p></p>

        <div class="container">
        <table border="1" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber6" height="19">
    <tr> <td width="100%" align="center" height="16" bgcolor="#FEFCF5"><b>
    <form action="" method="post">
         <font face="Arial" size="2">HallTicket :  
         <input name="HallTicket" type="text"  placeholder="Enter your 12-Digit Hall Ticket" />
         
         <input type="submit" name="search" value="Submit"  />
         <span class="error"><?php echo $error;  ?></span>
        
         </font> </b></td>
    </tr>
        </form>

         <tr><td width="100%" align="center">
        <font face="verdana" size="2" color="#FF0000"></font></td>
    </tr>

    <tr><td width="100%" align="center">
        <font face="verdana" size="2" color="#FF0000"><b> Please Enter 12 Digit Hall Ticket Number Ex: 1602-18-733-001, 1602-18-733-061.  </b></font></td>
    </tr>
    
    
        
                
             
                        
<?php
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,'newdb');

if(isset($_POST['search']))
{
    $HallTicket = $_POST['HallTicket'];
    $query = "SELECT * FROM studentdetails where HallTicket='$HallTicket' ";
    $query_run = mysqli_query($connection,$query);
    while($row = mysqli_fetch_array($query_run))
    {
        ?>
            <table>
            <tr>
            <td>Candidate  Name</td>
            <td><?php echo $row['Candidate Full Name']; ?> </td>
            </tr><br>
            <tr>
            <td>Registration Number</td>
            <td><?php echo $row['Registration Number']; ?> </td>
            </tr><br>
            <tr>
            <td>Father Name</td>
            <td><?php echo $row['Father Name']; ?> </td>
            </tr><br>
            <tr>
            <td>Date of Birth</td>
            <td><?php echo $row['Date of Birth']; ?> </td>
            </tr><br>

            

            <td>Subjects Registered</td>
            <td><?php echo $row['Subjects Registered']; ?> </td>
            </tr><br>

            <td>Important Instructions</td>
            <td><?php echo $row['Important Instructions']; ?> </td>
            </tr><br>



                        
                        </table>
                    
                    <?php


                }
            }
            ?>
    </table>
    
</div>
  
       
       

    
        </body>

</html>