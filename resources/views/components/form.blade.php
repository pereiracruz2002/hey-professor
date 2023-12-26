@props([
    'action',
    'post'=>NULL,
    'put'=>NULL,
    'delete'=>NULL,
]);

<form action="{{ route('question.store') }}" method="post">
    @csrf

    @if($put)  
        @method('put') 
    @endif

    @if($delete)  
        @method('delete')
    @endif

    {{ $slot}}
   
</form>