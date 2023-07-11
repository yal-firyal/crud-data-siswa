<?php

namespace App\Http\Controllers;

use App\Models\Siswa; // Import model Siswa
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::latest()->get();
        return view('index', compact('siswas'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:155',
            'nis' => 'required|string|max:155'
        ]);

        $siswa = Siswa::create([
            'nama' => $request->nama,
            'nis' => $request->nis
        ]);

        if ($siswa) {
            return redirect()
                ->route('siswa.index')
                ->with([
                    'success' => 'Data siswa berhasil ditambahkan'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data siswa gagal ditambahkan'
                ]);
        }
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:155',
            'nis' => 'required|string|max:155'
        ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'nama' => $request->nama,
            'nis' => $request->nis
        ]);

        if ($siswa) {
            return redirect()
                ->route('index')
                ->with([
                    'success' => 'Data siswa berhasil diupdate'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data siswa gagal diupdate'
                ]);
        }
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        if ($siswa) {
            return redirect()
                ->route('index')
                ->with([
                    'success' => 'Data siswa berhasil dihapus'
                ]);
        } else {
            return redirect()
                ->route('index')
                ->with([
                    'error' => 'Data siswa gagal dihapus'
                ]);
        }
    }
}
