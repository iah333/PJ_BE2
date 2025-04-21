<?php

  namespace App\Http\Controllers;

  use App\Models\SanPham;
  use App\Models\DanhMucSanPham;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Storage;

  class SanPhamController extends Controller
  {
      public function index()
      {
          $sanPhams = SanPham::with('danhMuc')->get();
          return view('admin.san-pham.index', compact('sanPhams'));
      }

      public function create()
      {
          $danhMucs = DanhMucSanPham::all();
          return view('admin.san-pham.create', compact('danhMucs'));
      }

      public function store(Request $request)
      {
          $request->validate([
              'ma_danh_muc' => 'required|exists:danh_muc_san_pham,ma_danh_muc',
              'ten_san_pham' => 'required|string|max:255',
              'gia' => 'required|numeric|min:0',
              'so_luong_ton' => 'required|integer|min:0',
              'anh' => 'nullable|image|max:2048',
          ]);

          $data = $request->only(['ma_danh_muc', 'ten_san_pham', 'gia', 'so_luong_ton']);
          if ($request->hasFile('anh')) {
              $data['anh'] = $request->file('anh')->store('uploads', 'public');
          }

          SanPham::create($data);

          return redirect()->route('sanPham.index')->with('success', 'Sản phẩm đã được tạo!');
      }

      public function edit($ma_san_pham)
      {
          $sanPham = SanPham::findOrFail($ma_san_pham);
          $danhMucs = DanhMucSanPham::all();
          return view('admin.san-pham.edit', compact('sanPham', 'danhMucs'));
      }

      public function update(Request $request, $ma_san_pham)
      {
          $request->validate([
              'ma_danh_muc' => 'required|exists:danh_muc_san_pham,ma_danh_muc',
              'ten_san_pham' => 'required|string|max:255',
              'gia' => 'required|numeric|min:0',
              'so_luong_ton' => 'required|integer|min:0',
              'anh' => 'nullable|image|max:2048',
          ]);

          $sanPham = SanPham::findOrFail($ma_san_pham);
          $data = $request->only(['ma_danh_muc', 'ten_san_pham', 'gia', 'so_luong_ton']);
          if ($request->hasFile('anh')) {
              if ($sanPham->anh) {
                  Storage::disk('public')->delete($sanPham->anh);
              }
              $data['anh'] = $request->file('anh')->store('uploads', 'public');
          }

          $sanPham->update($data);

          return redirect()->route('sanPham.index')->with('success', 'Sản phẩm đã được cập nhật!');
      }

      public function destroy($ma_san_pham)
      {
          $sanPham = SanPham::findOrFail($ma_san_pham);
          if ($sanPham->anh) {
              Storage::disk('public')->delete($sanPham->anh);
          }
          $sanPham->delete();

          return redirect()->route('sanPham.index')->with('success', 'Sản phẩm đã được xóa!');
      }
  }