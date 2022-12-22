

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
      <a href="logout" style="color: #fff; margin-bottom: 50px" class="btn btn-dark">Logout</a>
      <a href="index" style="color: #fff; margin-bottom: 50px" class="btn btn-dark">Client View</a>
        <div class="row">
          <h1>CRUD NewsLetter</h1>
            <table class="table table-bordered">
                <thead>
                  <tr>
          
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach($news as $n) { ?>
                  <tr>
                  
                    <td>{{$n->title}}</td>
                    <td><p>{{$n->content}}</p></td>
                    <td>
                        <div class="flex-box">
                            <a type="button" style="color: #fff; " href="{{url('update_news/'.$n->id)}}" class="btn btn-warning">Edit</a>
                            {{-- <button type="button" class="btn btn-primary">Restore</button> --}}
                            {{-- <a type="button" style="color: #fff; " class="btn btn-danger" href="{{url('softdelete/'.$n->id)}}">Delete</a> --}}
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                              Delete
                            </button>
                        </div>
                    </td>
                  </tr>

                  <?php } ?>
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
        {{$news->links()}}
        <a href="add_news" class="btn btn-success">Add News</a>
    </div>
    <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
      
      <div class="row">
        <h1>Trash List</h1>
          <table class="table table-bordered">
              <thead>
                <tr>
              
                  <th scope="col">Title</th>
                  <th scope="col">Content</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                  <?php $i = 1 ?>
                  <?php foreach($trashnews as $n) { ?>
                <tr>
               
                  <td>{{$n->title}}</td>
                  <td><p>{{$n->content}}</p></td>
                  <td>
                      <div class="flex-box">
                          <a type="button" style="color: #fff; " href="{{url('restore/'.$n->id)}}" class="btn btn-warning">Restore</a>
                          {{-- <button type="button" class="btn btn-primary">Restore</button> --}}
                      </div>
                  </td>
                </tr>

                <?php } ?>
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
      {{$trashnews->links()}}
      {{-- <a href="add_news" class="btn btn-success">Add News</a> --}}
  </div>

  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a type="button" style="color: #fff; " class="btn btn-danger" href="{{url('softdelete/'.$n->id)}}">Delete</a> 
      </div>
    </div>
  </div>
</div>

  
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

     

  </body>
</html>
