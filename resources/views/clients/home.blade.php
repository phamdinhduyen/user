{{-- echo "day la trang chu";
echo date('Y-m-d H:i:s');
// echo $name;
echo $age;

<a href="<?php echo route('admin.form') ?>">show form</a>
<hr>
@switch($age > 1)
@case(1)
<span> `E-mail` input is empty!</span>
@break

@case(2)
<span>`Password` input is empty!</span>
@break

@default
<span>Something went wrong, please try again</span>
@endswitch --}}

@extends('layouts.client')
@section('content')
    <h2> pham dinh duyen</h2>
@endsection
@section('css')
<style>
    header{
    background: green}
</style>

@endsection

@section('js')
    <script>
        document.querySelector('.show').onclick = function(){
        alert('thanh cong')
        }
    </script>
@endsection