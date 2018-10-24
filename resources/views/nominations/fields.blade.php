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

<!-- Linked-In Field -->
<div class="form-group col-sm-6">
    {!! Form::label('linked-in', 'Linked-In:') !!}
    {!! Form::text('linked-in', null, ['class' => 'form-control']) !!}
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
    {!! Form::label('is_admin_selected', 'Is Admin Selected:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_admin_selected', false) !!}
        {!! Form::checkbox('is_admin_selected', '1', null) !!} 1
    </label>
</div>

<!-- Is Won Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_won', 'Is Won:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_won', false) !!}
        {!! Form::checkbox('is_won', '1', null) !!} 1
    </label>
</div>
@endif

<!-- Category Id Field -->

@if(isset($category->id))
<div class="form-group col-sm-6">
    {!! Form::hidden('category_id', 'Category Id:') !!}
    {!! Form::hidden('category_id', $category->id, ['class' => 'form-control']) !!}
</div
>
@else
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Id:') !!}
    {!! Form::hidden('category_id', null, ['class' => 'form-control']) !!}
</div>
@endif
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
