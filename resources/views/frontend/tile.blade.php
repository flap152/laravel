<div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="title text-nowrap">{{$module->title}}</h5>
        @if($module->icon_type === 'img')
            <a href="{{$module->link}}"><img src="/img/frontend/{{$module->icon}}" class="logo-tile"/></a>
        @else
            <a href="{{$module->link}}"><i class="{{$module->icon}} fa-2x"></i></a>
        @endif
    </div>
    <div class="panel-body">
        <div class="panel-content">
            @if($module->title == trans('strings.biblio.documents.list_title'))
                <table class="table table-responsive table-condensed">
                    <tr>
                        <th>
                            @debug
                                {{trans('strings.biblio.vehicules.id')}}
                            @endif
                        </th>
                        <th class="text-nowrap">
                            {{trans('strings.biblio.vehicules.name')}}
                        </th>
                        <th>
                            {{trans('strings.biblio.documents.document_date')}}
                        </th>
                        <th>
                            {{trans('strings.biblio.link')}}
                        </th>
                    </tr>
                    @foreach($module->description as $desc)
                        <tr>
                            <td>
                                @debug
                                    {{$desc->id}}
                                @endif
                            </td>
                            <td>
                                {{$desc->name}}
                            </td>
                            <td>
                                <?php $doc = $desc->documents()->get()->sortByDesc('document_date')->first();?>
                                {{$doc->document_date}}
                            </td>
                            <td>
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
</div>