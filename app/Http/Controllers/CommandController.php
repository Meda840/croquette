<?php

namespace App\Http\Controllers;

use App\Services\CommandService;
use App\Models\Command;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    protected $commandService;

    public function __construct(CommandService $commandService)
    {
        $this->commandService = $commandService;
    }

    public function index()
    {
        return response()->json($this->commandService->getAllCommands(), 200);
    }

    public function store(Request $request)
    {
        return response()->json($this->commandService->createCommand($request), 201);
    }

    public function show(Command $command)
    {
        return response()->json($this->commandService->getCommand($command), 200);
    }

    public function update(Request $request, Command $command)
    {
        return response()->json($this->commandService->updateCommand($request, $command), 200);
    }

    public function destroy(Command $command)
    {
        $this->commandService->deleteCommand($command);
        return response()->json(['message' => 'Command deleted successfully'], 200);
    }
}
