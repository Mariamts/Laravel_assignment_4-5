@extends('layout')
@section('content')
    <table id="hero-table" class="table">
        <thead>
            <th>manufactor</th>
            <th>Name</th>
            <th>Studio ID</th>
        </thead>
        <tbody>
            <form action="{{ route('superhero.store') }}" method="post">
                @csrf
                <tr>
                    <td></td>
                    <td><input id="name" type="text" name="name" class="form-control"></td>
                    <td><input id="id" type="text" name="id" class="form-control"></td>
                    <td><button id="submit" class="btn btn-info">add</button></td>
                </tr>
            </form>
            <?php foreach ($data as $hero): ?>
            <tr>
                <td>{{ $hero->id }}</td>
                <td>{{ $hero->name }}</td>
                <td>{{ $hero->manufactor_id }}</td>
                <td>
                    <a class="btn btn-info" href="{{ URL::to('superhero/' . $hero->id . '/edit')  }}">Edit</a>
                    <button data-id="{{ $hero->id }}" id="delete" class="btn btn-danger">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

        <div id="manufactors" class="display:flex">
            @foreach($man as $manufact)
                <div>
                    @foreach($manufact->superheroes()->get() as $superhero)
                        <div class="card mb-3">
                            <div class="card-header">
                                {{ $superhero->name }}
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    @if($manufact->id == $superhero->manufactor_id)
                                        {{ $manufact->name }}
                                    @endif
                                </blockquote>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>


    <script>
        $(document).ready(function() {
            
            $(document).on('click',"#submit", function(e) {
                var url = "{{ route('superhero.store')  }}";
                var type = "POST";
                
            e.preventDefault();
                $.ajax({
                    url : url,
                    type: type,
                    data : {
                        name : $("#name").val(),
                        manufactor_id : $("#id").val()
                    },
                    success: function () {
                        $("#hero-table").load(location.href + " #hero-table > *");
                    },
                    error: function() {
                    }
                });
            });
        });
    </script>
     <script>
            $(document).on('click','#delete',function(e) {
            e.preventDefault();
            var heroDelete = $(e.currentTarget).data("id");

                if(!confirm('are you sure?')) return;

                $.ajax({
                    url : "superhero/" + heroDelete,
                    type: "DELETE",
                    success: function () {
                        $("#hero-table").load(location.href + " #hero-table > *");
                    },
                    error: function() {
                    }
                });
            });
        
    </script>
@endsection
