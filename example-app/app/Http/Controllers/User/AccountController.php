<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Đảm bảo model là 'User'

class AccountController extends Controller
{
    public function acc()
    {
        $user = Auth::user();
        return view('user.page.account.acc', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'username' => 'required|max:255',
                'email' => 'required|email',
                'phone_number' => 'required|regex:/^0\d{9}$/',
                'address' => 'required',
            ],
            [
                'username.required' => 'Tên không được để trống',
                'username.max' => 'Tên không được vượt quá 255 kí tự',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email phải đúng định dạng',
                'phone_number.required' => 'Số điện thoại không được trống',
                'phone_number.regex' => 'Số điện thoại phải đúng định dạng',
                'address.required' => 'Địa chỉ không được để trống',
            ]
        );

        $user = User::find($id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->save();

        return redirect()->route('account')->with('success', 'Cập nhật thông tin thành công!');
    }
}
