<?php

namespace App\Http\Controllers;

use App\Traits\DeleteModelTrait;
use App\User;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    use DeleteModelTrait;

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function indexUser()
    {
        $users = User::where('role', 'user')->latest()->get();
        return view('admin.user.index', compact('users'));
    }

    public function indexAdmin()
    {
        $users = User::where('role', 'admin')->latest()->get();
        return view('admin.user.index', compact('users'));
    }

    public function showDetail($id)
    {
        $userDetails =User::where('id',$id)->first();
        return view('admin.user.show_user_detail',compact('userDetails'));
    }

    public function update($id)
    {
        try {
            $user = User::where('id',$id)->first();
            $user->role = 'admin';
            $user->save();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception . '----Line :' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }

    public function delete($id, User $user)
    {
        return $this->deleteModelTrait($id, $user);
    }

    public function indexUserDelete()
    {
        $users = User::onlyTrashed()->get();;
        return view('admin.user.index_view', compact('users'));
    }

    public function updateDelete($id)
    {
        try {
            User::withTrashed()->find($id)->restore();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $exception)
        {
            Log::error('Message: '.$exception->getMessage().'------Line: '.$exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
}
