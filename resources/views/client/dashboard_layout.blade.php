

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>

  <style>
    .flex-box {
        
        height: 200px;
        width: 200px;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
    }
  </style>
 

  <body>
    
    <div class="container" style="margin-top: 100px;">


        <?php if(!isset(session()->all()['loginId'])) { ?>
        <a href="login" style="color: #fff; margin-bottom: 10px" class="btn btn-dark">Login</a>
        <?php } else { ?>
          <a href="dashboard" style="color: #fff; margin-bottom: 10px" class="btn btn-dark">Dashboard</a>
          <?php } ?>
        
        <div class="row">
            <small style=" margin-bottom: 30px">Only admin can login</small>
            <table class="table table-bordered">
                <thead>
                  <tr>
          
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                  
                  </tr>
                </thead>
                <tbody id="body-table">
                  
                    
                  {{-- <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr> --}}
                </tbody>
              </table>
              
        </div>
     
    </div>
     

  
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <script type="text/javascript">

$( document ).ready(function() {

  var getdata;

  $.ajax({
               type:'get',
               url:'/ajax_call',
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {

                
                 
                  getdata = data;
                  console.log(getdata.news[0].id)

                  for(let i = 0; i < getdata.news.length; i++){

                    $('#body-table').append(
                      `
                    <tr>
                  
                  <td>${getdata.news[i].title}</td>
                  <td><p>${getdata.news[i].content}</p></td>
                </tr>
                    
                    
                    `
                    )

                    
                  }

               }
            });
});


    setInterval(function() {
      $.ajax({
               type:'get',
               url:'/ajax_call',
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                 
                  getdata = data;
                  console.log(getdata.news)

                  /* for(let i = 0, ) */

                $('#body-table tr:first-child').remove()

               }
            });
      
  
}, 60 * 1000 * 2 );
    </script>

  </body>
</html>
