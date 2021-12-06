
@foreach ($invitations as $data)
    <tr>
        <td>{{ $data->id }}</td>
        <td>{{ $data->date }}</td>
        <td>{{ $data->title }}</td>
        <td>{{ $data->file }}</td>
        <td class="project-actions text-left">
            <a class="btn btn-primary btn-sm "   href="{{ route('invitation.show', $data->id) }}"><i class="fas fa-folder"></i> View </a>
            <a class="editIcon btn btn-info btn-sm " id="{{ $data->id }}" data-bs-toggle="modal" data-bs-target="#editInvitationModal"><i class="fas fa-pencil-alt"></i> Edit </a>
            <a class="btn btn-sm btn-danger deleteIcon" id="{{ $data->id }}" ><i class="fas fa-trash"></i> Delete </a></td>            
    </tr>   
@endforeach
    <tr class="invitation_page_link">
    <td colspan="6" align="right">{{ $invitations->links() }}</td>
    </tr>



















