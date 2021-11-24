<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('add.category')}}" method="get">
          @csrf
            
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Parent Category: </label>
            </div>
            <select name="parentCategoryName" class="custom-select" id="inputGroupSelect01">
              <option selected disabled>--Select--</option>
              @foreach ($categories as $item)
              @if ($item->parent_id==0)
                 <option value="{{$item->id}}">{{$item->name}}</option>
              @endif
              @endforeach
              {{-- <option value="One">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option> --}}
            </select>
          </div>
  
            <div class="form-group">
              <label for="categoryName" id="categoryName" class="col-form-label">Category:</label>
              <input type="text" class="form-control @error('categoryName') is-invalid @enderror" value="{{ old('categoryName') }}" id="categoryName" name="categoryName" required autocomplete="categoryName" autofocus>
              @error('categoryName')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
             @enderror
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Description:(optional) </label>
              <textarea class="form-control" name="categoryDescription"></textarea>
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Submit"></a>
      </form>
        </div>
      </div>
    </div>
  </div>