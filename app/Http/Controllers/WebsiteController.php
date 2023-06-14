<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use App\Models\User;
use App\Notifications\ContactForm;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class WebsiteController extends Controller
{

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
}