<form class="form-inline" action="{{ route('returncarts.store') }}" method="post">
  @csrf
  <input type="hidden" name="product_id" value="{{ $product->id }}">
  <button type="submit" class="btn btn-warning"><i class="fa fa-plus"></i>Ready to Return</button>
</form>