<div class="card-body p-1 cardsBoard">
    <div class="d-flex justify-content-end">
        <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
            @csrf
            @method('DELETE')
            @can('admin.tasks.delete')
            <button type="submit" class="btn btn-outline-danger d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{__('message.Delete')}}"><i data-acorn-icon="bin" class="icon" data-acorn-size="10"></i></button>
            @endcan
        </form>
        <div class="ms-2 dropdown">
            @can('admin.tasks.edit')
            <div class="dropdown">
                <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i data-acorn-icon="edit" data-acorn-size="14"></i>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{route('taskStatus.edit',['id'=>1,'taskId'=>$task->id])}}">
                            <span class="align-middle d-inline-block">{{ __('message.Slope') }}</span>
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{route('taskStatus.edit',['id'=>2,'taskId'=>$task->id])}}">
                            <span class="align-middle d-inline-block">{{ __('message.In progress') }}</span>
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{route('taskStatus.edit',['id'=>3,'taskId'=>$task->id])}}">
                            <span class="align-middle d-inline-block">{{ __('message.Complete') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('taskStatus.edit',['id'=>4,'taskId'=>$task->id])}}">
                            <span class="align-middle d-inline-block">{{ __('message.refused') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            @endcan
        </div>
    </div>

    <table class="table">
        <tbody>
            <tr>
                <td>
                    <p class="mb-0 card-title">#.{{$task->id." ".$task->name }}</p>
                </td>
            </tr>
            <tr>
                <td class="py-0">
                    <p class="mb-0 card-title">{{$task->description }}</p>
                </td>
            </tr>
            <tr>
                <td class="py-0">
                    <p class="mb-0 card-title">{{ __('message.Start date') }}: {{$task->horaInicio }}</p>
                </td>
            </tr>
            <tr>
                <td class="py-0">
                    <p class="mb-0 card-title">{{ __('message.Due date') }}: {{$task->horaFin }}</p>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <i data-acorn-icon="user" class="icon" data-acorn-size="20"></i>
                    </td>

                    <td class="card-title">
                        <p class="mb-0">{{"".$task->contacto->name." ".$task->contacto->apellido }} @if ($task->tipoTarea == 'Contacto')
                        <span class="badge bg-success">{{ __('message.' . strtolower($task->tipoTarea)) }}</span>

                        @elseif($task->tipoTarea == 'Visita')
                        <span class="badge bg-warning text-black">{{ $task->tipoTarea }}</span>
                        @else
                        <span class="badge bg-info">{{ $task->tipoTarea }}</span>
                        @endif</p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <i data-acorn-icon="email" class="icon" data-acorn-size="20"></i>
                    </td>
                    <td class="card-title">
                        <p class="mb-0">{{"".$task->contacto->email}} </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <i data-acorn-icon="phone" class="icon" data-acorn-size="20"></i>
                    </td>

                    <td class="card-title">
                        <p class="mb-0">{{"".$task->contacto->telefonoContacto1}} </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <i data-acorn-icon="home-garage" class="icon" data-acorn-size="20"></i>
                    </td>

                    <td colspan="2" class="card-title">
                        <p class="mb-0">{{"".$task->product->name}} </p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <i data-acorn-icon="alarm" class="icon" data-acorn-size="20"></i>
                    </td>
                    <td colspan="2" class="card-title">
                        <p class="mb-0">{{$task->created_at->diffForHumans()}} </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>