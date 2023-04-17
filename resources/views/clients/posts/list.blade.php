@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
<div class="container">
    @if (@session('msg'))
        <div class="alert alert-success text-center">{{@session('msg')}}</div>
    @endif
    <hr>
<form action="{{route('posts.delete-any')}}" method="post" onsubmit="return confirm('Bạn chắc chắc muốn xóa ?')">
    <button class="btn btn-danger" type="submit">Delete</button>
    {{-- <a href="{{route('posts.add')}}" class="btn btn-primary">Create post</a> --}}

    <table class="table table-bordered">
    <thead>
      <tr>
        <td width=5%><input type="checkbox" id='checkAll'></td>
        <th  width=5%>STT</th>
        <th>Tiêu đề</th>
        <th width=50%>Nội dung</th>
        <th>Trạng thái</th>
        <th>Hành động</th>
      </tr>
    </thead>
    <tbody>
        @if($allPost -> count() > 0)
        @foreach($allPost as $key => $item)
        <tr>
            <td><input type="checkbox" name='delete[]' value="{{$item->id}}"></td>
            <td>{{$key+1}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->content}}</td>
            <td>
                @if ($item->trashed())
                    <button class="btn btn-danger">Đã xóa</button>
                @else
                    <button class="btn btn-success">Chưa xóa</button>
                @endif
            </td>
            <td>
                @if ($item->trashed())
                    <a href="{{route('posts.restore',$item)}}" class="btn btn-primary">Khôi phục</a>
                @endif
            </td>
        </tr>

        @endforeach
        @endif
    </tbody>
    </table>
    @csrf
</form>
</div>
        </div>
    </div>
</div>
@endsection


{{-- 
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
<script>
    $( document ).ready(function() {
        $( "#checkAll" ).click(function() {
              if(this.checked) {
                $(':checkbox').each(function() {
                this.checked = true;                        
                });
            } else {
                $(':checkbox').each(function() {
                this.checked = false;                       
                });
            }
        });
    });
</script>
<body>

<div class="container">
    @if (@session('msg'))
        <div class="alert alert-success text-center">{{@session('msg')}}</div>
    @endif
    <hr>
<form action="{{route('posts.delete-any')}}" method="post" onsubmit="return confirm('Bạn chắc chắc muốn xóa ?')">
    <button class="btn btn-danger" type="submit">Delete</button>
    <a href="{{route('posts.add')}}" class="btn btn-primary">Create post</a>

    <table class="table table-bordered">
    <thead>
      <tr>
        <td width=5%><input type="checkbox" id='checkAll'></td>
        <th  width=5%>STT</th>
        <th>Tiêu đề</th>
        <th>Nội dung</th>
        <th>Trạng thái</th>
        <th>Hành động</th>
      </tr>
    </thead>
    <tbody>
        @if($allPost -> count() > 0)
        @foreach($allPost as $key => $item)
        <tr>
            <td><input type="checkbox" name='delete[]' value="{{$item->id}}"></td>
            <td>{{$key+1}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->content}}</td>
            <td>
                @if ($item->trashed())
                    <button class="btn btn-danger">Đã xóa</button>
                @else
                    <button class="btn btn-success">Chưa xóa</button>
                @endif
            </td>
            <td>
                @if ($item->trashed())
                    <a href="{{route('posts.restore',$item)}}" class="btn btn-primary">Khôi phục</a>
                @endif
            </td>
        </tr>

        @endforeach
        @endif
    </tbody>
    </table>
    @csrf
</form>
</div>

</body>
</html> --}}

<script>
    $( document ).ready(function() {
        $( "#checkAll" ).click(function() {
              if(this.checked) {
                $(':checkbox').each(function() {
                this.checked = true;                        
                });
            } else {
                $(':checkbox').each(function() {
                this.checked = false;                       
                });
            }
        });
    });
</script>
