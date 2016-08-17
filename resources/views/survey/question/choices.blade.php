@if($question->choices)
<select class="{{ $question->getQuestionType()->name == 'multiple_choice' ? 'flerevalgafmartin' : 'singletingpaatinder' }}" name="response_{{$question->id}}[]" {{ $question->getQuestionType()->name == 'multiple_choice' ? 'multiple' : '' }}>
@foreach($question->choices as $choice)
    <option value="{{$choice->id}}" selected>{{$choice->title}}</option>
@endforeach
</select>
@endif