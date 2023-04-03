
<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{$title}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  
    <h2>Thêm bài viết</h2>
    <hr>
  
    @if (@session('msg'))
        <div class="alert alert-success text-center">{{@session('msg')}}</div>
    @endif

    <hr>
      <form class="form-horizontal" action="" method="POST">
    @csrf
    @error('msg')
      <div class="alert alert-danger text-center">{{$message}}</div>
    @enderror
    <div class="form-group">
      <label class="control-label col-sm-2" for="title">Tiêu đề</label>
       <div class="col-sm-10">
        <input type="text" name="title" placeholder="Nhập tên tiêu đề">
      </select>
         @error('title')
        <span style="color:red">{{$message}}</span>
        @enderror
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="content">Nội dung</label>
       <div class="col-sm-10">
        <input type="text" name="content" placeholder="Nhập nội dung">
      </select>
         @error('content')
        <span style="color:red">{{$message}}</span>
        @enderror
      </div>
    </div>
   
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
        <a href="{{route('posts.index')}}" class="btn btn-warning">Back</a>
      </div>
    </div>
  </form>
    <hr>
</div>

</body>
</html>
