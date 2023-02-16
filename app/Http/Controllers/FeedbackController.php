<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

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
				'name' => 'required|max:100',
				'feedback' => 'required'
			]);

			if(Feedback::create($validated)){
				return redirect()->back()->with('success', 'Berhasil mengirim feedback');
			} else {
				return redirect()->back()->with('error', 'Gagal mengirim feedback');
			};
		}

		public function dashboard()
		{
			return view('dashboard.feedback', [
				'title' => 'Feedback',
				'feedback' => Feedback::latest()->get()
			]);
		}

		public function hapus($id)
		{

			if(Feedback::where('id', $id)->delete()){
				return redirect()->back()->with('success', 'Berhasil hapus feedback');
			} else {
				return redirect()->back()->with('error', 'Gagal hapus feedback');
			};
		}
}
