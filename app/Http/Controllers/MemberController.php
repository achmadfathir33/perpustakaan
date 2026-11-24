<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private array $members = [
        [
            'id' => 1,
            'nama' => 'Budi Santoso',
            'nim' => '3125600001',
            'email' => 'budi.santoso@example.test',
            'nomor_telepon' => '081234567890',
            'alamat' => 'Jl. Teknik Kimia No. 10, Surabaya',
            'status' => 'aktif',
        ],
        [
            'id' => 2,
            'nama' => 'Siti Aminah',
            'nim' => '3125600002',
            'email' => 'siti.aminah@example.test',
            'nomor_telepon' => '082345678901',
            'alamat' => 'Jl. Keputih Tegal No. 24, Surabaya',
            'status' => 'aktif',
        ],
        [
            'id' => 3,
            'nama' => 'Rizky Pratama',
            'nim' => '3125600003',
            'email' => 'rizky.pratama@example.test',
            'nomor_telepon' => '085678901234',
            'alamat' => 'Jl. Gebang Lor No. 5, Surabaya',
            'status' => 'nonaktif',
        ],
    ];

    public function index()
    {
        $members = $this->members;

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();

        return redirect()->route('members.index')
            ->with('success', "Anggota \"{$validated['nama']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database).");
    }

    public function show(string $id)
    {
        return "MemberController@show, id: {$id}";
    }

    public function edit(string $id)
    {
        return "MemberController@edit, id: {$id}";
    }

    public function update(Request $request, string $id)
    {
        return "MemberController@update, id: {$id}";
    }

    public function destroy(string $id)
    {
        return "MemberController@destroy, id: {$id}";
    }
}