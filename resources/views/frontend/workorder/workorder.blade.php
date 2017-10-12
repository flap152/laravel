@extends('frontend.layouts.app')

@section('after-styles')
    {{Html::style('css/workorderprojet.css')}}
@endsection
<?php
$min = "0";
$max = "";
?>
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Bon de travail</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12" id="workorder">
                            <form method="post" name="workorderForm">
                                <div class="row">
                                    <div class="col-lg-12" id="header">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <div id="logoForm">
                                                    <img src="/img/frontend/projetdemolitionform.png"/>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-6 text-nowrap">
                                                        <h1>BON DE TRAVAIL</h1>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 text-nowrap">
                                                        <h2>6957</h2>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <p class="text-center">selon la liste de prix unitaires forfaitaires approuvés</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <p>
                                                    160, boul. Industriel #200 Châteauguay, Qc, J6J 422<br/>
                                                    Tél: (450) 961-9800<br/>
                                                    Fax : (450) 691-9881<br/>
                                                </p>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-6">
                                                        <p>
                                                            Construction Gilles Lanthier inc<br/>
                                                            Restaurant Saint-Hubert<br/>
                                                            500 Rue Albanel, Boucherville
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6">
                                                        {{date('d/m/Y')}}<br/>
                                                        C 17-013<br/>
                                                        Directive
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12" id="content">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6">
                                                <div id="accordion1" class="panel-group">
                                                    <div class="panel panel-default" id="mainOeuvreR">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title"
                                                                data-toggle="collapse" href="#collapse1" data-parent="#accordion1" class="title-category">Main d'oeuvre (régulier)
                                                                <span class="badge pull-right">0</span>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse1" class="panel-collapse collapse in">
                                                            <div class="panel-body">
                                                                <table class="table table-responsive">
                                                                    @for($i = 0; $i <= 3; $i++)
                                                                        <tr>
                                                                            <td class="code-width">A01{{$i}}</td>
                                                                            <td>Contremaître décontamination (Heure)</td>
                                                                            <td class="unit-width sorting"><input type="number" {{-- step="1"  min="{{$min}}" max="{{$max}}" --}} class="form-control no-spin" name="heure" {{-- value="0" --}}/></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="code-width">A02{{$i}}</td>
                                                                            <td>Main d'oeuvre Décontamination (Heure)</td>
                                                                            <td class="unit-width sorting"><input type="number" {{-- step="1" --}} min="{{$min}}" max="{{$max}}" class="form-control" name="heure" {{-- value="0" --}}/></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="code-width">A03{{$i}}</td>
                                                                            <td>Contremaître Démolition (Heure)</td>
                                                                            <td class="unit-width sorting"><input type="number" {{-- step="1" --}} min="{{$min}}" max="{{$max}}" class="form-control" name="heure" {{-- value="0" --}}/></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="code-width">A04{{$i}}</td>
                                                                            <td>Main d'oeuvre Démolition (Heure)</td>
                                                                            <td class="unit-width sorting"><input type="number" {{-- step="1" --}} min="{{$min}}" max="{{$max}}" class="form-control" name="heure" {{-- value="0" --}}/></td>
                                                                        </tr>
                                                                    @endfor
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default" id="mainOeuvreD">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title"
                                                                data-toggle="collapse" data-parent="#accordion1" href="#collapse2" class="title-category">Main d'oeuvre (temps double)
                                                                <span class="badge pull-right">0</span>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse2" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <table class="table table-responsive">
                                                                    @for($i = 0; $i <= 1;$i++)
                                                                        <tr>
                                                                            <td class="code-width">A010</td>
                                                                            <td>Contremaître décontamination (Heure)</td>
                                                                            <td class="unit-width sorting"><input type="number" {{-- step="1" --}} min="{{$min}}" max="{{$max}}" class="form-control" name="heure" {{-- value="0" --}}/></td>
                                                                        </tr>
                                                                    @endfor
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default" id="serviceFrais">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title"
                                                                data-toggle="collapse" data-parent="#accordion1" href="#collapse3" class="title-category">Service/Frais
                                                                <span class="badge pull-right">0</span>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse3" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <table class="table table-responsive table-condensed">
                                                                    @for($i = 0; $i <= 3; $i++)
                                                                        <tr>
                                                                            <td class="code-width">A01{{$i}}</td>
                                                                            <td>Service XXX{{$i}} (Heure)</td>
                                                                            <td class="unit-width"><input type="number" {{-- step="1" --}} min="{{$min}}" max="{{$max}}" class="form-control no-spin" name="heure" {{-- value="0" --}}/></td>
                                                                        </tr>
                                                                    @endfor
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default" id="outils">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title"
                                                                data-toggle="collapse" data-parent="#accordion1" href="#collapse4" class="title-category">Outils
                                                                <span class="badge pull-right">0</span>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse4" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <table class="table table-responsive table-condensed">
                                                                    @for($i = 0; $i <= 4; $i++)
                                                                        <tr>
                                                                            <td class="code-width">M01{{$i}}</td>
                                                                            <td>Outil XXX{{$i}} (Heure)</td>
                                                                            <td class="unit-width sorting"><input type="number" {{-- step="1" --}} min="{{$min}}" max="{{$max}}" class="form-control no-spin" name="heure" {{-- value="0" --}}/></td>
                                                                        </tr>
                                                                    @endfor
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <div id="accordion2" class="panel-group">
                                                    <div class="panel panel-default" id="conteneurs">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title"
                                                                data-toggle="collapse" data-parent="#accordion2" href="#collapse5" class="title-category">Conteneurs
                                                                <span class="badge pull-right">0</span>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse5" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <table class="table table-responsive table-condensed">
                                                                    @for($i = 1; $i <= 5; $i++)
                                                                        <tr>
                                                                            <td class="code-width">C01{{$i}}*</td>
                                                                            <td>Conteneur {{$i}}0 V béton(Unité)</td>
                                                                            <td class="unit-width"><input type="number" {{-- step="1" --}} min="{{$min}}" max="{{$max}}" class="form-control no-spin" name="quantite" {{-- value="0" --}}/></td>
                                                                        </tr>
                                                                        @endfor
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default" id="equip">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title"
                                                                data-toggle="collapse" data-parent="#accordion2" href="#collapse6" class="title-category">Équipements
                                                                <span class="badge pull-right">0</span>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse6" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <table class="table table-responsive table-condensed">
                                                                    @for($i = 0; $i <= 1; $i++)
                                                                        <tr>
                                                                            <td class="code-width">C01{{$i}}*</td>
                                                                            <td>Équipement GGG{{$i}}(Unité)</td>
                                                                            <td class="unit-width"><input type="number" {{-- step="1" --}} min="{{$min}}" max="{{$max}}" class="form-control no-spin" name="quantite" {{-- value="0" --}}/></td>
                                                                        </tr>
                                                                    @endfor
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default" id="itemDecon">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title"
                                                                data-toggle="collapse" data-parent="#accordion2" href="#collapse7" class="title-category">Items de Décontamination
                                                                <span class="badge pull-right">0</span>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse7" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <table class="table table-responsive table-condensed">
                                                                    @for($i = 0; $i <= 1; $i++)
                                                                        <tr>
                                                                            <td class="code-width">D01{{$i}}*</td>
                                                                            <td>Décontamination DD{{$i}}(Unité)</td>
                                                                            <td class="unit-width"><input type="number" {{-- step="1" --}} min="{{$min}}" max="{{$max}}" class="form-control no-spin" name="quantite" {{-- value="0" --}}/></td>
                                                                        </tr>
                                                                    @endfor
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default" id="divers">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title"
                                                                data-toggle="collapse" data-parent="#accordion2" href="#collapse8" class="title-category">Divers
                                                                <span class="badge pull-right">0</span>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse8" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <table class="table table-responsive table-condensed">
                                                                    @for($i = 0; $i <= 1; $i++)
                                                                        <tr>
                                                                            <td class="code-width">Z01{{$i}}</td>
                                                                            <td>Divers matériel zzzz{{$i}}(Unité)</td>
                                                                            <td class="unit-width"><input type="number" {{-- step="1" --}} min="{{$min}}" max="{{$max}}" class="form-control no-spin" name="quantite" {{-- value="0" --}}/></td>
                                                                            {{--<td class="unit-width"><input type="number" min="{{$min}}" max="{{$max}}" class="form-control" name="unite" /></td> --}}
                                                                        </tr>
                                                                    @endfor
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12" id="footer">
                                        <div class="form-group">
                                            <label for="descriptionTravaux">Description des travaux</label>
                                            <textarea name="descriptionTravaux" id="descriptionTravaux" class="form-control" rows="5"></textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <ul class="list-group">
                                                    <li class="list-group-item">Frais adm/prol. 16% sont ajoutés aux prix unitaires forfaitaires</li>
                                                    <li class="list-group-item">Frais carburant 3% sont ajoutés aux prix unitaires forfaitaires (*)</li>
                                                    <li class="list-group-item">Condition paiement NET 30 jours (aucune retenue)</li>
                                                    <li class="list-group-item">Frais intérêt de 2% par mois, soit 24% annuel</li>
                                                    <li class="list-group-item">Liste non limitative et peut être ajustée selon les demandes du client</li>
                                                    <li class="list-group-item">Si un recours judiciaires est entrepris afin de protéger et/ou recouvrir quelques paiement,
                                                        une pénalité pour dommage liquidé automatique de 20% s'ajoute à tout moment dû.</li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div id="container-signature">
                                                            <div id="signature"></div>
                                                        </div>
                                                        <button class="btn center-block" name="signatureReset" id="signatureReset" type="reset">Reset</button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-6 margin-top">
                                                        <div class="form-group">
                                                            <label for="approvedby">Approuvé par :</label>
                                                            <input type="text" name="approvedby" id="approvedby" class="form-control" value=""/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="date">Date :</label>
                                                            <input type="text" name="date" class="form-control" id="date" value="{{date('d/m/Y')}}"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 margin-top">
                                                        <div class="form-group">
                                                            <label for="compagnie">Compagnie :</label>
                                                            <input type="text" name="compagnie" id="compagnie" class="form-control" value=""/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="bonCommande">Bon de commande :</label>
                                                            <input type="text" name="bonCommande" id="bonCommande" class="form-control" value="6957"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="margin-top">
                                                <div class="form-group">
                                                    <input type="button" name="saveDraft" id="saveDraft" class="btn btn-primary center-block" value="Sauvegarder Brouillon"/>
                                                </div>
                                                <div class="form-group">
                                                    <input type="button" name="saveFinal" id="saveFinal" class="btn btn-primary center-block" value="Sauvegarder Final"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-scripts')
    <script src="/js/signature/jSignature.min.js"></script>
    <script src="/js/workorder/workorder.js"></script>
@endsection