    <!-- no <html>,<head>,etc teags are required as they will be present in the paremt documet. -->


    <nav class="navbar navbar-toggleable-sm bg-success navbar-inverse">
            <div class="container">
              <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="mainNav">
                <div class="navbar-nav">
                  <!-- <a class="navbar-brand" href="header-nightsky.html" style="max-width:10%;border-radius:50%;"><img src="logo1.jpg" class="img-fluid"></a> -->
                  <a class="nav-item nav-link " href="#">Home</a>
                  <a class="nav-item nav-link " href="#">About Us</a>
                </div>
              </div>
              <div class="btn-group col-sm-1" style="right:0;left:auto;">
              	<button  class="btn btn-success" onclick="relocate()">Logout</button>
              </div>
            </div>
          </nav>
      <div class="jumbotron  jumbotron-fluid text-center bg-success text-white py-1"  >
        <h1 class = "display 1">Annadhan</h1>
        <h4 class="display 4">Whatever's left is not over</h1>
          <div class="collapse navbar-collapse" id="mainNav">
          <!-- nav bar -->
      </div>
      <div>
        <script type="text/javascript">
        	function relocate()
        	{
        		window.location.href='logout.php';
        	}
        </script>
      </div>