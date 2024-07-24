<?php

namespace App\Http\Controllers;

use App\Models\Masuk;
use App\Models\Disposisi;
use App\Models\NotifikasiDisposisi;
use App\Http\Requests\StoreDisposisiRequest;
use App\Http\Requests\UpdateDisposisiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\KirimEmail;
use Ramsey\Uuid\Uuid;
use Pusher\Pusher;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,Masuk $masuk)
   {

            return view('surat.disposisi.index', [
            'data' => Disposisi::latest()->where('surat_id', $masuk->id)->paginate(10)->withQueryString(),
            'masuk' => $masuk,
            
        ]);

        // $notifikasiDisposisi = NotifikasiDisposisi::all();
        // return view('dashboard', ['notifikasiDisposisi' => $notifikasiDisposisi]);
        // return view('components.navbars.navs.auth', compact('notifikasis'));

        // return view('components.navbars.navs.auth', [
        //                'notifikasis' => NotifikasiDisposisi::all()
        // ]);
    }

    public function views(Request $request,Disposisi $disposisi, Masuk $masuk)
    {

        return view('surat.disposisi.views', [
            'data' => Disposisi::latest()->paginate(10)->withQueryString(),
            'masuk' => $masuk,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Masuk $masuk)
    {
        return view('surat.disposisi.create', [
                    'masuk' => $masuk
                ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDisposisiRequest $request, Masuk $masuk)
    {

        $validateData = $request->validate([
            'penerima' => ['required', 'email:dns'],
            'isi_disposisi' => ['required'],
            'tenggat_waktu' => ['nullable'],
            'catatan' => ['nullable'],
        ]);

        // $validateData['catatan'] = '-';
        $validateData['surat_id'] = $masuk->id;
        $validateData['user_id'] = auth()->user()->id;
        $validateData['token'] = Uuid::uuid4()->toString();
        $disposisiContent = $request->input('content');

        Disposisi::create($validateData);
        
        $token_disposisi = $validateData['token'];

        $base_url = 'https://0510-182-2-229-209.ngrok-free.app/';
        $tracking_image = "<img src='" . $base_url . "trigger/" . $token_disposisi . "' width='1' height='1' style='display: none;' />";
        $link_tracking = $base_url . "trigger/" . $token_disposisi;
        $disposisiContent .= $link_tracking;
        $lampiran = asset('storage/' . $masuk->lampiran);

                        // kirim email menggunakan SMTP
                $mailData = [
                    'token' => $token_disposisi,
                    'penerima' => $request->input('penerima'),
                    'tenggat_waktu' => $request->input('tenggat_waktu'),
                    'isi_disposisi' => $request->input('isi_disposisi'),
                    'catatan' => $request->input('catatan'),
                    'content' => $disposisiContent,
                    'pengirim' => $masuk->pengirim,
                    'nomor_surat' => $masuk->nomor_surat,
                    'tanggal_surat' => $masuk->tanggal_surat,
                    'tanggal_terima' => $masuk->tanggal_terima,
                    'nomor_agenda' => $masuk->nomor_agenda,
                    'isi_ringkasan' => $masuk->isi_ringkasan,
                    'lampiran_file' => $lampiran

                ];
                Mail::to($mailData['penerima'])->send(new KirimEmail($mailData));
        
        return redirect('/surat/'.$masuk->id.'/disposisi')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Masuk $masuk, Disposisi $disposisi)
    {
        return view('surat.disposisi.show', [
            'disposisi' => $disposisi,
            'masuk' => $masuk,
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Masuk $masuk, Disposisi $disposisi)
    {
        return view('surat.disposisi.edit', [
            'disposisi' => $disposisi,
            'masuk' => $masuk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDisposisiRequest $request, Masuk $masuk, Disposisi $disposisi)
    {
        $rules = [
            'penerima' => ['required', 'email:dns'],
            'isi_disposisi' => ['required'],
            'tenggat_waktu' => ['nullable'],
            'catatan' => ['nullable'],
        ];

        // if($request->nomor_surat != $masuk->nomor_surat){
        //     $rules['nomor_surat'] = 'required|unique:masuks';
        // }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Disposisi::where('id', $disposisi->id)
                ->update($validatedData);

        return redirect('/surat/'.$masuk->id.'/disposisi')->with('success', 'Post Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Masuk $masuk, Disposisi $disposisi)
    {
        try {
            $disposisi->delete();
            return back()->with('success', 'Berhasil dihapus');
        } catch (\Throwable $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function trigger($token, )
    {

        $disposisi = Disposisi::where('token', $token)->firstOrFail();
        $keterangan_balasan = 'aaa';

        DB::table('disposisis')
            ->where('token', $token)
            ->where('status', 'Belum Dibaca')
            ->update([
                'status' => 'Sudah Dibaca',
                'balasan' => $keterangan_balasan
            ]);

            
            $nomor_surat = $disposisi->masuk->nomor_surat;
            $penerima = $disposisi->penerima;
            $surat_id = $disposisi->masuk->id;
            $disposisi_id = $disposisi->id;

            $data = ['message' => 'Penerima ' . $penerima . ' dengan nomor surat ' . $nomor_surat . ' sudah dibaca.',
                    'token' => $disposisi->token,
                    'status' => 'Sudah Dibaca',
                    'keterangan' => $keterangan_balasan,
                    'show' => '/surat/' . $surat_id . '/disposisi/' . $disposisi_id
        ];

        $notifikasi = new NotifikasiDisposisi;
        $notifikasi->pesan = $data['message'];
        $notifikasi->link = $data['show'];
        $notifikasi->disposisi_token = $data['token'];
        $notifikasi->disposisi_id = $disposisi_id;
        $notifikasi->surat_id = $surat_id;
        $notifikasi->user_id = $disposisi->user_id;

    //     $data = ['link' => $notifikasi->link,
    //     'penerima' => $penerima,
    //     'nomor_surat' => $nomor_surat,
    //     'status' => 'Sudah Dibaca',
    //     'created_at' => $notifikasi->created,
    // ];
        
        // Cek apakah disposisi_token sudah ada di database
        $existingNotifikasi = NotifikasiDisposisi::where('disposisi_token', $data['token'])->first();
        
        if ($existingNotifikasi) {
            // Jika disposisi_token sudah ada, tampilkan halaman info
            session()->flash('token_exists', true);
            return redirect('pages/info');
        } else {
            // Jika disposisi_token belum ada, simpan data ke dalam tabel notifikasi_disposisi
            $notifikasi->save();
            
            // Trigger Pusher
            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                [
                    'cluster' => env('PUSHER_APP_CLUSTER'),
                    'useTLS' => true
                ]
            );
            $pusher->trigger('bps-surat', 'notifikasi-event', $data);

            return redirect('pages/info');
            // Lanjutkan dengan proses yang diinginkan
            // return response()->make('', 204);

            // lanjutkan dengan proses yang diinginkan
        }
        
        // return redirect('/'); // redirect ke halaman utama setelah trigger berhasil dijalankan
    }
}
