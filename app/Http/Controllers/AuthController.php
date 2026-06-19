<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
            'nim' => 'required_if:role,mahasiswa|nullable|unique:users,nim',
            'nip' => 'required_if:role,dosen|nullable|unique:users,nip',
            'token' => 'required_if:role,mahasiswa',
            'kode_dosen' => 'required_if:role,dosen'
        ], [
            'nama_lengkap.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'role.required' => 'Silakan pilih peran.',

            'nim.required_if' => 'NIM wajib diisi.',
            'nim.unique' => 'NIM sudah digunakan.',

            'nip.required_if' => 'NIP wajib diisi.',
            'nip.unique' => 'NIP sudah digunakan.',

            'token.required_if' => 'Token wajib diisi.',
            'kode_dosen.required_if' => 'Kode verifikasi dosen wajib diisi.'
        ]);

        $kelasId = null;
        
        // Jika dosen, cek kode verifikasi
        if ($request->role == 'dosen') {

            if ($request->kode_dosen != env('DOSEN_TOKEN')) {

                return back()
                    ->withErrors([
                        'kode_dosen' => 'Kode verifikasi dosen tidak valid'
                    ])
                    ->withInput();
            }
        }

        // Jika mahasiswa, cek token
        if ($request->role == 'mahasiswa') {

            $kelas = \App\Models\Kelas::where('token', $request->token)->first();

            if (!$kelas) {
                return back()
                    ->withErrors(['token' => 'Token kelas tidak valid'])
                    ->withInput();
            }

            $kelasId = $kelas->id;
        }

        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'nim' => $request->role == 'mahasiswa' ? $request->nim : null,
            'nip' => $request->role == 'dosen' ? $request->nip : null,
            'kelas_id' => $kelasId
        ]);

        return redirect()->route('login')->with('success', 'Berhasil daftar');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {

            $user = Auth::user();

            if ($user->role == 'dosen') {
                return redirect('/dashboard-dosen');
            } else {
                return redirect('/dashboard');
            }
        }

        return back()
            ->withErrors(['email' => 'Email atau password salah'])
            ->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
