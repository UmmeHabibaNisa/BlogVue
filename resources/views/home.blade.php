@extends('layouts.app')
<style >
    .buttonposition {
    float: right;
    margin-right: 20px;
}

</style>
@section('content')
<div class="buttonposition">
            <a type="button" href="/newBlog" class="btn btn-dark">Add New Blog</a>
        </div>
<div id ='app'>
<home></home>
</div>


@endsection
