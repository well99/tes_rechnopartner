<?php

namespace App\Http\Controllers;

use App\Http\Requests\TraksaksiRequest;
use App\Http\Resources\TransaksiResource;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    function index()
    {
        // $transaksi = new Transaksi();
        $data = Transaksi::all();
        return response()->json(['data' => $data]);
    }

    function store(TraksaksiRequest $request)
    {
        $transaksi = new Transaksi();
        $data = $transaksi->orderBy('id', 'desc')->first();

        if ($request->description == 'pembelian') {
            $cost = $request->price;
            $stock = $data->stock + $request->qty;
        }
        if ($request->description == 'penjualan') {
            $cost = $data->hpp;
            $stock = $data->stock - $request->qty;
        }
        $total_cost = $request->qty * $cost;
        $qty_balance = $data->qty_balance + $request->qty;
        $value_balance = $data->value_balance + $total_cost;
        $hpp = $value_balance / $qty_balance;

        if ($stock <= 0) {
            return response()->json(['pesan' => 'Qty melebihi stok yang ada']);
        }

        Transaksi::create([
            'description' => $request->description,
            'date' => $request->date,
            'qty' => $request->qty,
            'cost' => $cost,
            'price' => $request->price,
            'total_cost' => $total_cost,
            'qty_balance' => $qty_balance,
            'value_balance' => $value_balance,
            'hpp' => $hpp,
            'stock' => $stock,
        ]);
        return response()->json(['pesan' => 'Data berhasil disimpan']);
    }

    function update(TraksaksiRequest $request, $id)
    {
        $data_transaksi = Transaksi::where('id', $id)->first();
        if ($data_transaksi == null) {
            return response()->json(['pesan' => 'Data tidak ditemukan']);
        }

        $data = Transaksi::where('id', '<', $id)->orderBy('id', 'desc')->first();

        $cost = 0;
        if ($request->description == 'pembelian') {
            $cost = $request->price;
            $stock = $data->stock + $request->qty;
        }
        if ($request->description == 'penjualan') {
            $cost = $data->hpp;
            $stock = $data->stock - $request->qty;
        }

        $total_cost = $request->qty * $cost;
        $qty_balance = $data->qty_balance + $request->qty;
        $value_balance = $data->value_balance + $total_cost;
        $hpp = $value_balance / $qty_balance;

        if ($stock <= 0) {
            return response()->json(['pesan' => 'Qty melebihi stok yang ada']);
        }

        Transaksi::where('id', $id)->update([
            'description' => $request->description,
            'date' => $request->date,
            'qty' => $request->qty,
            'cost' => $cost,
            'price' => $request->price,
            'total_cost' => $total_cost,
            'qty_balance' => $qty_balance,
            'value_balance' => $value_balance,
            'hpp' => $hpp,
            'stock' => $stock,
            'updated_at' => now(),
        ]);
        return response()->json(['pesan' => 'Data berhasil dirubah']);
    }

    function remove($id)
    {
        Transaksi::where('id', $id)->delete();
        return response()->json(['pesan' => 'Data berhasil dihapus']);
    }
}
