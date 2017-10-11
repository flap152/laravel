
<table class="inner">
    <tr>
        <td colspan="2">
            {{ Carbon\Carbon::createFromDate(null,null,$day)->formatLocalized('%d %a' )  }}
        </td>
    </tr>
    <tr>
        <td>
            C
        </td>
        <td>
            BT
        </td>
    </tr>
    <tr>
        <td COLSPAN="2">
            @if($fakeInput * rand (0,rand(0,1))) {{rand(1500,1950) }} @endif
        </td>
    </tr>
</table>
