<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Validation\Rule;
use GrahamCampbell\ResultType\Result;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        // dd($this->route());
        switch ($this->method()) {
            case 'POST': {
                    return [
                        'name' => ['required', 'max:30', 'unique:categories'],
                        'color' => 'required',
                        'slug' => ['required', 'unique:categories'],
                    ];
                }
            case 'PUT':
            case 'PATCH': {
                    // FIXME : Cara dibawah menambah bebean query
                    $category= Category::where('slug', $this->slug)->first();
                    // dd($category->id);
                    return [
                        'name' => ['required', 'max:30', Rule::unique('categories')->ignore($category->id)],
                        'color' => 'required',
                        'slug' => ['required', Rule::unique('categories')->ignore($category->id)],
                    ];
                }
            default:
                break;
        }
    }
}
