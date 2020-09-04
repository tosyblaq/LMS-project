@extends('layouts.admin_inc')

@section('title')
{{isset($section) ? 'Edit Section' : 'Create Section'}}
@endsection

@section('content')
<div class="content">
  <div class="row">
    <div class="col-md-10">
      <div class="card ">
        <div class="card-header ">
        <h5 class="card-title">{{isset($section) ? 'Edit Section' : 'Create Section'}}</h5>
            <p class="card-section"></p>
        </div>
        <div class="card-body ">
          {{-- <canvas id=chartHours width="400" height="100"></canvas> --}}
          <table class="table">
            <form action="{{isset($section) ? route('section.update', $section->id) : route('section.store')}}" method="post">
                @csrf

                @if(isset($section))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="section">Section Name:</label>
                    <input type="text" name="section" value="{{isset($section) ? $section->section : ''}}" id="section" class="form-control @error('section') is-invalid @enderror">
                    <label>(for example 'section one')</label>
                    @error('section')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">{{isset($section) ? 'Update' : 'Create'}}</button>
                </div>
            </form>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
