<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <x-header></x-header>
</head>
<body>
    {{-- 可傳入參數直接用大括號{{}}顯示 --}}
    hahahallo , {{ $name }}
    <br><hr>
    {{-- 默認情況下，Blade{{}}語句會自動通過PHP htmlspecialchars函數發送，以防止XSS攻擊，如果你不希望您的數據庫被轉義，可使用以下程式  --}}
    我是禁用!! , {{!! $name !!}}
    <br>
    我是沒禁用 , {{ $name }}
    <br><hr>
    {{-- 在這個範例中，@ 符號會被 Blade 移除。而且，Blade 引擎會保留 {{ name }} 表達式，如此一來便可讓其它 JavaScript 框架所應用 --}}
    使用@ @{{ name }}
    <br>
    Hello, @{{ name }}
    <br><hr>
    {{-- 可直接echo php代碼 --}}
    可直接echo php代碼 @{{time()}}
    <br>
    The Current UNIX Timestamp is {{ time() }}
    <br><hr>
    {{-- 使用component 的共用組件 --}}
    <x-alert type="danger" message="這邊是錯誤訊息"/>
    <br><hr>
    判斷是不是gina<br>
    @foreach ($data as $dd)
        @if ($dd['name']=='gina')
            {{$dd['name']}}=>YES
        @else
            {{$dd['name']}}=>NO
        @endif
        <br>
    @endforeach

    <table class="showstr"></table>
    <p>@php
        // echo json_encode($month);
        // echo "<br>";
        // $json = json_decode(json_encode($month),true);
        // print_r($json);
    @endphp
    </p>
    <a href="@php echo route('testtt')@endphp">gotest1</a>
</body>


<script type="text/javascript">
    var json = @json($month);
    var showstr = '';
        showstr += "<tr><td>月</td><td>天</td></tr>";
    for(var i = 0;i<json.length;i++){
        showstr +="<tr>";
        showstr +="<td>"+json[i].md+"月</td>";
        showstr +="<td>"+json[i].ad+"天</td>";
        showstr +="</tr>";
    }

    var showtab = $(".showstr");
    showtab.append(showstr);

</script>
</html>
