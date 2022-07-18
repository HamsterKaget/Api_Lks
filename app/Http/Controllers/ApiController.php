<?php

namespace App\Http\Controllers;

use App\Models\costumerLogin;
use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Transaction;
use App\Models\Recipe;
use Carbon\Carbon;

class ApiController extends Controller
{
    public $index = 1;

    public function login(Request $request)
    {
        try {
            $request->validate([
                'Username' => 'required',
                'Password' => 'required'
            ]);

            $data = costumerLogin::where("Username", "=", $request->Username)->where("Password", "=", $request->Password)->first();

            if(!is_null($data)) {
                return response()->json(['status' => 200, 'messsage' => 'Login Success', 'data' => $data], 200);

            } else {
                return response()->json(['status' => 400, 'messsage' => 'Login Failed', 'data' => $data], 400);
            }
        } catch (\Exception $e) {
            return response()->json($e, 500);
        }
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'Tipe_User' => 'required',
                'Nama_User' => 'required',
                'Alamat' => 'required',
                'Telpon' => 'required',
                'Username' => 'required',
                'Password' => 'required'

            ]);

            $register = costumerLogin::create([
                'Tipe_User' => 'user',
                'Nama_User' => $request->Nama_User,
                'Alamat' => $request->Alamat,
                'Telpon' => $request->Telpon,
                'Username' => $request->Username,
                'Password' => $request->Password

            ]);


            $data = costumerLogin::where('Username', '=', $request->Username)->get();

            if($data->count() >= 0) {
                return response()->json(['status' => 200, 'messsage' => 'Data created successfully', 'data' => $data], 200);

            } else {
                return response()->json(['status' => 400, 'messsage' => 'Data Failed', 'data' => $data], 400);
            }
        } catch (\Exception $e) {
            return response()->json($e, 500);
        }
    }

    public function showObat() {
        try {
            $data = Obat::all();

            if($data) {
                return response()->json(['status' => 200, 'messsage' => 'Data Found', 'data' => $data], 200);
            } else {
                return response()->json(['status' => 400, 'messsage' => 'Data Not Found', 'data' => null], 400);
            }
        } catch (Exception $e) {
            return response()->json($e, 500);
        }
    }

    public function makeTransaction(Request $request) {
            try {

               if(!is_null(Transaction::first())) {
                $id = Transaction::orderBy('No_Transaksi', 'DESC')->first()->No_Transaksi;
                $id++;
               } else {
                $id = 1;
               }

                $transaction = Transaction::create([
                    'No_Transaksi' => $id ,
                    'Tgl_Transaksi' => Carbon::now()->toDateString('Y-m-d'),
                    'Total_Bayar' => $request->Total_Bayar,
                    'Id_User' => $request->Id_User,
                    'Id_Obat' => $request->Id_Obat,

                ]);

                $data = Transaction::where('Id_Transaksi', '=', $transaction->Id_Transaksi)->get();

                if($data->count() > 0) {
                    return response()->json(['status' => 200, 'messsage' => 'Data Found', 'data' => $data], 200);
                } else {
                    return response()->json(['status' => 400, 'messsage' => 'Data Not Found', 'data' => null], 400);
                }

            } catch (\Exception $e) {
                return response()->json($e, 500);
            }
    }


}
