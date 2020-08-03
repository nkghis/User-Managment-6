{{--@can('edit_users')--}}
<a href="{{ route($entity.'.edit', [Illuminate\Support\Str::singular($entity) => $id])  }}" class="btn btn-sm btn-info">
    <i class="nc-icon nc-align-left-2"></i> Editer</a>
{{--@endcan--}}

{{--@can('delete_users')--}}
{!! Form::open( ['method' => 'delete', 'url' => route($entity.'.destroy', [Illuminate\Support\Str::singular($entity) => $id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("êtes vous sure de supprimer?");']) !!}
<button type="submit" class="btn-delete btn btn-sm btn-danger">
    <i class="nc-icon nc-simple-remove"></i> Supprimer
</button>
{!! Form::close() !!}
{{--@endcan--}}

