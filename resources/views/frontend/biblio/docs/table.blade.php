<table class="table table-responsive table-condensed" id="documentTable">
    <tr>
        @debug
            <th>{{trans('strings.biblio.documents.id')}}</th>
        @endif
        <th>{{trans('strings.biblio.documents.title')}}</th>
        <th>{{trans('strings.biblio.vehicules.name')}}</th>
        <th>{{trans('strings.biblio.documents.document_date')}}</th>
        @if(isset($documents))
            <th>{{trans('strings.biblio.link')}}</th>
        @else
            <th>{{trans('strings.biblio.documents.attachment')}}</th>
        @endif
    </tr>
    @if(isset($documents))
        @foreach($documents as $doc)
            <tr>
                <td>
                    @debug
                        {{$doc->id}}
                    @endif
                </td>
                <td>
                    {{$doc->title}}
                </td>
                <td>
                    {{$doc->vehicule->name}}
                </td>
                <td>
                    {{$doc->document_date}}
                </td>
                <td>
                    <a href="/documents/{{$doc->id}}">{{trans('strings.biblio.link')}}</a>
                </td>
                <input type="hidden" name="documentRow" value="/documents/{{$doc->id}}"/>
            </tr>
        @endforeach
    @else
        <tr>
            <td>
                @debug
                    {{$document->id}}
                @endif
            </td>
            <td>
                {{$document->title}}
            </td>
            <td>
                {{$document->vehicule->name}}
            </td>
            <td>
                {{$document->document_date}}
            </td>
            <td>
                <a href="{{$document->getUrl()}}">{{trans('strings.biblio.documents.attachment')}}</a>
            </td>
            <input type="hidden" name="documentRow" value="{{$document->getUrl()}}"/>
        </tr>
    @endif
</table>