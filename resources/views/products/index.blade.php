@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
<div class="col-sm-12">
    <h1 class="display-3">Products</h1>  
    
    <div>
      <a style="margin: 19px;" href="{{ route('products.create')}}" class="btn btn-primary">New Product</a>
    </div>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Id</td>
          <td>Name</td>
          <td>Sky</td>
          <td>Descripción</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->sku}}</td>
            <td>{{$product->description}}</td>
            <td>
                <a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('products.destroy', $product->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection