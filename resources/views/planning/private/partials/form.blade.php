
@foreach ($privates as $data)
<tr>
    {{-- <td>{{ $data->id }}</td> --}}
    <td>{{ $data->name_school }}</td>
    <td>{{ $data->address }}</td>
    <td>{{ $data->email }}</td>
    <td>{{ $data->school_head }}</td>
    <td><img src="{{ asset('planning/private/'.$data->file) }}" width="75px" height="75px" class="img-fluid img-thumbnail" alt="Image"> </td>
    <td class="project-actions text-left">
        {{-- <a class="btn btn-primary btn-sm "   href="{{ route('proceed.show', $data->id) }}"><i class="fas fa-folder"></i> View </a> --}}
        <a class="editIcon btn btn-info btn-sm " id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#editPrivateModal"><i class="fas fa-pencil-alt"></i> Edit </a>
        <a class="btn btn-sm btn-danger deleteIcon" id="{{ $data->id }}" ><i class="fas fa-trash"></i> Delete </a></td>            
</tr>   
@endforeach
<tr class="invitation_page_link">
<td colspan="6" align="right">{{ $privates->links() }}</td>
</tr>











