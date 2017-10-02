<div class="panel panel-default text-center">
    <div class="panel-heading">
        <h4>{{$module->title}}</h4>
        <h4><a href="{{$module->link}}"><i class="{{$module->icon}} fa-5x"></i></a></h4>
    </div><!--panel-heading-->
    <div class="panel-body">
        @if($module->title == trans('strings.biblio.documents.list_title'))
            <table class="table table-responsive table-condensed">
                <tr>
                    <th class="text-center">
                        @debug
                        {{trans('strings.biblio.vehicules.id')}}
                        @endif
                    </th>
                    <th class="text-center">
                        {{trans('strings.biblio.vehicules.name')}}
                    </th>
                    <th class="text-center">
                        {{trans('strings.biblio.documents.document_date')}}
                    </th>
                    <th class="text-center">
                        {{trans('strings.biblio.link')}}
                    </th>
                </tr>
                @foreach($module->description as $desc)
                    <tr>
                        <td class="text-center">
                            {{$desc->id}}
                        </td>
                        <td class="text-center">
                            {{$desc->name}}
                        </td>
                        <td class="text-center">
                            <?php $doc = $desc->documents()->get()->sortByDesc('document_date')->first();?>
                            {{$doc->document_date}}
                        </td>
                        <td class="text-center">
                            <a href="/documents/{{$doc->id}}">{{trans('strings.biblio.link')}}</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            {{$module->description}}
        @endif
    </div>
</div>