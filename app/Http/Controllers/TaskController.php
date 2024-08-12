<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Product;
use App\Models\Contacto;
use App\Models\User;
use App\Notifications\Task\TaskCreatedNotification;
use App\Notifications\Task\TaskDeleteNotification;
use App\Notifications\Task\TaskUpdatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class TaskController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tasks.index')->only('index');
        $this->middleware('can:admin.tasks.create')->only('create', 'store');
        $this->middleware('can:admin.tasks.edit')->only('edit', 'update');
        $this->middleware('can:admin.tasks.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('agente_id', auth()->user()->id)->get();
        //Contacto::where('vendedorAgente_id', auth()->user()->id)->get()

        return view('task.index', compact('tasks'))
            ->with('i', (request()->input('page', 1) - 1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task();

        $products = Product::all()->pluck('name', 'id');
        $contactos = Contacto::all()->pluck('name', 'id');

        return view('task.create', compact('task', 'products', 'contactos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Task::$rules);

        $task = Task::create($request->all());

        $admins = User::whereHas("roles", function ($q) {
            $q->whereIn('name', ['super Admin', 'admin']);
        })->get();

        $agenteAsignado = User::find($task->agente_id);

        foreach ($admins as $admin) {
            $admin->notify(new TaskCreatedNotification($task));
        }

        $agenteAsignado->notify(new TaskCreatedNotification($task));

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea creada con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);

        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $products = Product::all()->pluck('name', 'id');
        $contactos = Contacto::all()->pluck('name', 'id');

        return view('task.edit', compact('task', 'products', 'contactos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        request()->validate(Task::$rules);

        $task->update($request->all());

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea Actualizada con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $task = Task::find($id);

        if ($task) {
            $agenteAsignado = User::find($task->agente_id);

            $admins = User::whereHas("roles", function ($q) {
                $q->whereIn('name', ['super Admin', 'admin']);
            })->get();

            foreach ($admins as $admin) {
                $admin->notify(new TaskDeleteNotification($task));
            }

            $agenteAsignado->notify(new TaskDeleteNotification($task));

            $task->delete();
        }

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea eliminada con exito');
    }

    public function taskStatus($id, $taskId)
    {
        $task = Task::find($taskId);
        if ($id == 1) {
            $task->status = 'Pendiente';
        } elseif ($id == 2) {
            $task->status = 'En proceso';
        } elseif ($id == 3) {
            $task->status = 'Completado';
        } elseif ($id == 4) {
            $task->status = 'Rechazado';
        }

        $task->save();

        $admins = User::whereHas("roles", function ($q) {
            $q->whereIn('name', ['super Admin', 'admin']);
        })->get();

        $agenteAsignado = User::find($task->agente_id);

        $notificados = [];

        foreach ($admins as $admin) {
            if (!in_array($admin->id, $notificados)) {
                $admin->notify(new TaskUpdatedNotification($task));
                $notificados[] = $admin->id;
            }
        }

        if (!in_array($agenteAsignado->id, $notificados)) {
            $agenteAsignado->notify(new TaskUpdatedNotification($task));
        }

        return redirect()->back();
    }


    public function calendar()
    {
        $tasks = Task::where('agente_id', auth()->user()->id)
        ->where('status', '<>', 'Rechazado') // Filtra las tareas que no tienen status "Rechazado"
        ->get();        $events = [];
        
        foreach ($tasks as $event) {
            $color= null;
        if ($event->status === 'Pendiente') {
            $color = '#0d6efd'; 
        }
        if ($event->status === 'En proceso') {
            $color = '#fd7e14'; // yellow
        }
        if ($event->status === 'Completado') {
            $color = '#198754'; // green
        }
        if ($event->status === 'Rechazado') {
            $color = '#ff0000'; // red
        }

            $events[] = [
                'title' => $event->name,
                'start' => $event->horaInicio,
                'end' => $event->horaFin,
                'backgroundColor' => $color,
            ];
        }

        return view('task.calendar', compact('events'));
    }

//     public function sendTaskReminders()
// {
//     $tasks = Task::whereDate('horaInicio', '=', now()->addDay()->toDateString())->get();

//     foreach ($tasks as $task) {
//         // Send email notification for each task
//         Mail::to($task->agente->email)->send(new TaskReminderMail($task));
//     }
// }
}
