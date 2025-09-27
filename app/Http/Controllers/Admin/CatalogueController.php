<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogueController extends Controller
{
    public function index()
    {
        $items = Catalogue::orderByDesc('id')->paginate(10);
        return view('admin.catalogues.index', compact('items'));
    }

    public function create()
    {
        return view('admin.catalogues.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'package_name'  => ['required','string','max:100'],
            'package_desc'  => ['required','string'],
            'package_price' => ['required','numeric','min:0'],
            'cover_image'   => ['nullable','image','mimes:jpg,jpeg,png,webp','max:2048'],
        ]);

        // upload cover (opsional)
        if ($request->hasFile('cover_image')) {
            // simpan ke storage/app/public/catalogues
            $path = $request->file('cover_image')->store('catalogues', 'public');
            // simpan path publik yg bisa diakses asset(): storage/catalogues/xxx.jpg
            $data['cover_image'] = 'storage/'.$path;
        }

        Catalogue::create($data);

        return redirect()->route('admin.catalogues.index')->with('success','Paket berhasil ditambahkan.');
    }

    public function edit(Catalogue $catalogue)
    {
        return view('admin.catalogues.edit', ['item' => $catalogue]);
    }

    public function update(Request $request, Catalogue $catalogue)
    {
        $data = $request->validate([
            'package_name'  => ['required','string','max:100'],
            'package_desc'  => ['required','string'],
            'package_price' => ['required','numeric','min:0'],
            'cover_image'   => ['nullable','image','mimes:jpg,jpeg,png,webp','max:2048'],
        ]);

        if ($request->hasFile('cover_image')) {
            // hapus file lama kalau ada
            if ($catalogue->cover_image && str_starts_with($catalogue->cover_image, 'storage/')) {
                $old = str_replace('storage/','', $catalogue->cover_image); // path relatif di disk public
                Storage::disk('public')->delete($old);
            }
            $path = $request->file('cover_image')->store('catalogues', 'public');
            $data['cover_image'] = 'storage/'.$path;
        }

        $catalogue->update($data);

        return redirect()->route('admin.catalogues.index')->with('success','Paket berhasil diperbarui.');
    }

    public function destroy(Catalogue $catalogue)
    {
        if ($catalogue->cover_image && str_starts_with($catalogue->cover_image, 'storage/')) {
            $old = str_replace('storage/','', $catalogue->cover_image);
            Storage::disk('public')->delete($old);
        }
        $catalogue->delete();

        return back()->with('success','Paket berhasil dihapus.');
    }
}
