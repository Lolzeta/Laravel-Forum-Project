@auth
@can('manipulate',$community)
<a href="/communities/{{ $community->id }}/edit" class="btn btn-warning btn-sm mr-2 float-right">Edit</a>
<form action="/communities/{{ $community->id }}" method="post" class="mr-2 float-right">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger btn-sm">Delete Community</button>
</form>
@endcan
@endauth
