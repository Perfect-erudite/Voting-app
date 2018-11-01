<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Full Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    <label for="gender">Gender:</label>
    <select class="form-control" id="gender" name="gender">
      <option value="male">Male</option>
      <option value="female">Female</option>
    </select>
  </div>

  <!-- Category Id Field -->

<div class="form-group col-sm-6">
        <label for="sel1">Category:</label>
        <select class="form-control" id="sel1" name="category_id">
        <option value="{{ $nomination->category['id'] }}"> {{ $nomination->category['name'] }}</option>
          @foreach($categories as $category)
            <option value="{{ $category['name'] }}"> {{ $category['name'] }}</option>
          @endforeach
        </select>
      </div>

<!-- Linked-In Field -->
<div class="form-group col-sm-6">
    {!! Form::label('linkedin_url', 'LinkedIn:') !!}
    {!! Form::text('linkedin_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Bio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bio', 'Bio:') !!}
    {!! Form::text('bio', null, ['class' => 'form-control']) !!}
</div>

<!-- Business Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('business_name', 'Business Name:') !!}
    {!! Form::text('business_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Reason For Nomination Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reason_for_nomination', 'Reason For Nomination:') !!}
    {!! Form::text('reason_for_nomination', null, ['class' => 'form-control']) !!}
</div>



<!--Only Admin and Moderator can view this -->
@if(Auth::user()->role_id < 3)
<!-- Is Admin Selected Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_admin_selected', 'Selected for voting?') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_admin_selected', false) !!}
        {!! Form::checkbox('is_admin_selected', '1', null) !!} 
    </label>
</div>

<!-- Is Won Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_won', 'Won?') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_won', false) !!}
        {!! Form::checkbox('is_won', '1', null) !!} 
    </label>
</div>
@endif


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
