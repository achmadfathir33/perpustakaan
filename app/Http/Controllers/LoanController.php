<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Throwable;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['member', 'user', 'loanItems.book'])->paginate(10);

        return view('loans.index', compact('loans'));
    }

    public function report(Request $request)
    {
        $body = ['data' => [], 'meta' => null];
        $page = $request->query('page', 1);

        $baseUrl = rtrim((string) config('services.internal_api.base_url', 'http://127.0.0.1:8011'), '/');
        $urls = array_unique([
            $baseUrl . '/api/loans',
            str_replace('127.0.0.1', 'localhost', $baseUrl) . '/api/loans',
        ]);

        foreach ($urls as $url) {
            try {
                $response = Http::connectTimeout(2)->timeout(4)->get($url, ['page' => $page]);

                if ($response->successful()) {
                    $json = $response->json();
                    if (is_array($json)) {
                        $body = $json;
                        break;
                    }
                }
            } catch (Throwable $e) {
            }
        }

        return view('loans.report', [
            'loans' => $body['data'] ?? [],
            'meta' => $body['meta'] ?? null,
        ]);
    }

    public function create()
    {
        return view('loans.create', [
            'members' => Member::all(),
            'books' => Book::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|integer|exists:members,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'book_ids' => 'required|array|min:1',
            'book_ids.*' => 'integer|exists:books,id',
        ]);

        $loan = Loan::create([
            'member_id' => $validated['member_id'],
            'user_id' => auth()->id(),
            'tanggal_pinjam' => $validated['tanggal_pinjam'],
            'tanggal_kembali' => $validated['tanggal_kembali'],
        ]);

        foreach ($validated['book_ids'] as $bookId) {
            $loan->loanItems()->create(['book_id' => $bookId]);
        }

        return redirect()->route('loans.index')
            ->with('success', 'Transaksi peminjaman berhasil dibuat.');
    }

    public function show(string $id)
    {
        return view('loans.show', [
            'loan' => Loan::with(['member', 'user', 'loanItems.book'])->findOrFail($id),
        ]);
    }

    public function edit(string $id)
    {
        return view('loans.edit', [
            'loan' => Loan::with(['member', 'user', 'loanItems.book'])->findOrFail($id),
        ]);
    }

    public function update(Request $request, string $id)
    {
        $loan = Loan::findOrFail($id);

        $validated = $request->validate([
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'status' => 'required|in:dipinjam,dikembalikan,terlambat',
        ], [
            'tanggal_kembali.required' => 'Tanggal kembali wajib diisi.',
            'tanggal_kembali.after_or_equal' => 'Tanggal kembali tidak boleh sebelum tanggal pinjam.',
        ]);

        $loan->update($validated);

        return redirect()->route('loans.index')
            ->with('success', 'Transaksi peminjaman berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $loan = Loan::findOrFail($id);
        $loan->loanItems()->delete();
        $loan->delete();

        return redirect()->route('loans.index')
            ->with('success', 'Transaksi peminjaman berhasil dihapus.');
    }

    public function kembalikan(string $id)
    {
        $loan = Loan::findOrFail($id);

        $loan->update([
            'status' => 'dikembalikan',
            'tanggal_dikembalikan' => now()->toDateString(),
        ]);

        return redirect()->route('loans.index')
            ->with('success', 'Buku berhasil dikembalikan.');
    }
}