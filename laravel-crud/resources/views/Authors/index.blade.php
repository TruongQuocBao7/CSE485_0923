<?php
use App\Models\Author;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"></head>
<body>

<header class="bg-light-subtle w-80 mx-5 p-4 shadow">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <h3>Administration</h3>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
<div class="container">
        <h3>Danh sách tác giả</h3>
        <th>
        <a href="{{route('authors.create')}}" class="btn btn-success">Add New Author </a>
    </th>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Show</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach($authors as $author){
    ?>
    <tr>
    <th scope="row">{{ $author->id }}</th>
    <td>{{ $author->name }}</td>
    <th><a href="{{ route('authors.show', $author)}}" class="btn btn-primary">Show</a></th>
    <th><a href="{{ route('authors.show', $author)}}" class="btn btn-primary">Edit</a></th>
    <td>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$author->id}}">
                Delete
        </button>
                        </td>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal-{{ $author->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Confirmation</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this author?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{route('authors.destroy',$author->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </div>
                                </div>
                            </div>
                        </div>
</tr>
    <?php
        }
    ?>
  </tbody>
</table>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  </body>
</html>