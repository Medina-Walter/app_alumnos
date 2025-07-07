<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Alumno;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Listar todos los usuarios
    public function index()
    {
        $users = User::select('id', 'nombre', 'apellido', 'email', 'rol')->get();
        return response()->json([
            'success' => true,
            'data' => $users,
        ], 200);
    }

    // Obtener un usuario específico
    public function show($id)
    {
    $user = User::with(['alumno', 'profesor'])->find($id);

        if (!$user) {
          return response()->json([
            'success' => false,
            'message' => 'Usuario no encontrado.',
          ], 404);
        }

        return response()->json([
        'success' => true,
        'data' => [
            'id' => $user->id,
            'nombre' => $user->nombre,
            'apellido' => $user->apellido,
            'dni' => $user->rol === 'alumno' 
                ? optional($user->alumno)->dni 
                : optional($user->profesor)->dni,
            'email' => $user->email,
            'rol' => $user->rol,
            ],
        ], 200);
    }


    // Crear un usuario
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
            'rol' => 'required|in:alumno,profesor',
            'dni' => 'required|string|max:20',
            'especialidad' => 'required_if:rol,profesor|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Errores de validación',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol,
        ]);

        if ($request->rol === 'alumno') {
            Alumno::create([
                'user_id' => $user->id,
                'dni' => $request->dni ?? null,
            ]);
        } elseif ($request->rol === 'profesor') {
            Profesor::create([
                'user_id' => $user->id,
                'dni' => $request->dni ?? null,
                'especialidad' => $request->especialidad ?? null,
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $user->id,
                'nombre' => $user->nombre,
                'apellido' => $user->apellido,
                'dni' => $user->rol === 'alumno'
                ? optional($user->alumno)->dni
                : optional($user->profesor)->dni,
                'email' => $user->email,
                'rol' => $user->rol,
            ],
            'message' => 'Usuario creado con éxito.',
        ], 201);
    }

    // Actualizar un usuario
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no encontrado.',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'sometimes|required|string|max:255',
            'apellido' => 'sometimes|required|string|max:255',
            'dni' => 'sometimes|required|string|max:20',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|string|min:6',
            'especialidad' => 'sometimes|required_if:rol,profesor|string|max:255',
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Errores de validación',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Actualizar usuario
        $user->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'rol' => $request->rol,
        ]);

        // Actualizar o crear registro en alumnos/profesores
        if ($request->rol === 'alumno') {
            $alumno = Alumno::where('user_id', $user->id)->first();
            if ($alumno) {
                $alumno->update([
                    'dni' => $request->dni ?? null,
                ]);
            } else {
                Alumno::create([
                    'user_id' => $user->id,
                    'dni' => $request->dni ?? null,
                ]);
            }
            // Eliminar registro de profesor si existe
            Profesor::where('user_id', $user->id)->delete();
        } elseif ($request->rol === 'profesor') {
            $profesor = Profesor::where('user_id', $user->id)->first();
            if ($profesor) {
               $profesor->update([
               'dni' => $request->dni ?? null,
               'especialidad' => $request->especialidad ?? null,
            ]);
            } else {
               Profesor::create([
                'user_id' => $user->id,
                'dni' => $request->dni ?? null,
                'especialidad' => $request->especialidad ?? null,
               ]);
            }
            // Eliminar registro de alumno si existe
            Alumno::where('user_id', $user->id)->delete();
        }

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $user->id,
                'nombre' => $user->nombre,
                'apellido' => $user->apellido,
                'dni' => $user->rol === 'alumno' ? optional($user->alumno)->dni : optional($user->profesor)->dni,
                'email' => $user->email,
                'rol' => $user->rol,
            ],
            'message' => 'Usuario actualizado con éxito.',
        ], 200);
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no encontrado.',
            ], 404);
        }

        // Eliminar registros relacionados
        Alumno::where('user_id', $user->id)->delete();
        Profesor::where('user_id', $user->id)->delete();
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Usuario eliminado con éxito.',
        ], 200);
    }
}
