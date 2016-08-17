<p class="titlepaaetsporgsmpl">{{$question->title}}</p>
<p class="beskrivelspaaspergsmaal">{{$question->description}}</p>
<select class="saadanensomgaarned" name="response_{{$question->id}}" id="">
    <option value="1" selected>1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
</select>