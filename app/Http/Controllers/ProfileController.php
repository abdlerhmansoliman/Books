<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Interfaces\UserInterface;
use App\Models\Book;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    protected $userRepo;
    public function __construct(UserInterface $userRepo)
    {
        $this->userRepo=$userRepo;
    }
    public function profile(){
 
    }
    public function show(Request $request){
        $user = auth()->user();
        $userId = $user->id;
        $section = $request->get('type', 'books');
        
        $bookCount = $this->userRepo->getBooksCount($userId);
        $reviewCount = $this->userRepo->getUserReviewsCount($userId);
        $downloadsCount = $this->userRepo->getDownloadsCount($userId);

        $data = compact('bookCount', 'reviewCount', 'downloadsCount', 'section');

        if ($section === 'reviews') {
            $data['items'] = $this->userRepo->getReviews($userId);
        } 
        elseif ($section === 'books') {
            $data['items'] = $this->userRepo->getBooks($userId);
        }
        elseif ($section === 'downloads') {
            $data['items'] = $this->userRepo->getDownloads($userId);
        }

     
        return view('profile.profile', $data);

    }
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $data = $request->validated();
        $image = $request->file('image');

        $this->userRepo->updateUserProfile($user, $data, $image);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
