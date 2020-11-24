<table style="width: 100%">
    <thead>
        <tr>
            <th style="font-weight: bold; text-align: center; width: 30px">Usuario</th>
            <th style="font-weight: bold; text-align: center; width: 30px">Proceso</th>
            <th style="font-weight: bold; text-align: center; width: 30px">Actividad</th>
            <th style="font-weight: bold; text-align: center; width: 30px">Fecha Solicitud</th>
            <th style="font-weight: bold; text-align: center; width: 30px">EPPs</th>
        </tr>
    </thead>
    <tbody>

    @foreach($reqs as $req)
        @php
            $c = $req->items->count();
            if($c==0)
                $c =1;
        @endphp
            <tr>
                <td style="vertical-align: middle" rowspan="{{$c}}">{{ $req->user->name }}</td>
                <td rowspan="{{$c}}">{{optional($req->activity)->process->name }}</td>
                <td rowspan="{{$c}}">{{ $req->activity->name }}</td>
                <td rowspan="{{$c}}">{{ $req->created_at }}</td>
                @foreach($req->items as $item)
                    @if($loop->first)
                        <td>{{ $item->name }}</td>
                    @endif
                @endforeach
            </tr>
            @foreach($req->items as $item)
                @if(!$loop->first)
                    <tr>
                        <td>{{ $item->name }}</td>
                    </tr>
                @endif
            @endforeach
    @endforeach
    </tbody>
</table>
