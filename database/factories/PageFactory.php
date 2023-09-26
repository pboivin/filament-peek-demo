<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = preg_replace('/\./', '', $this->faker->sentence(3));

        return [
            'slug' => Str::slug($title),
            'title' => $title,
            'content' => implode(PHP_EOL, [
                '**Lorem ipsum dolor sit amet**',
                '',
                'Consectetur adipiscing elit. Nullam elementum sed velit in pretium. Donec faucibus vestibulum sapien sit amet dignissim. Mauris quis odio libero. Proin eu nunc ac leo tempus accumsan.',
                '',
                'Nulla id metus eu nunc dapibus suscipit eu quis sem. Ut ornare fringilla nisl sit amet faucibus. Curabitur elementum pharetra lorem, ac interdum augue auctor ut. Pellentesque gravida hendrerit lectus, nec ultricies nibh. Nulla urna nibh, iaculis eu quam vel, lacinia consequat quam.',
            ]),
        ];
    }
}
