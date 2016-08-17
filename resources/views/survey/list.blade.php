<ul class="list-group">
    @foreach($surveys as $survey)
        <li class="list-group-item">
            <div class="survey_container">
                <a href="/survey/{{$survey->id}}"><h4 class="list-group-item-heading forside-title">{{$survey->title}}</h4></a>
                <p class="list-group-item-text">{{$survey->description}}</p>
            </div>
        </li>
    @endforeach
</ul>