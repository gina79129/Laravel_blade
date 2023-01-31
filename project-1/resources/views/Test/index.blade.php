<style>
    table{
        border:1px solid black;
    }
    td{
        border:1px solid blue;
    }
</style>
<h1>1124456666</h1>
<table>
    @for ($i=0;$i<count($data);$i++)
        <tr>
            <td>{{$data[$i]['id']}}</td>
            <td>{{$data[$i]['name']}}</td>
        </tr>
        @foreach ($data[$i] as $k=>$v)
        <tr>
            <td>{{$k}}</td>
            <td>{{$v}}</td>
        </tr>
        @endforeach
    @endfor
</table>
<p>index->在迴圈中，目前項目的索引，從0開始算起，0代表"第一個項目"</p>
<ul style="list-style-type:none;">
    @foreach ($data as $dd)
    <li>loop->index / {{$loop->index}}</li>
    @endforeach
</ul>
<hr>
<p>iteration->在迴圈中，目前項目的索引，從1開始算起，1代表"第一個項目"</p>
<ul style="list-style-type:none;">
    @foreach ($data as $tt)
    <li>loop->iteration / {{$loop->iteration}}</li>
    @endforeach
</ul>
<hr>
<p>remaining->在迴圈中還剩多少項目</p>
<ul style="list-style-type:none;">
    @foreach ($data as $ss)
    <li>loop->remaining / {{$loop->remaining}}</li>
    @endforeach
</ul>
<hr>
<p>loop->count:再回圈內的項目數量</p>
<p>loop->depth:這個迴圈有幾"層"深:1代表只有一個迴圈，2代表在迴圈內有另一個迴圈，以此類推</p>
<p>loop->first:這個項目是不是迴圈的第一個項目，以布林值表示</p>
<p>loop->last:這個項目是不是迴圈的最後一個項目，以布林值表示</p>
<ul style="list-style-type:none;">
    @foreach ($data as $cc)
        @if ($loop->first)
            <li>loop->count / {{$loop->count}}</li>
            <li>loop->depth / {{$loop->depth}}</li>
        @endif
        @if ($loop->last)
            loop->last:我是最後了
        @endif
    @endforeach
</ul>
<hr>

<ul>
    @foreach ($data as $mm)
   {{$mm['id']}}
   {{$mm['name']}}
        {{-- @if ($mm->hasChildren()) --}}
        {{-- @foreach ($mm->children() as $mchild) --}}
        {{-- <li>{{$loop->parent->iteration}}.{{$loop->iteration}}:{{$mchild->id}}:{{$mchild->name}}</li> --}}
        {{-- @endforeach --}}
        {{-- @endif --}}
    @endforeach
</ul>


