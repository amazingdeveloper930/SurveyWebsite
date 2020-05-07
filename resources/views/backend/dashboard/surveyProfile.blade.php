@extends('backend.layouts.default')

@section('title'){{ $entry->title }}@stop

@section('content')
<section id="content">
    <div class="container page-profile">
        <div class="pageheader">
            <h2>
                {{ $entry->title }}  @if($entry->active)
                <span class="badge badge-success">
                    Launched : True
                </span>
                @else
                <span class="badge badge-danger">
                    Launched : False
                </span>
                @endif
            </h2>
        </div>
        <div class="pagecontent">
            <div class="rowb <div class=" col-md-8"="">
                <section class="tile tile-simple">
                    <div class="tile-body p-0">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr/>
                                <p><strong>Credits Assigned :</strong> {{ $entry->advertise_credits }} | <strong>Used Credit :</strong> {{ $entry->used_credits }} </p>
                                <hr/>
                                <h3>
                                    Survey Questions
                                </h3>
                                <ol class="navbar">
                                    @foreach($questions as $k => $q)
                                    <li>
                                        {{$q->title}}
                                        <ol>
                                            @foreach($q->options as $kin => $oin)
                                            <li>
                                                {{ $oin->title }}
                                            </li>
                                            @endforeach
                                        </ol>
                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
