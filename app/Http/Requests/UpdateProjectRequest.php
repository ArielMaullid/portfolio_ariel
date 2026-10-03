<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    protected function prepareForValidation(): void
    {
        if (is_string($this->technologies)) {
            $this->merge([
                'technologies' => array_values(array_filter(array_map(
                    'trim',
                    explode(',', $this->technologies)
                ))),
            ]);
        }

        if (is_string($this->features)) {
            $this->merge([
                'features' => array_values(array_filter(array_map(
                    'trim',
                    preg_split('/\r\n|\r|\n/', $this->features)
                ))),
            ]);
        }

        $this->merge([
            'featured' => $this->boolean('featured'),
        ]);

        if (empty($this->slug) && ! empty($this->title)) {
            $this->merge([
                'slug' => Str::slug($this->title),
            ]);
        }
    }

    public function rules(): array
    {
        $projectId = $this->route('project')->id;

        return [
            'title'        => ['required', 'string', 'max:255'],
            'slug'         => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                Rule::unique('projects', 'slug')->ignore($projectId),
            ],
            'short_desc'   => ['required', 'string', 'max:500'],
            'description'  => ['nullable', 'string'],
            'background'   => ['nullable', 'string'],
            'objective'    => ['nullable', 'string'],
            'features'     => ['nullable', 'array'],
            'features.*'   => ['string', 'max:500'],
            'contribution' => ['nullable', 'string'],
            'development'  => ['nullable', 'string'],
            'result'       => ['nullable', 'string'],
            'image'        => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'image_path'   => ['nullable', 'string', 'max:255'],
            'category'     => ['required', 'string', 'max:100'],
            'technologies' => ['required', 'array', 'min:1'],
            'technologies.*' => ['string', 'max:100'],
            'github_url'   => ['nullable', 'url', 'max:255'],
            'demo_url'     => ['nullable', 'url', 'max:255'],
            'year'         => ['nullable', 'integer', 'min:1990', 'max:2100'],
            'featured'     => ['boolean'],
            'order'        => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'slug.regex'         => 'Slug hanya boleh berisi huruf kecil, angka, dan tanda minus.',
            'slug.unique'        => 'Slug sudah digunakan oleh project lain.',
            'technologies.min'   => 'Minimal satu teknologi harus diisi.',
            'image.max'          => 'Ukuran gambar maksimal 2 MB.',
        ];
    }
}