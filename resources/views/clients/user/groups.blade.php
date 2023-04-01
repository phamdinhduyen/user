<!DOCTYPE html>
<html lang="en">
<head>
  <title>
    {{$title}}

  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

  <h2>Tạo nhóm </h2>
  <form class="form-horizontal" action="" method="POST">
    @csrf
    @error('msg')
      <div class="alert alert-danger text-center">{{$message}}</div>
    @enderror
    <div class="form-group">
      <label class="control-label col-sm-2" for="group">Nhóm:</label>
       <div class="col-sm-10">
        <input type="text" name="name" placeholder="Nhập tên nhóm">
        
      </select>
         @error('name')
        <span style="color:red">{{$message}}</span>
        @enderror
      </div>
    </div>
   
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
        <a href="{{route('user.index')}}" class="btn btn-warning">Back</a>
      </div>
    </div>
  </form>
</div>

</body>
</html>
