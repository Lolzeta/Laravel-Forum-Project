@foreach($messages as $message)
    @include('public.messages.message')
    @include('public.confirmations.delete')
    @include('public.confirmations.edit')
    @include('public.confirmations.show')
@endforeach