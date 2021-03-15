{{ csrf_field() }}

<div class="form-group{{ $errors->has('uuid') ? ' has-error' : '' }}">
    <label for="uuid" class="col-md-4 control-label">UUID</label>
    <div class="col-md-12">
        <input id="uuid" type="text" class="form-control" name="uuid" value="{{ old('uuid') }}">
        @if ($errors->has('uuid'))
            <span class="help-block">
                <strong>{{ $errors->first('uuid') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('contact_id') ? ' has-error' : '' }}">
    <label for="contact_id" class="col-md-4 control-label">Contact</label>
    <div class="col-md-12">
        <select name="contact_id" id="contact_id" class="form-control">
            <option value="">Please select...</option>

            @foreach($contacts as $key => $contact)
                <option value="{{ $contact->id }}" {{ $contact->id == old('contact_id', $contact->id) ? ' selected' : ''}}>
                    {{ $contact->first_name }} {{ $contact->last_name }}
                </option>
            @endforeach
        </select>

        @if ($errors->has('contact_id'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="card">
    <div class="card-header">Order Items</div>

    <div class="card-body">
        <div class="form-group{{ $errors->has('item') ? ' has-error' : '' }}">
            <label for="item" class="col-md-4 control-label">Item *</label>
            <div class="col-md-12">
                <input id="item" type="text" class="form-control" name="item" value="{{ old('item') }}">

                @if ($errors->has('item'))
                    <span class="help-block">
                        <strong>{{ $errors->first('item') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
            <label for="price" class="col-md-4 control-label">Price</label>
            <div class="col-md-12">
                <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}">
                @if ($errors->has('price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
