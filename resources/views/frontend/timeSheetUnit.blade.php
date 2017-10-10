
<table class="inner employeeid_{{$employeeid}} day_{{$day}}" id="{{$employeeid}}-{{$day}}">
    <tr>
        <td class="hzone_C">
            @if(rand(0,rand(0,1))) {{rand(1,12)/2 }} @endif
        </td>
        <td class="hzone_BT">

        </td>

    </tr>
    <tr>
        <td class="zone_C">
            @if(rand(0,rand(0,1))) {{rand(1,12)/2 }} @endif
        </td>
        <td class="zone_BT">
            @if(rand(0,rand(0,1))) {{rand(1,12)/2 }} @endif

        </td>

    </tr>
    <tr>
        <td class="soir_C">
            @if(rand(0,rand(0,1))) {{rand(1,12)/2 }} @endif
        </td>
        <td class="soir_BT">
            @if(rand(0,rand(0,1))) {{rand(4,16)/2 }} @endif
        </td>

    </tr>
    <tr>
        <td class="chef_C">
            @if(rand(0,rand(0,1))) {{rand(3,rand(8,16))/2 }} @endif

        </td>
        <td  class="chef_BT">
            @if(rand(0,rand(0,1))) {{rand(1,rand(2,12))/2 }} @endif
        </td>

    </tr>
</table>
