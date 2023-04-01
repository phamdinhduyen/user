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

  <h2>Tao người dùng </h2>
  <form class="form-horizontal" action="" method="POST">
    @csrf
    @error('msg')
      <div class="alert alert-danger text-center">{{$message}}</div>
    @enderror
    <div class="form-group">
      <label class="control-label col-sm-2" for="fullname">fullname:</label>
      <div class="col-sm-10">
        <input type="fullname" class="form-control" id="fullname" placeholder="Enter fullname" name="fullname" value="{{old('fullname')}}">
        @error('fullname')
        <span style="color:red"> {{$message}}</span>
        @enderror
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">email:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="{{old('email')}}">
        @error('email')
        <span style="color:red">{{$message}}</span>
        @enderror
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="price">Nhóm:</label>
       <div class="col-sm-10">
       <select name="group_id" class="form-control" id="">
        <option value="0">Chọn nhóm</option>
        @if (!empty($allGroups))
            @foreach ($allGroups as $item)
              <option value="{{$item->id}}" {{old('group_id')
              == $item->id ?'selected':false}}>{{$item ->name}}</option>
            @endforeach
        @endif
      </select>
         @error('group_id')
        <span style="color:red">{{$message}}</span>
        @enderror
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="status">Trạng thái:</label>
      <div class="col-sm-10">
       <select class="form-control" name="status">
          <option value="0" {{old('status')==0?'selected':false}}>Kích hoạt</option>
          <option value="1" {{old('status')==1?'selected':false}}>Chưa kích hoạt</option>
        </select>
        @error('status')
        <span style="color:red">{{$message}}</span>
        @enderror
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
