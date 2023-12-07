<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use App\Models\Favorite;
use App\Models\Footer;
use App\Models\Notifications;
use App\Models\TopUpCategories;
use App\Models\TransactionTopUp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TopUpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tripay = new TripayPaymentController();
    }
    public function transaction(Request $request)
    {
        $tripay = new TripayPaymentController();
        //tripay insert data
        $price = $request->price;
        $method = $request->method;

        $transaction = $tripay->requestTransaction($method, $price);
        // insert in database

        TransactionTopUp::create([
            'user_id' => auth()->user()->id,
            'price' => $price,
            'reference' => $transaction->reference,
            'merchant_ref' => $transaction->merchant_ref,
            'total_amount' => $transaction->amount,
            'status' => $transaction->status,
        ]);
        return redirect()->route('detail.transaction', [
            'reference' => $transaction->reference,
        ]);
    }
    public function detailTransaction($reference)
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $categorytopup = TopUpCategories::all();
        $admin = false;
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $id_user = Auth::user()->id;
            $id_admin = User::where("role", "admin")->first();
            if ($id_user == $id_admin->id) {
                $admin = true;
            }
            $notification = Notifications::where('user_id', auth()->user()->id)
                ->where('status','belum')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
            // jika user sudah login
            $userLog = 2;
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $footer = Footer::first();
        $tripay = new TripayPaymentController();
        $detail_transaction = $tripay->detailTransaction($reference);

        $referece = $detail_transaction->reference;
        $data_transaction = TransactionTopUp::where('reference', $reference)->first();

        return view('tripay.detail_transaction', compact('data_transaction', 'detail_transaction', 'categorytopup', 'userLogin', 'footer', 'notification', 'favorite', 'unreadNotificationCount', 'messageCount'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function paymentMethod(Request $request)
    {
        if ($request->inputanLainya != null) {
            $price = $request->inputanLainya;
            if ($price < 10000) {
                return redirect()->back()->with('error', 'Nominal top up tidak boleh kurang dari Rp. 10.000,00');
            } elseif ($price > 5000000) {
                return redirect()->back()->with('error', 'Nominal top up tidak boleh lebih dari Rp. 5.000.000,00');
            } else {
                return redirect('/koki/payments-method-page/' . $price);
            }
        } elseif ($request->inputanTopUp == null && $request->inputanLainya == null) {
            return redirect()->back()->with('error', 'Inputan tidak boleh kosong');
        } else {
            $price = $request->inputanTopUp;
            if ($price < 10000) {
                return redirect()->back()->with('error', 'Nominal top up tidak boleh kurang dari Rp. 10.000,00');
            } elseif ($price > 5000000) {
                return redirect()->back()->with('error', 'Nominal top up tidak boleh lebih dari Rp. 5.000.000,00');
            } else {
                return redirect('/koki/payments-method-page/' . $price);
            }
        }
    }
    public function paymentsPage()
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $categorytopup = TopUpCategories::all();
        $admin = false;
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $id_user = Auth::user()->id;
            $id_admin = User::where("role", "admin")->first();
            if ($id_user == $id_admin->id) {
                $admin = true;
            }
            $notification = Notifications::where('user_id', auth()->user()->id)
                ->where('status','belum')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
            // jika user sudah login
            $userLog = 2;
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $footer = Footer::first();
        $tripay = new TripayPaymentController();
        $channels = $tripay->getPaymentChannels();

        return view('tripay.paymentsMethod', compact('categorytopup', 'channels', 'userLogin', 'footer', 'notification', 'favorite', 'unreadNotificationCount', 'messageCount'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function categories(Request $request)
    {
        $data = TopUpCategories::count();
        if ($data >= 3) {
            return redirect()->back()->with('error', 'Jumlah kategori telah mencapai batas maksimum');
        } else {
            $categories = new TopUpCategories();
            $categories->name = $request->name;
            $categories->price = $request->price;
            $lastItem = TopUpCategories::latest()->first();
            if ($lastItem) {
                $order = intval(substr($lastItem->foto, -5, 1));
                $nextOrder = $order + 1;
                $categories->foto = "image{$nextOrder}.png";
            }
            $categories->save();
            return redirect()->back()->with('success', 'berhasil menambahkan kategori');
        }
    }
    public function hapus_categories($id) {
        $topupcategories = TopUpCategories::find($id);
        $topupcategories->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Berhasil menghapus kategori top up.',
        ]);
    }
    public function store(Request $request)
    {
        $check = Auth::check();
        if ($check) {
            if ($request->inputanLainya != null) {
                $user = User::findOrFail(auth()->user()->id);
                $saldo_sebelumnya = $user->saldo;
                $saldo_baru = $request->inputanLainya;
                $user->saldo = $saldo_sebelumnya + $saldo_baru;
                $user->save();
                return redirect()->back()->with('success', 'Selamat transaksi anda berhasil!');
            } else {
                $user = User::findOrFail(auth()->user()->id);
                $saldo_sebelumnya = $user->saldo;
                $saldo_baru = $request->input('inputanTopUp');
                $user->saldo = $saldo_sebelumnya + $saldo_baru;
                $user->save();
                return redirect()->back()->with('success', 'Selamat transaksi anda berhasil!');
            }
        } else {
            return redirect()->route('login')->with('info', 'silahkan login terlebih dahulu');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = TopUpCategories::findOrFail($id);
        $data->name = $request->name;
        $data->price = $request->price;
        $foto = $data->foto;
        $data->foto = $foto;
        $data->save();
        return redirect()->back()->with('success', 'Kategori top up berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
