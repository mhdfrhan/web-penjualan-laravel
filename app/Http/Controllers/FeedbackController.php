<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
	public function index()
	{
		return view('guest.feedback', [
			'title' => 'Feedback'
		]);
	}

	public function tambah(Request $request)
	{
		$validated = $request->validate([
			'feedback' => 'required'
		]);

		$validated['user_id'] = Auth::user()->id;

		if (Feedback::create($validated)) {
			return redirect()->back()->with('success', 'Berhasil mengirim feedback');
		} else {
			return redirect()->back()->with('error', 'Gagal mengirim feedback');
		};
	}

	public function post($id)
	{
		DB::table('feedback')->where('id', $id)->update([
			'posted' => 1
		]);

		return back()->with('success', 'Berhasil mengupload ke halaman utama!');

	}

	public function dashboard()
	{
		$feedback = Feedback::select('feedback.*', 'users.name', 'users.email')
            ->join('users', 'users.id', '=', 'feedback.user_id')
            ->orderBy('feedback.posted', 'desc')
            ->get();

		return view('dashboard.feedback', [
			'title' => 'Feedback',
			'feedback' => $feedback
		]);
	}

	public function hapus($id)
	{

		if (Feedback::where('id', $id)->delete()) {
			return redirect()->back()->with('success', 'Berhasil hapus feedback');
		} else {
			return redirect()->back()->with('error', 'Gagal hapus feedback');
		};
	}

	public function hapus_post($id)
	{
		DB::table('feedback')->where('id', $id)->update([
			'posted' => 0
		]);

		return back()->with('success', 'Berhasil menghapus testimonials di halaman utama!');
	}
}
