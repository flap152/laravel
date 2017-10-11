<?php
/**
 * Created by PhpStorm.
 * User: frank
 * Date: 2017-10-05
 * Time: 11:44
 */

$myWidth = 35;
$myHeight = 20;
$contremaitre = 1;

$fakeInput = 0;

?>

        <!DOCTYPE html>
<html>
<head>
    <style>
        h1 {
            color: red;
        }

        p {
            color: blue;
        }

        table.outer {
            border: 0px solid black;
            border-spacing: 0px;
            padding: 0;
        }

        table.outer td {
            text-align: center;
            padding: 0px;
            border: 1px solid black;
            border-spacing: 0px;
            color: saddlebrown;
        }

        table.inner, table.inner tr, table.inner-small {
            border: 0px solid black;
            border-spacing: 0px;
        }

        table.inner td {
            padding: 0px;
            width: {{ $myWidth }}px;
            min-width: {{ $myWidth }}px;
            max-width: {{ $myWidth }}x;
            height: {{ $myHeight }}px;
            min-height: {{ $myHeight }}px;
            max-height: {{ $myHeight }}px;
            align-content: center;
            border: 1px solid black;
            border-right: 0px;
            border-bottom: 0px;
            overflow: hidden;
        }

        table.inner-small td {
            padding: 0px;
            width: {{ $myWidth*1.5 }}px;
            min-width: {{ $myWidth*1.5 }}px;
            max-width: {{ $myWidth*1.5 }}x;
            height: {{ $myHeight }}px;
            min-height: {{ $myHeight }}px;
            max-height: {{ $myHeight }}px;
            font-size: smaller;
            align-content: center;
            border: 1px solid black;
            border-right: 0px;
            border-bottom: 0px;
            overflow: hidden;
        }


    </style>
</head>
<body>

<?php


setlocale(LC_TIME, 'fr');
$start = Carbon\Carbon::getWeekStartsAt();
if ($contremaitre) {
$days = range($start, $start + 0);
}else {
$days = range($start, $start + 6);}
$employees = array('Jean-Jacques Joubert-Janvier', 'Guy Cyr', 'Robert Dubois');

?>


<table class="outer">
    <tr>
        <td colspan="2">

        </td>
        @foreach($days as $day)
            <td>
                @include('frontend._timeSheetHeader', ['day'=>$day])

            </td>
        @endforeach
        @if(!$contremaitre)
        <td>
            @include('frontend._weekTotalHeader')

        </td>
        @endif
    </tr>

    @foreach($employees as $employee)
        @php
            $employeeid = $loop->iteration
        @endphp
        <tr>
            <td>
                {{$employee}} {{-- - {{$employeeid}} --}}
            </td>
            <td>
                <table class="inner-small">
                    <tr>
                        <td>
                            H-Zone
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Zone
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tr.Soir
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ch.É.
                        </td>
                    </tr>
                </table>
            </td>
            @foreach($days as $day)
                <td>
                    @include('frontend.timeSheetUnit',compact(['employeeid'=>$loop->iteration,'day'=>$day ]))

                </td>
            @endforeach
            @if(!$contremaitre)
            <td>
                @include('frontend.timeSheetUnit')
            </td>
            @endif
        </tr>
    @endforeach
</table>

</body>
</html>
