<div class="row mt-4">
    <div class="col-lg-6 col-md-6">
        <div class="form-group focused">
            <label for="selectedClass" class="form-control-label">Primary Genre  <span class="text-danger">*</span></label>
            <select  class="form-control form-control-select " wire:model="selectedClass" name="p_genre">
                <option value=""  class="form-control form-control-select py-2">Select a Primary Genre </option>
                @foreach ($classes as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="form-group focused">
            <label for="status" class="form-control-label">Secondary Genre <span class="text-danger">*</span></label>
            <select  class="form-control form-control-select " wire:model="selectedSection" name="s_genre">
                <option value="">Select a Section</option>
                @if (!is_null($sections))
                    @foreach ($sections as $item)
                        <option value="{{ $item->id }}" class="form-control form-control-select py-2">{{ $item->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
</div>


