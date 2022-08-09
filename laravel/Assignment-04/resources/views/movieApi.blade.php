<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie Page CRUD with Ajax</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-2">

    <div class="row">

        <div class="col-md-12 card-header text-center font-weight-bold">
          <h2>Movie Page CRUD with Ajax</h2>
        </div>
        <div class="col-md-12 mt-1 mb-2">
            <button type="button" id="addNewBook" class="btn btn-success">Add</button>
        </div>
        <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Movie Name</th>
                  <th scope="col">Movie Description</th>
                  <th scope="col">Duration</th>
                  <th scope="col">Genre</th>
                  <th colspan="2" class="text-center">Action</th>
                </tr>
              </thead>
              <tbody> 
                @foreach ($movie as $movies)
                <tr>
                    <td>{{ $movies->id }}</td>
                    <td>{{ $movies->name }}</td>
                    <td>{{ Str::limit($movies->description) }}</td>
                    <td>{{ $movies->duration }}</td>
                    <td>{{ $movies->genres->name }}</td>
                    <td>
                      <a href="javascript:void(0)" class="btn btn-warning edit" data-id="{{ $movies->id }}">Edit</a>
                    </td>
                    <td>
                      <a href="javascript:void(0)" class="btn btn-danger delete" data-id="{{ $movies->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>        
</div>

<!-- boostrap model -->
    <div class="modal fade" id="ajax-book-model" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="ajaxBookModel"></h4>
          </div>
          <div class="modal-body">
            <form action="javascript:void(0)" id="addEditBookForm" name="addEditBookForm" class="form-horizontal" method="POST">
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="name" class="control-label">Moive Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter Movie Name" maxlength="50" required="">
                </div>
              </div>  

              <div class="form-group">
                <label for="name" class="control-label"> Movie Description</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="code" name="code" placeholder="Enter Movie Description" maxlength="50" required="">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label">Movie Duration</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="author" name="author" placeholder="Enter Movie Duration" required="">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label">Select Genre</label>
                <div class="col-sm-12">
                  <select name="genre" id="genre" class="form-control">
                    <option value="">Choose Genre</option>
                    @foreach($genre as $val)
                      <option value="{{ $val->id }}">{{ $val->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="btn-save" value="addNewBook">Save changes
                </button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
    </div>
<!-- end bootstrap model -->

<script type="text/javascript">
 $(document).ready(function($){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#addNewBook').click(function () {
       $('#addEditBookForm').trigger("reset");
       $('#ajaxBookModel').html("Add Book");
       $('#ajax-book-model').modal('show');
    });

 
    $('body').on('click', '.edit', function () {

        var id = $(this).data('id');         
        // ajax
        $.ajax({
            type:"PUT",
            url : "http://127.0.0.1:8000/api/edit-movie",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#ajaxBookModel').html("Edit Book");
              $('#ajax-book-model').modal('show');
              $('#id').val(res.id);
              $('#title').val(res.title);
              $('#code').val(res.code);
              $('#author').val(res.author);
              $('#genre').val(res.genre);
           }
        });

    });

    $('body').on('click', '.delete', function () {

       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"DELETE",
            url : "http://127.0.0.1:8000/api/delete-movie",
            data: { id: id },
            dataType: 'json',
            success: function(res){

              window.location.reload();
           }
        });
       }

    });

    $('body').on('click', '#btn-save', function (event) {

          var id = $("#id").val();
          var title = $("#title").val();
          var code = $("#code").val();
          var author = $("#author").val();
          var genre = $("#genre").val();

          $("#btn-save").html('Please Wait...');
          $("#btn-save"). attr("disabled", true);
         
        // ajax
        $.ajax({
            type:"POST",
            url : "http://127.0.0.1:8000/api/add-movie",
            data: {
              id:id,
              title:title,
              code:code,
              author:author, 
              genre:genre,
            },
            dataType: 'json',
            success: function(res){
             window.location.reload();
            $("#btn-save").html('Submit');
            $("#btn-save"). attr("disabled", false);
           }
        });
  
    });

});
</script>
</body>
</html>