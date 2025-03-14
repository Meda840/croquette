<?php

namespace App\Services;

use App\Models\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommandService
{
    public function getAllCommands()
    {
        return Command::all();
    }

    public function createCommand(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'product_id' => 'required',
                'tele' => 'required|string',
                'email' => 'required|email|unique:command,email',
                'code_postal' => 'required|string',
                'address' => 'nullable|string',
                'message' => 'required|string',
                'title' => 'required|string',
                'price' => 'required|numeric',
                'quantity' => 'required|integer|min:1',
                'status' => 'required|in:pending,confirmed,shipped,delivered',
            ]);
            $validatedData['id']=Str::uuid()->toString();

            return Command::create($validatedData);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while creating the command.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function getCommand(Command $command)
    {
        return $command;
    }

    public function updateCommand(Request $request, Command $command)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string',
            'product_id' => 'sometimes|required|string',
            'tele' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:command,email,' . $command->id,
            'code_postal' => 'sometimes|required|string',
            'address' => 'nullable|string',
            'message' => 'sometimes|required|string',
            'title' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric',
            'quantity' => 'sometimes|required|integer|min:1',
            'status' => 'sometimes|required|in:pending,confirmed,shipped,delivered',
        ]);

        $command->update($validatedData);
        return $command;
    }

    public function deleteCommand(Command $command)
    {
        $command->delete();
    }
}
