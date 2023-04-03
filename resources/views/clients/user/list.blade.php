
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
  <h2>Danh sách người dùng </h2>
  <div style="display:flex">
    <a href="{{route('user.add')}}" class="btn btn-primary">Create User</a>
    <a style="margin-left: 10px" href="{{route('groups.add')}}" class="btn btn-primary">Create Group</a>
    <a style="margin-left: 10px" href="{{route('posts.index')}}" class="btn btn-primary">List post</a>
  </div>
  
    @if (@session('msg'))
        <div class="alert alert-success text-center">{{@session('msg')}}</div>
    @endif

    <hr>
    <form action="" method="get" class="mb-3" >
      <div class="row" style="display:flex">
        <div class="col-3">
          <select class="form-control" name="status">
            <option value="0">Tất cả trạng thái</option>
            <option value="active" {{request()->status=='active' ? 'selected': false}}>Kích hoạt</option>
            <option value="inactive"{{request()->status=='inactive' ? 'selected': false}}>Chưa kích hoạt</option>
          </select>
        </div>
        <div class="col-3" style="margin-left: 10px">
          <select class="form-control" name="group_id">
            <option value="0">Tất cả các nhóm</option>
            @if(!empty(getAllGroups())){
               @foreach(getAllGroups() as $item)
                <option value="{{$item->id}}"{{request()->group_id==$item->id ? 'selected': false}}>{{$item->name}}</option>
              @endforeach
            }
            @endif
          </select>
        </div>
        <div class="col-4" style="margin-left: 10px">
          <input type="search" class="form-control" placeholder="Tim kiem" name="keywords" value="{{request()->keywords}}">
        </div>
        <div class="col-2" style="margin-left: 10px">
          <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
        </div>
      </div>
     
    </form>
    <hr>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>STT</th>
        <th><a href="?sort-by=fullname&sort-type={{$sortType}}">FullName</a></th>
        <th><a href="?sort-by=email&sort-type={{$sortType}}">Email</a></th>
        <th>Nhóm</th>
        <th>Trạng thái</th>
        <th><a href="?sort-by=create_at&sort-type={{$sortType}}">Ngày tạo</a></th>
        <th>Hành động</th>
      </tr>
    </thead>
    <tbody>
        @if(!empty($userList))
        @foreach ($userList as $key =>$item)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$item->fullname}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->group_name}}</td>
                <td>{!! $item->status==1 ?'<button class="btn btn-success btn-sm"> Kích hoạt</button>':'<button class="btn btn-danger btn-sm">Chưa kích hoạt</button>' !!}</td>
                <td>{{$item->created_at}}</td>
                <td>
                    <a  onclick="return confirm('Bạn muốn xóa ?')" href="{{route('user.delete',['id'=>$item->id])}}" class="btn btn-danger" >Delete</a>
                    <a href="{{route('user.edit',['id'=>$item->id])}}" class="btn btn-warning">Edit</a>
                </td>
            </tr>
        @endforeach
      @else
      <tr>
        <td colspan="4">Không có người dùng</td>
      </tr>
      @endif 
    </tbody>
  </table>
   {{$userList -> links()}}
</div>

</body>
</html>
