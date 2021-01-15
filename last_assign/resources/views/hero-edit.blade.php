@extends('layout')


@section('content')
<div class="card">
  <div class="card-header">
    <h3>Edit Hero</h3>
  </div>

  <form method="PUT" action="{{ route('superhero.update',  $superhero->id ) }}" onsubmit="updateHero(event)" id="hero-edit-table">
    <div class="col-3">
      <label for="name"> Name </label>
      <input class="form-control" id="name" type="text" name="name" value="{{ $superhero -> name }}"> 
    </div>

    <pre>
      {{$superhero}}
    </pre>
    <pre>
      {{$manufactor}}
    </pre>
    <select id="manufactor_id" name="manufactor_id" class="form-control">
      <option value=""></option>
      @foreach ($manufactor as $comics)
          <option value="{{ $comics->id }}" {{ $comics->id == $superhero->manufactor_id ? 'selected' : '' }} >{{ $comics->name }}</option>
      @endforeach
  </select>


    <button id="submit" class="btn bnt-info mx-5"> EDIT </button>

  </form>


  <script>
    function updateHero(e) {
        e.preventDefault();
        var serializedForm = $(e.target).serialize();
        var url = $(e.target).attr('action');
        $.ajax({
            url: url + '?' + serializedForm,
            type: 'PUT',
            data: {},
            success: function(data) {
                // location.reload();
            },
            error: function() {

            }
        })
    }
  </script>
  

   
@endsection