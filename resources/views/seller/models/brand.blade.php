<div class="modal fade" id="brandModal" tabindex="-1" role="dialog" aria-labelledby="brandModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('add.brand')}}" method="get">
          @csrf
            <div class="form-group">
              <label for="brandName" id="brandName" class="col-form-label">Brand:</label>
              <input type="text" class="form-control @error('brandName') is-invalid @enderror" value="{{ old('brandName') }}" id="brandName" name="brandName" required autocomplete="brandName" autofocus>
              @error('brandName')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
             @enderror
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Description:(optional) </label>
              <textarea class="form-control" name="brandDescription"></textarea>
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