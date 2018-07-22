<? php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>    
  </head>
  <body>
    <div class="container-fluid">
      <?php include ('header.php');?>
    </div>
      <br />
      <div align="center">
        <div class="card" style="width: 50%;" align="center">
          <div class="card-block" id="card-block">
            <a href="userinfo.php" style="text-decoration: none; margin-right: 25%;" ></a>
            <!-- <button type="button" class="btn btn-success" style="float: right;margin-left: 2%;" onclick="approve()"></button>
            <button type="button" class="btn btn-info" style="float: right;" onclick="reject()"></button> -->
            <br />
          </div>
        </div>
      </div>
      <br />
      <div align="center">
        <div class="card" style="width: 50%;" align="center">
          <div class="card-title"><b>Current Drives</b></div>
          <div class="card-block panel" id ="card-block2">

            <br />
          </div>
        </div>
      </div>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-2.1.3.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
  <script type="text/javascript">
    function approve(id)
    {
      var choice=1;
      
      $.ajax({ 
        method:"POST",
        url: "approvereject.php",
        data:'choice='+choice+'&id='+id,
        dataType: 'text',
        success:function(data)
        {
          alert("Approved !!!!");
        }
    });
    }
    function reject(id)
    {
      var choice=2;
      $.ajax({ 
        method:"POST",
        url: "approvereject.php",
                    data:'choice='+choice+'&id='+id,
                    dataType: 'text',
                    success:function(data)
                    {
                      var sid="div"+id;
                      // alert(sid);        
                      // document.getElementById(id).innerHTML="Rejected";
                      alert("Rejected !!!!");
                    }
        });
    }
    var ajaxcallschoice=1;
    $(document).ready(function(){
      $.ajax({ 
        method:"POST",
        url: "ajaxcalls.php",
                    data:'ajaxcallschoice='+ajaxcallschoice,
                    dataType: 'text',
                    success:function(data)
                    {
                      // alert("This is alert");
                       var array=[];
                      ar=data.split(',');
                       var k=0;
                       for(var i=0;i<ar.length;i++)
                       {
                        var str=ar[i].split(",");
                        array.push(str);
                       }
                       var printstring = "";
                       
                       for(var i=0;i<array.length;i+=2)
                       {
                          printstring+= "<div class='panel' id='div"+array[i]+" "+array[i+1]+"'><br/><a href='userinfo.php?FirstName="+array[i]+"&Lastname="+array[i+1]+ "'style='text-decoration: none; margin-right: 25%;'>"+array[i]+array[i+1]+"</a><button type='button' class='btn btn-success col-sm-12 my-1' style='float: right;margin-left: 2%;' id='"+array[i]+" "+array[i+1]+"'onclick='approve(id)' >Approve</button><button type='button' class='btn btn-info col-sm-12' style='float: right;' id='"+array[i]+" "+array[i+1]+"' onclick='reject(id)'>Reject</button></div>";
                       }
                       // alert(printstring);
                       $('#card-block').html(printstring);        
                    }
    });
      ajaxcallschoice=2;
      $.ajax({ 
        method:"POST",
        url: "ajaxcalls.php",
        data:'ajaxcallschoice='+ajaxcallschoice,
        dataType: 'text',
                    success:function(data)
                    {
                       var array=[];
                       ar=data.split(',');
                       var k=0;
                       for(var i=0;i<ar.length;i++)
                       {
                        var str=ar[i].split(",");
                        array.push(str);
                       }
                       var printstring="";
                       
                       for(var i=0;i<array.length;i+=4)
                       {
                          printstring+= "<div class='col-sm-3'><br/><a href='#' style='text-decoration: none; margin-right: 25%;'>"+array[i]+"</a><a href='#' style='text-decoration: none; margin-left: 25%;'>"+array[i+2]+"</a></div>";
                       }
                      $('#card-block2').html(printstring);        
                    }
    });  });     
  </script>
</html>