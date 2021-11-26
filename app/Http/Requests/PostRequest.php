<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST': {
                    return [
                        'title' => 'required|max:255',
                        'slug' => 'required|unique:posts',
                        'image' => 'image|file|max:1024',
                        'category_id' => 'required',
                        'body' => 'required|min:300',
                    ];
                }
            case 'PUT':
            case 'CATCH': {
                    // FIXME : Cara dibawah menambah bebean query
                    $post = Post::where('slug', $this->slug)->first();
                    return [
                        'title' => 'required|max:255',
                        'slug' => ['required', Rule::unique('posts')->ignore($post->id)],
                        'image' => 'image|file|max:1024',
                        'category_id' => 'required',
                        'body' => 'required|min:300',
                    ];
                }
        }
    }
}
