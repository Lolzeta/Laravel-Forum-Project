@foreach($messages as $message)
    @include('public.messages.show')
    @include('public.confirmations.delete')
    @include('public.confirmations.edit')
@endforeach