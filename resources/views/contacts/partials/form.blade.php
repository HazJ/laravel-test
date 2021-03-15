{{ csrf_field() }}

<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
    <label for="first_name" class="col-md-4 control-label">First Name</label>
    <div class="col-md-12">
        <input id="first_name" type="text" class="form-control" name="first_name"
               value="{{ old('first_name', $contact->first_name) }}">
        @if ($errors->has('first_name'))
            <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
    <label for="last_name" class="col-md-4 control-label">Last Name</label>
    <div class="col-md-12">
        <input id="first_name" type="text" class="form-control" name="last_name"
               value="{{ old('last_name', $contact->last_name) }}">
        @if ($errors->has('last_name'))
            <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
    <label for="company_id" class="col-md-4 control-label">Company</label>
    <div class="col-md-12">
        <select name="company_id" id="company_id" class="form-control">
            <option value="">Please select...</option>
            @foreach($companies as $id => $name)
                <option value="{{ $id }}"
                    {{ $id == old('company_id', $contact->company_id) ? ' selected' : ''}}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('company_id'))
            <span class="help-block">
                <strong>{{ $errors->first('company_id') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="card">
    <div class="card-header">Contact Address</div>

    <div class="card-body">
        <div class="form-group{{ $errors->has('door') ? ' has-error' : '' }}">
            <label for="door" class="col-md-4 control-label">Door *</label>
            <div class="col-md-12">
                <input id="door" type="text" class="form-control" name="door" value="{{ old('door', $contact->door) }}">
                @if ($errors->has('door'))
                    <span class="help-block">
                        <strong>{{ $errors->first('door') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
            <label for="street" class="col-md-4 control-label">Street *</label>
            <div class="col-md-12">
                <input id="street" type="text" class="form-control" name="street" value="{{ old('street', $contact->street) }}">
                @if ($errors->has('street'))
                    <span class="help-block">
                        <strong>{{ $errors->first('street') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
            <label for="city" class="col-md-4 control-label">City *</label>
            <div class="col-md-12">
                <input id="city" type="text" class="form-control" name="city" value="{{ old('city', $contact->city) }}">
                @if ($errors->has('city'))
                    <span class="help-block">
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">
            <label for="postcode" class="col-md-4 control-label">Postcode *</label>
            <div class="col-md-12">
                <input id="postcode" type="text" class="form-control" name="postcode" value="{{ old('postcode', $contact->postcode) }}">
                @if ($errors->has('postcode'))
                    <span class="help-block">
                        <strong>{{ $errors->first('postcode') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="form-group{{ $errors->has('contact_role_id') ? ' has-error' : '' }}">
    <label for="contact_role_id" class="col-md-4 control-label">Contact Role</label>
    <div class="col-md-12">
        <select name="contact_role_id" id="contact_role_id" class="form-control">
            <option value="">Please select...</option>
            @foreach($contactRoles as $id => $name)
                <option value="{{ $id }}"
                    {{ $id == old('contact_role_id', $contact->contact_role_id) ? ' selected' : ''}}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('contact_role_id'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_role_id') }}</strong>
            </span>
        @endif
    </div>
</div>
