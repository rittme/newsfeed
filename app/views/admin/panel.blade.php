@extends('template')

@section('content')
<div class="main add-form">
    {{Form::open()}}
    {{Form::text('name',Input::old('name'), array('placeholder' => 'Title','class'=>"linkbox-title"))}}
    {{Form::text('url',Input::old('url'), array('placeholder' => 'URL'))}}
    <div class="radiobox">
        <label class="radio">
            {{Form::radio('category', 'news');}}
            News
        </label>
        <label class="radio">
            {{Form::radio('category', 'tutorial');}}
            Tutorial
        </label>
        <label class="radio">
            {{Form::radio('category', 'good stuff');}}
            Good Struff
        </label>
        <label class="radio">
            {{Form::radio('category', 'resource');}}
            Resouces
        </label>
        
        {{Form::button('Add',array("class"=>"btn btn-success"))}}
    </div>
    {{Form::token()}}
    {{Form::close()}}
</div>
            <dl class="main">
                <?php foreach ($news as $n): ?>
                    <dt class="linkbox-title"><a target="_blank" href="{{URL::to('link/'.$n->id)}}">
                        <svg class="svg-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve"> 
                            <path id="link-icon" fill="#FFFFFF" d="M156.226,199.679c7.541-7.54,15.902-13.757,24.794-18.659c49.556-27.318,113.117-12.788,144.97,35.518
                            l-38.547,38.547c-11.059-25.227-38.5-39.565-65.813-33.456c-10.282,2.3-20.054,7.427-28.039,15.413l-73.898,73.896
                            c-22.433,22.433-22.432,58.936,0.002,81.369c22.433,22.433,58.935,22.433,81.368,0l22.78-22.779
                            c20.71,8.217,42.938,11.508,64.862,9.863l-50.278,50.278c-43.105,43.105-112.991,43.105-156.096,0
                            c-43.105-43.104-43.106-112.991-0.001-156.096L156.226,199.679z M273.574,82.33l-50.278,50.278
                            c21.928-1.643,44.152,1.648,64.863,9.865l22.779-22.78c22.434-22.434,58.936-22.434,81.37,0c22.434,22.434,22.434,58.936,0,81.37
                            l-73.897,73.895c-22.501,22.501-59.061,22.311-81.368,0c-5.202-5.201-9.694-11.678-12.484-18.04l-38.546,38.546
                            c4.049,6.142,8.261,11.453,13.666,16.858c13.949,13.95,31.698,24.339,52.117,29.251c26.466,6.37,54.823,2.839,79.185-10.592
                            c8.892-4.903,17.254-11.119,24.794-18.659l73.896-73.895c43.105-43.105,43.105-112.991,0.001-156.097
                            C386.566,39.225,316.68,39.225,273.574,82.33z"></path> </svg> {{$n->name}} </a><small>&nbsp;({{$n->category}})</small></dt>
                    <dd class="linkbox-content">{{$n->get_creation()}} | points: {{$n->points}}</dd>
                <?php endforeach; ?>
                
            </dl>
            <?php echo $news->links(); ?>
@stop

@section('analytics')

@stop