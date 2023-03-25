<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $allProducts = Product::all();
        $FeaturedProducts = Product::where('featured', 'Featured')->get();
        $cats = Category::all();
        $vendors = User::where('role', 'vendor')->get();
        return view('userlogin', compact('cats', 'allProducts', 'FeaturedProducts', 'vendors'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            // 'security' => 'same:randcode',
        ]);

        $request->authenticate();
        $request->session()->regenerate();
        if ($request->user()->role === "admin") {
            return redirect()->intended("admin/dashboard");
        } elseif ($request->user()->role === "vendor") {
            return redirect()->intended("vendor/dashboard");
        } else {
            $allProducts = Product::all();
            $FeaturedProducts = Product::where('featured', 'Featured')->get();
            $cats = Category::all();
            $vendors = User::where('role', 'vendor')->get();
            return redirect()->intended("dashboard");
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
