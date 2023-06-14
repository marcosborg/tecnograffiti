<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\StoreRecruitmentRequest;
use App\Models\Contact;
use App\Models\Newsletter;
use App\Models\Recruitment;
use App\Models\User;
use App\Notifications\ContactForm;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class WebsiteController extends Controller
{

    use MediaUploadingTrait;

    public function index()
    {
        return view('website.home');
    }

    public function contact(StoreContactRequest $request)
    {

        if ($request->file) {
            $path = storage_path('tmp/uploads');

            try {
                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }
            } catch (\Exception $e) {
            }

            $file = $request->file('file');

            $name = uniqid() . '_' . trim($file->getClientOriginalName());

            $file->move($path, $name);

        }

        $contact = Contact::create($request->all());

        if ($request->input('file', false)) {
            $contact->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $contact->id]);
        }

        $user = User::find(2);
        $user->notify(new ContactForm($request));

    }

    public function newsletter(Request $request)
    {

        $request->validate([
            'email' => 'required|email:rfc,dns'
        ]);

        $newsletter = new Newsletter;
        $newsletter->email = $request->email;
        $newsletter->save();
    }

    public function recruitment(StoreRecruitmentRequest $request)
    {
        $recruitment = Recruitment::create($request->all());

        if ($request->input('cv', false)) {
            $recruitment->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $recruitment->id]);
        }
    }
}