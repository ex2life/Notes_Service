@extends('layouts.app')

@section('content')

    <div class="card-body">
        @include('errors')
        <form action="{{ url('note') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="row">
                <div class="form-group">
                    <label for="Note" class="col-sm-3 control-label">Заметка</label>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" name="name" id="note-name" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-plus"></i>
                                Сохранить заметку</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @if(count($notes)>0)
        <div class="card">
            <div class="card-heading">
                Сохраненные заметки
            </div>
            <div class="card-body">
                <table class="table table-striped note-table">
                    <thead>
                    <th>Заметки</th>
                    </thead>

                    <tbdoy>
                        @foreach($notes as $note)
                            <tr>
                            <td class="table-text">
                                <div>{{ $note -> name }}</div>
                            </td>
                            <td>
                                <form action="{{url('note/'.$note->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}

                                    <button class="btn btn-danger">
                                        Удалить
                                    </button>

                                </form>
                            </td>
                            </tr>
                        @endforeach
                    </tbdoy>
                </table>
            </div>
        </div>
    @endif
@endsection
