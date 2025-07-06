<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Micropost;

class FavoritesController extends Controller
{
    /**
     * お気に入り一覧を表示する。
     */
    public function index()
    {
        $user = \Auth::user();
        $user->loadCount(['microposts', 'followings', 'followers']);
        $favorites = $user->favorites()->orderBy('created_at', 'desc')->paginate(10);

        return view('users.show', [
            'user' => $user,
            'microposts' => $favorites,
        ]);
    }

    /**
     * 投稿をお気に入りに追加する。
     */
    public function store(string $id)
    {
        $micropost = Micropost::findOrFail($id);

        if (\Auth::user()->favorite($micropost->id)) {
            return back()->with('success', 'Added to favorites.');
        }

        return back()->with('error', 'Failed to add to favorites.');
    }

    /**
     * 投稿をお気に入りから削除する。
     */
    public function destroy(string $id)
    {
        $micropost = Micropost::findOrFail($id);

        if (\Auth::user()->unfavorite($micropost->id)) {
            return back()->with('success', 'Removed from favorites.');
        }

        return back()->with('error', 'Failed to remove from favorites.');
    }
}
